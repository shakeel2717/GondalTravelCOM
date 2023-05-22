<?php

namespace App\Http\Controllers;

use App\Models\AirLine;
use App\Models\Passenger;
use App\Models\Ticket;
use App\Models\flightpackage;
use App\Models\Commission;
use App\Models\CashCollector;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;
use Illuminate\Support\Facades\Mail;

use Requests;


class FlightController extends Controller
{
    private $ApiUrl;
    private $ApiLive;
    private $BookingLive;

    public function __construct()
    {
        $this->ApiLive = Setting::where('name', 'live_api_on')->get('value')[0]->value;
        $this->BookingLive = Setting::where('name', 'live_booking_on')->get('value')[0]->value;
    }


    public function testing(Request $request)
    {
        return $request->all();
    }

    public function test_search($id)
    {
        //echo '<pre>';print_r($id); exit;

        $access_token = $this->getApi();

        // $flight = $this->ApiUrl . '/v2/duty-of-care/diseases/covid19-area-report';
        // $travel_data = [
        //     'countryCode' => 'AE',
        //     'cityCode' => 'DXB',
        //     'language' => 'EN',
        // ];
        //
        // $fields = http_build_query($travel_data);
        // $url = $flight . '?' . $fields;
        // $headers = array('Authorization' => 'Bearer ' . $access_token);
        // $requests_response = Requests::get($url, $headers);
        // $collections = json_decode($requests_response->body);
        // dd($collections);
        // exit;

        $flight = 'https://api.amadeus.com/v1/shopping/flight-dates';
        // $travel_data = [
        //     {
        //       "data": {
        //         "type": "flight-offers-upselling",
        //         "flightOffers": [
        //           {"type":"flight-offer","id":"6","source":"GDS","instantTicketingRequired":false,"nonHomogeneous":false,"oneWay":false,"lastTicketingDate":"2023-02-16","numberOfBookableSeats":9,"itineraries":[{"duration":"PT8H40M","segments":[{"departure":{"iataCode":"JED","terminal":"1","at":"2023-02-16T08:00:00"},"arrival":{"iataCode":"RUH","terminal":"5","at":"2023-02-16T09:45:00"},"carrierCode":"SV","number":"1022","aircraft":{"code":"777"},"operating":{"carrierCode":"SV"},"duration":"PT1H45M","id":"107","numberOfStops":0,"blacklistedInEU":false},{"departure":{"iataCode":"RUH","terminal":"4","at":"2023-02-16T12:30:00"},"arrival":{"iataCode":"LHE","terminal":"M","at":"2023-02-16T18:40:00"},"carrierCode":"SV","number":"736","aircraft":{"code":"777"},"operating":{"carrierCode":"SV"},"duration":"PT4H10M","id":"108","numberOfStops":0,"blacklistedInEU":false}]}],"price":{"currency":"EUR","total":"198.78","base":"153.00","fees":[{"amount":"0.00","type":"SUPPLIER"},{"amount":"0.00","type":"TICKETING"}],"grandTotal":"198.78","additionalServices":[{"amount":"83.89","type":"CHECKED_BAGS"}]},"pricingOptions":{"fareType":["PUBLISHED"],"includedCheckedBagsOnly":true},"validatingAirlineCodes":["SV"],"travelerPricings":[{"travelerId":"1","fareOption":"STANDARD","travelerType":"ADULT","price":{"currency":"EUR","total":"198.78","base":"153.00"},"fareDetailsBySegment":[{"segmentId":"107","cabin":"ECONOMY","fareBasis":"TAOSATFV","class":"Y","includedCheckedBags":{"quantity":1}},{"segmentId":"108","cabin":"ECONOMY","fareBasis":"TAOSATFV","class":"T","includedCheckedBags":{"quantity":1}}]}]}
        //         ]
        //       }
        //     }
        // ];
        // $uri_param = [
        //     //"include"   =>  "bags,other-services,detailed-fare-rules",
        //     "forceClass" => "true",
        // ];
        $travel_data = [
            'origin' => 'MAD',
            'destination' => 'LON',
            //'departureDate' => '2023-03-12',
            //'oneWay'=>false,

            // 'returnDate'=>null,
            // 'adults' => 1,
            // 'children' => null,
            // 'infants' => null,
            // 'travelClass'=>null,
            'viewBy' => 'DATE',
        ];

        // $body = json_encode([
        //     "data" => [
        //         "type" => "flight-offers-pricing",
        //         "flightOffers" => [$data],
        //     ],
        // ]);


        $fields = http_build_query($travel_data);
        $url = $flight . '?' . $fields;
        $headers = array('Authorization' => 'Bearer ' . $access_token);
        $requests_response = Requests::get($url, $headers);
        // $headers = array('content-type' => 'application/vnd.amadeus+json', 'Authorization' => 'Bearer ' . $access_token);
        // $requests_response = Requests::get($url, $headers, $body);
        $collections = $requests_response->body;

        dd(json_decode($collections));
        exit;
    }

