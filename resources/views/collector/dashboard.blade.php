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
                            <li>Collector Dashboard</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
            <div class="row mt-4">
                <div class="col-lg-4 responsive-column-m">
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
                <div class="col-lg-4 responsive-column-m">
                    <div class="icon-box icon-layout-2 dashboard-icon-box">
                        <div class="d-flex">
                            <div class="info-icon icon-element bg-3 flex-shrink-0">
                                <i class="fa fa-shopping-cart"></i>
                            </div><!-- end info-icon-->
                            <div class="info-content">
                                <p class="info__desc">
                                    Total Cash Received</p>
                                <h4 class="info__title">€
                                     {{$cash}}</h4>
                            </div><!-- end info-content -->
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-4 responsive-column-m">
                    <div class="icon-box icon-layout-2 dashboard-icon-box">
                        <div class="d-flex">
                            <div class="info-icon icon-element bg-3 flex-shrink-0">
                                <i class="fa fa-money-bill-alt"></i>
                            </div><!-- end info-icon-->
                            <div class="info-content">
                                <p class="info__desc">
                                    Total Cash Due</p>
                                    @if(isset($due->remaining_amount))
                                <h4 class="info__title">€
                                     {{$due->remaining_amount}}</h4>
                                     @endif
                            </div><!-- end info-content -->
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-4 responsive-column-m">
                    <div class="icon-box icon-layout-2 dashboard-icon-box">
                        <div class="d-flex">
                            <div class="info-icon icon-element bg-3 flex-shrink-0">
                                <i class="fa fa-check"></i>
                            </div><!-- end info-icon-->
                            <div class="info-content">
                                <p class="info__desc">
                                    Total Amount Paid</p>
                                    @if(isset($due->paidamount))
                                <h4 class="info__title">€
                                    {{$due->paidamount}}</h4>
                                    @endif
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
                                <form method="Post" action="{{route('collector-search')}}" class="form-inline">
 @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('message') }}</p>
@endif
                                    <div class="form-group mx-sm-3 mb-2">
                                        @csrf
                                        <label for="inputPassword2" class="sr-only">Enter PRN-NO</label>
                                        <input type="text" name="prn_no" class="form-control"
                                               placeholder="Enter PRN-NO">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Search Tickets</button>
                                </form>
                            </div>
                        </div>
                        <div class="form-content">
                            @include('partials.alerts')
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->

        </div><!-- end container-fluid -->
    </div><!-- end dashboard-main-content -->
@endsection
