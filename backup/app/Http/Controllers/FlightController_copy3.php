<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use App\Models\PassengerTicket;
use App\Models\Ticket;
use App\Models\flightpackage;
use App\Models\Commission;
use App\Models\CashCollector;
use App\Models\User;
use App\Notifications\TicketProcessed;
use Barryvdh\DomPDF\Facade as PDF;
use http\QueryString;
use Illuminate\Http\Request;
use Mockery\Exception;
use Mail;
use Session;
use Requests;


base_path('vendor/rmccue/requests/library/Requests.php');

class FlightController extends Controller
{
    public function getApi(){

        Requests::register_autoloader();
        $url = 'https://api.amadeus.com/v1/security/oauth2/token';
        $auth_data = [
            'client_id' => 'RCJjGo7OtUJmHbWG3zLAt37nTh14DBGC',
            'client_secret' => '8shnlRRHuhP7Hz1W',
            'grant_type'    => 'client_credentials'
        ];

        try {
            $headers = ["Content-Type" => "application/x-www-form-urlencoded"];
            $go =  Requests::post($url, $headers, $auth_data);
            $run_body    =   json_decode($go->body);
            $access_token   = $run_body->access_token;
            return $access_token;
        }catch(Exception $e) {
            Session::flash('message', 'Server Temporary Down'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();
        }
       
    }

    public function test_search($id)
    {
        echo '<pre>';print_r($id); exit;
        
        $access_token = $this->getApi();
        $flight = 'https://api.amadeus.com/v2/duty-of-care/diseases/covid19-area-report';
        $travel_data = [
            'countryCode' => 'AE',
            'cityCode' => 'DXB',
            'language' => 'EN',
        ];

        $fields = http_build_query($travel_data);
        $url = $flight.'?'.$fields;
        $headers = array('Authorization' => 'Bearer '.$access_token);
        $requests_response = Requests::get($url,$headers);
        $collections = json_decode($requests_response->body);
        dd( $collections);
        exit;
    }


    public function search(Request $request)
    {
        //echo '<pre>';print_r($request);exit;
        $access_token = $this->getApi();

        if(auth()->id()!=null)
        {
            //$flight = "test.api.amadeus.com";

            $flight = 'https://api.amadeus.com/v2/shopping/flight-offers';
            if($request->get('flight') == '1')
            {
                $orgDate =  $request->get('daterange-single'); //departing date
                $travel_data = [
                    'originLocationCode' => $request->get('from'),
                    'destinationLocationCode' => $request->get('to'),
                    'departureDate'           => $orgDate ,
                    'adults' => $request->input('adult_number', 1),
                    'children' => $request->input('child_number', 0),
                    'infants' => $request->input('infants_number', 0),
                    'travelClass' => $request->get('coach'),
                    'maxPrice' =>  $request->get('ammout'),
                ];
            }
            else{
                $orgDate =  str_split($request->get('daterange'), 10)[0];
                $orgDate2 =  substr($request->get('daterange'), -10);
                $travel_data = [
                    'originLocationCode'        => $request->get('from'),
                    'destinationLocationCode'   => $request->get('to'),
                    'departureDate'             => $orgDate,
                    'returnDate'                => $orgDate2,
                    'adults'                    => $request->input('adult_number', 1),
                    'children'                  => $request->input('child_number', 0),
                    'infants'                   => $request->input('infants_number', 0),
                    'travelClass'               => $request->get('coach'),
                    'maxPrice'                  => $request->get('ammout'),
                ];
            }
            

            $fields = http_build_query($travel_data);
            $url = $flight.'?'.$fields;
            $headers = array('Authorization' => 'Bearer '.$access_token);
            $requests_response = Requests::get($url,$headers);
            $collections = json_decode($requests_response->body);
            
            //dd( $collections);exit;

            if(isset($collections->errors)){
                $data = $collections->errors;
                $dataCollections = json_decode(json_encode($data), true)[0]['detail'];
                return redirect()->back()->with('error', $dataCollections);
            }
            $data = $collections->data;
            //dd($data);
            // $dic = $collections->dictionaries;
            if(isset($collections->dictionaries)==null)
            {
                Session::flash('message', 'No Flight Found'); 
                Session::flash('alert-class', 'alert-danger');
                return back();
            }
            //dd( $data);
            $dic = $collections->dictionaries;
            $dataCollections = json_decode(json_encode($data), true);
            $dicCollections = json_decode(json_encode($dic), true);
            
            $airline = $dicCollections['carriers'];
            $aircarft = $dicCollections['aircraft'];
            //dd( $dataCollections);
            if($request->get('flight') == '1'){
                $dataCollections = $this->flightDataSingle($dataCollections, $airline, $aircarft);
            }
            else{
                $dataCollections = $this->flightDataReturn($dataCollections, $airline, $aircarft);
            }
            //dd( $dataCollections);

            return view('flights',['data' => $dataCollections]);

        }else{
            return redirect('/login');
        }

    }
    
    
    public function flightDataSingle($data, $airline, $aircarft){
        $flights = [];
        $j = 0;

        foreach ($data as $flight){
            $adult = 0;
            $child = 0;
            $infants = 0;
            $aprice = 0;
            $cprice = 0;
            $iprice = 0;
            for($k = 0; $k < (int)count($flight['travelerPricings']); $k++){
                $type = $flight['travelerPricings'][$k]['travelerType'];
                $price = $flight['travelerPricings'][$k]['price']['total'];
                if($type == 'ADULT'){
                    $adult++;
                    $aprice = $price;
                }
                if($type == 'CHILD'){
                    $child++;
                    $cprice = $price;
                }
                if($type == 'HELD_INFANT'){
                    $infants++;
                    $iprice = $price;
                }
            }

            $commission_status = Commission::all()->first()->status;

            if($commission_status=="0")
            {
                $commission_percent = Commission::all()->first()->commission_percentage;
                
                $comissionadultprice = (($aprice)/100)*$commission_percent;
                $adultprice =  ($aprice ) + ($comissionadultprice) ;
                // $finaladultprice =  ($data['aprice'] * $data['adult']) + ($comissionadultprice * $data['adult']);

                $comissionchildprice = (($cprice)/100)*$commission_percent;
                $childprice =  ($cprice  ) + ($comissionchildprice) ;
                // $finalchildprice =  ($data['cprice'] * $data['child']) + ($comissionchildprice * $data['child']);


                $comissioninfantprice = (($iprice)/100)*$commission_percent;
                $infantprice =   ($iprice  ) + ($comissioninfantprice) ;
                // $finalinfantprice =  ($data['iprice'] * $data['infant']) + ($comissioninfantprice * $data['infant']);
            }
            else if($commission_status=="1")
            {
                $commission_value = Commission::all()->first()->commission_value;

                // $comissionadultprice = (($aprice)/100)*$commission_percent;
                $adultprice =  $aprice+$commission_value;

                // $comissionchildprice = (($cprice)/100)*$commission_percent;
                $childprice = $cprice+$commission_value;

                // $comissioninfantprice = (($iprice)/100)*$commission_percent;
                $infantprice =$iprice+$commission_value;

            }

            $flights[$j]['fcode'] = $flight['validatingAirlineCodes'][0];
            $flights[$j]['time'] = $flight['itineraries'][0]['duration'];
            $flights[$j]['seats'] = $flight['numberOfBookableSeats'];
            $flights[$j]['type'] = 'One Way';
            $flights[$j]['price'] = ($adultprice*$adult) + ($childprice*$child) + ($infantprice*$infants);
            $flights[$j]['adult'] = $adult;
            $flights[$j]['child'] = $child;
            $flights[$j]['infant'] = $infants;
            $flights[$j]['aprice'] = $adultprice;
            $flights[$j]['cprice'] = $childprice;
            $flights[$j]['iprice'] = $infantprice;
            if(count($flight['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']) == 2){
                $bag = $flight['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']['weight'] . $flight['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']['weightUnit'];
            }else{
                $bag = "Not Available";
            }
            $flights[$j]['weight'] = $bag;
            $takeoff = $flight['itineraries'][0]['segments'][0]['departure']['at'];
            $flights[$j]['takeoffT'] = date("H:i", strtotime($takeoff . 'Z'));
            $flights[$j]['takeoffD'] = date("d-m-Y", strtotime($takeoff . 'Z'));
            $flights[$j]['class'] = $flight['travelerPricings'][0]['fareDetailsBySegment'][0]['cabin'];
            $i = 0;
            foreach ($flight['itineraries'][0]['segments'] as $iter){
                $flights[$j]['name'][$i] = $airline[$iter['carrierCode']];
                $flights[$j]['code'][$i] = $iter['carrierCode'];
                $flights[$j]['fnumber'][$i] = $iter['carrierCode'] . '-' . $iter['number'];
                $flights[$j]['aircraft'][$i] = $aircarft[$iter['aircraft']['code']];
                $flights[$j]['from'][$i] = $iter['departure']['iataCode'];
                $flights[$j]['fromDate'][$i] = $iter['departure']['at'];
                $flights[$j]['to'][$i] = $iter['arrival']['iataCode'];
                $flights[$j]['toDate'][$i] = $iter['arrival']['at'];
                $flights[$j]['itime'][$i] = $iter['duration'];
                $i++;
            }
            $land = $flight['itineraries'][0]['segments'][$i-1]['arrival']['at'];
            $flights[$j]['landT'] = date("H:i", strtotime($land . 'Z'));
            $flights[$j]['landD'] = date("d-m-Y", strtotime($land . 'Z'));

            $j++;
        }
        return $flights;
    }
    public function flightDataReturn($data, $airline, $aircarft){
        $flights = [];
        $j = 0;
        foreach ($data as $flight){
            $adult = 0;
            $child = 0;
            $infants = 0;
            $aprice = 0;
            $cprice = 0;
            $iprice = 0;
            for($k = 0; $k < (int)count($flight['travelerPricings']); $k++){
                $type = $flight['travelerPricings'][$k]['travelerType'];
                $price = $flight['travelerPricings'][$k]['price']['total'];
                if($type == 'ADULT'){
                    $adult++;
                    $aprice = $price;
                }
                if($type == 'CHILD'){
                    $child++;
                    $cprice = $price;
                }
                if($type == 'HELD_INFANT'){
                    $infants++;
                    $iprice = $price;
                }
            }
            
            $commission_status = Commission::all()->first()->status;

            if($commission_status=="0")
            {
                $commission_percent = Commission::all()->first()->commission_percentage;
                
                $comissionadultprice = (($aprice)/100)*$commission_percent;
                $adultprice =  ($aprice ) + ($comissionadultprice) ;
                // $finaladultprice =  ($data['aprice'] * $data['adult']) + ($comissionadultprice * $data['adult']);

                $comissionchildprice = (($cprice)/100)*$commission_percent;
                $childprice =  ($cprice  ) + ($comissionchildprice) ;
                // $finalchildprice =  ($data['cprice'] * $data['child']) + ($comissionchildprice * $data['child']);


                $comissioninfantprice = (($iprice)/100)*$commission_percent;
                $infantprice =   ($iprice  ) + ($comissioninfantprice) ;
                // $finalinfantprice =  ($data['iprice'] * $data['infant']) + ($comissioninfantprice * $data['infant']);
            }
            else if($commission_status=="1")
            {
                $commission_value = Commission::all()->first()->commission_value;

                // $comissionadultprice = (($aprice)/100)*$commission_percent;
                $adultprice =  $aprice+$commission_value;

                // $comissionchildprice = (($cprice)/100)*$commission_percent;
                $childprice = $cprice+$commission_value;

                // $comissioninfantprice = (($iprice)/100)*$commission_percent;
                $infantprice =$iprice+$commission_value;

            }
            
            
            $flights[$j]['fcode'] = $flight['validatingAirlineCodes'][0];
            $flights[$j]['time'] = $flight['itineraries'][0]['duration'];
            $flights[$j]['btime'] = $flight['itineraries'][1]['duration'];
            $flights[$j]['seats'] = $flight['numberOfBookableSeats'];
            $flights[$j]['type'] = 'Return';
            $flights[$j]['price'] = ($adultprice*$adult) + ($childprice*$child) + ($infantprice*$infants);
            $flights[$j]['travel'] = $flight['travelerPricings'];
            $flights[$j]['adult'] = $adult;
            $flights[$j]['child'] = $child;
            $flights[$j]['aprice'] = $adultprice;
            $flights[$j]['cprice'] = $childprice;
            $flights[$j]['iprice'] = $infantprice;
            $flights[$j]['iprice'] = $iprice;
            if(count($flight['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']) == 2){
                $bag = $flight['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']['weight'] . $flight['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']['weightUnit'];
            }
            else{
                $bag = "Not Available";
            }
            $flights[$j]['weight'] = $bag;
            $takeoff = $flight['itineraries'][0]['segments'][0]['departure']['at'];
            $flights[$j]['takeoffT'] = date("H:i", strtotime($takeoff . 'Z'));
            $flights[$j]['takeoffD'] = date("d-m-Y", strtotime($takeoff . 'Z'));
            $btakeoff = $flight['itineraries'][1]['segments'][0]['departure']['at'];
            $flights[$j]['btakeoffT'] = date("H:i", strtotime($btakeoff . 'Z'));
            $flights[$j]['btakeoffD'] = date("d-m-Y", strtotime($btakeoff . 'Z'));
            $flights[$j]['class'] = $flight['travelerPricings'][0]['fareDetailsBySegment'][0]['cabin'];
            $i = 0;
            foreach ($flight['itineraries'][0]['segments'] as $iter){
                $flights[$j]['name'][$i] = $airline[$iter['carrierCode']];
                $flights[$j]['code'][$i] = $iter['carrierCode'];
                $flights[$j]['fnumber'][$i] = $iter['carrierCode'] . '-' . $iter['number'];
                $flights[$j]['aircraft'][$i] = $aircarft[$iter['aircraft']['code']];
                $flights[$j]['from'][$i] = $iter['departure']['iataCode'];
                $flights[$j]['fromDate'][$i] = $iter['departure']['at'];
                $flights[$j]['to'][$i] = $iter['arrival']['iataCode'];
                $flights[$j]['toDate'][$i] = $iter['arrival']['at'];
                $flights[$j]['itime'][$i] = $iter['duration'];
                $i++;
            }
            $land = $flight['itineraries'][0]['segments'][$i-1]['arrival']['at'];
            $flights[$j]['landT'] = date("H:i", strtotime($land . 'Z'));
            $flights[$j]['landD'] = date("d-m-Y", strtotime($land . 'Z'));
            $i = 0;
            foreach ($flight['itineraries'][1]['segments'] as $iter){
                $flights[$j]['bname'][$i] = $airline[$iter['carrierCode']];
                $flights[$j]['bcode'][$i] = $iter['carrierCode'];
                $flights[$j]['bfnumber'][$i] = $iter['carrierCode'] . '-' . $iter['number'];
                $flights[$j]['baircraft'][$i] = $aircarft[$iter['aircraft']['code']];
                $flights[$j]['bfrom'][$i] = $iter['departure']['iataCode'];
                $flights[$j]['bfromDate'][$i] = $iter['departure']['at'];
                $flights[$j]['bto'][$i] = $iter['arrival']['iataCode'];
                $flights[$j]['btoDate'][$i] = $iter['arrival']['at'];
                $flights[$j]['bitime'][$i] = $iter['duration'];
                $i++;
            }
            $bland = $flight['itineraries'][1]['segments'][$i-1]['arrival']['at'];
            $flights[$j]['blandT'] = date("H:i", strtotime($bland . 'Z'));
            $flights[$j]['blandD'] = date("d-m-Y", strtotime($bland . 'Z'));
            $j++;
        }
        return $flights;
    }

    
    public function getFlightDetails(Request $request)
    {
        $data = json_decode($request->get('data'), true);
        //dd($data);
        return view('flight-single', ['data' => $data]);
    }


    
    public function getFlightDetails2(Request $req,$id)
    {
        
        if(auth()->id()!=null)
        {
            $flights = flightpackage::where('id',$id)->first();
            //$data = json_decode($request->get('data'), true);
            //dd($data);
            return view('flight-single',['flight'=>$flights]);
        }else{
            return redirect('/login');
        }
           
    }


    public function bookFlight(Request $request)
    {
        //dd($request);exit;
        $data = json_decode($request->get('data'), true);
        $payment = $request->get('payment_method');
        $newPrice = $data['price'] + $request->get('service_charges');
        //dd($newPrice);exit;
        return view('flight-booking', ['data' => $data, 'payment' => $payment,'newPrice' => $newPrice, 'error' => false]);
    }

    public function bookFlight2(Request $req )
    {
        $data = $req->data;

        $flights = flightpackage::where('id',$data)->first();

        $payment = $req->payment_method;
        return view('flight-booking', ['data2' =>  $flights, 'payment' => $payment, 'error' => false]);
    }


    public function store(Request $request)
    {
        //dd($request);exit;
        $email = $request->get('email');
        $contact = $request->get('contact_no');
        $data = json_decode($request->get('data'), true);
        $payment = $request->get('payment_method');
        if ($payment == "cash") {
            $pnr = $this->storeFlight($request, $payment, false, $data);
        } else {
            $paymet = $this->payStripe($request, $data, empty(User::getUserEmail()) ? $email : User::getUserEmail());
            if($paymet == "Payment is successful."){
                $pnr = $this->storeFlight($request, $payment, true, $data);
            }
            else{
                return view('flight- vdfbooking',
                    ['data' => $data, 'payment' => $payment, 'error' => $paymet]);
            }
        }
        //dd($request);exit;
        $name = $request->get('name')[0];
        $total = ceil($request->get('amount'));

        $user['to'] ='infosupport@gondaltravel.com';
        // $data['email'] = $req->email;
        $data["title"] = "Message From Gondal-Travels";
        $data["body"] = "Customer Pnr is :".$pnr;

        // for admin
        Mail::send('emails.ticketbooked_admin', $data, function($message)use($user, $data){
            $message->to($user['to'])->subject($data["title"]);
        });/// Comment by faraz for local server only
        
        // for user
        $useridd = auth()->id();
        $user_email = User::where('id',$useridd)->first()->email;
        $details ='Your Ticket Has been Booked , Your Pnr #:'.$pnr;

        $ticket = Ticket::where('prn_no', $pnr)->first();
        $data = json_decode($ticket->details, true);
        $passengers = Passenger::where('ticket_id', $ticket->id)->get();
        $collectorr = "hello";

        // Mail::to($email)->send(new\App\Mail\MyTestMail($details));
        //  Mail::to($email)->send(new\App\Mail\ticket($data,$ticket,$passengers,$collectorr));
 
        $ticket = Ticket::where('prn_no',$pnr)->first();
        $data = json_decode($ticket->details, true);
        $passengers = Passenger::where('ticket_id', $ticket->id)->get();
        $collector = CashCollector::where('prn_no',$ticket->prn_no)->first();
        
        $data["email"] = $email;
        $data["title"] = "Gondal-Travel";
        $data["body"] = "Your Ticket Has Been Booked";
        
        // $pdf = PDF::loadView('emails.mailiya', $data);
        $pdf = PDF::loadView('pdf',['data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'collectorr'=>$collectorr,'pdf'=>True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
        
        Mail::send('emails.mailiya', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "ticket.pdf");
        });/// Comment by faraz for local server only
        
        return view('invoice', ['name' => $name,'email' => $email,'pnr' => $pnr,'total' => $total, 'payment'=>$payment]);
    }

    private function storeFlight(Request $request, $payment, $status, $data)
    {
        try
        {
            $ticket = new Ticket();
            $ticket->user_id = auth()->id();
            $ticket->details = $request->get('data');
            //$randomNumber = rand(); ///Comment by Faraz Client requirements
            $randomNumber = $this->quickRandom(6);
            $ticket->prn_no = $randomNumber;
//            $ticket->prn_no = mb_strtoupper(Str::random(8));
            if($payment == 'card'){
                $ticket->status = "Booked";
            }else{
                $ticket->status = "Waiting For Payment";
            }
            $ticket->payment_status = $status;
            $ticket->payment_method = $payment;
            
            if($request->db)
            {
               $ticket->format = $request->db;
            }
            $newPrice = ceil($request->get('newPrice'));
            $ticket->amount = $newPrice;
            $ticket->save();
            $ageGroup = $request->input('age', []);
            $name = $request->input('name', []);
            $surname = $request->input('surname', []);
            $email = $request->input('email');
            $contact = $request->input('contact_no');
            $country = $request->input('country', []);
            $gender = $request->input('gender', []);
            $dob = $request->input('dob', []);
            $idNo = $request->input('pidno', []);
            $iddate = $request->input('pied', []);
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
            }else{
                $user = User::where('id', 1)->first();
                //$user->notify(new TicketProcessed($ticket));
            }
            return $ticket->prn_no;
        }
        catch(Exception $e){
            return redirect('')->with('success','Some error occurred while booking your flight please try again later.');
        }
    }




