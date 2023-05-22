@extends('main.app')

@section('content')

@if(isset($data))
<section class="breadcrumb-area bread-bg-6 py-0">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-btn">
                        <a class="d-none" data-fancybox="gallery" data-src="images/destination-img2.jpg" data-caption="Showing image - 02" data-speed="700"></a>
                        <a class="d-none" data-fancybox="gallery" data-src="images/destination-img3.jpg" data-caption="Showing image - 03" data-speed="700"></a>
                        <a class="d-none" data-fancybox="gallery" data-src="images/destination-img4.jpg" data-caption="Showing image - 04" data-speed="700"></a>
                    </div><!-- end breadcrumb-btn -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section>

<!-- ================================
        START TOUR DETAIL AREA
    ================================= -->
<section class="tour-detail-area padding-bottom-90px">
    <div class="single-content-navbar-wrap menu section-bg" id="single-content-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content-nav" id="single-content-nav">
                        <ul>

                            <li><a data-scroll="description" href="#" class="scroll-link active">Flight Details</a></li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end single-content-navbar-wrap -->


    <div class="single-content-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content-wrap padding-top-60px">
                        <div id="description" class="page-scroll">
                            <div class="single-content-item pb-4">
                                <h3 class="title font-size-26">{{$data['from'][0]}} to {{$data['to'][count($data['to'])-1]}}</h3>
                                <div class="d-flex align-items-center pt-2">
                                    <p class="mr-2">{{$data['type']}} Flight</p>
                                    <p>
                                        <span class="badge badge-warning text-white font-weight-medium font-size-16">{{count($data['to'])-1}} Stop</span>
                                    </p>
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                            <div class="single-content-item py-4">
                                <div class="row">
                                    @for ($i = 0; $i < (int)count($data['to']); $i++) <div class="col-lg-4 col-sm-4">
                                        <div class="single-feature-titles text-center mb-3">
                                            <i class="fas fa-plane-departure"></i>
                                            <h3 class="title font-size-15 font-weight-medium">Flight Take off From
                                                {{$data['from'][$i]}}
                                            </h3>
                                            <span class="font-size-13">{{ \Carbon\Carbon::parse($data['fromDate'][$i])->format('l j, Y H:i:s') }}</span>
                                        </div>
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 col-sm-4">
                                    <div class="single-feature-titles text-center mb-3">
                                        <strong style="font-size: small;">Duration</strong><br>
                                        <i class="fas fa-circle" style="color: Red;"></i>

                                        @php
                                        $tim = ltrim($data['itime'][$i],'P');
                                        $tim2 = ltrim($tim,'T');
                                        $tt = trim(strrev(chunk_split(strrev($tim2),3, ' ')));

                                        @endphp


                                        <span class="font-size-13 mt-n2">{{$tt}}</span>
                                    </div>
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 col-sm-4">
                                    <div class="single-feature-titles text-center mb-3">
                                        <i class="fas fa-plane-arrival"></i>
                                        <h3 class="title font-size-15 font-weight-medium">Flight Landing in {{$data['to'][$i]}}</h3>
                                        <span class="font-size-13">{{ \Carbon\Carbon::parse($data['toDate'][$i])->format('l j, Y H:i:s') }}</span>
                                    </div>
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-12">
                                    <div class="single-feature-titles border-bottom py-3 mb-4 row">
                                        <div class="col-lg-4 text-center">
                                            <h3 class="font-size-15  font-weight-medium">Airline:<span class="font-size-13 d-inline-block ml-1 text-gray">{{$data['name'][$i]}}</span></h3>
                                        </div>
                                        <div class="col-lg-4 text-center">
                                            <h3 class="font-size-15 font-weight-medium">Flight number:<span class="font-size-13 d-inline-block ml-1 text-gray">{{$data['fnumber'][$i]}}</span></h3>
                                        </div>
                                        <div class="col-lg-4 text-center">
                                            <h3 class="font-size-15  font-weight-medium">Aircraft:<span class="font-size-13 d-inline-block ml-1 text-gray">{{$data['aircraft'][$i]}}</span></h3>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <br>
                                @endfor @php
                                $timm = ltrim($data['time'],'P');
                                $timm2 = ltrim($timm,'T');
                                $ttt = trim(strrev(chunk_split(strrev($timm2),3, ' ')));

                                @endphp
                                <div class="col-lg-12">
                                    <div class="single-feature-titles text-center border-top border-bottom py-3 mb-4">
                                        <h3 class="title font-size-15 font-weight-medium">Total flight time:<span class="font-size-13 d-inline-block ml-1 text-gray">{{ $ttt }}</span></h3>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="single-tour-feature d-flex align-items-center mb-3">
                                        <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                            <i class="fas fa-plane"></i>
                                        </div>
                                        <div class="single-feature-titles">
                                            <h3 class="title font-size-15 font-weight-medium">Flight Type</h3>
                                            <span class="font-size-13">{{$data['class']}}</span>
                                        </div>
                                    </div><!-- end single-tour-feature -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="single-tour-feature d-flex align-items-center mb-3">
                                        <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                            <i class="fas fa-chair"></i>
                                        </div>
                                        <div class="single-feature-titles">
                                            <h3 class="title font-size-15 font-weight-medium">Seats Left</h3>
                                            <span class="font-size-13">{{$data['seats']}} Seats</span>
                                        </div>
                                    </div><!-- end single-tour-feature -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 responsive-column">
                                    <div class="single-tour-feature d-flex align-items-center mb-3">
                                        <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                            <i class="fas fa-suitcase-rolling"></i>
                                        </div>
                                        <div class="single-feature-titles">
                                            <h3 class="title font-size-15 font-weight-medium">Adult Baggage</h3>
                                            <span class="font-size-13">{{$data['weight']}}</span>
                                        </div>
                                    </div><!-- end single-tour-feature -->
                                </div><!-- end col-lg-4 -->
                            </div><!-- end row -->
                        </div><!-- end single-content-item -->
                        <div class="section-block"></div>
                    </div><!-- end description -->
                </div><!-- end single-content-wrap -->
                @if($data['type'] == 'Return')
                <div class="single-content-wrap padding-top-60px">
                    <div id="description" class="page-scroll">
                        <div class="single-content-item pb-4">
                            <h3 class="title font-size-26">{{$data['bfrom'][0]}} to {{$data['bto'][count($data['bto'])-1]}}</h3>
                            <div class="d-flex align-items-center pt-2">
                                <p class="mr-2">{{$data['type']}} Flight</p>
                                <p>
                                    <span class="badge badge-warning text-white font-weight-medium font-size-16">{{count($data['bto'])-1}} Stop</span>
                                </p>
                            </div>
                        </div><!-- end single-content-item -->
                        <div class="section-block"></div>
                        <div class="single-content-item py-4">
                            <div class="row">
                                @for ($i = 0; $i < (int)count($data['bto']); $i++) <div class="col-lg-4 col-sm-4">
                                    <div class="single-feature-titles text-center mb-3">
                                        <i class="fas fa-plane-departure"></i>
                                        <h3 class="title font-size-15 font-weight-medium">Flight Take off From
                                            {{$data['bfrom'][$i]}}
                                        </h3>
                                        <span class="font-size-13">{{ \Carbon\Carbon::parse($data['bfromDate'][$i])->format('l j, Y H:i:s') }}</span>
                                    </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 col-sm-4">
                                <div class="single-feature-titles text-center mb-3">
                                    <strong style="font-size: small;">Duration</strong><br>
                                    <i class="fas fa-circle" style="color: Red;"></i>
                                    <span class="font-size-13 mt-n2">{{$data['bitime'][$i]}}</span>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 col-sm-4">
                                <div class="single-feature-titles text-center mb-3">
                                    <i class="fas fa-plane-arrival"></i>
                                    <h3 class="title font-size-15 font-weight-medium">Flight Landing in {{$data['bto'][$i]}}</h3>
                                    <span class="font-size-13">{{$data['btoDate'][$i]}}</span>
                                </div>
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-12">
                                <div class="single-feature-titles border-bottom py-3 mb-4 row">
                                    <div class="col-lg-4 text-center">
                                        <h3 class="font-size-15  font-weight-medium">Airline:<span class="font-size-13 d-inline-block ml-1 text-gray">{{$data['bname'][$i]}}</span></h3>
                                    </div>
                                    <div class="col-lg-4 text-center">
                                        <h3 class="font-size-15 font-weight-medium">Flight number:<span class="font-size-13 d-inline-block ml-1 text-gray">{{$data['bfnumber'][$i]}}</span></h3>
                                    </div>
                                    <div class="col-lg-4 text-center">
                                        <h3 class="font-size-15  font-weight-medium">Aircraft:<span class="font-size-13 d-inline-block ml-1 text-gray">{{$data['baircraft'][$i]}}</span></h3>
                                    </div>
                                </div>
                            </div><!-- end col-lg-12 -->
                            <br>
                            @endfor

                            <div class="col-lg-4 responsive-column">
                                <div class="single-tour-feature d-flex align-items-center mb-3">
                                    <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                        <i class="fas fa-plane"></i>
                                    </div>
                                    <div class="single-feature-titles">
                                        <h3 class="title font-size-15 font-weight-medium">Flight Type</h3>
                                        <span class="font-size-13">{{$data['class']}}</span>
                                    </div>
                                </div><!-- end single-tour-feature -->
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 responsive-column">
                                <div class="single-tour-feature d-flex align-items-center mb-3">
                                    <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                        <i class="fas fa-chair"></i>
                                    </div>
                                    <div class="single-feature-titles">
                                        <h3 class="title font-size-15 font-weight-medium">Seats Left</h3>
                                        <span class="font-size-13">{{$data['seats']}} Seats</span>
                                    </div>
                                </div><!-- end single-tour-feature -->
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 responsive-column">
                                <div class="single-tour-feature d-flex align-items-center mb-3">
                                    <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                        <i class="fas fa-suitcase-rolling"></i>
                                    </div>
                                    <div class="single-feature-titles">
                                        <h3 class="title font-size-15 font-weight-medium">Adult Baggage</h3>
                                        <span class="font-size-13">{{$data['weight']}}</span>
                                    </div>
                                </div><!-- end single-tour-feature -->
                            </div><!-- end col-lg-4 -->
                        </div><!-- end row -->
                    </div><!-- end single-content-item -->
                    <div class="section-block"></div>
                </div><!-- end description -->
            </div><!-- end single-content-wrap -->
            @endif
        </div><!-- end col-lg-8 -->
        <div class="col-lg-4">
            <div class="sidebar single-content-sidebar mb-0">
                <div class="sidebar-widget single-content-widget">
                    <div class="sidebar-widget-item">
                        <div class="sidebar-book-title-wrap mb-3">
                            <h3>Grand Total</h3>
                            <p><span class="text-form">Price: </span><span class="text-value ml-2 mr-1" id="grand_total">€{{$data['price']}}</span>
                                <span class="before-price" style="display:none;" id="hidden_grand_total">{{$data['price']}}</span>
                            </p>
                        </div>
                        <div class="sidebar-book-title-wrap mb-3">
                            <p><span class="text-form">Margin: </span><span class="text-value ml-2 mr-1" id="margin_total">...</span></p>
                        </div>
                    </div><!-- end sidebar-widget-item -->
                    <div class="sidebar-widget-item">
                        <div class="contact-form-action">
                            <form action="#">
                                <div class="input-box">
                                    <label class="label-text">
                                        <h5>Date</h5>
                                    </label>
                                    <div class="form-group">
                                        <i class="fas fa-calendar-week form-icon"></i>
                                        <input class="form-control" type="text" value="{{ \Carbon\Carbon::parse($data['fromDate'][0])->format('l j, Y H:i:s') }}" readonly>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- end sidebar-widget-item -->
                    <div class="sidebar-widget-item">
                        <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                            <label class="font-size-16">Adults <span>Age 18+</span></label>
                            <div class="qtyBtn d-flex align-items-center">
                                <p>{{$data['adult']}} X {{$data['aprice']}} = {{$data['aprice'] * $data['adult']}}</p>
                            </div>
                        </div><!-- end qty-box -->
                        <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                            <label class="font-size-16">Children <span>2-12 years old</span></label>
                            <div class="qtyBtn d-flex align-items-center">
                                <p>{{$data['child']}} X {{$data['cprice']}} = {{$data['cprice'] * $data['child']}}</p>
                            </div>
                        </div><!-- end qty-box -->
                        <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                            <label class="font-size-16">Infants <span>0-2 years old</span></label>
                            <div class="qtyBtn d-flex align-items-center">
                                @if(isset($data['infant']))
                                <p>{{$data['infant']}} X {{$data['iprice']}} = {{$data['iprice'] * $data['infant']}}</p>
                                @endif
                            </div>
                        </div><!-- end qty-box -->
                    </div><!-- end sidebar-widget-item -->
                    <form action="{{route('book-flight')}}" method='post'>
                        @csrf
                        <div class="input-box">
                            <label class="font-size-16">Collector Service Charges <span></span></label>
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="number" name="service_charges" value="" id="service_charges" oninput="validity.valid||(value='');">
                                </div>
                            </div>
                        </div>
                        <div class="clear-div"></div>
                        <div class="input-box">
                            <label class="font-size-16">Select Payment Method <span></span></label>
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" value="cash" id="cashLabel" checked>
                                    <i class="fas fa-money-bill-alt"></i>
                                    <label class="form-check-label" for="cashLabel">
                                        Pay by Cash
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" value="card" id="cardLabel">
                                    <i class="fas fa-money-bill-alt"></i>
                                    <label class="form-check-label" for="cardLabel">
                                        Pay by Card
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" value="bank" id="BankLabel">
                                    <i class="fas fa-money-bill-alt"></i>
                                    <label class="form-check-label" for="BankLabel">
                                        Bank Transfer
                                    </label>
                                </div>

                                <!--<div class="form-check">-->
                                <!--    <input class="form-check-input" type="radio" name="payment_method"-->
                                <!--           value="card" id="flexRadioDefault2" checked>-->
                                <!--    <i class="fas fa-credit-card"></i>-->
                                <!--    <label class="form-check-label" for="flexRadioDefault2">-->
                                <!--        Pay by Card-->
                                <!--    </label>-->
                                <!--</div>-->
                                <br>
                            </div>
                        </div>
                        <div class="btn-box pt-2">
                            <input type="hidden" name="data" value="{{json_encode($data)}}">
                            <input type="hidden" name="orgdata" value="{{$orgdata}}">
                            <div class="btn-box text-center">
                                <button type="submit" class="theme-btn theme-btn-small w-100"><i class="fas fa-shopping-cart"></i> Book Now</button>
                            </div>
                        </div>
                    </form>
                </div><!-- end sidebar-widget -->
            </div><!-- end sidebar -->
        </div><!-- end col-lg-4 -->
    </div><!-- end row -->
    </div><!-- end container -->
    </div><!-- end single-content-box -->



