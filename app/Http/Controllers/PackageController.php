<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\flightpackage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class PackageController extends Controller
{
    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $req)
    {

        $flight = new flightpackage;

        $flight->title = $req->name;
        $flight->flight_to = $req->to;
        $flight->flight_from = $req->from;

        if ($req->hasFile('image1')) {
            $image = $req->file('image1');
            $image_name = $image->getClientOriginalName();
            $flight->image = $image->move('images/packages', $image_name);
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
         $flight->type = '1';

        $flight->save();


        Session::flash('message', 'Flight Added Successfully !');
        Session::flash('alert-type', 'success');
        return redirect('dashboard/admin/all-packages');


    }

    public function edit($id)
    {
        $flight = flightpackage::find($id);

        // return view('admin.packages.edit',compact('flight'));
        return view('admin.packages.edit', ['flight' => $flight]);
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
            $flight->image = $image->move('images/packages', $image_name);
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
        $flights = flightpackage::where('type','1')->get();

        return view('admin.packages.index', ['flight' => $flights]);
    }

    public function delete($id)
    {
        $flight = flightpackage::find($id)->delete();
        Session::flash('message', 'Flight Package Deleted Successfully !');
        Session::flash('alert-type', 'success');
        return redirect('dashboard/admin/all-packages');
    }
}
