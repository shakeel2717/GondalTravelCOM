<?php

namespace App\Http\Controllers;

use App\Models\AdminCollection;
use App\Models\CollectorPayment;
use App\Models\Passenger;
use App\Models\CashCollector;
use App\Models\Ticket;
use App\Models\collectorcashinhand;
use App\Models\User;
use App\Models\ticketupload;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Mail;
use Requests;

use Mockery\Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{    
    private $ApiUrl;
    private $ApiLive;
    private $BookingLive;
    
    public function __construct()
    {
        $this->ApiLive = Setting::where('name','live_api_on')->get('value')[0]->value;
        $this->BookingLive = Setting::where('name','live_booking_on')->get('value')[0]->value;
    }

    public function getApi(){
        Requests::register_autoloader();
        
        if($this->ApiLive){
            $this->ApiUrl = 'https://api.amadeus.com';
            $url = $this->ApiUrl.'/v1/security/oauth2/token';
            $auth_data = [
                'client_id' => 'RCJjGo7OtUJmHbWG3zLAt37nTh14DBGC',
                'client_secret' => '8shnlRRHuhP7Hz1W',
                'grant_type'    => 'client_credentials'
            ];
        }else{
            $this->ApiUrl = 'https://test.api.amadeus.com';
            $url = $this->ApiUrl.'/v1/security/oauth2/token';
            $auth_data = [
                'client_id' => 'oVK2arWLniDTWJPrYyG9uDT08C7JVfbZ',
                'client_secret' => 'nlAFFigrRAz90btR',
                'grant_type'    => 'client_credentials'
            ];
        }

        try {
            $headers = ["Content-Type" => "application/x-www-form-urlencoded"];
            $go = Requests::post($url, $headers, $auth_data);
            $run_body = json_decode($go->body);
            $access_token = $run_body->access_token;
            return $access_token;
        }catch(Exception $e) {
            Session::flash('message', 'Server Temporary Down'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();
        }
       
    }

    public function dashboard()
    {
        if (auth()->user()->hasRole('user')) {
            return redirect()->to('dashboard/user');
        }
        if (auth()->user()->hasRole('collector')) {
            return redirect()->to('dashboard/collector');
        }
        abort_if(!auth()->user()->hasRole('super-admin'),403, 'You Do not have permissions.');
        return view('admin.dashboard');
    }

    public function allUserDataHistory(Request $request)
    {
        if ($request->ajax()) {
            $data = Ticket::all();
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
            return view('admin.ticket2', ['ticket2' => $ticket, 'data2' => $data, 'passengers2' => $passenger,'originalticket'=>$uploadtickets , 'error' => false]);
        }
        else
        {
            $data = json_decode($ticket->details, true);
            $passenger = Passenger::where('ticket_id', $ticket->id)->get();
            return view('admin.ticket', ['ticket' => $ticket, 'data' => $data, 'passengers' => $passenger ,'originalticket'=>$uploadtickets, 'error' => false]);
        }
    }


    public function getCollectors()
    {
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        $collectors = CollectorPayment::all();
        return view('admin.collector', ['collectors' => $collectors]);
    }

    public function getCollectors_name()
    {
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        $collectors = CollectorPayment::all();
        return view('admin.collectornames', ['collectors' => $collectors]);
    }

    public function getCollectors_names()
    {
        $collectors = User::where('role','collector')->get();
        return view('admin.collectornames', ['collectors' => $collectors]);
    }

    public function Select_Collectors(request $req)
    {
        $collector =  $req->collector;
        return view('admin.selectcollector_view', ['collector' => $collector ]);
    }


    public function Select_Collectors_Store(request $req)
    {
        $totalcash= DB::table('cash_collectors') ->where('collector_id',$req->collectorid)->sum('collected_cash'); 

        if(CollectorPayment::where('collector_id',$req->collectorid)->first()!=null)
        {
            $cashinhandamount=collectorcashinhand::where('collector_id', $req->collectorid)->first()->total_cash_in_hand;
            //$paidamount = DB::table('collector_payments') ->where('collector_id',$req->collectorid)->sum('paidamount');
            
            $paidamount=collectorcashinhand::where('collector_id', $req->collectorid)->first();
            
            $finalpaidamountold = $paidamount->total_cash_in_hand + $req->paid;
            
            //$finalremainamountnew =  $totalcash - $finalremainamountold;
            //$lastremainamount = CollectorPayment::where('collector_id',$req->collectorid)->get()->last()->remaining_amount;

            $collector_payment = new CollectorPayment;

            $collector_payment->collector_id = $req->collectorid;
            $collector_payment->paidamount = $req->paid;
            $collector_payment->reason = "no reason";
            $collector_payment->remaining_amount =   $cashinhandamount+$req->paid;

            $collector_payment->save();

            $admin_collect = new AdminCollection;

            $admin_collect->collector_id = $req->collectorid;
            $admin_collect->amount = $req->paid;
            $admin_collect->remaining_amount =   $cashinhandamount+$req->paid;
            
            $admin_collect->save();

            // $cashinhandamount = DB::table('admin_collections') ->where('collector_id',$req->collectorid)->sum('amount');
            $collect2 = collectorcashinhand::where('collector_id',$req->collectorid)->first();

            if($collect2!=null)
            {
                //  echo $cashinhandamount = DB::table('admin_collections') ->where('collector_id',$req->collectorid)->sum('amount');

                $cashinhandamount=collectorcashinhand::where('collector_id', $req->collectorid)->first()->total_cash_in_hand;


                $collect2->total_cash_in_hand = $cashinhandamount+$req->paid;
                $collect2->save();
                // DB::table('collectorcashinhands')
                //->where('id',$lastuser->id)
                //->update(['role' => 'User']);
            }
            else
            {
                $cashinhandamount = DB::table('admin_collections') ->where('collector_id',$req->collectorid)->sum('amount');

                $collectorcashinhand = new collectorcashinhand();
                $collectorcashinhand->collector_id= $req->collectorid;
                $collectorcashinhand->total_cash_in_hand  =  $cashinhandamount;
                $collectorcashinhand->save();
            }

            Session::flash('message','Succesfully Added ');
            Session::flash('alert-type','Success');
            return redirect('dashboard/admin/collector/names');
        }
        else 
        {
            $collector_payment = new CollectorPayment;

            $collector_payment->collector_id = $req->collectorid;
            $collector_payment->paidamount = $req->paid;
            $collector_payment->remaining_amount = $totalcash-$req->paid;

            $collector_payment->save();

            $admin_collect = new AdminCollection;

            $admin_collect->collector_id = $req->collectorid;
            $admin_collect->amount = $req->paid;
            $admin_collect->remaining_amount = $totalcash-$req->paid;

            $admin_collect ->save();

            $user['to'] ='infosupport@gondaltravel.com';

            $data["title"] = "Message From Gondal-Travels";

            $data["paid"] = $req->paid;
            $data["collector"] = $req->collectorid;

            // for admin   
    
            Mail::send('emails.collectpayment_mail', $data, function($message)use($user, $data) {
                $message->to($user['to'])
                        ->subject($data["title"]);          
            });

            $useridd = auth()->id();
            $user_email = User::where('id',$useridd)->first()->email;
            $details ='Admin Recieved your payment of '.$req->paid;

            Mail::to($user_email)->send(new \App\Mail\MyTestMail($details));

            if($collect2 = collectorcashinhand::where('collector_id',$req->collectorid)->first()!=null)
            {
                $cashinhandamount = DB::table('admin_collections') ->where('collector_id',$req->collectorid)->sum('amount');
                $collect2->total_cash_in_hand   =  $cashinhandamount;
                $collect2->save();
                // DB::table('collectorcashinhands')
                //         ->where('id',$lastuser->id)
                //         ->update(['role' => 'User']);
            }
            else
            {
                $cashinhandamount = DB::table('admin_collections') ->where('collector_id',$req->collectorid)->sum('amount');

                $collectorcashinhand = new collectorcashinhand();
                $collectorcashinhand->collector_id= $req->collectorid;
                $collectorcashinhand->total_cash_in_hand   =  $cashinhandamount;
                $collectorcashinhand->save();
            }

            Session::flash('message','Succesfully Added ');
            Session::flash('alert-type','Success');
            return redirect('dashboard/admin/collector/names');
        }
    }

    public function Collectors_Accounts()
    {
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        $collectors = CollectorPayment::all();
        return view('admin.collector', ['collectors' => $collectors]);
    }

    public function collecterDetails($id)
    {
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');

        $rec =DB::table('cash_collectors')
            ->where( 'collector_id', '=', $id)
            ->select('prn_no','collected_cash','created_at')
            ->get();
        $paid =DB::table('admin_collections')
            ->where( 'collector_id', '=', $id)
            ->select('amount','remaining_amount','created_at')
            ->get();

        $results = [];

        $x = 0;
        foreach ($rec as $r){
            $results[$x]['type'] = 'R';
            $results[$x]['prn_no'] = $r->prn_no;
            $results[$x]['collected_cash'] ='€ '. $r->collected_cash;
            $results[$x]['amount'] = '';
            $results[$x]['remaining_amount'] = '';
            $results[$x]['created_at'] = $r->created_at;
            $x++;
        }

        foreach ($paid as $p){
            $results[$x]['type'] = 'P';
            $results[$x]['prn_no'] = '';
            $results[$x]['collected_cash'] = '';
            $results[$x]['amount'] ='€ '. $p->amount;
            $results[$x]['remaining_amount'] ='€'. $p->remaining_amount;
            $results[$x]['created_at'] = $p->created_at;
            $x++;
        }

        usort($results, function ($item1, $item2) {
            return $item2['created_at'] <=> $item1['created_at'];
        });

        $data = $this->paginate($results);
        return view('admin.collector-details', ['data' => $data, 'cnt' => count($results)]);
    }
    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function collectAmount(Request $request)
    {
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        try {

            CollectorPayment::where('collector_id', $request->get('collect_id'))
                ->first()
                ->update([
                    'paidamount' => $request->get('amount'),
                    'remaining_amount' => $request->get('remain')
                ]);
            $admin = new AdminCollection();
            $admin->collector_id = $request->get('collect_id');
            $admin->amount = $request->get('amount');
            $admin->remaining_amount = $request->get('remain');
            $admin->save();
        } catch (Exception $e) {
            return redirect()->back()->with('success', 'Some Error Occurred');
        }

        return redirect()->back()->with('success', 'Collected Amount Updated');
    }


    public function upload_ticket()
    {
        $tickets = Ticket::all();
        return view('admin.uploadticket', ['ticket' =>   $tickets]);
    }

    public function upload_ticket_view($id,$id2)
    {
        $ticket = Ticket::where('prn_no',$id2)->first();
        $passengers = Passenger::where('ticket_id',$ticket->id)->first();
        
         $data = json_decode($ticket->details, true);
        if ($data['type']=='Return')
        {
            $ticket = $id;
            $pnrr = $id2;
            $return ="yes";
            return view('admin.upload_ticket_view',compact('ticket','pnrr','data','return') );
        }
        else 
        {
            $ticket = $id;
            $pnrr = $id2;
            return view('admin.upload_ticket_view',compact('ticket','pnrr','data','passengers') );
        }
        
      
    }
    
    public function  modify_ticket_dates($id,$id2)
    {
        $ticket = Ticket::where('prn_no',$id2)->first();
        $passengers = Passenger::where('ticket_id',$ticket->id)->first();
        
         $data = json_decode($ticket->details, true);
        if ($data['type']=='Return')
        {
            $ticket = $id;
            $pnrr = $id2;
            $return ="yes";
            return view('admin.upload_ticket_view',compact('ticket','pnrr','data','return') );
        }
        else 
        {
            $ticket = $id;
            $pnrr = $id2;
            return view('admin.upload_modify_dates',compact('ticket','pnrr','data','passengers') );
        }
        
      
    }
    
   

    public function upload_ticket_store(request $req , $id)
    {
        
        $ticket = Ticket::where('id', $id)->first();
        //dd($ticket);
        $cash_coll = CashCollector::where('prn_no',$ticket->prn_no)->first();
        //dd($cash_coll);
        if($cash_coll==null){
            return redirect('dashboard/admin/uploadticket')->with('error', 'Ticket Unpaid !');
        }

        $upload = new ticketupload;
        $upload->ticket_id = $id;
        $upload->pnr_number = $req->pnr;
        $upload->save();
        

        $ticket->prn_no = $req->pnr;
        $ticket->save();
        
        
        // $data = $ti->details; //json_decode is not necessary if you're using attribute casting on your model
        $data = json_decode($ticket->details, true);

        if(isset($req->fromDate2))
        {
            $data = array(
                'fcode' => $data['fcode'],
                'time' => $data['time'],
                'seats' => $data['seats'],
                'type' => $data['type'],
                'price' => $data['price'],
                'adult' => $data['adult'],
                'child' => $data['child'],
                'infant' => $data['infant'],
                'aprice' => $data['aprice'],
                'cprice' => $data['cprice'],
                'iprice' => $data['iprice'],
                'weight' => $data['weight'],
                'takeoffT' => $data['takeoffT'],
                'takeoffD' => $data['takeoffD'],
                'class' => $data['class'],
                'name' =>  $data['name'],$data['name'],
                'code' => $data['fcode'],$data['fcode'],
                'fnumber' => $data['fnumber'],$data['fnumber'],
                'aircraft' =>  $data['aircraft'],$data['aircraft'],
                'from' => $data['from'],$data['from'],
                'fromDate' => [$req->fromDate2,$req->fromDate2],
                'to' =>  $data['to'],$data['to'],
                'toDate' => [$req->toDate2,$req->toDate2],
                'itime' => $data['time'],$data['time'],
                'landT' => $data['landT'],$data['landT'],
                'landD' => $data['landD'],
            );
            $data = json_encode($data); //json_encode is not necessary if you're using attribute casting on your model
        }
        else 
        {
    
            // if()
            $data = array(
                'fcode' => $req->fcode,
                'time' => $req->time,
                'seats' => $data['seats'],
                'type' => $data['type'],
                'price' => $data['price'],
                'adult' => $data['adult'],
                'child' => $data['child'],
                'infant' => $data['infant'],
                'aprice' => $data['aprice'],
                'cprice' => $data['cprice'],
                'iprice' => $data['iprice'],
                'weight' => $data['weight'],
                'takeoffT' => $data['takeoffT'],
                'takeoffD' => $data['takeoffD'],
                'class' => $data['class'],
                'name' => [ $req->name,$req->name ],
                'code' => [$req->fcode,$req->fcode],
                'fnumber' => [ $req->fnumber,$req->fnumber ],
                'aircraft' => [ $req->aircraft,$req->aircraft ],
                'from' => [$req->from,$req->from],
                'fromDate' => $data['fromDate'],$data['fromDate'],
                'to' => $data['to'],$data['to'],
                'toDate' =>  $data['toDate'],$data['toDate'],
                'itime' => [$req->time,$req->time],
                'landT' => $req->landT,$req->landT,
                'landD' => $req->landD,
            );

            $data = json_encode($data); //json_encode is not necessary if you're using attribute casting on your model

            $passengers = Passenger::where('ticket_id',$id)->first();
            $passengers->email = $req->email;
            $passengers->contact_no = $req->contact_no;
            $passengers->save();
        }




        DB::table('tickets')
        ->where('id', $id)
        ->update(['details' => $data]);



        $cash_coll = CashCollector::where('prn_no',$req->pnrr)->first();
        $cash_coll->prn_no = $req->pnr;
        $cash_coll->save();
        
        $collectorr = User::where('id',$cash_coll->collector_id)->first();
        // for user
        $useridd = auth()->id();

        $upload_ticket_id = ticketupload::where('pnr_number',$req->pnr)->first()->ticket_id;
        $passengeremail = Passenger::where('ticket_id',$upload_ticket_id)->first()->email;

        $user_email = User::where('id',$useridd)->first()->email;
        $details ='Your Ticket Has been Uploaded , Your Updated Pnr#:'.$req->pnr;

        // Mail::to($passengeremail)->send(new \App\Mail\MyTestMail($details));

        $ticket = Ticket::where('prn_no',$req->pnr)->first();
        $data = json_decode($ticket->details, true);
        $passengers = Passenger::where('ticket_id', $ticket->id)->get();
        //$collectorr = "hello";

        // Mail::to($email)->send(new \App\Mail\MyTestMail($details));
        //Mail::to($passengeremail)->send(new\App\Mail\ticket($data,$ticket,$passengers,$collectorr));

        $pdf = PDF::loadView('pdf_download',['data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'collectorr'=>$collectorr,'pdf'=>True])->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        
        //Send ticket pdf to customer
        //$data["email"] = $passengeremail;
        $data["email"] = "faraz.ds@gmail.com";
        $data["title"] = "Gondal-Travel";
        $data["body"] = "Your Ticket Has Been Booked";

        Mail::send('emails.mailiya', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), 'GTravel-Ticket-Itinerary.pdf');
        });/// Comment by faraz for local server only
        

        return redirect('dashboard/admin/uploadticket')->with('success', 'Ticket Upload Successfully !');

    }

    public function getDownload($id)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/images/images/uploadtickets/".$id;


        return response()->download($file);
    }

    public function currency_converter_view()
    {
        return view('admin.currency');
    }

    private function get_pnr_record($id)
    {
        $access_token = $this->getApi();
        $flight = $this->ApiUrl.'/v1/booking/flight-orders';
        $pnr_id = $id;
               
        $url = $flight.'/'.$pnr_id;
        
        $headers = array('Authorization' => 'Bearer '.$access_token);
        $requests_response = Requests::get($url,$headers);
        //$collections = json_decode($requests_response->body);
        dd($requests_response);
        exit;
    }

    private function delete_pnr_record($id)
    {
        $access_token = $this->getApi();
        $flight = $this->ApiUrl.'/v1/booking/flight-orders';
        $pnr_id = $id;
        
        $url = $flight.'/'.$pnr_id;
        
        $headers = array('Authorization' => 'Bearer '.$access_token);
        $requests_response = Requests::delete($url,$headers);
        return $requests_response;
    }

    public function delete_pnr($id, $pnr)
    {
        dd($pnr);exit;
        if($pnr){
            $ticket = Ticket::where('prn_no',$pnr)->first();
            if($ticket->format=='live' && $ticket->status!='booking-cancelled'){
                $data = json_decode($ticket->live_details, true);
                $result = $this->delete_pnr_record($data['data']['id']);
                if($result->success){
                    DB::table('tickets')
                    ->where('prn_no', $pnr)
                    ->update(['status' => 'booking-cancelled']);
                    return redirect('dashboard/admin/uploadticket')->with('success', 'Booking Cancelled Successfully !');
                }else{
                    return redirect('dashboard/admin/uploadticket')->with('error', $result->status);
                }
            }elseif($ticket->format=='db' || $ticket->format==NULL){
                DB::table('tickets')
                ->where('prn_no', $pnr)
                ->update(['status' => 'booking-cancelled']);
                return redirect('dashboard/admin/uploadticket')->with('success', 'Booking Cancelled Successfully !');
            }
        }        
    }

    public function exchangeCurrency(Request $request)
    {

        $amount = ($request->amount)?($request->amount):(1);

        $apikey = 'e8f52f1487c5492c9327';

        $from_Currency = urlencode($request->from_currency);
        $to_Currency = urlencode($request->to_currency);
        $query = "{$from_Currency}_{$to_Currency}";

        // change to the free URL if you're using the free version
        // $json = file_get_contents("http://free.currencyconverterapi.com/api/v5/convert?q={$query}&amp;compact=y&amp;apiKey={$apikey}");

        //  // https://freecurrencyapi.net/api/v2/latest?apikey=9f520da0-4dea-11ec-85c6-915629694745

        //  // $json = file_get_contents("https://api.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");

        // $obj = json_decode($json, true);

        // $val = $obj["$query"];

        // $total = $val['val'] * 1;

        // $formatValue = number_format($total, 2, '.', '');

        // $data = "$amount $from_Currency = $to_Currency $formatValue";

        // echo $data; die;



        $url = 'https://freecurrencyapi.net/api/v2/';
        // $auth_data = [
        //     'client_id' => 'vXTMnOv520ZrykG9cQKOGZNCD4VBRhWQ',
        //     'client_secret' => 'GOwFGzLFuIsOiQ22',
        //     'grant_type'    => 'client_credentials'
        // ];
        $api = '9f520da0-4dea-11ec-85c6-915629694745';
        $headers = ["Content-Type" => "application/x-www-form-urlencoded"];
        $go =  Requests::post('https://freecurrencyapi.net/api/v2/latest?apikey=9f520da0-4dea-11ec-85c6-915629694745', $headers, $api );
        $run_body    =   json_decode($go->body);
        dd($run_body);

    }

    
}

