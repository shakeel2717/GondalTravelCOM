@extends('dashboard.admin')

@section('content')
    <div class="dashboard-bread dashboard--bread">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Contact Us</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{route('index')}}" class="text-white">Home</a></li>
                            <li>Contact Us</li>
                           
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
                                <h2 class="mb-4">Contact Us details</h2>

                                <a href="create_contactus">Add Record</a><br><br>
                                {{session('msg')}}

                                <table class="table table-bordered yajra-datatable">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>{{$about->id}}</td>
                                            <td>{{$about->address}}</td>
                                            <td>{{$about->phone}}</td>
                                            <td>{{$about->email}}</td>
                                             <td>{{$about->message}}</td>
                                             <th><a href="edit_contactus/{{$about->id}}"> Edit </a></th>
                                          



                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container-fluid -->
        </div>
        @endsection
       