    public function getApi()
    {
        Requests::register_autoloader();

        if ($this->ApiLive) {
            $this->ApiUrl = 'https://api.amadeus.com';
            $url = $this->ApiUrl . '/v1/security/oauth2/token';
            $auth_data = [
                'client_id' => 'RCJjGo7OtUJmHbWG3zLAt37nTh14DBGC',
                'client_secret' => '8shnlRRHuhP7Hz1W',
                'grant_type' => 'client_credentials'
            ];
        } else {
            $this->ApiUrl = 'https://test.api.amadeus.com';
            $url = $this->ApiUrl . '/v1/security/oauth2/token';
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

    private function delete_pnr_record($id)
    {
        $access_token = $this->getApi();
        $flight = $this->ApiUrl . '/v1/booking/flight-orders';
        $pnr_id = $id;

        $url = $flight . '/' . $pnr_id;

        $headers = array('Authorization' => 'Bearer ' . $access_token);
        $requests_response = Requests::delete($url, $headers);
        return $requests_response;
    }

    public function search(Request $request)
    {
        // dd($request);exit;
        $access_token = $this->getApi();
        // $this->delete_pnr_record('eJzTd9cPcHQJj3IDAAtlAnI%3D');
        // exit;
        if (auth()->id() != null) {
            $flight = $this->ApiUrl . '/v2/shopping/flight-offers';
            if ($request->get('flight') == '1') {
                $orgDate = $request->get('daterange-single'); //departing date
                $travel_data = [
                    'originLocationCode' => $request->get('from'),
                    'destinationLocationCode' => $request->get('to'),
                    'departureDate' => $orgDate,
                    'adults' => $request->input('adult_number', 1),
                    'children' => $request->input('child_number', 0),
                    'infants' => $request->input('infants_number', 0),
                    'travelClass' => $request->get('coach'),
                    'maxPrice' => $request->get('ammout'),
                ];
            } else {
                $orgDate = str_split($request->get('datefilter'), 10)[0];
                $orgDate2 = substr($request->get('datefilter'), -10);
                $travel_data = [
                    'originLocationCode' => $request->get('from'),
                    'destinationLocationCode' => $request->get('to'),
                    'departureDate' => $orgDate,
                    'returnDate' => $orgDate2,
                    'adults' => $request->input('adult_number', 1),
                    'children' => $request->input('child_number', 0),
                    'infants' => $request->input('infants_number', 0),
                    'travelClass' => $request->get('coach'),
                    'maxPrice' => $request->get('ammout'),
                ];
            }
            //dd($travel_data);exit;
            $fields = http_build_query($travel_data);
            $url = $flight . '?' . $fields;
            $headers = array('Authorization' => 'Bearer ' . $access_token);
            $requests_response = Requests::get($url, $headers);
            $collections = json_decode($requests_response->body);
            //dd($requests_response);exit;
            //dd($collections);exit;

            if (isset($collections->errors)) {
                $data = $collections->errors;
                $dataCollections = json_decode(json_encode($data), true)[0]['detail'];
                return redirect()->back()->with('error', $dataCollections);
            }
            $data = $collections->data;
            //dd($data);
            // $dic = $collections->dictionaries;
            if (isset($collections->dictionaries) == null) {
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
            $orgdataCollections = $dataCollections;
            //dd($airline);exit;
            if ($request->get('flight') == '1') {
                $dataCollections = $this->flightDataSingle($dataCollections, $airline, $aircarft);
            } else {
                $dataCollections = $this->flightDataReturn($dataCollections, $airline, $aircarft);
            }

            $uniqueFcodes = array();
            foreach ($dataCollections as $flightData) {
                $fcode = $flightData['fcode'];
                if (!in_array($fcode, $uniqueFcodes)) {
                    $uniqueFcodes[] = $fcode;
                }
            }
            $availableFlights = AirLine::whereIn('iata', $uniqueFcodes)->get();




            // dd($orgdataCollections);exit;
            // dd($dataCollections);exit;

            return view('flights', [
                'data' => $dataCollections,
                'orgdata' => $orgdataCollections,
                'availableFlights' => $availableFlights
            ]);
        } else {
            return redirect('/login');
        }
    }

    public function flightDataSingle($data, $airline, $aircarft)
    { //dd($data);
        $flights = [];
        $j = 0;

        foreach ($data as $flight) {
            $adult = 0;
            $child = 0;
            $infants = 0;
            $aprice = 0;
            $cprice = 0;
            $iprice = 0;
            for ($k = 0; $k < (int)count($flight['travelerPricings']); $k++) {
                $type = $flight['travelerPricings'][$k]['travelerType'];
                $price = $flight['travelerPricings'][$k]['price']['total'];
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

            $flights[$j]['fcode'] = $flight['validatingAirlineCodes'][0];
            $flights[$j]['time'] = $flight['itineraries'][0]['duration'];
            $flights[$j]['seats'] = $flight['numberOfBookableSeats'];
            $flights[$j]['type'] = 'One Way';
            $flights[$j]['price'] = ($adultprice * $adult) + ($childprice * $child) + ($infantprice * $infants);
            $flights[$j]['adult'] = $adult;
            $flights[$j]['child'] = $child;
            $flights[$j]['infant'] = $infants;
            $flights[$j]['aprice'] = $adultprice;
            $flights[$j]['cprice'] = $childprice;
            $flights[$j]['iprice'] = $infantprice;
            // dd( $flights[$j]['price']);
            //dd($flight['travelerPricings'][0]['fareDetailsBySegment']);
            if (count($flight['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']) == 2) {
                $bag = $flight['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']['weight'] . $flight['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']['weightUnit'];
            } else if (count($flight['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']) == 1) {
                $bag = $flight['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']['quantity'];
            } else {
                $bag = "Not Available";
            }
            $flights[$j]['weight'] = $bag;
            $takeoff = $flight['itineraries'][0]['segments'][0]['departure']['at'];
            $flights[$j]['takeoffT'] = date("H:i", strtotime($takeoff . 'Z'));
            $flights[$j]['takeoffD'] = date("d-m-Y", strtotime($takeoff . 'Z'));
            $flights[$j]['class'] = $flight['travelerPricings'][0]['fareDetailsBySegment'][0]['cabin'];
            $flights[$j]['class_type'] = $flight['travelerPricings'][0]['fareDetailsBySegment'];
            $i = 0;
            foreach ($flight['itineraries'][0]['segments'] as $iter) {
                $flights[$j]['name'][$i] = $airline[$iter['carrierCode']];
                $flights[$j]['code'][$i] = $iter['carrierCode'];
                $flights[$j]['fnumber'][$i] = $iter['carrierCode'] . '-' . $iter['number'];
                $flights[$j]['aircraft'][$i] = $aircarft[$iter['aircraft']['code']];
                $flights[$j]['from'][$i] = $iter['departure']['iataCode'];
                @$flights[$j]['fromterminal'][$i] = $iter['departure']['terminal'];
                $flights[$j]['fromDate'][$i] = $iter['departure']['at'];
                $flights[$j]['to'][$i] = $iter['arrival']['iataCode'];
                @$flights[$j]['toterminal'][$i] = $iter['arrival']['terminal'];
                $flights[$j]['toDate'][$i] = $iter['arrival']['at'];
                $flights[$j]['itime'][$i] = $iter['duration'];
                $i++;
            }
            $land = $flight['itineraries'][0]['segments'][$i - 1]['arrival']['at'];
            $flights[$j]['landT'] = date("H:i", strtotime($land . 'Z'));
            $flights[$j]['landD'] = date("d-m-Y", strtotime($land . 'Z'));

            $j++;
        }
        return $flights;
    }

    public function flightDataReturn($data, $airline, $aircarft)
    {
        // echo '<pre>';
        // print_r($data);echo '</pre>';exit;
        $flights = [];
        $j = 0;
        foreach ($data as $flight) {
            $adult = 0;
            $child = 0;
            $infants = 0;
            $aprice = 0;
            $cprice = 0;
            $iprice = 0;
            for ($k = 0; $k < (int)count($flight['travelerPricings']); $k++) {
                $type = $flight['travelerPricings'][$k]['travelerType'];
                $price = $flight['travelerPricings'][$k]['price']['total'];
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

            $flights[$j]['fcode'] = $flight['validatingAirlineCodes'][0];
            $flights[$j]['time'] = $flight['itineraries'][0]['duration'];
            $flights[$j]['btime'] = $flight['itineraries'][1]['duration'];
            $flights[$j]['seats'] = $flight['numberOfBookableSeats'];
            $flights[$j]['type'] = 'Return';
            $flights[$j]['price'] = ($adultprice * $adult) + ($childprice * $child) + ($infantprice * $infants);
            $flights[$j]['travel'] = $flight['travelerPricings'];
            $flights[$j]['adult'] = $adult;
            $flights[$j]['child'] = $child;
            $flights[$j]['infant'] = $infants;
            $flights[$j]['aprice'] = $adultprice;
            $flights[$j]['cprice'] = $childprice;
            $flights[$j]['iprice'] = $infantprice;
            $flights[$j]['iprice'] = $iprice;
            if (count($flight['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']) == 2) {
                $bag = $flight['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']['weight'] . $flight['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']['weightUnit'];
            } else if (count($flight['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']) == 1) {
                $bag = $flight['travelerPricings'][0]['fareDetailsBySegment'][0]['includedCheckedBags']['quantity'];
            } else {
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
            $flights[$j]['class_type'] = $flight['travelerPricings'][0]['fareDetailsBySegment'];
            $i = 0;
            foreach ($flight['itineraries'][0]['segments'] as $iter) {
                $flights[$j]['name'][$i] = $airline[$iter['carrierCode']];
                $flights[$j]['code'][$i] = $iter['carrierCode'];
                $flights[$j]['fnumber'][$i] = $iter['carrierCode'] . '-' . $iter['number'];
                $flights[$j]['aircraft'][$i] = $aircarft[$iter['aircraft']['code']];
                $flights[$j]['from'][$i] = $iter['departure']['iataCode'];
                @$flights[$j]['fromterminal'][$i] = $iter['departure']['terminal'];
                $flights[$j]['fromDate'][$i] = $iter['departure']['at'];
                $flights[$j]['to'][$i] = $iter['arrival']['iataCode'];
                @$flights[$j]['toterminal'][$i] = $iter['arrival']['terminal'];
                $flights[$j]['toDate'][$i] = $iter['arrival']['at'];
                $flights[$j]['itime'][$i] = $iter['duration'];
                $i++;
            }
            $land = $flight['itineraries'][0]['segments'][$i - 1]['arrival']['at'];
            $flights[$j]['landT'] = date("H:i", strtotime($land . 'Z'));
            $flights[$j]['landD'] = date("d-m-Y", strtotime($land . 'Z'));
            $i = 0;
            foreach ($flight['itineraries'][1]['segments'] as $iter) {
                $flights[$j]['bname'][$i] = $airline[$iter['carrierCode']];
                $flights[$j]['bcode'][$i] = $iter['carrierCode'];
                $flights[$j]['bfnumber'][$i] = $iter['carrierCode'] . '-' . $iter['number'];
                $flights[$j]['baircraft'][$i] = $aircarft[$iter['aircraft']['code']];
                $flights[$j]['bfrom'][$i] = $iter['departure']['iataCode'];
                @$flights[$j]['bfromterminal'][$i] = $iter['departure']['terminal'];
                $flights[$j]['bfromDate'][$i] = $iter['departure']['at'];
                $flights[$j]['bto'][$i] = $iter['arrival']['iataCode'];
                @$flights[$j]['btoterminal'][$i] = $iter['arrival']['terminal'];
                $flights[$j]['btoDate'][$i] = $iter['arrival']['at'];
                $flights[$j]['bitime'][$i] = $iter['duration'];
                $i++;
            }
            $bland = $flight['itineraries'][1]['segments'][$i - 1]['arrival']['at'];
            $flights[$j]['blandT'] = date("H:i", strtotime($bland . 'Z'));
            $flights[$j]['blandD'] = date("d-m-Y", strtotime($bland . 'Z'));
            $j++;
        }
        return $flights;
    }


    public function getFlightDetails(Request $request)
    {
        //dd($request);exit;
        $data = json_decode($request->get('data'), true);
        $orgdata = $request->get('orgdata');
        //dd($orgdata);
        return view('flight-single', ['data' => $data, 'orgdata' => $orgdata]);
    }


    public function getFlightDetails2(Request $req, $id)
    {
        if (auth()->id() != null) {
            $flights = flightpackage::where('id', $id)->first();
            //$data = json_decode($request->get('data'), true);
            //dd($data);
            return view('flight-single', ['flight' => $flights]);
        } else {
            return redirect('/login');
        }
    }

    public function bookFlight(Request $request)
    {
        // dd($request);exit;
        $data = json_decode($request->get('data'), true);
        $payment = $request->get('payment_method');
        $collectorProfit = $request->get('service_charges');
        $orgdata = json_decode($request->orgdata, true);
        // dd($request->get('service_charges'));
        if ($this->BookingLive) {
            $liveprice = $this->confirm_price($request->orgdata);

            if ($liveprice->status_code == 200) {
                $collections = json_decode($liveprice->body, true);
                $livedata = $collections['data']['flightOffers'][0];
                // dd($livedata);exit;
                $mainPrice = $livedata['price']['grandTotal'];
                $margin = $request->get('service_charges') - $livedata['price']['grandTotal'];
                $price = $data['price'] + $margin;
            } else {
                //dd($request->orgdata);exit;
                $collections = json_decode($request->orgdata, true);
                $orgprice = $collections['price']['grandTotal'];
                $mainPrice = $orgprice;
                //dd($orgdata);exit;
                $margin = $request->get('service_charges') - $data['price'];
                $price = $data['price'] + $margin;
            }
        } else {
            $data = json_decode($request->get('data'), true);
            $margin = $request->get('service_charges') - $data['price'];
            $price = $data['price'] + $margin;
            $mainPrice = $data['price'];
        }

        $newPrice = $price;
        // dd($newPrice);
        return view('flight-booking', ['data' => $data, 'margin' => $margin, 'orgdata' => $orgdata, 'payment' => $payment, 'orgPrice' => $mainPrice, 'newPrice' => $newPrice, 'error' => false, 'collectorProfit' => $collectorProfit]);
    }

    private function confirm_price($orgdata)
    {
        $access_token = $this->getApi();

        $data = json_decode($orgdata, true);

        if (auth()->id() != null) {
            $flight = $this->ApiUrl . '/v1/shopping/flight-offers/pricing';
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
            $requests_response = Requests::post($url, $headers, $body);
            $collections = $requests_response->body;
            return $requests_response;
        }
    }

    public function bookFlight2(Request $req)
    {
        $data = $req->data;

        $flights = flightpackage::where('id', $data)->first();

        $payment = $req->payment_method;
        return view('flight-booking', ['data2' => $flights, 'payment' => $payment, 'error' => false]);
    }

    public function store(Request $request)
    {
        // dd($request);exit;
        $email = $request->get('email');
        $contact = $request->get('contact_no');
        $data = json_decode($request->get('data'), true);
        $orgdata = json_decode($request->get('orgdata'), true);
        $payment = $request->get('payment_method');
        //dd($orgdata);exit;
        $live_pnr_data = false;

        if ($this->BookingLive) {
            $requests_response = $this->live_pnr_booking($request);
            //dd($requests_response);exit;
            //eJzTd9f3jnD18DIDAAthAlY%3D
            //KXEHJ6
            if ($requests_response->status_code == 201) {
                $live_pnr_data = json_decode($requests_response->body, true);
            } else {
                return view(
                    'flight-vdfbooking',
                    ['data' => $data, 'payment' => $payment, 'error' => $requests_response]
                );
            }
        }

        // if ($payment == "cash") {
        $pnr = $this->storeFlight($request, $payment, false, $data, $live_pnr_data);
        // } else {
        //     $paymet = $this->payStripe($request, $data, empty(User::getUserEmail()) ? $email : User::getUserEmail());
        //     if ($paymet == "Payment is successful.") {
        //         $pnr = $this->storeFlight($request, $payment, true, $data, $live_pnr_data);
        //     } else {
        //         return view(
        //             'flight-vdfbooking',
        //             ['data' => $data, 'payment' => $payment, 'error' => $paymet]
        //         );
        //     }
        // }
        //dd($request);exit;
        $name = $request->get('name')[0];
        $total = ceil($request->get('amount'));
        $user['to'] = 'infosupport@gondaltravel.com';
        $user['bcc'] = 'faraz.ds@gmail.com';
        // $data['email'] = $req->email;
        $data["title"] = "Message From Gondal-Travels";
        $data["body"] = "Customer Pnr is :" . $pnr . "<br>";
        $data["body"] .= "Customer Name :" . $name . "<br>";
        $data["body"] .= "Customer Contact :" . $request->input('contact_no') . "<br>";
        // getting collectors information
        $currentTicketInfo = Ticket::where('prn_no', $pnr)->first();

        $collectorInfo = User::find($currentTicketInfo->user_id);
        $data["body"] .= "Collector Name :" . $collectorInfo->name . "<br>";
        $data["body"] .= "Collector Email :" . $collectorInfo->email . "<br>";
        $data["body"] .= "Ticket Price :" . $currentTicketInfo->amount . "<br>";
        $data["body"] .= "Collector Profit :" . $currentTicketInfo->collector_profit . "<br>";
        $data["body"] .= "Total Ticket Amount for Passenger :" . $currentTicketInfo->total_amount . "<br>";

        $data["body"] .= "<br>Last Ticketing Date :" . $orgdata['lastTicketingDate'];

        // for admin
        if (env("APP_ENV") != "local") {
            Mail::send('emails.ticketbooked_admin', $data, function ($message) use ($user, $data) {
                $message->to($user['to'])->bcc($user['bcc'])->subject($data["title"]);
            }); /// Comment by faraz for local server only
        }
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
        $email_data["email"] = $email;
        $email_data["bcc"] = "faraz.ds@gmail.com";
        $email_data["title"] = "Gondal-Travel";
        $email_data["body"] = "Your Ticket Has Been Booked\r\n";
        $email_data["name"] = $name;
        //$pnr = $pnr;

        // $pdf = PDF::loadView('emails.mailiya', $data);
        //$pdf = PDF::loadView('pdf',['data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'collectorr'=>$collectorr,'pdf'=>True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');

        $pdf = PDF::loadView('pdf_download', ['data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collector, 'pdf' => True])->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        //dd($request);exit;
        //Send ticket pdf to customer
        $email_data['pdf_name_ticket'] = $name . '-786' . $ticket->id . '.pdf';

        if (env("APP_ENV") != "local") {
            Mail::send('emails.customer-ticket', $email_data, function ($message) use ($email_data, $pdf) {
                $message->to($email_data["email"], $email_data["email"])
                    ->bcc($email_data["bcc"], $email_data["bcc"])
                    ->subject($email_data["title"])
                    ->attachData($pdf->output(), $email_data['pdf_name_ticket']);
            }); /// Comment by faraz for local server only
        }

        return view('invoice', ['name' => $name, 'email' => $email, 'pnr' => $pnr, 'total' => $total, 'payment' => $payment]);
    }

    private function live_pnr_booking($request)
    {
        $access_token = $this->getApi();

        $data = json_decode($request->get('orgdata'), true);

        if (auth()->id() != null) {
            $flight = $this->ApiUrl . '/v1/booking/flight-orders';

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
                        "emailAddress" => $request->get('admin_email'),
                        "phones" => [
                            [
                                "deviceType" => "MOBILE",
                                "countryCallingCode" => "33",
                                "number" => $request->get('admin_phone')
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

            $url = $flight;

            $headers = array('content-type' => 'application/vnd.amadeus+json', 'Authorization' => 'Bearer ' . $access_token);
            $requests_response = Requests::post($url, $headers, $body);

            return $requests_response;

            //$collections = $requests_response->body;
            //dd($requests_response);exit;
            if ($requests_response->status_code == 201) {
                return json_decode($collections, true);
            } else {
                return $requests_response;
            }
        }
    }

    private function storeFlight(Request $request, $payment, $status, $data, $live_pnr_data)
    {
        try {
            $ticket = new Ticket();
            $ticket->user_id = auth()->id();
            $ticket->details = $request->get('data');
            $jsonData = json_decode($request->data);
            $ticket->bags = $jsonData->weight;
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
            $ticket->confirmation = $request->input('ticketStatus');
            $jsonData = json_decode($request->orgdata);
            $ticket->last_ticketing_date = $jsonData->lastTicketingDate;
            $ticket->amount = $request->get('price');
            $ticket->total_amount = $newPrice;
            $ticket->collector_profit = $newPrice - $request->get('price');
            $ticket['Remarks'] = auth('web')->user()->name;
            $name = $request->input('name', []);
            $surname = $request->input('surname', []);
            for ($i = 0; $i < collect($request->get('name'))->count(); $i++) {
                $p_name = $name[$i];
                $p_surname = $surname[$i];
            }
            $ticket->p_name = $p_name;
            $ticket->p_surname = $p_surname;
            $ticket->contact_no = $request->input('contact_no');
            $destinations = [];
            $returnDate = 0;


            for ($i = 0; $i < (int) count($data['to']); $i++) {
                $from = $data['from'][$i];
                $to = $data['to'][$i];
                $destinations[] = $from . '-' . $to;
            }
            // dd(implode(', ', $destinations));
            $ticket->destination = implode(', ', $destinations);
            $departureDate = $data['fromDate'][0];

            // dd($data);
            $firstE = reset($data['from']);
            $lastE = end($data['to']);

            if (isset($data['btoDate'])) {
                $returnDate = end($data['btoDate']);
                $ticket->return_date = date('Y-m-d H:i:s', strtotime($returnDate));
            }

            $ticket->departure_date = date('Y-m-d H:i:s', strtotime($departureDate));
            $ticket->company = $data['name'][0] . " " . $data["fnumber"][0] . " " . $data["class_type"][0]["cabin"] . " " . $data["class_type"][0]["class"];
            // dd($ticket);
            $ticket->save();

            // adding transaction
            $transaction = new Transaction();
            $transaction->user_id = auth()->id();
            $transaction->amount = $ticket->amount;
            $transaction->type = 'Ticket Booked';
            $transaction->sum = false;
            $transaction->description = "Ticket PNR # " . $ticket->prn_no . " Booked " . $ticket->destination . " at " . $ticket->created_at;
            $transaction->save();

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

    public function store2(Request $request)
    {
        echo "asddddddd";
        $request->data;
    }

    public function generateTicket($id)
    {
        $ticket = Ticket::where('prn_no', $id)->latest()->first();
        $prn = $ticket->prn_no;

        // $passenger_email = Passenger::where('ticket_id', $ticket->id)->first()->email;

        $collector = CashCollector::where('prn_no', $prn)->first();
        if ($collector != null) {
            $collectorr = User::where('id', $collector->collector_id)->first();
            $data = json_decode($ticket->details, true);
            $passengers = Passenger::where('ticket_id', $ticket->id)->get();

            //echo '<pre>';print_r($data);exit;
            //  $user['to'] ='malikahfaz123@gmail.com';
            // // $data['email'] = $req->email;
            // $data["title"] = "Message From Gondal-Travels";
            // // $data["body"] = "Customer Pnr is :".$pnr;

            // for user
            $useridd = auth()->id();
            $user_email = User::where('id', $useridd)->first()->email;

            //echo '<pre>';print_r($ticket);exit;

            if ($ticket->format == 'db') {
                //  $pdf = PDF::loadView('pdf2',['data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'collectorr'=>$collectorr,'pdf'=>True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
                // return $pdf->download('Ticket.pdf');
                // Mail::to($passenger_email)->send(new\App\Mail\ticket2($data,$ticket,$passengers,$collectorr));
                //echo '<pre>';print_r($data);exit;

                return view('pdf2', ['data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collectorr, 'pdf' => True]);
            } else {
                //  $pdf = PDF::loadView('pdf',['data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'collectorr'=>$collectorr,'pdf'=>True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
                // return $pdf->download('Ticket.pdf');
                // Mail::to($passenger_email)->send(new\App\Mail\ticket($data,$ticket,$passengers,$collectorr));
                //echo '<pre>';print_r($data);exit;

                return view('pdf_download', ['data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collectorr, 'pdf' => True]);
            }
        } else {
            $collectorr = [];

            $data = json_decode($ticket->details, true);
            $passengers = Passenger::where('ticket_id', $ticket->id)->get();
            // dd($passengers);

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

                return view('pdf2', ['data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collectorr, 'pdf' => True]);
            } else {
                // dd($data);exit;
                //  $pdf = PDF::loadView('pdf',['data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'collectorr'=>$collectorr,'pdf'=>True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');
                // return $pdf->download('Ticket.pdf');
                // Mail::to($passenger_email)->send(new\App\Mail\ticket($data,$ticket,$passengers,$collectorr));
                return view('pdf_download', ['data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collectorr, 'pdf' => True]);
                //return view('pdf_download', ['data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collectorr, 'pdf' => True]);
            }
        }
    }

    public function download_Ticket($id)
    {
        $ticket = Ticket::where('prn_no', $id)->first();
        $data = json_decode($ticket->details, true);
        $passengers = Passenger::where('ticket_id', $ticket->id)->get();
        $collector = CashCollector::where('prn_no', $ticket->prn_no)->first();

        if ($collector != null) {
            $collectorr = User::where('id', $collector->collector_id)->first();
            $template_name = 'pdf_download';
            //dd($ticket);exit;
            if ($ticket->format == 'db') {
                $pdf = PDF::loadView($template_name, ['data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collectorr, 'pdf' => True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'portrait');
                return $pdf->download('GTravel-Ticket-Itinerary-' . $id . '.pdf');
            } else {
                // return view($template_name,['data' => $data,'ticket' => $ticket, 'passengers' => $passengers,'collectorr' => $collectorr,'pdf' => True]);
                $pdf = PDF::loadView($template_name, ['data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collectorr, 'pdf' => True])->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]); //->setWarnings(true);
                return $pdf->download('GTravel-Ticket-Itinerary-' . $id . '.pdf');
            }
        } else {
            Session::flash('message', 'Payment Not Collected !');
            Session::flash('alert-class', 'alert-danger');

            if (auth()->user()->hasRole('collector')) {
                return redirect('dashboard/collector');
            } elseif (auth()->user()->hasRole('user')) {
                return redirect()->to('dashboard/user');
            } else {
                return redirect('dashboard/admin/all-bookings');
            }
        }
    }

    public function generateinvoice_pdf($id)
    {
        $ticket = Ticket::where('prn_no', $id)->first();
        $data = json_decode($ticket->details, true);
        $passengers = Passenger::where('ticket_id', $ticket->id)->get();
        $invoice = CashCollector::where('prn_no', $id)->first();
        if ($invoice == null) {
            Session::flash('message', 'Payment Not Collected !');
            Session::flash('alert-class', 'alert-danger');

            if (auth()->user()->hasRole('collector')) {
                return redirect('dashboard/collector');
            } elseif (auth()->user()->hasRole('user')) {
                return redirect()->to('dashboard/user');
            } else {
                return redirect()->to('dashboard/admin/all-bookings');
            }
        }
        $username = User::where('id', $invoice->collector_id)->first();
        // return view('pdf_invoice',compact('invoice','username','id'));
        //return view('pdf_invoice_new',['username'=>$username,'invoice'=>$invoice,'id'=>$id,'data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'pdf'=>True]);
        $pdf = PDF::loadView('pdf_invoice_new', ['username' => $username, 'invoice' => $invoice, 'id' => $id, 'data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'pdf' => True])->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper('A4', 'landscape');
        return $pdf->download('GTravel-Invoice-' . $id . '.pdf');
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

    private function calculate_commission($price)
    {
        $adult = 0;
        $child = 0;
        $infants = 0;
        $aprice = 0;
        $cprice = 0;
        $iprice = 0;
        for ($k = 0; $k < (int)count($flight['travelerPricings']); $k++) {
            $type = $flight['travelerPricings'][$k]['travelerType'];
            $price = $flight['travelerPricings'][$k]['price']['total'];
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

            $comissionadultprice = (($price) / 100) * $commission_percent;
            $adultprice = ($price) + ($comissionadultprice);
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
    }

    private function get_pnr_record($id)
    {
        $access_token = $this->getApi();
        $flight = $this->ApiUrl . '/v1/booking/flight-orders';
        $pnr_id = $id;

        $url = $flight . '/' . $pnr_id;

        $headers = array('Authorization' => 'Bearer ' . $access_token);
        $requests_response = Requests::get($url, $headers);
        //$collections = json_decode($requests_response->body);
        dd($requests_response);
        exit;
    }
}
