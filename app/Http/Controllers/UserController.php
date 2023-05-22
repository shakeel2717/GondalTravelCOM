<?php

namespace App\Http\Controllers;

use App\Models\AdminCollection;
use App\Models\CashCollector;
use App\Models\Flight;
use App\Models\Passenger;
use App\Models\PassengerTicket;
use App\Models\Ticket;
use App\Models\ticketupload;
use App\Models\User;
use App\Models\UserTicketCash;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;
use Mail;
use Session;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        return view('admin.users.index', ['users' => User::orderBy('id', 'DESC')->paginate(10)]);
    }

    public function dashboard(Request $request)
    {
        $booking = Ticket::where('user_id',Auth::id())->count();
        $flights = Flight::all();
        return view('user.dashboard', ['book' => $booking, 'flights' => $flights]);
    }

    public function getUserDataHistory(Request $request)
    {
        if ($request->ajax()) {
            $data = Ticket::where('user_id',Auth::id())->latest()->get();
            foreach ($data as $d){
                $d->payment_status = $d->payment_status == 0 ? 'Unpaid' : 'Paid';
                $d->payment_method = strtoupper($d->payment_method);
                $d->date =  (string)date('d-M-Y', strtotime(substr($d->created_at, 0, 10)));
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        else{
            return null;
        }
    }

    public function userticket($pnr)
    {
        $uploadtickets = ticketupload::where('pnr_number',$pnr)->first();
        $ticket = Ticket::where('prn_no',$pnr)->first();
        if($ticket->format=='db')
        {
            $data = json_decode($ticket->details, true);
            $passenger = Passenger::where('ticket_id', $ticket->id)->get();
            return view('user.ticket2', ['ticket2' => $ticket, 'data2' => $data, 'passengers2' => $passenger ,'originalticket'=>$uploadtickets, 'error' => false]);
        }
        else 
        {
            $data = json_decode($ticket->details, true);
            $passenger = Passenger::where('ticket_id', $ticket->id)->get();
            return view('user.ticket', ['ticket' => $ticket, 'data' => $data, 'passengers' => $passenger ,'originalticket'=>$uploadtickets, 'error' => false]);
        }
       

        if($ticket->format=='db')
        {
             $data = json_decode($ticket->details, true);
             $passenger = Passenger::where('ticket_id', $ticket->id)->get();
            return view('admin.ticket2', ['ticket2' => $ticket, 'data2' => $data, 'passengers2' => $passenger,'originalticket'=>$uploadtickets , 'error' => false]);
        }
        else
        {
            $data = json_decode($ticket->details, true);
            $passenger = Passenger::where('ticket_id', $ticket->id)->get();
            return view('admin.ticket', ['ticket' => $ticket, 'data' => $data, 'passengers' => $passenger ,'originalticket'=>$uploadtickets, 'error' => false]);
        }

    }

    public function payTicket(Request $request)
    {
        $pnr = $request->get('pnr');
        $ticket = Ticket::where('prn_no',$pnr)->first();
        $data = json_decode($ticket->details, true);
        $passenger = Passenger::where('ticket_id', $ticket->id)->get();
        $paymet = $this->payStripe($request, $data, User::getUserEmail());
        if($paymet == "Payment is successful."){
            $ticket->payment_status = 1;
            $ticket->payment_method = 'card';
            $ticket->save();
            return view('user.ticket', ['ticket' => $ticket, 'data' => $data, 'passengers' => $passenger , 'error' => false]);
        }
        else{
            return view('user.ticket', ['ticket' => $ticket, 'data' => $data, 'passengers' => $passenger , 'error' => $paymet]);
        }
    }

    public function ticketCancel(Request $request)
    {
        try {
            Ticket::where('id', $request->get('ticket_id'))
                ->update([
                    'status' => true
                ]);
        } catch (\Exception $e) {
            return back()->with('success', 'Some Error Occurred');
        }

        return back()->with('success', 'Flight Cancelled');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'dob' => ['required'],
            'phone' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
        ]);

            DB::transaction(function () use ($request) {
                    $user = User::create([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'state' => $request->get('state'),
                    'country' => $request->get('country'),
                    'city' => $request->get('city'),
                    'phone' => $request->get('phone'),
                    'dob' => $request->get('dob'),
                    'address' => $request->get('address'),
                    'o_auth' => $request->get('password'),
                    'role' => 'Collector',
                    'password' => Hash::make($request['password']),
                    
                ]);
                $user->assignRole($request->get('role'));
            });


        $lastuser = User::all()->last();

        if($request->get('role')=='1')
        {
                DB::table('users')
                ->where('id',$lastuser->id)
                ->update(['role' => 'User']);
        
        }
        elseif($request->get('role')=='2')
        {
                DB::table('users')
                ->where('id',$lastuser->id)
                ->update(['role' => 'Collector']);
        
        }
        elseif($request->get('role')=='3')
        {
                DB::table('users')
                ->where('id',$lastuser->id)
                ->update(['role' => 'Admin']);
        
        }
  

        return back()->with('success', 'Added New User');
    }

 

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        //
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        return view('admin.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        //
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        //
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        try {
            DB::transaction(function () use ($request, $user) {
                $user->assignRole($request->get('role'));
                $user->fill($request->all())->update();
            });
        }
        catch(Exception $e){
            return back()->with('success', 'Some Error Occurred');
        }

        return back()->with('success', 'Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        //
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        $user->delete();
        return redirect()->back()->with('success', 'User Deleted');
    }
    public function allCollectors()
    {
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        $collectors = User::where('role', 'Collector')->get();
        return view('admin.users.collectors', ['users' => $collectors]);
    }
    public function allCustomers()
    {
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        $collectors = User::where('role', 'User')->get();
        return view('admin.users.users', ['users' => $collectors]);
    }
    public function allAdmins()
    {
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        $collectors = User::where('role', 'Admin')->get();
        return view('admin.users.admins', ['users' => $collectors]);
    }
    public function all()
    {
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        $collectors = User::all();
        return view('admin.users.all', ['users' => $collectors]);
    }

 public function add_role_account()
    {
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        $user = User::all();
        return view('admin.users.create_role', ['users' => $user]);
    }

    public function add_role_store(Request $req)
    {
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->address = $req->address;
        $user->phone = $req->phone;
        $user->city = $req->city;
        $user->o_auth = $req->password;
        $user->country = $req->country;
        $user->dob = $req->dob;
        $user->state = $req->state;
        $user->assignRole($req->role);
        if($req->role ==1)
        {
            $user->role = "User";
        }
        else if($req->role ==2)
        {
            $user->role = "Collector";
        }
        else if($req->role ==3)
        {
            $user->role = "Admin";
        }


        $user->save();

        Session::flash('message', 'Role Created Successfully !'); 
Session::flash('alert-class', 'alert-success'); 

return back();
        

        
    }


 public function sendmail_user(request $req)
    {
          
            

$details =['name'=>"ahfaz", 'email' => "masdasda",'phone' => "23123",'messages' => "dsadfsdfsd"];
$user['to'] ='infosupport@gondaltravel.com';

$data['email'] = $req->email;
        $data["title"] = "Message From Gondal-Travels";
       
 
// // for admin

     $files = [
            public_path('images/uploadtickets/'.$req->ticketimage)];
//         Mail::send('emails.mail', $details, function($message)use($user, $data, $files) {
//             $message->to($user['to'])
//                     ->subject($data["title"]);
 
//             foreach ($files as $file){
//                 $message->attach($file);
//             }            
//         }); 

// for user
         Mail::send('emails.mailiya',$details, function($message)use($user, $data, $files) {
            $message->to($data['email'])
                    ->subject($data["title"]);
 
            foreach ($files as $file){
                $message->attach($file);
            }            
        }); 

     
// Mail::send('emails.mail', $details, function($messages) use ($user)
//  {
//     $messages->to($user['to']);
//     $messages->subject('Message To Gondal Travels');
  
// });

 // $details = public_path('images/uploadtickets'.$req->ticketimage)
 // $details = $req->ticketimage;
// Mail::to('malikahfaz123@gmail.com')->send(new \App\Mail\MyTestMail($details));
   


Session::flash('message', 'Email sent successfully'); 
Session::flash('alert-class', 'alert-success'); 
   
return back();





    }









public function send_maill(Request $request)
    {
        $data["email"] = "info@gondaltravel.com";
        $data["title"] = "websolutionstuff.com";
        $data["body"] = "This is test mail with attachment";
 
     $files = [
            public_path('images/uploadtickets'.$req->ticketimage),
            public_path('images/uploadtickets'.$req->ticketimage),
        ];
        Mail::send('emails.mail', $data, function($message)use($data, $files) {
            $message->to($data["email"])
                    ->subject($data["title"]);
 
            foreach ($files as $file){
                $message->attach($file);
            }            
        });

        echo "Mail send successfully !!";
    }




public function sendmail_userquery(Request $req)
    {
$details =['name'=>$req->name, 'email' => $req->email,'messages' => $req->message];
$user['to'] ='info@gondaltravel.com';

     
Mail::send('emails.mailiya', $details, function($messages) use ($user) {
    $messages->to($user['to']);
    $messages->subject('User Query ');
  
});

Session::flash('message', 'Message Send Successfully !'); 
Session::flash('alert-class', 'alert-info');
    return back();
    }


public function user_uploadimage(Request $req)
    {
       $user_id = auth()->user()->id;
       $user = User::where('id',$user_id)->first();

      $image = $req->file('image');
      $image_name = $image->getClientOriginalName();
      $image->storeAs('/images/userprofileimage',$image_name);

      $user->img_url = $image_name;
      $user->save();

      Session::flash('message', 'Profile Image Uploaded Successfully !'); 
      Session::flash('alert-class', 'alert-success'); 
      return back();
    }



}
