<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('images/favicon.png')}}">
    <title>Gtravel Flight Itinerary - $ticket->prn_no</title>
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts
    ======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

    <!-- Stylesheet
    ======================= -->
    <!--<link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">-->
    <link href="{{asset('vendor/font-awesome/css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/stylesheet.css')}}" />
    
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
                <a href="{{url('')}}"><img src="{{asset('images/logo.png')}}"  style="height: 100px; width: 100px; padding: 10px" alt="logo"></a>
            </div>
            <div class="col-sm-5">
                <p>
                    <strong>Gondal Travels</strong><br>
                    <i class="fas fa-phone-alt"></i> +33 7 67 77 59 22<br>
                    <i class="fas fa-envelope"></i> infosupport@gondal.com<br>
                </p>
            </div>
            <div class="col-sm-5 text-center">
                <h4 class="text-7 mb-0">Flight Itinerary</h4>
                <h4 class="text-7 mb-0">PNR No: {{$ticket->prn_no}}</h4>
            </div>
        </div>
        
        
         
        
        
        <hr class="my-4">
    </header>
    <!-- Header End -->

    <!-- Main Content -->
    <main>
        <div>
            <h5>Passengers List:ss</h5>
        </div>
        <div class="row">
            <?php $count = 1; ?>
            @foreach($passengers as $pass)
                <div class="col-sm-1">
                    <strong class="font-weight-600">No.</strong>
                    <p>{{$count++}}</p>
                </div>
                <div class="col-sm-7">
                    <strong class="font-weight-600">Full Name:</strong>
                    <p>{{$pass->name}} {{$pass->surname}}</p>
                </div>
                <div class="col-sm-4">
                    <strong class="font-weight-600">Age Type:</strong>
                    <p>{{$pass->age}}</p>
                </div>
            @endforeach
        </div>



        <div class="card">
            <div class="card-header">
                <div class="row align-items-center trip-title">
                    <div class="col-5 col-md-auto text-center text-md-left">
                        <h5 class="m-0">{{$data['flight_from']}}</h5>
                    </div>
                    <div class="col-2 col-md-auto text-8 text-black-50 text-center trip-arrow">➝</div>
                    <div class="col-5 col-md-auto text-center text-md-left">
                        <h5 class="m-0">{{$data['flight_to']}}</h5>
                    </div>
                    <div class="col-12 col-md-auto text-3 text-dark text-center mt-2 mt-md-0 ml-md-auto">{{$data['date_of_flight']}},{{$data['take_off_time']}}-{{$data['land_time']}}</div>
                </div>
            </div>
            <div class="card-body">
              
                    <div class="row">
                        <div class="col-12 col-sm-4 text-center company-info">
                            <span class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">
                                Flight Take off From:
                            </span>
                            <span class="text-muted d-block">
                              {{$data['flight_from']}}
                            </span>
                        </div>
                        <div class="col-12 col-sm-4 text-center company-info">
                            <span class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">
                                Duration:
                            </span>
                            <span class="text-muted d-block">
                             {{$data['duration']}}
                            </span>
                        </div>
                        <div class="col-12 col-sm-4 text-center company-info">
                            <span class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">
                                Flight Landing in:
                            </span>
                            <span class="text-muted d-block">
                              {{$data['flight_to']}}
                            </span>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-12 col-sm-4 text-center company-info"> <span class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">Flight:</span> <span class="text-muted d-block">{{$data['flight_number']}}</span></div>
                        <div class="col-12 col-sm-4 text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">Departure</span> <span class="text-muted d-block">{{$data['date_of_flight']}}->{{$data['take_off_time']}}</span> </div>
                        <div class="col-12 col-sm-4 text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">Arrival</span> <span class="text-muted d-block">{{$data['date_of_flight']}}->{{$data['land_time']}}</span> </div>
                    </div>
                    <hr>
                    <hr>
              
                <hr>
                <div class="row">
                    <div class="col-sm-4"><strong class="font-weight-600">Class of Service:</strong>
                        <p>{{$data['flight_type']}}</p>
                    </div>

                    <div class="col-sm-4"> <strong class="font-weight-600">Flight Type:</strong><br>
                        <p>{{$data['way_of_flight']}}</p>
                    </div>

                    <div class="col-sm-4"> <strong class="font-weight-600">Aircraft Info:</strong><br>
                        <p>{{$data['aircraft']}}</p>
                    </div>
 @php
 $coll_cash = App\Models\CashCollector::where('prn_no',$ticket->prn_no)->first();
@endphp

@if($coll_cash!=null)
                      <div class="col-sm-4"> <strong class="font-weight-600">Collector Name:</strong><br>
                        <p>{{$collectorr->name}}</p>
                    </div>
                    <div class="col-sm-4"> <strong class="font-weight-600">Collector Phone:</strong><br>
                        <p>{{$collectorr->phone}}</p>
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
        <p class="text-1"><strong>NOTE :</strong> This document is not valid for travel and its just invoice that we have recived your request and will issue an orignal Ticket with in 2 hours</p>
        @if(isset($pdf))
            <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a></div>
        @endif
    </footer>
    <!-- Footer End -->
</div>
<!-- Container End -->
@if(isset($pdf))
    <!-- Back to My Account Link -->
    <p class="text-center d-print-none"><a href="{{route('index')}}">&laquo; Home</a></p>
@endif
</body>
</html>
