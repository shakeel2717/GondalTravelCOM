@extends('dashboard.admin')

@section('content')
<div class="dashboard-content-wrap">
    <div class="dashboard-bread dashboard-bread-2">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Dashboard</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{ route('index') }}" class="text-white"><i class="fa fa-plane mr-2"></i>Home</a></li>
                            <li>Dashboard</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
            <div class="row mt-4">
                <div class="col-lg-3 responsive-column-l">
                    <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                        <div class="d-flex pb-3 justify-content-between">
                            <div class="info-content">
                                <p class="info__desc">Total Booking!</p>
                                <h4 class="info__title">{{\App\Models\Ticket::all()->count()}}</h4>
                            </div><!-- end info-content -->
                            <div class="info-icon icon-element bg-4">
                                <i class="fa fa-shopping-cart"></i>
                            </div><!-- end info-icon-->
                        </div>
                        <div class="section-block"></div>
                        <a href="admin-dashboard-booking.html" class="d-flex align-items-center justify-content-between view-all">View All <i class="fa fa-angle-right"></i></a>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column-l">
                    <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                        <div class="d-flex pb-3 justify-content-between">
                            <div class="info-content">
                                <p class="info__desc">New Users!</p>
                                <h4 class="info__title">{{\App\Models\User::all()->count()}}</h4>
                            </div><!-- end info-content -->
                            <div class="info-icon icon-element bg-3">
                                <i class="fa fa-user"></i>
                            </div><!-- end info-icon-->
                        </div>
                        <div class="section-block"></div>
                        <a href="{{route('users.index')}}" class="d-flex align-items-center justify-content-between view-all">View All <i class="fa fa-angle-right"></i></a>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column-l">
                    <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                        <div class="d-flex pb-3 justify-content-between">
                            <div class="info-content">
                                <p class="info__desc">Total Collectors</p>
                                <h4 class="info__title">{{\App\Models\User::role('collector')->count()}}</h4>
                            </div><!-- end info-content -->
                            <div class="info-icon icon-element bg-2">
                                <i class="fa fa-envelope"></i>
                            </div><!-- end info-icon-->
                        </div>
                        <div class="section-block"></div>
                        <a href="{{route('collectors')}}" class="d-flex align-items-center justify-content-between view-all">View All <i class="fa fa-angle-right"></i></a>
                    </div>
                </div><!-- end col-lg-3 -->


                <div class="col-lg-3 responsive-column-l">
                    <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                        <div class="d-flex pb-3 justify-content-between">
                            <div class="info-content">
                                <p class="info__desc">Total Cash Of Collectors</p>
                                <h4 class="info__title">
                                    @php
                                    echo $totalcashadmin_given_to_collectors = DB::table('admin_collections')->sum('amount');
                                    @endphp</h4>
                            </div><!-- end info-content -->
                            <div class="info-icon icon-element bg-2">
                                <i class="fa fa-envelope"></i>
                            </div><!-- end info-icon-->
                        </div>
                        <div class="section-block"></div>
                        <a href="{{route('collectors_accounts')}}" class="d-flex align-items-center justify-content-between view-all">View All <i class="fa fa-angle-right"></i></a>
                    </div>
                </div><!-- end col-lg-3 -->


                <div class="col-lg-3 responsive-column-l">
                    <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                        <div class="d-flex pb-3 justify-content-between">
                            <div class="info-content">
                                <p class="info__desc">Total Flights</p>
                                <h4 class="info__title">{{\App\Models\Flight::orderBy('id','DESC')->count()}}</h4>
                            </div><!-- end info-content -->
                            <div class="info-icon icon-element bg-1">
                                <i class="fa fa-plane"></i>
                            </div><!-- end info-icon-->
                        </div>
                        <div class="section-block"></div>
                        <a href="{{route('flights.index')}}" class="d-flex align-items-center justify-content-between view-all">View All <i class="fa fa-angle-right"></i></a>
                    </div>
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div>
    </div><!-- end dashboard-bread -->
</div><!-- end dashboard-content-wrap -->
@endsection