    public function store2(Request $request)
    {
        echo"asddddddd";
        $req->data;
    }




    public function generateTicket($id)
    {
        $ticket = Ticket::where('prn_no', $id)->first();
        $prn = $ticket->prn_no;
        
        $passenger_email = Passenger::where('ticket_id',$ticket->id)->first()->email;
        
        $collector = CashCollector::where('prn_no',$prn)->first();
        
        if($collector!=null)
        {
            $collectorr = User::where('id',$collector->collector_id)->first();
            $data = json_decode($ticket->details, true);
            $passengers = Passenger::where('ticket_id', $ticket->id)->get();
            
            //echo '<pre>';print_r($data);exit;
            //  $user['to'] ='malikahfaz123@gmail.com';
            // // $data['email'] = $req->email;
            // $data["title"] = "Message From Gondal-Travels";
            // // $data["body"] = "Customer Pnr is :".$pnr;

            // for user
            $useridd = auth()->id();
            $user_email = User::where('id',$useridd)->first()->email;

            //echo '<pre>';print_r($ticket);exit;

            if($ticket->format == 'db')
            {
                //  $pdf = PDF::loadView('pdf2',['data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'collectorr'=>$collectorr,'pdf'=>True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
                // return $pdf->download('Ticket.pdf');
                // Mail::to($passenger_email)->send(new\App\Mail\ticket2($data,$ticket,$passengers,$collectorr));
                //echo '<pre>';print_r($data);exit;
                return view('pdf2',['data' => $data,'ticket' => $ticket, 'passengers' => $passengers,'collectorr' => $collectorr,'pdf' => True]);
            }else{
                //  $pdf = PDF::loadView('pdf',['data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'collectorr'=>$collectorr,'pdf'=>True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
                // return $pdf->download('Ticket.pdf');
                // Mail::to($passenger_email)->send(new\App\Mail\ticket($data,$ticket,$passengers,$collectorr));
                //echo '<pre>';print_r($data);exit;
                return view('pdf_new',['data' => $data,'ticket' => $ticket, 'passengers' => $passengers,'collectorr' => $collectorr,'pdf' => True]);
            }
     
        }else{
            $collectorr = [];
            
            $data = json_decode($ticket->details, true);
            $passengers = Passenger::where('ticket_id', $ticket->id)->get();
            
            //  $user['to'] ='malikahfaz123@gmail.com';
            // // $data['email'] = $req->email;
            // $data["title"] = "Message From Gondal-Travels";
            // // $data["body"] = "Customer Pnr is :".$pnr;

            // for user
            $useridd = auth()->id();
            $user_email = User::where('id',$useridd)->first()->email;

            if($ticket->format == 'db'){
                //  $pdf = PDF::loadView('pdf2',['data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'collectorr'=>$collectorr,'pdf'=>True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
                // return $pdf->download('Ticket.pdf');
                // Mail::to($passenger_email)->send(new\App\Mail\ticket2($data,$ticket,$passengers,$collectorr));
                return view('pdf2',['data' => $data,'ticket' => $ticket, 'passengers' => $passengers,'collectorr' => $collectorr,'pdf' => True]);
            }else{
                //dd($data);
                //  $pdf = PDF::loadView('pdf',['data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'collectorr'=>$collectorr,'pdf'=>True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
                // return $pdf->download('Ticket.pdf');
                // Mail::to($passenger_email)->send(new\App\Mail\ticket($data,$ticket,$passengers,$collectorr));
                return view('pdf_new',['data' => $data,'ticket' => $ticket, 'passengers' => $passengers,'collectorr' => $collectorr,'pdf' => True]);
            }     
        }  
       
    }
    
