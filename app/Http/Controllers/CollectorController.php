<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Passenger;
use App\Models\ticketupload;
use Illuminate\Http\Request;
use App\Models\CashCollector;
use App\Models\AdminCollection;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\CollectorPayment;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\collectorcashinhand;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;

class CollectorController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->hasRole('user')) {
            return redirect()->to('dashboard/user');
        }
        if (auth()->user()->hasRole('super-admin')) {
            return redirect()->to('dashboard/admin');
        }
        abort_if(!auth()->user()->hasRole('collector'), 403, 'You Do not have permissions.');
        $cash = CashCollector::where('collector_id', Auth::id())->sum('collected_cash');
        $booking = CashCollector::where('collector_id', Auth::id())->count();
        $due = CollectorPayment::where('collector_id', Auth::id())->first();
        return view('collector.dashboard', ['cash' => $cash, 'book' => $booking, 'due' => $due]);
    }
    public function search(Request $request)
    {
        abort_if(!auth()->user()->hasRole('collector'), 403, 'You Do not have permissions.');
        $pnr = $request->get('prn_no');
        $ticket = Ticket::where('prn_no', $pnr)->first();

        if ($ticket == null) {
            Session::flash('message', 'Prn Number Not Found');
            Session::flash('alert-class', 'alert-danger');
            return back();
        } elseif ($ticket->format == 'db') {
            $data2 = json_decode($ticket->details, true);

            return view('collector.search', ['ticket' => $ticket, 'data2' => $data2]);
        } else {
            $data = json_decode($ticket->details, true);

            return view('collector.search', ['ticket' => $ticket, 'data' => $data]);
        }
    }
    public function paymentStatus($pnr)
    {

        abort_if(!auth()->user()->hasRole('collector'), 403, 'You Do not have permissions.');

        // echo $cashinhandamount = DB::table('collectorcashinhands') ->where('collector_id', Auth::id());

        $cashinhandamount = collectorcashinhand::where('collector_id', Auth::id())->first();
        $ticket = Ticket::where('prn_no', $pnr)->first();

        if ($cashinhandamount != null) {


            if ($cashinhandamount->total_cash_in_hand > $ticket->amount) {



                $ticket->payment_status = 1;
                $ticket->save();
                $cash = new CashCollector();
                $cash->collector_id = Auth::id();
                $cash->prn_no = $pnr;
                $cash->collected_cash = $ticket->amount;
                $cash->save();
                $data = json_decode($ticket->details, true);

                // for user
                $useridd = auth()->id();
                $user_email = User::where('id', $useridd)->first()->email;
                $details = 'Your Ticket Has been Booked , Your Pnr #:' . $pnr;

                // Mail::to($user_email)->send(new \App\Mail\MyTestMail($details));

                $tickett = Ticket::where('prn_no', $pnr)->first();

                if ($ticket->format == 'db') {
                    $data2 = json_decode($ticket->details, true);

                    DB::table('collectorcashinhands')
                        ->where('collector_id', $useridd)
                        ->update(['total_cash_in_hand' => $cashinhandamount->total_cash_in_hand - $ticket->amount]);

                    // $upload_ticket_id = ticketupload::where('pnr_number',$req->pnr)->first()->ticket_id;

                    $passengeremail = Passenger::where('ticket_id', $tickett->id)->first()->email;

                    $data = json_decode($ticket->details, true);
                    $passengers = Passenger::where('ticket_id', $ticket->id)->get();
                    $collectorr = "hello";

                    // Mail::to($email)->send(new \App\Mail\MyTestMail($details));
                    // iska ticket email banega
                    //  Mail::to($passengeremail )->send(new\App\Mail\ticket($data,$ticket,$passengers,$collectorr));


                    return view('collector.search', ['ticket' => $tickett, 'data2' => $data2])->with('success', "Done");
                } else {
                    DB::table('collectorcashinhands')
                        ->where('collector_id', $useridd)
                        ->update(['total_cash_in_hand' => $cashinhandamount->total_cash_in_hand - $ticket->amount]);

                    $passengeremail = Passenger::where('ticket_id', $tickett->id)->first()->email;

                    $data = json_decode($ticket->details, true);
                    $passengers = Passenger::where('ticket_id', $ticket->id)->get();
                    $collectorr = "hello";

                    // Mail::to($email)->send(new \App\Mail\MyTestMail($details));
                    //  Mail::to($passengeremail )->send(new\App\Mail\ticket($data,$ticket,$passengers,$collectorr));




                    //  $ticket = Ticket::where('prn_no', $pnr)->first();
                    //  $data = json_decode($ticket->details, true);
                    //  $passengers = Passenger::where('ticket_id', $ticket->id)->get();
                    //  $collectorr = "hello";

                    $data["email"] = $passengeremail;
                    $data["title"] = "Gondal-Travel";
                    $data["body"] = "Your Ticket Payment Has Been Collected";


                    $pdf = PDF::loadView('pdf', ['data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collectorr, 'pdf' => True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');

                    Mail::send('emails.mailiya', $data, function ($message) use ($data, $pdf) {
                        $message->to($data["email"], $data["email"])
                            ->subject($data["title"])
                            ->attachData($pdf->output(), "ticket.pdf");
                    });
                    // Session::flash('success', 'Your payment has been done successfully!');
                    return view('collector.search', ['ticket' => $ticket, 'data' => $data])->with('success', "Done");
                }
            } else {
                Session::flash('message', 'Insufficient Balance ');
                Session::flash('alert-type', 'warning');
                return redirect('dashboard/collector');
            }
        } else {
            Session::flash('message', 'Insufficient Balance ');
            Session::flash('alert-type', 'warning');
            return redirect('dashboard/collector');
        }
    }


    public function history()
    {
        abort_if(!auth()->user()->hasRole('collector'), 403, 'You Do not have permissions.');
        $collector = CashCollector::where('collector_id', Auth::id())->get();
        // dd($collector);
        for ($i = 0; $i < $collector->count(); $i++) {
            $collectors = $collector[$i];
        }
        $pnr = $collectors->prn_no;
        $uploadtickets = ticketupload::where('pnr_number', $pnr)->first();
        $ticket = Ticket::where('prn_no', $pnr)->first();

        if ($ticket->format == 'db') {
            $data = json_decode($ticket->details, true);
            $passenger = Passenger::where('ticket_id', $ticket->id)->get();
        } else {
            $data = json_decode($ticket->details, true);
            $passenger = Passenger::where('ticket_id', $ticket->id)->get();
        }
        return view('collector.history', ['coll' => $collector, 'ticket' => $ticket, 'data' => $data, 'passengers' => $passenger, 'originalticket' => $uploadtickets, 'error' => false]);
    }
    public function getCollectordataHistory(Request $request)
    {
        // abort_if(!auth()->user()->hasRole('collector'), 403, 'You Do not have permissions.');
        // if ($request->ajax()) {
        //     $data = CashCollector::where('collector_id',Auth::id())->latest()->get();
        //     foreach ($data as $d){
        //         $d->date =  (string)date('d-M-Y', strtotime(substr($d->created_at, 0, 10)));
        //     }
        //     return Datatables::of($data)
        //         ->addIndexColumn()
        //         ->make(true);
        // }
        // else{
        //     return null;
        // }
        if ($request->ajax()) {
            $data = Ticket::where('user_id', Auth::id())->latest()->get();

            foreach ($data as $d) {
                $d->payment_status = $d->payment_status == 0 ? 'Unpaid' : 'Paid';
                $d->payment_method = strtoupper($d->payment_method);

                $d->date =  (string)date('d-M-Y', strtotime(substr($d->created_at, 0, 10)));
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        } else {
            return null;
        }
    }
    public function accounts()
    {
        abort_if(!auth()->user()->hasRole('collector'), 403, 'You Do not have permissions.');


        $rec = DB::table('cash_collectors')
            ->where('collector_id', '=', Auth::id())
            ->select('prn_no', 'collected_cash', 'created_at')
            ->get();
        $paid = DB::table('admin_collections')
            ->where('collector_id', '=', Auth::id())
            ->select('amount', 'remaining_amount', 'created_at')
            ->get();

        $results = [];

        $x = 0;
        foreach ($rec as $r) {
            $results[$x]['type'] = 'R';
            $results[$x]['prn_no'] = $r->prn_no;
            $results[$x]['collected_cash'] = '€ ' . $r->collected_cash;
            $results[$x]['amount'] = '';
            $results[$x]['remaining_amount'] = '';
            $results[$x]['created_at'] = $r->created_at;
            $x++;
        }

        foreach ($paid as $p) {
            $results[$x]['type'] = 'P';
            $results[$x]['prn_no'] = '';
            $results[$x]['collected_cash'] = '';
            $results[$x]['amount'] = '€ ' . $p->amount;
            $results[$x]['remaining_amount'] = '€' . $p->remaining_amount;
            $results[$x]['created_at'] = $p->created_at;
            $x++;
        }

        usort($results, function ($item1, $item2) {
            return $item2['created_at'] <=> $item1['created_at'];
        });

        $data = $this->paginate($results);
        return view('collector.accounts', ['data' => $data, 'cnt' => count($results)]);
    }
    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
