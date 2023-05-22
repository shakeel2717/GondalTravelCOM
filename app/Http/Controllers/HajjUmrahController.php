<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\flightpackage;
use App\Models\HajjUmra;
use App\Models\Reservation;
use App\Models\ReservationDetail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class HajjUmrahController extends Controller
{
    public function create()
    {
        return view('admin.hajjumrah.create');
    }

    public function store(Request $req)
    {

        $flight = new flightpackage;
        $flight->title = $req->name;
    
        if ($req->hasFile('image1')) {
            $image = $req->file('image1');
            $image_name = $image->getClientOriginalName();
            $flight->image = $image->move('public/images/packages', $image_name);
        }
        $flight->seats_left = $req->seats;
        $flight->adult_baggage = $req->adultbaggage;
        $flight->adults = $req->adult;
        $flight->childrens = $req->children;
        $flight->infants = $req->infant;
        $flight->pnr_no = $random = Str::random(6);
        $flight->status = $req->status;
        $flight->type = '2';

        $flight->save();
        
        $hajjumrah = new HajjUmra;
        $hajjumrah->flightpackage_id = $flight->id;
        $hajjumrah->description = $req->description;
        $hajjumrah->start_date = $req->start_date;
        $hajjumrah->end_date = $req->end_date;
        $hajjumrah->total_stay = $req->total_stay;
        $hajjumrah->makkah_hotel_name = $req->makkah_hotel_name;
        $hajjumrah->makkah_night_stay = $req->makkah_night_stay;
        $hajjumrah->makkah_distance = $req->makkah_distance;
        $hajjumrah->madina_hotel_name = $req->madina_hotel_name;
        $hajjumrah->madina_night_stay = $req->madina_night_stay;
        $hajjumrah->madina_distance = $req->madina_distance;
        $hajjumrah->chamber_room_price_1 = $req->chamber_room_price_1;
        $hajjumrah->chamber_room_price_2 = $req->chamber_room_price_2;
        $hajjumrah->chamber_room_price_3 = $req->chamber_room_price_3;
        $hajjumrah->chamber_room_price_4 = $req->chamber_room_price_4;
        $hajjumrah->airline_going = $req->airline_going;
        $hajjumrah->airline_return = $req->airline_return;
        $hajjumrah->two_year_price = $req->two_year_price;
        $hajjumrah->price_from = $req->price_from;
        $hajjumrah->save();
        


        Session::flash('message', ' Added Successfully !');
        Session::flash('alert-type', 'success');
        return redirect('dashboard/admin/all-Hajj-umrah-packages');


    }

    public function edit($id)
    {
        $flight = flightpackage::find($id);

        // return view('admin.packages.edit',compact('flight'));
        return view('admin.hajjumrah.edit', ['flight' => $flight]);
       
    }

    public function update(request $req)
    {

        $flight = flightpackage::find($req->id);

        $flight->title = $req->name;
        $flight->flight_to = $req->to;
        $flight->flight_from = $req->from;

        if ($req->hasFile('image1')) {
            $image = $req->file('image1');
            $image_name = $image->getClientOriginalName();
            $flight->image = $image->move('public/images/packages', $image_name);
        }

        $flight->way_of_flight = "one way";
        $flight->total_stops = $req->stops;
        $flight->take_off_time = $req->takeoff;
        $flight->land_time = $req->land;
        $flight->date_of_flight = $req->date;
        $flight->airline = $req->airline;
        $flight->duration = $req->duration;
        $flight->flight_number = $req->flightnumber;
        $flight->aircraft = $req->aircraft;
        $flight->flight_type = $req->flighttype;
        $flight->seats_left = $req->seats;
        $flight->adult_baggage = $req->adultbaggage;
        $flight->price = $req->price;
        $flight->adults = $req->adult;
        $flight->childrens = $req->children;
        $flight->infants = $req->infant;
        $flight->pnr_no = $random = Str::random(6);
        $flight->status = $req->status;

        $flight->save();


        Session::flash('message', 'Flight Package Updated Successfully !');
        Session::flash('alert-type', 'success');
        return redirect('dashboard/admin/all-packages');
    }

    public function all()
    {
        $flights = flightpackage::where('type',2)->get();

        return view('admin.hajjumrah.index', ['flight' => $flights]);
    }

    public function delete($id)
    {
        $flight = flightpackage::find($id)->delete();
        Session::flash('message', 'Flight Package Deleted Successfully !');
        Session::flash('alert-type', 'success');
        return redirect('dashboard/admin/all-packages');
    }
    
    public function hajj_umrah_listing(Request $request)
    {
        // dd($request->all());
    $query = FlightPackage::where('type', 2);

    $query->when($request->has('start_date') && $request->input('start_date') !== null, function ($q) use ($request) {
        $q->whereHas('hajjumrah', function ($q) use ($request) {
            $q->where('start_date', '>=', $request->input('start_date'));
        });
    });

    $query->when($request->has('end_date') && $request->input('end_date') !== null, function ($q) use ($request) {
        $q->whereHas('hajjumrah', function ($q) use ($request) {
            $q->where('end_date', '<=', $request->input('end_date'));
        });
    });

    $query->when($request->has('price_from') && $request->input('price_from') !== null, function ($q) use ($request) {
        $q->whereHas('hajjumrah', function ($q) use ($request) {
            $q->where('chamber_room_price_1', '<=', $request->input('price_from'));
        });
    });

        $flights = $query->get();
    
        return view('hajjumrah_listing',compact('flights'));
    }
    
    public function hajj_umrah_details($id)
    {
        $flight = flightpackage::find($id);
        return view('hajjumrah_details',compact('flight'));  
    }
    
    public function hajjumrah_form(Request $request)
    {
        $flight = flightpackage::find($request->id);
        return view('hajjumrah_form',compact('flight'));
    }
    
    public function hajjumrah_form_store(Request $request)
    {
        
        // dd($request->all());
        try
        {
        $reservation = new Reservation;
        $reservation->hajjumra_id = $request->hajjumra_id;
        $reservation->total_amount = '100000';
        $reservation->amount_paid = '0';
        $reservation->save();
        
        $count = count($request->passport);
        $totalSum = 0;
        for($i = 0 ; $i<=($count)-1 ; $i++)
        {
             $reservation_detail = new ReservationDetail;
             $reservation_detail->reservation_id = $reservation->id;
             $reservation_detail->name = $request->name[$i];
             $reservation_detail->first_name = $request->first_name[$i];
             $reservation_detail->company_name = $request->company_name[$i];
             $reservation_detail->email = $request->email[$i];
             $reservation_detail->postal_address = $request->postal_address[$i];
             $reservation_detail->telephone_number = $request->telephone_number[$i];
             $reservation_detail->nationality = $request->nationality[$i];
             $reservation_detail->dob = $request->dob[$i];
             $reservation_detail->passport = $request->passport[$i];
             
             $chamberPrice = explode(",", $request->chamber[$i]);
             $chamberPrice = $chamberPrice[1];
             $totalSum += $chamberPrice;
             
             $reservation_detail->chamber = $request->chamber[$i];
              if($request->foreigner !=null)
                  {
                    $totalSum = $totalSum + $request->foreigner;
                  }
                  $updateAmount = Reservation::find($reservation->id)->update(['total_amount' => $totalSum]);
                  
            $reservation_detail->save();
        }

        // Session::flash('message', ' Added Successfully !');
        // Session::flash('alert-type', 'success');
        return view('reservation_booked');
        }
        catch(Exception $e)
        {
            return $e;
        }

    }
  public function all_reservations()
    {
        $reservations = Reservation::all();
        return view('admin.hajjumrah.reservations', ['reservations' => $reservations]);  
    }
    
     public function reservation_details($id)
    {
        $reservations = ReservationDetail::where('reservation_id',$id)->get();
        return view('admin.hajjumrah.reservation_details', ['reservations' => $reservations]);  
    }

    
}
