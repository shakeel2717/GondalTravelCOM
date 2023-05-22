<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <title>Gtravel Flight Itinerary - $ticket->prn_no</title>
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts
    ======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900'
        type='text/css'>

    <!-- Stylesheet
    ======================= -->
    <!--<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">-->
    <link href="{{ asset('vendor/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}" />

    <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.4.1/css/bootstrap.min.css" />


    <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.4.1/js/bootstrap.min.js" />
</head>

<body>



    <!-- Container -->
    <div class="container-fluid itinerary-container">
        <!-- Header -->
        <header>
            <div class="row align-items-center">
                <div class="col-sm-2 text-center text-sm-left mb-3 mb-sm-0">
                    <a href="{{ url('') }}"><img src="{{ asset('images/logo.png') }}"
                            style="height: 100px; width: 100px; padding: 10px" alt="logo"></a>
                </div>

                <div class="col-sm-5">
                    <p>
                        <center><strong>Gondal Travels</strong></center> <br>
                        <center></center> <i class="fas fa-phone-alt"></i> +33 7 67 77 59 22</center><br>
                        <center></center><i class="fas fa-envelope"></i> infosupport@gondaltravel.com</center><br>
                    </p>
                </div>

                @php
                    $coll_cash = App\Models\CashCollector::where('prn_no', $ticket->prn_no)->first();
                @endphp

                @if ($coll_cash != null)
                    <center>
                        <h1>Flight/GDS PNR: {{ $ticket->prn_no }}</h1>
                    </center>
                @else
                    <center>
                        <h1>Flight Reservation # : {{ $ticket->prn_no }}</h1>
                    </center>
                @endif

            </div>





            <hr class="my-4">
        </header>
        <!-- Header End -->

        <!-- Main Content -->
        <main>
            <div>
                <h5>Passengers Lists:</h5>
            </div>
            <div class="row">
                <?php $count = 1; ?>
                @foreach ($passengers as $pass)
                    <div class="col-sm-1">
                        <strong class="font-weight-600">No.</strong>
                        <p>{{ $count++ }}</p>
                    </div>
                    <div class="col-sm-7">
                        <strong class="font-weight-600">Full Name:</strong>
                        <p>{{ $pass->name }} {{ $pass->surname }}</p>
                    </div>
                    <div class="col-sm-4">
                        <strong class="font-weight-600">Age Type:</strong>
                        <p>{{ $pass->age }}</p>
                    </div>
                @endforeach
            </div>




            <div class="card">
                <div class="card-header">
                    @foreach ($data['flight'] as $flight)

                        <div class="row align-items-center trip-title">
                            <div class="col-5 col-md-auto text-center text-md-left">
                                <h5 class="m-0">{{ $flight['startlocation'] }}</h5>
                            </div>
                            <div class="col-2 col-md-auto text-8 text-black-50 text-center trip-arrow">➝</div>
                            <div class="col-5 col-md-auto text-center text-md-left">
                                <h5 class="m-0">{{ $flight['endlocation'] }}</h5>
                            </div>
                            <div class="col-12 col-md-auto text-3 text-dark text-center mt-2 mt-md-0 ml-md-auto">{{ $flight['startDate'] }}
                                ,{{ $flight['startTime'] }}-{{ $flight['endTime'] }}</div>
                        </div>
                    @endforeach
                </div>
                {{-- {{ dd($data) }} --}}
                <div class="card-body">
                    @foreach ($data['flight'] as $flight)
                    @for ($i = 0; $i < (int) count($flight['to']); $i++)
                        <div class="row">
                            <div class="col-12 col-sm-4 text-center company-info">
                                <span class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">
                                    Flight Take off From:
                                </span>
                                <span class="text-muted d-block">
                                    {{ $flight['from'][$i] }}
                                </span>
                            </div>
                            <div class="col-12 col-sm-4 text-center company-info">
                                <span class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">
                                    Duration:
                                </span>
                                @php
                                $t = ltrim($flight['segmentDuration'][$i],'P');
                                $tt = ltrim(  $t,'T');
                                $ttt =  trim(strrev(chunk_split(strrev($tt),3, ' ')));

                                @endphp

                                <span class="text-muted d-block">

                                 {{$ttt}}
                                </span>
                            </div>
                            <div class="col-12 col-sm-4 text-center company-info">
                                <span class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">
                                    Flight Landing in:
                                </span>
                                <span class="text-muted d-block">
                                    {{ $flight['to'][$i] }}
                                </span>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-12 col-sm-4 text-center company-info"> <span
                                    class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">Flight:</span> <span
                                    class="text-muted d-block">{{ $flight['code'] }}-{{ $flight['number'] }}</span></div>
                                    {{-- {{ dd($flight) }} --}}
                            <div class="col-12 col-sm-4 text-center time-info mt-3 mt-sm-0"> <span
                                    class="text-5 font-weight-500 text-dark">Departure</span> <span
                                    class="text-muted d-block">{{date('d-M-Y ', strtotime($flight['fromDate'][$i]))}}->{{date('H:i ', strtotime($flight['fromDate'][$i]))}}</span>
                            </div>
                            <div class="col-12 col-sm-4 text-center time-info mt-3 mt-sm-0"> <span
                                    class="text-5 font-weight-500 text-dark">Arrival</span> <span
                                    class="text-muted d-block">{{date('d-M-Y ', strtotime($flight['toDate'][$i]))}}->{{date('H:i ', strtotime($flight['fromDate'][$i]))}}</span>
                            </div>

                        </div>
                        <hr>
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-4 text-center  d-flex justify-content-center time-info mt-3 mt-sm-0 "> <strong class="font-weight-600">Aircraft Info: </strong><br>
                                <span class="text-muted d-block">{{ $flight['aircraft'][$i]}}</span>
                            </div>
                        </div>
                        <hr>

                        <hr>
                        @endfor
                        @endforeach
                        <div class="row">
                            <div class="col-sm-4"><strong class="font-weight-600">Class of Service:</strong>
                                <p>{{ $data['cabin'] }}</p>
                            </div>

                            <div class="col-sm-4"> <strong class="font-weight-600">Flight Type:</strong><br>
                                <p>{{ $data['type'] }}</p>
                            </div>

                            @php
                                $coll_cash = App\Models\CashCollector::where('prn_no', $ticket->prn_no)->first();
                            @endphp

                            @if ($coll_cash != null)
                                <div class="col-sm-4"> <strong class="font-weight-600">Collector Name:</strong><br>
                                    <p>{{ $collectorr->name }}</p>
                                </div>
                                <div class="col-sm-4"> <strong class="font-weight-600">Collector Phone:</strong><br>
                                    <p>{{ $collectorr->phone }}</p>
                                </div>
                            @endif
                        </div>
                        <hr class="mt-1">

                </div>
            </div>

            <!--<div class="card">-->
            <!--    <div class="card-header">-->
            <!--        <div class="row align-items-center trip-title">-->
            <!--            <div class="col-5 col-md-auto text-center text-md-left">-->
            <!--                <h5 class="m-0">knknk</h5>-->
            <!--            </div>-->
            <!--            <div class="col-2 col-md-auto text-8 text-black-50 text-center trip-arrow">➝</div>-->
            <!--            <div class="col-5 col-md-auto text-center text-md-left">-->
            <!--                <h5 class="m-0">knkn</h5>-->
            <!--            </div>-->
            <!--            <div class="col-12 col-md-auto text-3 text-dark text-center mt-2 mt-md-0 ml-md-auto">knkn</div>-->
            <!--        </div>-->
            <!--    </div>-->

            <!--</div>-->


        </main>
        <!-- Main Content End -->

        <!-- Footer -->
        <footer class="text-center mt-3">

            <hr>
            <p class="text-1"><strong>NOTE :</strong> This document is not valid for travel and its just invoice that we
                have recived your request and will issue an orignal Ticket with in 2 hours</p>
            @if ($pdf)
                <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()"
                        class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a>
                </div>
            @endif
        </footer>
        <!-- Footer End -->
    </div>
    <!-- Container End -->
    @if ($pdf)
        <!-- Back to My Account Link -->
        <p class="text-center d-print-none"><a href="{{ route('index') }}">&laquo; Home</a></p>
    @endif
</body>

</html>
