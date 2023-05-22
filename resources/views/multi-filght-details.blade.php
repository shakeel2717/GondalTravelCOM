@extends('main.app')

@section('content')
    <section class="breadcrumb-area bread-bg-6 py-0">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-btn">
                            <a class="d-none" data-fancybox="gallery" data-src="images/destination-img2.jpg"
                                data-caption="Showing image - 02" data-speed="700"></a>
                            <a class="d-none" data-fancybox="gallery" data-src="images/destination-img3.jpg"
                                data-caption="Showing image - 03" data-speed="700"></a>
                            <a class="d-none" data-fancybox="gallery" data-src="images/destination-img4.jpg"
                                data-caption="Showing image - 04" data-speed="700"></a>
                        </div><!-- end breadcrumb-btn -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumb-wrap -->
    </section>
    {{-- {{ dd($data) }} --}}
    {{-- {{ dd($orgdata) }} --}}
    {{-- {{ dd($orgdata[0]) }} --}}
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

                                <li><a data-scroll="description" href="#" class="scroll-link active">Flight
                                        Details</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end single-content-navbar-wrap -->
        {{-- @if (count($orgdata['itineraries']) != 0)
            @foreach ($orgdata['itineraries'] as $flights)
                @foreach ($flights['segments'] as $segments)
                    <table class="table table-bordered my-3">
                        <tbody>

                            <tr>
                                <td>
                                    {{ $segments['departure']['iataCode'] }}
                                    <---->

                                        {{ $segments['arrival']['iataCode'] }}
                                        <br>
                                        Stay:

                                </td>
                                <td>
                                    Price:
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endforeach
            @endforeach
        @endif --}}
        <div class="single-content-box">
            <div class="container">
                <div class="row">
                    {{-- {{ dd($orgdata['itineraries'][0]['segments'][0]['departure']['at']) }} --}}
                            <div class="col-lg-8">
                                <div class="single-content-wrap padding-top-60px">
                                    <div id="description" class="page-scroll">
                                        @if (count($orgdata['itineraries']) != 0)
                                        @foreach ($orgdata['itineraries'] as $flights)
                                        <div class="single-content-item pb-4">
                                            @php
                                               $firstE = reset($flights['segments']);
                                                $lastE = end($flights['segments']);
                                            @endphp
                                            <h3 class="title font-size-26">{{ $firstE['departure']['iataCode'] ?? '' }} to
                                                {{ $lastE['arrival']['iataCode'] ?? '' }}</h3>
                                            <div class="d-flex align-items-center pt-2">
                                                <p class="mr-2">{{ $data['type'] }} Flight</p>
                                                <p>
                                                    <span
                                                        class="badge badge-warning text-white font-weight-medium font-size-16">{{count($flights['segments'] )-1 }}
                                                        Stop</span>
                                                </p>
                                            </div>
                                        </div><!-- end single-content-item -->
                                        <div class="section-block"></div>
                                        <div class="single-content-item py-4">
                                            <div class="row">
                                                @foreach ($flights['segments'] as $segments)
                                                    <div class="col-lg-4 col-sm-4">
                                                        <div class="single-feature-titles text-center mb-3">
                                                            <i class="fas fa-plane-departure"></i>
                                                            <h3 class="title font-size-15 font-weight-medium">Flight Take
                                                                off From
                                                                {{ $segments['departure']['iataCode'] }}</h3>
                                                            <span class="font-size-13">{{ $segments['departure']['at'] }}</span>
                                                        </div>
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4 col-sm-4">
                                                        <div class="single-feature-titles text-center mb-3">
                                                            <strong style="font-size: small;">Duration</strong><br>
                                                            <i class="fas fa-circle" style="color: Red;"></i>


                                                            @php
                                                            $tim = ltrim($segments['duration'],'P');
                                                            $tim2 = ltrim($tim,'T');
                                                            $ttt =  trim(strrev(chunk_split(strrev($tim2),3, ' ')));

                                                            @endphp
                                                            <span class="font-size-13 mt-n2">{{ $ttt }}</span>
                                                        </div>
                                                    </div><!-- end col-lg-4 -->
                                                    <div class="col-lg-4 col-sm-4">
                                                        <div class="single-feature-titles text-center mb-3">
                                                            <i class="fas fa-plane-arrival"></i>
                                                            <h3 class="title font-size-15 font-weight-medium">Flight Landing
                                                                in {{ $segments['arrival']['iataCode'] }}</h3>
                                                            <span class="font-size-13">{{ $segments['arrival']['at'] }}</span>
                                                        </div>
                                                    </div><!-- end col-lg-4 -->
                                                @endforeach
                                            </div><!-- end row -->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="single-feature-titles border-bottom py-3 mb-4 row">
                                                        <div class="col-lg-4 text-center">
                                                            <h3 class="font-size-15  font-weight-medium">Airline:<span
                                                                    class="font-size-13 d-inline-block ml-1 text-gray">{{$airline[$segments['carrierCode']] }}</span>
                                                            </h3>
                                                        </div>
                                                        <div class="col-lg-4 text-center">
                                                            <h3 class="font-size-15 font-weight-medium">Flight number:<span
                                                                    class="font-size-13 d-inline-block ml-1 text-gray">{{ $segments['carrierCode'] }}-{{ $segments['number'] }}</span>
                                                            </h3>
                                                        </div>
                                                        <div class="col-lg-4 text-center">
                                                            <h3 class="font-size-15  font-weight-medium">Aircraft:<span
                                                                    class="font-size-13 d-inline-block ml-1 text-gray">{{ $aircraft[$segments['aircraft']['code']]}}</span>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                                <br>
                                                <div class="col-lg-12">
                                                    <div
                                                    class="single-feature-titles text-center border-top border-bottom py-3 mb-4">
                                                    @php
                                                    $tim = ltrim($flights['duration'],'P');
                                                    $tim2 = ltrim($tim,'T');
                                                    $tt =  trim(strrev(chunk_split(strrev($tim2),3, ' ')));

                                                    @endphp
                                                    <h3 class="title font-size-15 font-weight-medium">Total flight
                                                        time:<span
                                                            class="font-size-13 d-inline-block ml-1 text-gray">{{$tt}}</span>
                                                    </h3>
                                                </div>

                                                </div><!-- end col-lg-12 -->

                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4 responsive-column">
                                                    <div class="single-tour-feature d-flex align-items-center mb-3">
                                                        <div
                                                            class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                            <i class="fas fa-plane"></i>
                                                        </div>
                                                        {{-- {{ dd($orgdata['travelerPricings'][0]['fareDetailsBySegment'][0]['cabin']) }} --}}
                                                        <div class="single-feature-titles">
                                                            <h3 class="title font-size-15 font-weight-medium">Flight Type
                                                            </h3>
                                                            <span class="font-size-13">{{ $data['cabin'] }}</span>
                                                        </div>
                                                    </div><!-- end single-tour-feature -->
                                                </div><!-- end col-lg-4 -->
                                                <div class="col-lg-4 responsive-column">
                                                    <div class="single-tour-feature d-flex align-items-center mb-3">
                                                        <div
                                                            class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                            <i class="fas fa-chair"></i>
                                                        </div>
                                                        <div class="single-feature-titles">
                                                            <h3 class="title font-size-15 font-weight-medium">Seats Left
                                                            </h3>
                                                            <span class="font-size-13">{{ $orgdata['numberOfBookableSeats'] }} Seats</span>
                                                        </div>
                                                    </div><!-- end single-tour-feature -->
                                                </div><!-- end col-lg-4 -->
                                                <div class="col-lg-4 responsive-column">
                                                    <div class="single-tour-feature d-flex align-items-center mb-3">
                                                        <div
                                                            class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                            <i class="fas fa-suitcase-rolling"></i>
                                                        </div>
                                                        <div class="single-feature-titles">
                                                            <h3 class="title font-size-15 font-weight-medium">Adult Baggage
                                                            </h3>
                                                            <span class="font-size-13">{{ $data['bags'] }}</span>
                                                        </div>
                                                    </div><!-- end single-tour-feature -->
                                                </div>
                                            </div>
                                        </div><!-- end single-content-item -->
                                        @endforeach
                                        @endif
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
                                        <p><span class="text-form">Price</span><span class="text-value ml-2 mr-1"
                                                id="grand_total">€{{ $orgdata['price']['grandTotal'] }}</span>
                                            <span class="before-price" style="display:none;"
                                                id="hidden_grand_total">{{ $orgdata['price']['grandTotal'] }}</span>
                                        </p>
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
                                                    <input class="form-control" type="text" value="{{ $orgdata['itineraries'][0]['segments'][0]['departure']['at'] }}" readonly>
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
                                <form action="{{ route('book-multi-flight') }}" method='post'>
                                    @csrf
                                    <div class="input-box">
                                        <label class="font-size-16">Collector Service Charges <span></span></label>
                                        <div>
                                            <div class="form-check">

                                                <input class="form-check-input" type="text" pattern="\d+"
                                                    name="service_charges" value="" id="service_charges"
                                                    oninput="validity.valid||(value='');">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear-div"></div>
                                    <div class="input-box">
                                        <label class="font-size-16">Select Payment Method <span></span></label>
                                        <div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method_multi"
                                                    value="cash" id="flexRadioDefault2" checked>
                                                <i class="fas fa-money-bill-alt"></i>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Pay by Cash
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
                                        <input type="hidden" name="data" value="{{json_encode($data)}}" >
                                        <input type="hidden" name="orgdata" value="{{json_encode($orgdata)}}" >
                                        <div class="btn-box text-center">
                                            <button type="submit" class="theme-btn theme-btn-small w-100"><i
                                                    class="fas fa-shopping-cart"></i> Book Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- end sidebar-widget -->
                        </div><!-- end sidebar -->
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end single-content-box -->



    </section><!-- end tour-detail-area -->
    <!-- ================================
                END TOUR DETAIL AREA
            ================================= -->
@endsection
