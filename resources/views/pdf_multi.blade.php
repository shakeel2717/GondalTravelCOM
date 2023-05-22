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


    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



    <style>
        .invoice {
            position: relative;
            background: silver;
            border: 8px solid #f4f4f4;
            padding: 20px;
            margin: 10px 25px;
        }

        .page-header {
            margin: 10px 0 20px 0;
            font-size: 22px;
        }



        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 10px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url(dimension.png);
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
            ;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>

    @php
        $coll_cash = App\Models\CashCollector::where('prn_no', $ticket->prn_no)->first();
    @endphp



    <header class="clearfix">
        <div id="logo">
            <h1>Gondal Travel</h1>
            <h2>
                <b>Confirmation de réservation</b><br>
            </h2>
            @if ($coll_cash != null)
                <h3 style="padding-left:530px;">Flight/GDS PNR: {{ $ticket->prn_no }}</h3>
            @else
                <h3 style="padding-left:530px;">Flight Reservation # : {{ $ticket->prn_no }}</h3>
            @endif
        </div>
        <h2>Ticket Information</h2>
        <div id="company" class="clearfix">
            <div>Company Name</div>
            <div>455 Foggy Heights,<br /> AZ 85004, US</div>
            <div>(602) 519-0450</div>
            <div><a href="mailto:company@example.com">company@example.com</a></div>
        </div>
        <?php $count = 1; ?>
        @foreach ($passengers as $pass)
            <div id="project">
                <div><span>Passenger #</span> {{ $count++ }}</div>
                <div><span>Full Name</span> {{ $pass->name }} {{ $pass->surname }}</div>
                <div><span>Adult Type</span> {{ $pass->age }}</div>
                <div><span>Email</span> {{ $pass->email }}</div>

            </div>
        @endforeach
    </header>

    <center>

        <table>
            <thead>
                <tr>
                    <th class="service">CLASS OF SERVICE</th>
                    <th class="desc">FLIGHT TYPE</th>
                    <th>AIRCRAFT INFO</th>
                    <th>FLIGHT NAME</th>

                </tr>
            </thead>
            <tbody>
                {{-- {{ dd($data) }} --}}
                @foreach ($data['flight'] as $flight)
                <tr>

                    <td class="service">{{ $data['cabin'] }}</td>
                    <td class="desc">{{ $data['type'] }} Flight</td>
                    <td class="unit">{{ $flight['aircraft'][0] }}</td>
                    <td class="unit">{{ $flight['name'][0] }}</td>

                </tr>
                @endforeach





            </tbody>
        </table>

    </center>

    <h2><b>Flight Information</b></h2>


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
                    <span class="text-muted d-block">
                        @php
                            $t = ltrim($flight['segmentDuration'][$i], 'P');
                            $tt = ltrim($t, 'T');
                            $ttt = trim(strrev(chunk_split(strrev($tt), 3, ' ')));

                        @endphp

                        {{ $ttt }}
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


            <div class="row">
                <div class="col-12 col-sm-4 text-center company-info"> <span
                        class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">Flight:</span> <span
                        class="text-muted d-block">{{ $flight['code'] }}-{{ $flight['number'] }}</span></div>
                <div class="col-12 col-sm-4 text-center time-info mt-3 mt-sm-0"> <span
                        class="text-5 font-weight-500 text-dark">Departure</span> <span
                        class="text-muted d-block">{{ date('d-M-Y H:i', strtotime($flight['fromDate'][$i])) }}</span>
                </div>
                <div class="col-12 col-sm-4 text-center time-info mt-3 mt-sm-0"> <span
                        class="text-5 font-weight-500 text-dark">Arrival</span> <span
                        class="text-muted d-block">{{ date('d-M-Y H:i', strtotime($flight['toDate'][$i])) }}</span>
                </div>
            </div>
            <hr>
        @endfor
        @endforeach
        <main>


            @php
                $coll_cash = App\Models\CashCollector::where('prn_no', $ticket->prn_no)->first();
            @endphp

            <!--collector ka code gondal notpad-->

            @if ($coll_cash != null)
                <!--<center><h2> <strong> Invoice/Reciept Information </strong></h2></center>-->

                @php
                    $colname = App\Models\User::where('id', $coll_cash->collector_id)->first();
                @endphp




                </br>

                <div class="row">
                    <div class="col-sm-4"><strong class="font-weight-600">Collector Name:</strong>
                        <p>{{ $colname->name }}</p>
                    </div>

                    <div class="col-sm-4"> <strong class="font-weight-600">Collector Phone :</strong><br>
                        <p>{{ $colname->phone }}</p>
                    </div>

                    <!--<div class="col-sm-4"> <strong class="font-weight-600">Pnr #:</strong><br>-->
                    <!--    <p>{{ $coll_cash->prn_no }}</p>-->
                    <!--</div>-->
                </div>
            @endif
            <!--collector ka code gondal notpad-->



            <center>
                <h4><strong>Terms & Conditions</strong></h4>
            </center>
            <p style="font-size:6px;"> 1) Please read the following terms and conditions.Check-in counters open 3 hours
                prior to departure off flight and close 1 hour prior to departure of flight ,you may be denied boarding
                if you fail to
                report on time.</p>
            <p style="font-size:6px;">2) Please Re-check the passenger name(s) as per the passport/identity proof,
                departure, arrival date, time, flight number, terminal, baggage details etc.</p>
            <p style="font-size:6px;">3) In case of International travel, please check your requirements for travel
                documentation like validPassport/visa/Ok to Board/travel and medical insurance with the airline and
                relevant Embassy
                orConsulate before commencing your journey.</p>
            <p style="font-size:6px;">4) The local authorities in certain countries may impose additional taxes (VAT,
                tourist tax etc.), which generally has to be paid locally.</p>
            <p style="font-size:6px;">5) We are not responsible for any schedule change/flight cancellation by the
                airline before and after issuance of the tickets.</p>
            <p style="font-size:6px;">6) We will not be held responsible for any loss or damage to traveler’s and
                his/her belongings due to any accident, theft or other Mishap / Unforeseen circumstances. </p>
            </br>

            <center>
                <h4><b>Bon Voyage!</b></h4>
            </center>
            <table>
                <thead>
                    <tr>


                        <th>hello@gondaltravel.com</th>
                        <th>www.gondaltravel.com</th>
                        <th>0033950379906</th>


                    </tr>
                </thead>
            </table>
        </main>





        <!-- Footer End -->
    </div>
    <!-- Container End -->




</body>

</html>
