@extends('dashboard.admin')

@section('content')






    <div class="dashboard-bread dashboard--bread">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Ticket PNR-No: {{ $ticket->prn_no }}</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{ url('') }}" class="text-white">Home</a></li>
                            <li>Ticket</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div>
    </div>
    {{-- {{ dd($data) }} --}}
    <div class="dashboard-main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @if ($data['type'] == 'One Way')
                                                <div class="single-content-wrap padding-top-60px">
                                                    <div id="description" class="page-scroll">
                                                        <div class="single-content-item pb-4">
                                                            <h3 class="title font-size-26">{{ $data['from'][0] }} to
                                                                {{ $data['to'][count($data['to']) - 1] }}</h3>
                                                            <div class="d-flex align-items-center pt-2">
                                                                <p class="mr-2">{{ $data['type'] }} Flight</p>
                                                                <p>
                                                                    <span
                                                                        class="badge badge-warning text-white font-weight-medium font-size-16">{{ count($data['to']) - 1 }}
                                                                        Stop</span>
                                                                </p>
                                                            </div>

                                                            <div class="d-flex align-items-center pt-2">
                                                                <p class="mr-2">Total flight time: {{ $data['time'] }}</p>
                                                            </div>
                                                        </div><!-- end single-content-item -->
                                                        <div class="section-block"></div>
                                                        <div class="single-content-item py-4">
                                                            <div class="row">
                                                                @for ($i = 0; $i < (int) count($data['to']); $i++)
                                                                    <div class="col-lg-4 col-sm-4">
                                                                        <div class="single-feature-titles text-center mb-3">
                                                                            <i class="fas fa-plane-departure"></i>
                                                                            <h3
                                                                                class="title font-size-15 font-weight-medium">
                                                                                Flight Take off From
                                                                                {{ $data['from'][$i] }}</h3>
                                                                            <span
                                                                                class="font-size-13">{{ $data['fromDate'][$i] }}</span>
                                                                        </div>
                                                                    </div><!-- end col-lg-4 -->
                                                                    <div class="col-lg-4 col-sm-4">
                                                                        <div class="single-feature-titles text-center mb-3">
                                                                            <strong
                                                                                style="font-size: small;">Duration</strong><br>
                                                                            <i class="fas fa-circle"
                                                                                style="color: Red;"></i>
                                                                            <span
                                                                                class="font-size-13 mt-n2">{{ $data['itime'][$i] }}</span>
                                                                        </div>
                                                                    </div><!-- end col-lg-4 -->
                                                                    <div class="col-lg-4 col-sm-4">
                                                                        <div class="single-feature-titles text-center mb-3">
                                                                            <i class="fas fa-plane-arrival"></i>
                                                                            <h3
                                                                                class="title font-size-15 font-weight-medium">
                                                                                Flight Landing in {{ $data['to'][$i] }}
                                                                            </h3>
                                                                            <span
                                                                                class="font-size-13">{{ $data['toDate'][$i] }}</span>
                                                                        </div>
                                                                    </div><!-- end col-lg-4 -->
                                                                    <div class="col-lg-12">
                                                                        <div
                                                                            class="single-feature-titles border-bottom py-3 mb-4 row">
                                                                            <div class="col-lg-4 text-center">
                                                                                <h3
                                                                                    class="font-size-15  font-weight-medium">
                                                                                    Airline:<span
                                                                                        class="font-size-13 d-inline-block ml-1 text-gray">{{ $data['name'][$i] }}</span>
                                                                                </h3>
                                                                            </div>
                                                                            <div class="col-lg-4 text-center">
                                                                                <h3 class="font-size-15 font-weight-medium">
                                                                                    Flight number:<span
                                                                                        class="font-size-13 d-inline-block ml-1 text-gray">{{ $data['fnumber'][$i] }}</span>
                                                                                </h3>
                                                                            </div>
                                                                            <div class="col-lg-4 text-center">
                                                                                <h3
                                                                                    class="font-size-15  font-weight-medium">
                                                                                    Aircraft:<span
                                                                                        class="font-size-13 d-inline-block ml-1 text-gray">{{ $data['aircraft'][$i] }}</span>
                                                                                </h3>
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- end col-lg-12 -->
                                                                    <br>
                                                                @endfor
                                                            </div><!-- end row -->
                                                        </div><!-- end single-content-item -->
                                                        <div class="section-block"></div>
                                                    </div><!-- end description -->
                                                </div><!-- end single-content-wrap -->
                                            @endif
                                            @if ($data['type'] == 'Return')
                                                <div class="single-content-wrap padding-top-60px">
                                                    <div id="description" class="page-scroll">
                                                        <div class="single-content-item pb-4">
                                                            <h3 class="title font-size-26">{{ $data['bfrom'][0] }} to
                                                                {{ $data['bto'][count($data['bto']) - 1] }}</h3>
                                                            <div class="d-flex align-items-center pt-2">
                                                                <p class="mr-2">{{ $data['type'] }} Flight</p>
                                                                <p>
                                                                    <span
                                                                        class="badge badge-warning text-white font-weight-medium font-size-16">{{ count($data['bto']) - 1 }}
                                                                        Stop</span>
                                                                </p>
                                                            </div>
                                                        </div><!-- end single-content-item -->
                                                        <div class="section-block"></div>
                                                        <div class="single-content-item py-4">
                                                            <div class="row">
                                                                @for ($i = 0; $i < (int) count($data['bto']); $i++)
                                                                    <div class="col-lg-4 col-sm-4">
                                                                        <div class="single-feature-titles text-center mb-3">
                                                                            <i class="fas fa-plane-departure"></i>
                                                                            <h3
                                                                                class="title font-size-15 font-weight-medium">
                                                                                Flight Take off From
                                                                                {{ $data['bfrom'][$i] }}</h3>
                                                                            <span
                                                                                class="font-size-13">{{ $data['bfromDate'][$i] }}</span>
                                                                        </div>
                                                                    </div><!-- end col-lg-4 -->
                                                                    <div class="col-lg-4 col-sm-4">
                                                                        <div class="single-feature-titles text-center mb-3">
                                                                            <strong
                                                                                style="font-size: small;">Duration</strong><br>
                                                                            <i class="fas fa-circle"
                                                                                style="color: Red;"></i>
                                                                            <span
                                                                                class="font-size-13 mt-n2">{{ $data['bitime'][$i] }}</span>
                                                                        </div>
                                                                    </div><!-- end col-lg-4 -->
                                                                    <div class="col-lg-4 col-sm-4">
                                                                        <div class="single-feature-titles text-center mb-3">
                                                                            <i class="fas fa-plane-arrival"></i>
                                                                            <h3
                                                                                class="title font-size-15 font-weight-medium">
                                                                                Flight Landing in {{ $data['bto'][$i] }}
                                                                            </h3>
                                                                            <span
                                                                                class="font-size-13">{{ $data['btoDate'][$i] }}</span>
                                                                        </div>
                                                                    </div><!-- end col-lg-4 -->
                                                                    <div class="col-lg-12">
                                                                        <div
                                                                            class="single-feature-titles border-bottom py-3 mb-4 row">
                                                                            <div class="col-lg-4 text-center">
                                                                                <h3
                                                                                    class="font-size-15  font-weight-medium">
                                                                                    Airline:<span
                                                                                        class="font-size-13 d-inline-block ml-1 text-gray">{{ $data['bname'][$i] }}</span>
                                                                                </h3>
                                                                            </div>
                                                                            <div class="col-lg-4 text-center">
                                                                                <h3 class="font-size-15 font-weight-medium">
                                                                                    Flight number:<span
                                                                                        class="font-size-13 d-inline-block ml-1 text-gray">{{ $data['bfnumber'][$i] }}</span>
                                                                                </h3>
                                                                            </div>
                                                                            <div class="col-lg-4 text-center">
                                                                                <h3
                                                                                    class="font-size-15  font-weight-medium">
                                                                                    Aircraft:<span
                                                                                        class="font-size-13 d-inline-block ml-1 text-gray">{{ $data['baircraft'][$i] }}</span>
                                                                                </h3>
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- end col-lg-12 -->
                                                                    <br>
                                                                @endfor
                                                            </div><!-- end row -->
                                                        </div><!-- end single-content-item -->
                                                        <div class="section-block"></div>
                                                    </div><!-- end description -->
                                                </div><!-- end single-content-wrap -->
                                            @endif
                                            @if ($data['type'] == 'Multi Way')
                                                {{-- {{ dd($data) }} --}}
                                                @foreach ($data['flight'] as $flight)
                                                    <div class="single-content-wrap padding-top-60px">
                                                        <div id="description" class="page-scroll">
                                                            <div class="single-content-item pb-4">
                                                                <h3 class="title font-size-26">
                                                                    {{ $flight['startlocation'] }} to
                                                                    {{ $flight['endlocation'] }}</h3>
                                                                <div class="d-flex align-items-center pt-2">
                                                                    <p class="mr-2">{{ $data['type'] }} Flight</p>
                                                                    <p>
                                                                        <span
                                                                            class="badge badge-warning text-white font-weight-medium font-size-16">{{ $flight['stay'] }}
                                                                            Stop</span>
                                                                    </p>

                                                                </div>

                                                                <div class="d-flex align-items-center pt-2">
                                                                    <p class="mr-2">Total flight time:
                                                                        {{ $flight['time'] }}</p>
                                                                </div>
                                                            </div><!-- end single-content-item -->
                                                            <div class="section-block"></div>
                                                            <div class="single-content-item py-4">
                                                                <div class="row">
                                                                    @for ($i = 0; $i < (int) count($flight['to']); $i++)
                                                                        <div class="col-lg-4 col-sm-4">
                                                                            <div
                                                                                class="single-feature-titles text-center mb-3">
                                                                                <i class="fas fa-plane-departure"></i>
                                                                                <h3
                                                                                    class="title font-size-15 font-weight-medium">
                                                                                    Flight Take off From
                                                                                    {{ $flight['from'][$i] }}</h3>
                                                                                <span
                                                                                    class="font-size-13">{{ $flight['fromDate'][$i] }}</span>
                                                                            </div>
                                                                        </div><!-- end col-lg-4 -->
                                                                        <div class="col-lg-4 col-sm-4">
                                                                            <div
                                                                                class="single-feature-titles text-center mb-3">
                                                                                <strong
                                                                                    style="font-size: small;">Duration</strong><br>
                                                                                <i class="fas fa-circle"
                                                                                    style="color: Red;"></i>
                                                                                <span
                                                                                    class="font-size-13 mt-n2">{{ $flight['segmentDuration'][$i] }}</span>
                                                                            </div>
                                                                        </div><!-- end col-lg-4 -->
                                                                        <div class="col-lg-4 col-sm-4">
                                                                            <div
                                                                                class="single-feature-titles text-center mb-3">
                                                                                <i class="fas fa-plane-arrival"></i>
                                                                                <h3
                                                                                    class="title font-size-15 font-weight-medium">
                                                                                    Flight Landing in
                                                                                    {{ $flight['to'][$i] }}
                                                                                </h3>
                                                                                <span
                                                                                    class="font-size-13">{{ $flight['toDate'][$i] }}</span>
                                                                            </div>
                                                                        </div><!-- end col-lg-4 -->
                                                                        <div class="col-lg-12">
                                                                            <div
                                                                                class="single-feature-titles border-bottom py-3 mb-4 row">
                                                                                <div class="col-lg-4 text-center">
                                                                                    <h3
                                                                                        class="font-size-15  font-weight-medium">
                                                                                        Airline:<span
                                                                                            class="font-size-13 d-inline-block ml-1 text-gray">{{ $flight['name'][$i] }}</span>
                                                                                    </h3>
                                                                                </div>
                                                                                <div class="col-lg-4 text-center">
                                                                                    <h3
                                                                                        class="font-size-15 font-weight-medium">
                                                                                        Flight number:<span
                                                                                            class="font-size-13 d-inline-block ml-1 text-gray">{{ $flight['code'] }}-{{ $flight['number'] }}</span>
                                                                                    </h3>
                                                                                </div>
                                                                                <div class="col-lg-4 text-center">
                                                                                    <h3
                                                                                        class="font-size-15  font-weight-medium">
                                                                                        Aircraft:<span
                                                                                            class="font-size-13 d-inline-block ml-1 text-gray">{{ $flight['aircraft'][$i] }}</span>
                                                                                    </h3>
                                                                                </div>
                                                                            </div>
                                                                        </div><!-- end col-lg-12 -->
                                                                        <br>
                                                                    @endfor
                                                                </div><!-- end row -->
                                                            </div><!-- end single-content-item -->
                                                            <div class="section-block"></div>
                                                        </div><!-- end description -->
                                                    </div><!-- end single-content-wrap -->
                                                @endforeach
                                            @endif
                                        </div><!-- end col-lg-8 -->
                                    </div><!-- end row -->
                                </div><!-- end container -->
                            </div>
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-12 -->
                <div class="col-lg-4">
                    <div class="sidebar mb-0">
                        @if ($data['type'] != 'Multi Way')
                            <div class="sidebar-widget single-content-widget">
                                <div class="sidebar-widget-item">
                                    <div class="sidebar-book-title-wrap mb-3">
                                        <h3>Grand Total</h3>
                                        <p><span class="text-form">Price</span><span
                                                class="text-value ml-2 mr-1">€{{ $data['price'] }}</span></p>
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
                                                    <input class="form-control" type="text"
                                                        value="{{ $data['fromDate'][0] }}" readonly>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- end sidebar-widget-item -->
                                <div class="sidebar-widget-item">
                                    <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                        <label class="font-size-16">Adults <span>Age 18+</span></label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <p>{{ $data['adult'] }} X {{ $data['aprice'] }} =
                                                {{ $data['aprice'] * $data['adult'] }}</p>
                                        </div>
                                    </div><!-- end qty-box -->
                                    <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                        <label class="font-size-16">Children <span>2-12 years old</span></label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <p>{{ $data['child'] }} X {{ $data['cprice'] }} =
                                                {{ $data['cprice'] * $data['child'] }}</p>
                                        </div>
                                    </div><!-- end qty-box -->
                                    @if (isset($data['infant']))
                                        <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                            <label class="font-size-16">Infants <span>0-2 years old</span></label>
                                            <div class="qtyBtn d-flex align-items-center">
                                                <p>{{ $data['infant'] }} X {{ $data['iprice'] }} =
                                                    {{ $data['iprice'] * $data['infant'] }}</p>
                                            </div>
                                        </div><!-- end qty-box -->
                                    @endif



                                    @php
                                        $collectorrr = App\Models\CashCollector::where('prn_no', $ticket->prn_no)->first();
                                    @endphp

                                    @if ($collectorrr != null)
                                        <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                            <label class="font-size-16">Amount Collector <span></span></label>
                                            <div class="qtyBtn d-flex align-items-center">
                                                @php
                                                    $userrr = App\Models\User::where('id', $collectorrr->collector_id)->first()->name;
                                                @endphp
                                                <p>{{ $userrr }}</p>
                                            </div>
                                        </div><!-- end qty-box -->
                                    @endif




                                </div><!-- end sidebar-widget-item -->
                                </br>
                                <div>
                                    @if ($ticket->payment_status == '1' && $ticket->status != 'Booking Expired')
                                        <div class="input-box">
                                            <div>
                                                <img width="100%" src="{{ asset('images/paid.png') }}" alt="">
                                                <br>
                                            </div>
                                        </div>
                                    @elseif($ticket->payment_status == '0' && $ticket->status != 'Booking Expired')
                                        <div class="input-box">
                                            <div>
                                                <img width="100%" src="{{ asset('images/unpaid.jpg') }}"
                                                    alt="">
                                                <br>
                                            </div>
                                        </div>
                                    @else
                                        <div class="input-box">
                                            <div>
                                                <img width="100%" src="{{ asset('images/expired-01.png') }}"
                                                    alt="">
                                                <br>
                                            </div>
                                        </div>
                                    @endif
                                    <br>
                                    <a href="{{ route('Itinerary', $ticket->prn_no) }}"
                                        class="theme-btn text-center col-lg-12">View Ticket</a>
                                    </br>

                                    </br>





                                    </br>
                                    <a href="{{ route('Itinerary-download', $ticket->prn_no) }}"
                                        class="theme-btn text-center col-lg-12">Download Ticket</a>
                                    @if ($ticket->payment_status == '1')
                                        </br>
                                        </br>
                                        <a href="{{ route('invoice_pdff', $ticket->prn_no) }}"
                                            class="theme-btn text-center col-lg-12">Download Invoice</a>
                                    @endif
                                </div><!-- end col-lg-12 -->
                            </div><!-- end sidebar-widget -->
                        @endif
                        @if ($data['type'] == 'Multi Way')
                            <div class="sidebar-widget single-content-widget">
                                <div class="sidebar-widget-item">
                                    <div class="sidebar-book-title-wrap mb-3">
                                        <h3>Grand Total</h3>
                                        <p><span class="text-form">Price</span><span
                                                class="text-value ml-2 mr-1">€{{ $data['price'] }}</span></p>
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
                                                    {{-- {{ dd($data) }} --}}
                                                    <input class="form-control" type="text"
                                                        value="{{ $data['flight'][0]['fromDate'][0] }}" readonly>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- end sidebar-widget-item -->
                                <div class="sidebar-widget-item">
                                    <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                        <label class="font-size-16">Adults <span>Age 18+</span></label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <p>{{ $data['adult'] }} X {{ $data['aprice'] }} =
                                                {{ $data['aprice'] * $data['adult'] }}</p>
                                        </div>
                                    </div><!-- end qty-box -->
                                    <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                        <label class="font-size-16">Children <span>2-12 years old</span></label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <p>{{ $data['child'] }} X {{ $data['cprice'] }} =
                                                {{ $data['cprice'] * $data['child'] }}</p>
                                        </div>
                                    </div><!-- end qty-box -->
                                    @if (isset($data['infant']))
                                        <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                            <label class="font-size-16">Infants <span>0-2 years old</span></label>
                                            <div class="qtyBtn d-flex align-items-center">
                                                <p>{{ $data['infant'] }} X {{ $data['iprice'] }} =
                                                    {{ $data['iprice'] * $data['infant'] }}</p>
                                            </div>
                                        </div><!-- end qty-box -->
                                    @endif



                                    @php
                                        $collectorrr = App\Models\CashCollector::where('prn_no', $ticket->prn_no)->first();
                                    @endphp

                                    @if ($collectorrr != null)
                                        <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                            <label class="font-size-16">Amount Collector <span></span></label>
                                            <div class="qtyBtn d-flex align-items-center">
                                                @php
                                                    $userrr = App\Models\User::where('id', $collectorrr->collector_id)->first()->name;
                                                @endphp
                                                <p>{{ $userrr }}</p>
                                            </div>
                                        </div><!-- end qty-box -->
                                    @endif




                                </div><!-- end sidebar-widget-item -->
                                </br>
                                <div>
                                    @if ($ticket->payment_status == '1' && $ticket->status != 'Booking Expired')
                                        <div class="input-box">
                                            <div>
                                                <img width="100%" src="{{ asset('images/paid.png') }}" alt="">
                                                <br>
                                            </div>
                                        </div>
                                    @elseif($ticket->payment_status == '0' && $ticket->status != 'Booking Expired')
                                        <div class="input-box">
                                            <div>
                                                <img width="100%" src="{{ asset('images/unpaid.jpg') }}"
                                                    alt="">
                                                <br>
                                            </div>
                                        </div>
                                    @else
                                        <div class="input-box">
                                            <div>
                                                <img width="100%" src="{{ asset('images/expired-01.png') }}"
                                                    alt="">
                                                <br>
                                            </div>
                                        </div>
                                    @endif
                                    <br>
                                    <a href="{{ route('ItineraryMulti', $ticket->prn_no) }}"
                                        class="theme-btn text-center col-lg-12">View Ticket</a>
                                    </br>

                                    </br>





                                    </br>
                                    <a href="{{ route('Itinerary-download-multi', $ticket->prn_no) }}"
                                        class="theme-btn text-center col-lg-12">Download Ticket</a>
                                    @if ($ticket->payment_status == '1')
                                        </br>
                                        </br>
                                        <a href="{{ route('invoice_pdff', $ticket->prn_no) }}"
                                            class="theme-btn text-center col-lg-12">Download Invoice</a>
                                    @endif
                                </div><!-- end col-lg-12 -->
                            </div><!-- end sidebar-widget -->
                        @endif
                        <br>
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div>
    <br><br>
    <div class="dashboard-main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="title">Passenger Lists</h3>
                                </div>
                            </div>
                        </div>
                        <div class="form-content">
                            <div class="table-form table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Contact Number</th>
                                            <th scope="col">Age Type</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Date of Birth</th>
                                            <th scope="col">ID Name</th>
                                            <th scope="col">ID Number</th>
                                            <th scope="col">ID Expiry</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($passengers as $passenger)
                                            <tr>
                                                <th scope="row">
                                                    <div class="table-content">
                                                        <h3 class="title">{{ $passenger->name }}
                                                            {{ $passenger->surname }}</h3>
                                                    </div>
                                                </th>
                                                <td>{{ $passenger->email }}</td>
                                                <td>{{ $passenger->contact_no }}</td>
                                                <td>{{ $passenger->age }}</td>
                                                <td>{{ $passenger->gender }}</td>
                                                <td>{{ $passenger->dob }}</td>
                                                <td>{{ $passenger->pidname }}</td>
                                                <td>{{ $passenger->pidno }}</td>
                                                <td>{{ $passenger->pied }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div>
    <script>
        var publishable_key =
            'pk_test_51IeGmOKiAX2uoKP0J4UEIL9CHl2Qjk5ts5Q5QYqhURftZ0LGCrR2begOYOX7cse4akYJQwoUw4WjaxUqD76VKnYf00uIiY9MIr';
    </script>
    <script src="{{ asset('/js/card.js') }}"></script>






@endsection
