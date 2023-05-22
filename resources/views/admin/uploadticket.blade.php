@extends('dashboard.admin')

@section('content')
<div class="dashboard-bread dashboard--bread">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="breadcrumb-content">
                    <div class="section-heading">
                        <h2 class="sec__title font-size-30 text-white">My Booking</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="breadcrumb-list text-right">
                    <ul class="list-items">
                        <li><a href="{{route('index')}}" class="text-white">Home</a></li>
                        <li>Upload Ticket </li>
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
                        <div class="container mt-5">
                            <h2 class="mb-4">Booking History</h2>
                            <table class="table table-bordered yajra-datatable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>PNR NO.</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($ticket as $tickets)
                                    <tr>
                                        <td>{{$tickets->id}}</td>
                                        <td>{{$tickets->prn_no}}</td>
                                        <td>{{$tickets->status}}</td>
                                        <td>
                                            <a href="{{route('uploadticketview',['id'=>$tickets->id,'id2'=>$tickets->prn_no])}}" class="btn btn-raised btn-raised-primary m-1" style="color: blue">
                                            <i class="nav-icon i-Pen-2 font-weight-bold"></i>Edit Flight Details</a>
                                            <a href="{{route('changedates',['id'=>$tickets->id,'id2'=>$tickets->prn_no])}}" class="btn btn-raised btn-raised-primary m-1" style="color: blue">
                                            <i class="nav-icon i-Pen-2 font-weight-bold"></i>Change Flight Dates</a>
                                            <a href="{{route('cancel-pnr',['id'=>$tickets->id,'pnr'=>$tickets->prn_no])}}" class="btn btn-raised btn-raised-primary m-1" style="color: blue">
                                            <i class="nav-icon i-Pen-2 font-weight-bold"></i>Cancel Booking </a>          
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div>
@endsection
       
