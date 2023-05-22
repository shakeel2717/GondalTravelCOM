@extends('dashboard.app')

@section('content')
    <div class="dashboard-bread">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Hi, {{auth()->user()->name}} Welcome
                                Back</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{route('index')}}" class="text-white">Home</a></li>
                            <li>User Dashboard</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
            <div class="row mt-4">
                <div class="col-lg-12 responsive-column-m">
                    <div class="icon-box icon-layout-2 dashboard-icon-box">
                        <div class="d-flex">
                            <div class="info-icon icon-element flex-shrink-0">
                                <i class="fa fa-plane"></i>
                            </div><!-- end info-icon-->
                            <div class="info-content">
                                <p class="info__desc">Total Booking</p>
                                <h4 class="info__title">{{$book}}</h4>
                            </div><!-- end info-content -->
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div>
    </div><!-- end dashboard-bread -->
    <div class="dashboard-main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="title">Flight Deals</h3>

                            </div>
                        </div>
                        <div class="form-content pb-2">
                            <div class="card-item card-item-list card-item--list">
                                <div class="card-img">
                                    <img src="{{asset('/images/img1.jpg')}}" alt="hotel-img">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <h3 class="card-title">Hotel Malte – Astotel</h3>
                                        <span class="badge badge-warning text-white ml-2">Pending</span>
                                    </div>
                                    <ul class="list-items list-items-2 pt-2 pb-3">
                                        <li><span>Start date:</span>12 December 2019</li>
                                        <li><span>End date:</span>12 Jun 2020</li>
                                        <li><span>Booking details:</span> 3 People</li>
                                        <li><span>Client:</span> David Martin</li>
                                    </ul>
                                    <div class="btn-box">
                                        <a href="#" class="theme-btn theme-btn-small theme-btn-transparent" data-toggle="modal" data-target="#modalPopup"><i class="la la-envelope mr-1"></i>Send Message</a>
                                    </div>
                                </div>
                                <div class="action-btns">
                                    <a href="#" class="theme-btn theme-btn-small mr-2"><i class="la la-check-circle mr-1"></i>Approve</a>
                                    <a href="#" class="theme-btn theme-btn-small"><i class="la la-times mr-1"></i>Cancel</a>
                                </div>
                            </div><!-- end card-item -->
                        </div>
                    </div><!-- end form-box -->
                    <div class="form-content">
                        @include('partials.alerts')
                    </div>
                </div><!-- end form-box -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->

    </div><!-- end container-fluid -->
    </div><!-- end dashboard-main-content -->
@endsection