    public function download_Ticket($id)
    {
        $ticket = Ticket::where('prn_no',$id)->first();
        $data = json_decode($ticket->details, true);
        $passengers = Passenger::where('ticket_id', $ticket->id)->get();
        $collector = CashCollector::where('prn_no',$ticket->prn_no)->first();

        if($collector!=null)
        {
            $collectorr = User::where('id',$collector->collector_id)->first();
            //dd($ticket);exit;
            if($ticket->format == 'db')
            {
                $pdf = PDF::loadView('pdf_new',['data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'collectorr'=>$collectorr,'pdf'=>True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'portrait');
                return $pdf->download('GTravel-Ticket-Itinerary-'.$id.'.pdf');
            }else{
                $pdf = PDF::loadView('pdf_new',['data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'collectorr'=>$collectorr,'pdf'=>True])->setOptions(['enable_css_float'=>true]);//->setWarnings(true);
                //'enable_remote'=>true,'enable_css_float'=>true->setWarnings(true);
                return $pdf->download('GTravel-Ticket-Itinerary-'.$id.'.pdf');
            }
        }else{
            Session::flash('message', 'Payment Not Collected !');
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('dashboard/admin/all-bookings');
        }
         
    }
    
    public function generateinvoice_pdf($id)
    {
        $ticket = Ticket::where('prn_no',$id)->first();
        $data = json_decode($ticket->details, true);
        $passengers = Passenger::where('ticket_id', $ticket->id)->get();
        $invoice = CashCollector::where('prn_no',$id)->first();
        
        $username = User::where('id',$invoice->collector_id)->first();
        // return view('pdf_invoice',compact('invoice','username','id'));
        
        $pdf = PDF::loadView('pdf_invoice',['username'=>$username,'invoice'=>$invoice,'id'=>$id,'data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'pdf'=>True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
        return $pdf->download('Invoice.pdf');
    }

    public function createPDF($id)
    {
        set_time_limit(500);
        $ticket = Ticket::where('prn_no', $id)->first();
        $data = json_decode($ticket->details, true);
        $passengers = $ticket->passengers();
        $pdf = PDF::loadView('pdf', ['data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'pdf' => False])->setOptions(['defaultFont' => 'sans-serif']);
        session()->forget('flight');
        return $pdf->download('ticket.pdf');
    }

    private static function quickRandom($length = 16)
    {
        $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