</section><!-- end tour-detail-area -->
<!-- ================================
        END TOUR DETAIL AREA
    ================================= -->

@elseif(isset($flight))

<section class="breadcrumb-area bread-bg-6 py-0">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-btn">
                        <a class="d-none" data-fancybox="gallery" data-src="images/destination-img2.jpg" data-caption="Showing image - 02" data-speed="700"></a>
                        <a class="d-none" data-fancybox="gallery" data-src="images/destination-img3.jpg" data-caption="Showing image - 03" data-speed="700"></a>
                        <a class="d-none" data-fancybox="gallery" data-src="images/destination-img4.jpg" data-caption="Showing image - 04" data-speed="700"></a>
                    </div><!-- end breadcrumb-btn -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section>

<!-- ================================
        START TOUR DETAIL AREA
    ================================= -->
<section class="tour-detail-area padding-bottom-90px">
    <div class="single-content-navbar-wrap menu section-bg" id="single-content-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content-nav" id="single-content-nav">
                        <ul>
                            <li><a data-scroll="description" href="#" class="scroll-link active">Flight Details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end single-content-navbar-wrap -->


    <div class="single-content-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content-wrap padding-top-60px">
                        <div id="description" class="page-scroll">
                            <div class="single-content-item pb-4">
                                <h3 class="title font-size-26">{{$flight->title}}</h3>
                                <div class="d-flex align-items-center pt-2">
                                    <p class="mr-2"> {{$flight->way_of_flight}}</p>
                                    <p>
                                        <span class="badge badge-warning text-white font-weight-medium font-size-16"> {{$flight->total_stops}}Stop</span>
                                    </p>
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                            <div class="single-content-item py-4">
                                <div class="row">

                                    <div class="col-lg-4 col-sm-4">
                                        <div class="single-feature-titles text-center mb-3">
                                            <i class="fas fa-plane-departure"></i>
                                            <h3 class="title font-size-15 font-weight-medium">Flight Take off From {{$flight->flight_from}}
                                            </h3>


                                            <span class="font-size-13">{{$flight->date_of_flight}} {{$flight->take_off_time}} </span>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="single-feature-titles text-center mb-3">
                                            <strong style="font-size: small;">Duration</strong><br>
                                            <i class="fas fa-circle" style="color: Red;"></i>
                                            <span class="font-size-13 mt-n2">{{$flight->duration}}</span>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="single-feature-titles text-center mb-3">
                                            <i class="fas fa-plane-arrival"></i>
                                            <h3 class="title font-size-15 font-weight-medium">Flight Landing in {{$flight->flight_to}}</h3>
                                            <span class="font-size-13">{{$flight->date_of_flight}} {{$flight->land_time}}</span>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-12">
                                        <div class="single-feature-titles border-bottom py-3 mb-4 row">
                                            <div class="col-lg-4 text-center">
                                                <h3 class="font-size-15  font-weight-medium">Airline:<span class="font-size-13 d-inline-block ml-1 text-gray"></span>{{$flight->airline}}</h3>
                                            </div>
                                            <div class="col-lg-4 text-center">
                                                <h3 class="font-size-15 font-weight-medium">Flight number:<span class="font-size-13 d-inline-block ml-1 text-gray"></span>{{$flight->flight_number}}</h3>
                                            </div>
                                            <div class="col-lg-4 text-center">
                                                <h3 class="font-size-15  font-weight-medium">Aircraft:<span class="font-size-13 d-inline-block ml-1 text-gray"></span>{{$flight->aircraft}}</h3>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                    <br>

                                    <div class="col-lg-12">
                                        <div class="single-feature-titles text-center border-top border-bottom py-3 mb-4">
                                            <h3 class="title font-size-15 font-weight-medium">Total flight time:<span class="font-size-13 d-inline-block ml-1 text-gray"></span>{{$flight->duration}}</h3>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="fas fa-plane"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Flight Type</h3>
                                                <span class="font-size-13">{{$flight->flight_type}}</span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="fas fa-chair"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Seats Left</h3>
                                                <span class="font-size-13"> {{$flight->seats_left}}</span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="fas fa-suitcase-rolling"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Adult Baggage</h3>
                                                <span class="font-size-13">{{$flight->adult_baggage}}</span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                </div><!-- end row -->
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end description -->
                    </div><!-- end single-content-wrap -->



                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar single-content-sidebar mb-0">
                        <div class="sidebar-widget single-content-widget">
                            <div class="sidebar-widget-item">
                                <div class="sidebar-book-title-wrap mb-3">
                                    <h3>Grand Total</h3>
                                    <p><span class="text-form">Price</span><span class="text-value ml-2 mr-1">{{$flight->price}}</span> <span class="before-price">{{$flight->price}}</span></p>
                                </div>
                            </div><!-- end sidebar-widget-item -->
                            <div class="sidebar-widget-item">
                                <div class="contact-form-action">
                                    <form action="#">
                                        <div class="input-box">
                                            <label class="label-text">
                                                <h5>Date</h5>
                                            </label>
                                            <div class="form-group">
                                                <i class="fas fa-calendar-week form-icon"></i>
                                                <input class="form-control" type="text" value="{{$flight->date_of_flight}}" readonly>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- end sidebar-widget-item -->
                            <div class="sidebar-widget-item">
                                <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                    <label class="font-size-16">Adults <span>Age 18+</span></label>
                                    <div class="qtyBtn d-flex align-items-center">
                                        <p></p>
                                    </div>
                                </div><!-- end qty-box -->
                                <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                    <label class="font-size-16">Children <span>2-12 years old</span></label>
                                    <div class="qtyBtn d-flex align-items-center">
                                        <p></p>
                                    </div>
                                </div><!-- end qty-box -->
                                <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                    <label class="font-size-16">Infants <span>0-2 years old</span></label>
                                    <div class="qtyBtn d-flex align-items-center">
                                        <p></p>
                                    </div>
                                </div><!-- end qty-box -->
                            </div><!-- end sidebar-widget-item -->
                            <form action="{{route('book-flight2')}}" method='post'>
                                @csrf
                                <div class="input-box">
                                    <label class="font-size-16">Select Payment Method <span></span></label>
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment_method" value="cash" id="cashLabel" checked>
                                            <i class="fas fa-money-bill-alt"></i>
                                            <label class="form-check-label" for="cashLabel">
                                                Pay by Cash
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment_method" value="card" id="cardLabel">
                                            <i class="fas fa-money-bill-alt"></i>
                                            <label class="form-check-label" for="cardLabel">
                                                Pay by Card
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment_method" value="bank" id="BankLabel">
                                            <i class="fas fa-money-bill-alt"></i>
                                            <label class="form-check-label" for="BankLabel">
                                                Bank Transfer
                                            </label>
                                        </div>

                                        <!--<div class="form-check">-->
                                        <!--    <input class="form-check-input" type="radio" name="payment_method"-->
                                        <!--           value="card" id="flexRadioDefault2" checked>-->
                                        <!--    <i class="fas fa-credit-card"></i>-->
                                        <!--    <label class="form-check-label" for="flexRadioDefault2">-->
                                        <!--        Pay by Card-->
                                        <!--    </label>-->
                                        <!--</div>-->
                                        <br>
                                    </div>
                                </div>
                                <div class="btn-box pt-2">
                                    <input type="hidden" name="data" value="{{$flight->id}}">
                                    <div class="btn-box text-center">
                                        <button type="submit" class="theme-btn theme-btn-small w-100"><i class="fas fa-shopping-cart"></i> Book Now</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- end sidebar-widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end single-content-box -->



</section><!-- end tour-detail-area -->

@endif


@endsection