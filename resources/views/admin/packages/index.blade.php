@extends('dashboard.admin')

@section('content')

    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif

    <style>
        .imi {
            width: 10px !important;
            height: 10px !important;

        }
    </style>
    <div class="dashboard-bread dashboard--bread">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">All Packages of flights
                            </h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li>Home</li>
                            <li> Flight Packages</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div>
    </div>
    <div class="dashboard-main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="sec__title font-size-30 text-dark">Admin Created Flights
                                    <a href="{{route('create.package')}}" class="btn btn-primary ml-2 float-right">Add
                                        New</a>
                                </h3>
                            </div>
                        </div>
                        <div class="form-content">
                            @include('partials.alerts')


                            <div class="table-responsive">
                                <table class="display table table-striped table-bordered" id="zero_configuration_table"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>To</th>
                                        <th>From</th>
                                        <th>Price</th>
                                        <th>Flight Number</th>
                                        <th>Aircraft</th>
                                        <th>Airline</th>
                                        <th>Flight-Type</th>
                                        <th>Departure</th>
                                        <th>Arrival</th>
                                        <th>Way of flight</th>
                                        <th>Total Stops</th>
                                        <th>Flight Date</th>
                                        <th>Duration</th>
                                        <th>Seats Left</th>
                                        <th>Adult Baggage</th>
                                        <th>Adults</th>
                                        <th>Childrens</th>
                                        <th>Infants</th>
                                        <th>PNR_NO</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($flight as $flights)
                                        <tr>

                                            <td>{{$flights->id}}</td>

                                            <td>
                                                <div class="img-responsive img-rounded">
                                                    <img src="{{ url($flights->image) }}"
                                                         style="height: 70px; width: 85px;" alt="cnic image not found"/>
                                                </div>
                                            </td>
                                            <td>{{$flights->title}}</td>

                                            <td>{{$flights->flight_to}}</td>
                                            <td>{{$flights->flight_from}}</td>
                                            <td>{{$flights->price}}</td>
                                            <td>{{$flights->flight_number}}</td>
                                            <td>{{$flights->aircraft}}</td>
                                            <td>{{$flights->airline}}</td>
                                            <td>{{$flights->flight_type}}</td>
                                            <td>{{$flights->take_off_time}}</td>
                                            <td>{{$flights->land_time}}</td>
                                            <td>{{$flights->way_of_flight}}</td>
                                            <td>{{$flights->total_stops}}</td>
                                            <td>{{$flights->date_of_flight}}</td>
                                            <td>{{$flights->duration}}</td>
                                            <td>{{$flights->seats_left}}</td>
                                            <td>{{$flights->adult_baggage}}</td>
                                            <td>{{$flights->adults}}</td>
                                            <td>{{$flights->childrens}}</td>
                                            <td>{{$flights->infants}}</td>
                                            <td>{{$flights->pnr_no}}</td>
                                            @if($flights->status==1)
                                                <td>Active</td>
                                            @else
                                                <td>Not-Active</td>
                                            @endif
                                            <td>{{$flights->created_at}} </td>
                                            <td><a href="{{route('edit.packages', $flights->id )}}"
                                                   class="btn btn-primary" style="color: white"><i
                                                        class="nav-icon i-Pen-2 font-weight-bold"></i>Edit</a>
                                                <a href="{{route('delete.packages', $flights->id )}}"
                                                   class="btn btn-danger" style="color: white"><i
                                                        class="nav-icon i-Pen-2 font-weight-bold"></i>Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>To</th>
                                        <th>From</th>
                                        <th>Price</th>
                                        <th>Flight Number</th>
                                        <th>Aircraft</th>
                                        <th>Airline</th>
                                        <th>Flight-Type</th>
                                        <th>Departure</th>
                                        <th>Arrival</th>
                                        <th>Way of flight</th>
                                        <th>Total Stops</th>
                                        <th>Flight Date</th>
                                        <th>Duration</th>
                                        <th>Seats Left</th>
                                        <th>Adult Baggage</th>
                                        <th>Adults</th>
                                        <th>Childrens</th>
                                        <th>Infants</th>
                                        <th>PNR_NO</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>


                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row">
            </div><!-- end row -->

        </div><!-- end container-fluid -->
    </div>
@endsection


