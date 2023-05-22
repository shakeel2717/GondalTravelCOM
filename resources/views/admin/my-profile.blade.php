@extends('dashboard.admin')

@section('content')
    <div class="dashboard-bread dashboard--bread">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">My Profile</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{route('index')}}" class="text-white">Home</a></li>
                            <li>My Profile</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">


            
            <div class="col-lg-12">
                <div class="form-box">
                    <div class="form-title-wrap border-bottom-0 pb-0">
                        <h3 class="title">Profile Information</h3>
                    </div>
                    <div class="form-content">
                        <div class="table-form table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="pl-0">
                                        <div class="table-content">
                                            <h3 class="title font-weight-medium">Full Name</h3>
                                        </div>
                                    </td>
                                    <td>:</td>
                                    <td>{{auth()->user()->name}}</td>
                                </tr>
                                <tr>
                                    <td class="pl-0">
                                        <div class="table-content">
                                            <h3 class="title font-weight-medium">Email Address</h3>
                                        </div>
                                    </td>
                                    <td>:</td>
                                    <td>{{auth()->user()->email}}</td>
                                </tr>
                                <tr>
                                    <td class="pl-0">
                                        <div class="table-content">
                                            <h3 class="title font-weight-medium">Phone Number</h3>
                                        </div>
                                    </td>
                                    <td>:</td>
                                    <td>{{auth()->user()->phone}}</td>
                                </tr>
                                <tr>
                                    <td class="pl-0">
                                        <div class="table-content">
                                            <h3 class="title font-weight-medium">Date of Birth</h3>
                                        </div>
                                    </td>
                                    <td>:</td>
                                    <td>03 Jun 1990</td>
                                </tr>
                                <tr>
                                    <td class="pl-0">
                                        <div class="table-content">
                                            <h3 class="title font-weight-medium">Address</h3>
                                        </div>
                                    </td>
                                    <td>:</td>
                                    <td>{{auth()->user()->address}}.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="section-block"></div>
                        <div class="btn-box mt-4">
                            <a href="{{route('profile.edit',auth()->user())}}" class="theme-btn">Edit Profile</a>
                        </div>
                    </div>
                </div><!-- end form-box -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div>
@endsection
