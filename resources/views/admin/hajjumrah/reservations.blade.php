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
                            <h2 class="sec__title font-size-30 text-white">All Reservations
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
                                     
                                     
                                        <th>Reservation ID</th>
                                         <th>Package</th>
                                        <th>Total Amount</th>
                                        <th>Amount Paid</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reservations as $res)
                                        <tr>
                                           
                                            <td>{{$res->id}}</td>
                                             <td>{{$res->flightpackage->title}}</td>
                                            <td>{{$res->total_amount}}</td>
                                            <td>{{$res->amount_paid}}</td>
                                            <td><a href="{{route('reservation_details',$res->id)}}"
                                                   class="btn btn-primary" style="color: white"><i
                                                        class="nav-icon i-Pen-2 font-weight-bold"></i>View Passenger details</a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                       <th>Reservation ID</th>
                                         <th>Package</th>
                                        <th>Total_amount</th>
                                        <th>Amount Paid</th>
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


