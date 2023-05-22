<?php

namespace App\Http\Controllers\MultiCity;

use App\Models\AirLine;
use Requests;
use App\Models\Flight;
use App\Models\Airport;
use App\Models\Passenger;
use App\Models\Ticket;
use App\Models\flightpackage;
use App\Models\CashCollector;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Setting;
use App\Models\Commission;
use App\Traits\AmadeusToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class MultiCitiesFightController extends Controller
{
    use AmadeusToken;

    private string $apiUrl;
    private string $apiLive;
    private string $bookingLive;
    private array $flightData;
    private array $avoidAirlines;
    private array $preferencesAirlines;

    public function __construct()
    {
        $this->apiLive = Setting::select('value')->where('name', 'live_api_on')->firstOrFail()->value('value');
        $this->bookingLive = Setting::select('value')->where('name', 'live_booking_on')->firstOrFail()->value('value');
        $this->apiUrl = $this->apiLive ? config('app.live_amadeus_api') : config('app.test_amadeus_api');
        $this->avoidAirlines = [];
        $this->preferencesAirlines = [];
    }

    public function multiFlightDetails(Request $request)
    {
        $data = json_decode($request->get('data'), true);
        $orgdata = json_decode($request->get('orgdata'), true);
        $airline = json_decode($request->get('airline'), true);
        $aircraft = json_decode($request->get('aircraft'), true);
        //dd($data);
        
        return view('multi-filght-details', ['data' => $data, 'orgdata' => $orgdata, 'airline' => $airline, 'aircraft' => $aircraft]);
    }
    
    public function bookMultiFlight(Request $request)
    {
        $data = json_decode($request->get('data'), true);
        $orgdata = json_decode($request->get('orgdata'), true);
        $payment = $request->get('payment_method_multi');
        $collectorProfit = $request->get('service_charges');
        // dd($this->bookingLive);
        if ($this->bookingLive) {
            $liveprice = $this->confirm_price($request->orgdata);
            // dd($liveprice);
            if ($liveprice->status_code == 200) {
                $collections = json_decode($liveprice->body, true);
                $livedata = $collections['data']['flightOffers'][0];
                // dd($livedata);exit;
                $mainPrice = $livedata['price']['grandTotal'];
                $price = $livedata['price']['grandTotal'] + $request->get('service_charges');
            } else {
                //dd($request->orgdata);exit;
                $collections = json_decode($request->orgdata, true);
                $orgprice = $collections['price']['grandTotal'];
                $mainPrice = $orgprice;
                //dd($orgdata);exit;
                $price = $orgprice + $request->get('service_charges');
            }
        } else {
            $data = json_decode($request->get('data'), true);
            $price = $data['price'] + $request->get('service_charges');
            $mainPrice = $data['price'];
        }
        // dd($collectorProfit);
        $newPrice = $price;
        return view('multi-flight-booking', ['data' => $data, 'orgdata' => $orgdata, 'payment' => $payment, 'orgPrice' => $mainPrice, 'newPrice' => $newPrice, 'error' => false, 'collectorProfit' => $collectorProfit]);
    }

    private function confirm_price($orgdata)
    {
        $access_token = $this->getApi();
        $data = json_decode($orgdata, true);
        if (auth()->id() != null) {
            $flight = $this->apiUrl . '/v1/shopping/flight-offers/pricing';
            //echo $flight;exit;
            $uri_param = [
                //"include"   =>  "bags,other-services,detailed-fare-rules",
                "forceClass" => "true",
            ];

            $body = json_encode([
                "data" => [
                    "type" => "flight-offers-pricing",
                    "flightOffers" => [$data],
                ],
            ]);

            $fields = http_build_query($uri_param);
            $url = $flight . '?' . $fields;
            $headers = array('content-type' => 'application/vnd.amadeus+json', 'Authorization' => 'Bearer ' . $access_token);
            // dd($headers);
            $requests_response = Requests::post($url, $headers, $body);
            //    dd($requests_response );
            // $collections = $requests_response->body;
            // dd($requests_response);
            return $requests_response;
        }
    }

    public function getApi()
    {
        Requests::register_autoloader();

        if ($this->apiLive) {
            $this->apiUrl = 'https://api.amadeus.com';
            $url = $this->apiUrl . '/v1/security/oauth2/token';
            $auth_data = [
                'client_id' => 'RCJjGo7OtUJmHbWG3zLAt37nTh14DBGC',
                'client_secret' => '8shnlRRHuhP7Hz1W',
                'grant_type' => 'client_credentials'
            ];
        } else {
            $this->apiUrl = 'https://test.api.amadeus.com';
            $url = $this->apiUrl . '/v1/security/oauth2/token';
            $auth_data = [
                'client_id' => 'oVK2arWLniDTWJPrYyG9uDT08C7JVfbZ',
                'client_secret' => 'nlAFFigrRAz90btR',
                'grant_type' => 'client_credentials'
            ];
        }

        try {
            $headers = ["Content-Type" => "application/x-www-form-urlencoded"];
            $go = Requests::post($url, $headers, $auth_data);
            $run_body = json_decode($go->body);
            return $run_body->access_token;
        } catch (Exception $e) {
            Session::flash('message', 'Server Temporary Down');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function store_mutli(Request $request)
    {

        // dd($request);exit;
        $email = $request->get('email');
        $contact = $request->get('contact_no');
        $collectorProfit = $request->get('collectorProfit');
        $data = json_decode($request->get('data'), true);
        $orgdata = json_decode($request->get('orgdata'), true);
        $payment = $request->get('payment_method');

        $live_pnr_data = false;
        // if ($this->bookingLive) {
        //     $requests_response = $this->live_pnr_booking($request);
        //     //dd($requests_response);exit;
        //     //eJzTd9f3jnD18DIDAAthAlY%3D
        //     //KXEHJ6
        //     // dd($requests_response);
        //     if ($requests_response->status_code == 201) {
        //         $live_pnr_data = json_decode($requests_response->body, true);
        //     } else {
        //         return view('flight-vdfbooking',
        //             ['data' => $data, 'payment' => $payment, 'error' => $requests_response]);
        //     }
        // }

        if ($payment == "cash") {
            $pnr = $this->storeMultiFlight($request, $payment, false, $data, $live_pnr_data);
        } else {
            $paymet = $this->payStripe($request, $data, empty(User::getUserEmail()) ? $email : User::getUserEmail());
            if ($paymet == "Payment is successful.") {
                $pnr = $this->storeMultiFlight($request, $payment, true, $data, $live_pnr_data);
            } else {
                return view(
                    'flight-vdfbooking',
                    ['data' => $data, 'payment' => $payment, 'error' => $paymet]
                );
            }
        }
        //dd($request);exit;
        $name = $request->get('name')[0];
        $total = ceil($request->get('amount'));
        $user['to'] = 'infosupport@gondaltravel.com';
        $data["title"] = "Message From Gondal-Travels";
        $data["body"] = "Customer Pnr is :" . $pnr;

        // for admin
        Mail::send('emails.ticketbooked_admin', $data, function ($message) use ($user, $data) {
            $message->to($user['to'])->subject($data["title"]);
        }); /// Comment by faraz for local server only

        // for user
        $useridd = auth()->id();
        $user_email = User::where('id', $useridd)->first()->email;
        $details = 'Your Ticket Has been Booked , Your Pnr #:' . $pnr;

        $ticket = Ticket::where('prn_no', $pnr)->first();
        $data = json_decode($ticket->details, true);
        $passengers = Passenger::where('ticket_id', $ticket->id)->get();
        //$collectorr = "hello";

        // Mail::to($email)->send(new\App\Mail\MyTestMail($details));
        //  Mail::to($email)->send(new\App\Mail\ticket($data,$ticket,$passengers,$collectorr));

        $ticket = Ticket::where('prn_no', $pnr)->first();
        $data = json_decode($ticket->details, true);
        $passengers = Passenger::where('ticket_id', $ticket->id)->get();
        $collector = CashCollector::where('prn_no', $ticket->prn_no)->first();

        $data["email"] = $email;
        $data["bcc"] = "faraz.ds@gmail.com";
        $data["title"] = "Gondal-Travel";
        $data["body"] = "Your Ticket Has Been Booked";
        $pdf = PDF::loadView('pdf_download_multi', ['main_data' => $data, 'orgdata' => $orgdata, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collector, 'pdf' => True, 'type' => 'pdf', 'url' => url('')])
        ->setOptions(['tempDir' => 'public_path()', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        //$pdf = PDF::loadView($template_name, ['data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collectorr, 'pdf' => True])->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        //Send ticket pdf to customer
        $data["name"] = $name;
        $data['pdf_name_ticket'] = $name.'-786'.$ticket->id.'.pdf';
        
        Mail::send('emails.customer-ticket', $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->bcc($data["bcc"], $data["bcc"])
                ->subject($data["title"])
                ->attachData($pdf->output(), $data['pdf_name_ticket']);
        }); /// Comment by faraz for local server only

        return view('invoice-mutli', ['name' => $name, 'email' => $email, 'pnr' => $pnr, 'total' => $total, 'payment' => $payment]);
    }


    private function storeMultiFlight(Request $request, $payment, $status, $data, $live_pnr_data)
    {
        try {
            // dd($request->all());
            $ticket = new Ticket();
            $ticket->user_id = auth()->id();
            $ticket->details = $request->get('data');
            //$randomNumber = rand(); ///Comment as per Client requirements by Logixbit
            if ($live_pnr_data) {
                $ticket->prn_no = $live_pnr_data['data']['associatedRecords'][0]['reference'];
                $ticket->format = 'live';
                $ticket->live_details = json_encode($live_pnr_data, true);
            } else {
                $ticket->prn_no = $this->quickRandom(6);
            }
            ///Comment as per Client requirements by Logixbit
            //$ticket->prn_no = mb_strtoupper(Str::random(8));

            if ($payment == 'card') {
                $ticket->status = "Booked";
            } else {
                $ticket->status = "Waiting For Payment";
            }

            $ticket->payment_status = $status;
            $ticket->payment_method = $payment;

            if ($request->db) {
                $ticket->format = $request->db;
            }
            $newPrice = ceil($request->get('newPrice'));
            $ticket->amount = $request->get('price');
            $ticket->total_amount = $newPrice;
            $ticket->collector_profit = $request->get('collectorProfit');
            $ticket['Remarks'] = auth('web')->user()->name;
            $completedata = $request->get('data');
            $destinations = [];
            $company = [];
            $returnDate = 0;
            foreach ($data['flight'] as $flight) {

                for ($i = 0; $i < (int)count($flight['to']); $i++) {
                    $from = $flight['from'][$i];
                    $to = $flight['to'][$i];
                    $destinations[] = $from . '-' . $to;
                }
                // dd(implode(', ', $destinations));
                $company[] = $flight['name'][0];
            }
            $ticket->company = implode(', ', $company);
            // dd($ticket->company);
            $departureDate = $data['flight'][0]['OrgTakeoffDate'];
            $firstE = reset($data['flight']);
            $lastE = end($data['flight']);
            if ($firstE['startlocation'] == $lastE['endlocation']) {
                $returnDate = $lastE['OrgLandDate'];
                $ticket->return_date = date('Y-m-d H:i:s', strtotime($returnDate));
            }
            // dd(date('d-M-Y H:i', strtotime($ticket->return_date)));
            // $d->departure_date =  (string);
            //   dd(date('Y-m-d H:i:s' , strtotime($departureDate )));
            $ticket->last_ticketing_date = $data['lastTicketingDate'];
            $ticket->departure_date = date('Y-m-d H:i:s', strtotime($departureDate));
            $ticket->destination = implode(', ', $destinations);
            $name = $request->input('name', []);
            $surname = $request->input('surname', []);
            for ($i = 0; $i < collect($request->get('name'))->count(); $i++) {
                $p_name = $name[$i];
                $p_surname = $surname[$i];
            }
            $ticket->p_name = $p_name;
            $ticket->p_surname = $p_surname;
            $ticket->contact_no = $request->input('contact_no');
            $ticket->save();

            $ageGroup = $request->input('age', []);
            $name = $request->input('name', []);
            $surname = $request->input('surname', []);
            $email = $request->input('email');
            $contact = $request->input('contact_no');
            // dd($contact);
            $country = $request->input('country', []);
            $gender = $request->input('gender', []);
            $dob = $request->input('dob', []);
            $idNo = $request->input('pidno', []);
            $iddate = $request->input('pied', []);
            // dd($name);
            for ($i = 0; $i < collect($request->get('name'))->count(); $i++) {
                $passengers = Passenger::create([
                    'ticket_id' => $ticket->id,
                    'name' => $name[$i],
                    'surname' => $surname[$i],
                    'email' => $email,
                    'contact_no' => $contact,
                    'age' => $ageGroup[$i],
                    'gender' => $gender[$i],
                    'country' => $country[$i],
                    'dob' => $dob[$i],
                    'pidno' => $idNo[$i],
                    'pied' => $iddate[$i],
                ]);
            }
            if (auth()->user()) {
                //$request->user()->notify(new TicketProcessed($ticket));/// Comment by faraz for local server only
            } else {
                $user = User::where('id', 1)->first();
                //$user->notify(new TicketProcessed($ticket));
            }
            return $ticket->prn_no;
        } catch (Exception $e) {
            return redirect('')->with('success', 'Some error occurred while booking your flight please try again later.');
        }
    }

    private static function quickRandom($length = 16)
    {
        $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public function download_multi_Ticket($id)
    {
        $ticket = Ticket::where('prn_no', $id)->first();
        $data = json_decode($ticket->details, true);
        $passengers = Passenger::where('ticket_id', $ticket->id)->get();
        $collector = CashCollector::where('prn_no', $ticket->prn_no)->first();

        if ($collector != null) {// $collector->collector_id
            $collectorr = User::where('id',$collector->collector_id)->first();

            if ($ticket->format == 'db') {
                $pdf = PDF::loadView('pdf_multi2', ['data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collectorr, 'pdf' => True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
                return $pdf->download('Ticket.pdf');
            } else {
                $pdf = PDF::loadView('pdf_download_multi', ['main_data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collectorr, 'pdf' => True, 'type' => 'pdf', 'url' => url('')])
                    ->setOptions(['tempDir' => public_path(), 'chroot' => public_path(),'defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
                    ->setPaper('A4');
                //$pdf = PDF::loadView('pdf_download_multi', ['main_data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collector, 'pdf' => True])->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
                return $pdf->download(str()->slug($passengers[0]['name'] ?? '').'-786-'.$ticket->id.'.pdf');
            }
        } else {
            Session::flash('message', 'Payment Not Collected !');
            Session::flash('alert-class', 'alert-danger');
            return redirect('dashboard/admin/all-bookings');
        }
    }

    public function generateTicketMulti($id)
    {
        $ticket = Ticket::where('prn_no', $id)->first();
        $prn = $ticket->prn_no;

        // dd($ticket);exit;
        $passenger_email = Passenger::where('ticket_id', $ticket->id)->first()->email;


        $collector = CashCollector::where('prn_no', $prn)->first();
        // $collector->collector_id;
        if ($collector != null) {
            $collectorr = User::where('id', $collector->collector_id)->first();


            $data = json_decode($ticket->details, true);
            $passengers = Passenger::where('ticket_id', $ticket->id)->get();


            //  $user['to'] ='malikahfaz123@gmail.com';

            // // $data['email'] = $req->email;
            // $data["title"] = "Message From Gondal-Travels";
            // // $data["body"] = "Customer Pnr is :".$pnr;


            // for user
            $useridd = auth()->id();
            $user_email = User::where('id', $useridd)->first()->email;


            if ($ticket->format == 'db') {
                //  $pdf = PDF::loadView('pdf2',['data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'collectorr'=>$collectorr,'pdf'=>True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');

                // return $pdf->download('Ticket.pdf');

                // Mail::to($passenger_email)->send(new\App\Mail\ticket2($data,$ticket,$passengers,$collectorr));
                return view('pdf_mutli2', ['data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collectorr, 'pdf' => True,'url' => url('')]);
            } else {
                //  $pdf = PDF::loadView('pdf',['data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'collectorr'=>$collectorr,'pdf'=>True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');

                // return $pdf->download('Ticket.pdf');
                // Mail::to($passenger_email)->send(new\App\Mail\ticket($data,$ticket,$passengers,$collectorr));
                return view('pdf_download_multi', ['main_data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collectorr, 'pdf' => True,'url' => url('')]);
            }
        } else {
            $collectorr = [];


            $data = json_decode($ticket->details, true);
            $passengers = Passenger::where('ticket_id', $ticket->id)->get();


            //  $user['to'] ='malikahfaz123@gmail.com';

            // // $data['email'] = $req->email;
            // $data["title"] = "Message From Gondal-Travels";
            // // $data["body"] = "Customer Pnr is :".$pnr;


            // for user
            $useridd = auth()->id();
            $user_email = User::where('id', $useridd)->first()->email;


            if ($ticket->format == 'db') {
                //  $pdf = PDF::loadView('pdf_mutli2',['data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'collectorr'=>$collectorr,'pdf'=>True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');

                // return $pdf->download('Ticket.pdf');

                // Mail::to($passenger_email)->send(new\App\Mail\ticket2($data,$ticket,$passengers,$collectorr));
                return view('pdf_mutli2', ['data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collectorr, 'pdf' => True,'url' => url('')]);
            } else {
                //  $pdf = PDF::loadView('pdf_multi',['data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'collectorr'=>$collectorr,'pdf'=>True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');

                // return $pdf->download('Ticket.pdf');
                // Mail::to($passenger_email)->send(new\App\Mail\ticket($data,$ticket,$passengers,$collectorr));
                return view('pdf_download_multi', ['main_data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collectorr, 'pdf' => True,'url' => url('')]);
            }
        }
    }

    public function generatemultiinvoice_pdf($id)
    {
        $ticket = Ticket::where('prn_no', $id)->first();
        $data = json_decode($ticket->details, true);
        $passengers = Passenger::where('ticket_id', $ticket->id)->get();
        $invoice = CashCollector::where('prn_no', $id)->first();
        $username = User::where('id', $invoice->collector_id)->first();
        // return view('pdf_invoice',compact('invoice','username','id'));
        $pdf = PDF::loadView('pdf_invoice', ['username' => $username, 'invoice' => $invoice, 'id' => $id, 'data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'pdf' => True])
            ->setOptions(['defaultFont' => 'sans-serif'])
            ->setPaper('A4', 'landscape');

        return $pdf->download('Invoice.pdf');
    }

    public function multiFlightsSearch(Request $request)
    {//dd($request);

        if (request('avoid_airlines') && is_array(request('avoid_airlines'))) {
            foreach (request('avoid_airlines') as $airline) {
                $this->avoidAirlines[] = AirLine::select('iata')->where('id', $airline)->first()->iata;
            }
        }

        if (request('preferences_airlines') && is_array(request('preferences_airlines'))) {
            foreach (request('preferences_airlines') as $airline) {
                $this->preferencesAirlines[] = AirLine::select('iata')->where('id', $airline)->first()->iata;
            }
        }

        $seats = [];
        $passenger = 0;

        if (request('adult_number') > 0) {
            $seats['adult'] = request('adult_number', 0);
            $passenger = $passenger +  request('adult_number', 0);
        }
        if (request('child_number') > 0) {
            $seats['child'] = request('child_number', 0);
            $passenger =   $passenger + request('adult_number', 0);
        }
        if (request('held_infant') > 0) {
            $seats['held_infant'] = request('held_infant', 0);
            $passenger =   $passenger +  request('adult_number', 0);
        }
        
        if (auth()->id() != null) {

            $flight = [];

            foreach ($request->flying_from as $key => $value) {
                $locations[] = [
                    'startLocation' => Airport::select('iata')->find($request['flying_from'][$key])->iata,
                    'endLocation' => Airport::select('iata')->find($request['flying_to'][$key])->iata,
                    'FlightDateTime' => [
                        'date' => $request['daterange_single'][$key],
                    ],
                ];
            }

            $this->flightData['currencyCode'] = 'EUR';

            foreach ($request['flying_from'] as $index => $flight) {
                $this->flightData['originDestinations'][] = [
                    'id' => $index + 1,
                    'originLocationCode' => Airport::select('iata')->find($request['flying_from'][$index])->iata,
                    'destinationLocationCode' => Airport::select('iata')->find($request['flying_to'][$index])->iata,
                    'departureDateTimeRange' => [
                        'date' => $request['daterange_single'][$index],
                    ],
                ];
            }

            $travelers = [];
            $travelerCount = 1;
            foreach ($seats as $key => $seat) {
                for ($i = 1; $i <= $seat; $i++) {
                    if($key == 'held_infant'){
                        $travelers[] = [
                            'id' => $travelerCount,
                            'travelerType' => 'HELD_INFANT',
                            'associatedAdultId' => 1,
                        ];
                    }else{
                        $travelers[] = [
                            'id' => $travelerCount,
                            'travelerType' => strtoupper($key),
                        ];
                    }
                    
                    $travelerCount++;
                }
            }

            $this->flightData['travelers'] = $travelers;
            $this->flightData['sources'] = ['GDS'];

            $this->flightData['searchCriteria'] = [
                'maxFlightOffers' => 20,
                'flightFilters' => [
                    'cabinRestrictions' => [
                        [
                            'cabin' => strtoupper($request['cabin']),
                            'coverage' => 'MOST_SEGMENTS',
                            'originDestinationIds' => [
                                '1'
                            ]
                        ],
                    ],
                ],
            ];

            $this->flightData['searchCriteria']['additionalInformation']['chargeableCheckedBags'] = false;

            if (count($this->avoidAirlines) != 0) {
                $this->flightData['searchCriteria']['flightFilters']['carrierRestrictions'] = ['excludedCarrierCodes' => $this->avoidAirlines];
            }

            if (count($this->preferencesAirlines) != 0) {
                $this->flightData['searchCriteria']['flightFilters']['carrierRestrictions'] = ['includedCarrierCodes' => $this->preferencesAirlines];
            }
            //dd($this->flightData);
            // return $this->flightData;
//            // dd($this->getBearerToken());


            $flights = Http::withHeaders([
                'Authorization' => $this->getBearerToken(),
            ])->post($this->apiUrl . 'v2/shopping/flight-offers', $this->flightData);

            //dd($flights->json());
            //dump($flights->status());
            //$data = $flights->json();

//            if ($flights->status() != 200) {
//                Session::flash('message', 'Something went wrong.Please try again later.');
//                Session::flash('alert-class', 'alert-danger');
//                return back();
//            }

            $data = $flights->json();

            //dd($data['data'][0]);

            if (count($data['data']) == 0) {
                Session::flash('message', 'No flight found.');
                Session::flash('alert-class', 'alert-danger');
                return back();
            }

            //$status=$flights->status();
            $airline = $data['dictionaries']['carriers'];
            $aircraft = $data['dictionaries']['aircraft'];
            // session()->push('testings', $data['data'][0]);
            // dd(session('testings'));
            // dd($data['data'][0]) ;
            //dd(count($data['data']));
            $arrayM = [];
            if (count($data['data']) != 0) {
                foreach ($data['data'] as $key => $multi_flights) {

                    $adult = 0;
                    $child = 0;
                    $infants = 0;
                    $aprice = 0;
                    $cprice = 0;
                    $iprice = 0;

                    for ($k = 0; $k < (int)count($multi_flights['travelerPricings']); $k++) {
                        $type = $multi_flights['travelerPricings'][$k]['travelerType'];
                        $price = $multi_flights['travelerPricings'][$k]['price']['total'];
                        // dd($price);
                        if ($type == 'ADULT') {
                            $adult++;
                            $aprice = $price;
                        }
                        if ($type == 'CHILD') {
                            $child++;
                            $cprice = $price;
                        }
                        if ($type == 'HELD_INFANT') {
                            $infants++;
                            $iprice = $price;
                        }
                    }
                    $commission_status = Commission::all()->first()->status;

                    if ($commission_status == "0") {
                        $commission_percent = Commission::all()->first()->commission_percentage;

                        $comissionadultprice = (($aprice) / 100) * $commission_percent;
                        $adultprice = ($aprice) + ($comissionadultprice);
                        // $finaladultprice =  ($data['aprice'] * $data['adult']) + ($comissionadultprice * $data['adult']);

                        $comissionchildprice = (($cprice) / 100) * $commission_percent;
                        $childprice = ($cprice) + ($comissionchildprice);
                        // $finalchildprice =  ($data['cprice'] * $data['child']) + ($comissionchildprice * $data['child']);


                        $comissioninfantprice = (($iprice) / 100) * $commission_percent;
                        $infantprice = ($iprice) + ($comissioninfantprice);
                        // $finalinfantprice =  ($data['iprice'] * $data['infant']) + ($comissioninfantprice * $data['infant']);
                    } else if ($commission_status == "1") {
                        $commission_value = Commission::all()->first()->commission_value;

                        // $comissionadultprice = (($aprice)/100)*$commission_percent;
                        $adultprice = $aprice + $commission_value;

                        // $comissionchildprice = (($cprice)/100)*$commission_percent;
                        $childprice = $cprice + $commission_value;

                        // $comissioninfantprice = (($iprice)/100)*$commission_percent;
                        $infantprice = $iprice + $commission_value;
                    }

                    // dd($multi_flights);
                    if (count($multi_flights['itineraries']) != 0) {
                        foreach ($multi_flights['itineraries'] as $index => $flights) {


                            $arrayM[$key]['flight'][$index]['time'] = $flights['duration'];
                            //    $r=$arrayM[$key]['flight'][$index]['time'] ;
                            //    dd($r);
                            $count = count($flights['segments']);
                            $arrayM[$key]['flight'][$index]['stay'] = $count - 1;
                            $arrayM[$key]['flight'][$index]['stayNames'] = [];
                            $i = 0;
                            // dd($flights);
                            foreach ($flights['segments'] as $sCount => $segments) {
                                // dd($segments);
                                $arrayM[$key]['flight'][$index]['code'] = $segments['carrierCode'];
                                $arrayM[$key]['flight'][$index]['number'] = $segments['number'];
                                $arrayM[$key]['flight'][$index]['aircraft'][$i] = $aircraft[$segments['aircraft']['code']];
                                $arrayM[$key]['flight'][$index]['name'][$i] = $airline[$segments['carrierCode']];
                                $arrayM[$key]['flight'][$index]['from'][$i] = $segments['departure']['iataCode'];
                                if (isset($segments['departure']['terminal'])) {
                                    $arrayM[$key]['flight'][$index]['departureTerminal'][$i] = $segments['departure']['terminal'];
                                }
                                else{
                                    $arrayM[$key]['flight'][$index]['departureTerminal'][$i] = 'null';
                                }
                                if (isset($segments['arrival']['terminal'])) {
                                    $arrayM[$key]['flight'][$index]['arrivalTerminal'][$i] = $segments['arrival']['terminal'];
                                }
                                else{
                                    $arrayM[$key]['flight'][$index]['arrivalTerminal'][$i] = 'null';
                                }
                                $arrayM[$key]['flight'][$index]['fromDate'][$i] = $segments['departure']['at'];
                                $arrayM[$key]['flight'][$index]['to'][$i] = $segments['arrival']['iataCode'];
                                $arrayM[$key]['flight'][$index]['toDate'][$i] = $segments['arrival']['at'];
                                $arrayM[$key]['flight'][$index]['segmentDuration'][$i] = $segments['duration'];
                                $i++;


                                // $arrayM[$key]['flight'][$index]['airline'] = $airline[$segments['carrierCode']];
                                // $arrayM[$key]['flight'][$index]['aircarft'] = $aircarft[$segments['aircraft']['code']];
                                if ($sCount == 0) {
                                    $arrayM[$key]['flight'][$index]['startlocation'] = $segments['departure']['iataCode'];
                                    $takeoff = $segments['departure']['at'];
                                    $arrayM[$key]['flight'][$index]['OrgTakeoffDate'] = $takeoff;
                                    $arrayM[$key]['flight'][$index]['startDate'] = date("d-m-Y", strtotime($takeoff . 'Z'));
                                    $arrayM[$key]['flight'][$index]['startTime'] = date("H:i", strtotime($takeoff . 'Z'));
                                    //$newDate = date("Y/m/d", strtotimestrtotime($takeoffT . 'Z'));
                                }

                                if ($sCount != $count - 1) {
                                    $arrayM[$key]['flight'][$index]['stayNames']['stayPlace'][] = $segments['arrival']['iataCode'];
                                }

                                if ($sCount == $count - 1) {
                                    $arrayM[$key]['flight'][$index]['endlocation'] = $segments['arrival']['iataCode'];
                                    $Land = $segments['arrival']['at'];
                                    $arrayM[$key]['flight'][$index]['OrgLandDate'] = $Land;
                                    $arrayM[$key]['flight'][$index]['endTime'] = date("H:i", strtotime($Land . 'Z'));
                                    $arrayM[$key]['flight'][$index]['endDate'] = date("d-m-Y", strtotime($Land . 'Z'));
                                }
                            }
                        }
                    }

                    foreach ($multi_flights['travelerPricings'] as $section) {
                        foreach ($section['fareDetailsBySegment'] as $fareDetailsBySegment) {
                            $arrayM[$key]['cabin'] = $fareDetailsBySegment['cabin'];
                            $arrayM[$key]['class'] = $fareDetailsBySegment['class'];
                        }
                    }

                    if (count($multi_flights['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']) == 2) {
                        $bag = $multi_flights['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']['weight'] . $multi_flights['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']['weightUnit'];
                    } else if (count($multi_flights['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']) == 1){
                        $bag = $multi_flights['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']['quantity'];
                    } else {
                        $bag = "Not Available";
                    }

                    $arrayM[$key]['bags'] = $bag;

                    $arrayM[$key]['price'] = ($adultprice * $adult) + ($childprice * $child) + ($infantprice * $infants);
                    $arrayM[$key]['travel'] = $multi_flights['travelerPricings'];
                    // dd($childprice);
                    $arrayM[$key]['adult'] = $adult;
                    $arrayM[$key]['number_of_bookable_seats'] = $multi_flights['numberOfBookableSeats'];
                    $arrayM[$key]['lastTicketingDate'] = $multi_flights['lastTicketingDate'];
                    $arrayM[$key]['child'] = $child;
                    $arrayM[$key]['infant'] = $infants;
                    $arrayM[$key]['aprice'] = $adultprice;
                    $arrayM[$key]['cprice'] = $childprice;
                    $arrayM[$key]['iprice'] = $infantprice;
                    $arrayM[$key]['iprice'] = $iprice;
                    // $arrayM[$key]['price'] = $multi_flights['price']['grandTotal'];
                    $arrayM[$key]['type'] = 'Multi Way';
                    $arrayM[$key]['orignal_data'] = $multi_flights;
                    // dd($arrayM);

                }
            }

            return view('multi-flights', ['data' => $arrayM, 'places' => $locations, 'airline' => $airline, 'aircraft' => $aircraft, 'passenger' => $passenger]);
        } else {
            return redirect('/login');
        }
    }

    private function live_pnr_booking($request)
    {
        $access_token = $this->getApi();

        $data = json_decode($request->get('orgdata'), true);

        if (auth()->id() != null) {
            $flight = $this->apiUrl . '/v1/booking/flight-orders';

            $travelers_array = [];
            for ($i = 0; $i < count($request->get('name')); $i++) {
                $travelers_array = [
                    "id" => $i + 1,
                    "dateOfBirth" => $request->get('dob')[$i],
                    "name" => [
                        "firstName" => strtoupper($request->get('name')[$i]),
                        "lastName" => strtoupper($request->get('surname')[$i])
                    ],
                    "gender" => strtoupper($request->get('gender')[$i]),
                    "contact" => [
                        "emailAddress" => $request->get('email'),
                        "phones" => [
                            [
                                "deviceType" => "MOBILE",
                                "countryCallingCode" => "33",
                                "number" => $request->get('contact_no')
                            ]
                        ]
                    ],
                    "documents" => [
                        [
                            "documentType" => "PASSPORT",
                            // "birthPlace"=> "Islamabad",
                            // "issuanceLocation"=> "Islamabad",
                            // "issuanceDate"=> "2010-01-15",
                            "number" => $request->get('pidno')[$i],
                            "expiryDate" => $request->get('pied')[$i],
                            "issuanceCountry" => $request->get('country')[$i],
                            "validityCountry" => $request->get('country')[$i],
                            "nationality" => $request->get('country')[$i],
                            "holder" => true
                        ]
                    ]
                ];
            }


            $remarks = [
                "general" => [
                    [
                        "subType" => "GENERAL_MISCELLANEOUS",
                        "text" => "ONLINE BOOKING FROM GONDAL TRAVEL"
                    ]
                ]
            ];

            $ticketingAgreement = [
                "option" => "DELAY_TO_CANCEL",
                "delay" => "1D"
            ];


            $contacts = [
                "addresseeName" => [
                    "firstName" => "NAEEM",
                    "lastName" => "GONDAL"
                ],
                "companyName" => "GUR ELEC",
                "purpose" => "INVOICE",
                "phones" => [
                    [
                        "deviceType" => "LANDLINE",
                        "countryCallingCode" => "33",
                        "number" => "771626271"
                    ],
                    [
                        "deviceType" => "MOBILE",
                        "countryCallingCode" => "33",
                        "number" => "950379906"
                    ]
                ],
                "emailAddress" => "travelgondal@gmail.com",
                "address" => [
                    "lines" => [
                        "89 AV DU GROUPE MANOUCHIAN"
                    ],
                    "postalCode" => "94400",
                    "cityName" => "VITRY-SUR-SEINE",
                    "countryCode" => "FR"
                ]
            ];

            $body = json_encode([
                "data" => [
                    "type" => "flight-order",
                    "flightOffers" => [$data],
                    "travelers" => [$travelers_array],
                    "remarks" => $remarks,
                    "ticketingAgreement" => $ticketingAgreement,
                    "contacts" => [$contacts],
                ],
            ]);
            // dd($body);exit;
            // dd($travelers_array);
            $url = $flight;

            $headers = array('content-type' => 'application/vnd.amadeus+json', 'Authorization' => 'Bearer ' . $access_token);
            $requests_response = Requests::post($url, $headers, $body);
            return $requests_response;

            //$collections = $requests_response->body;
            // dd($requests_response);exit;
            // if ($requests_response->status_code == 201) {
            //     return json_decode($collections, true);
            // } else {
            //     return $requests_response;
            // }
        }
    }

}
