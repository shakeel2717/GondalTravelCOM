<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <title>Gtravel Flight Itinerary -</title>
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
            margin-bottom: 13px;
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




    <!-- Container End -->

    <!-- Back to My Account Link -->
    <!--<p class="text-center d-print-none"><a href="{{ route('index') }}">&laquo; Home</a></p>-->






    @php
        $coll_cash = App\Models\CashCollector::where('prn_no', $ticket->prn_no)->first();
    @endphp





    <header class="clearfix">
        <div id="logo">
            <h1>Gondal Travel</h1>
            <h2> <i class="fas fa-phone-alt"></i> <b>Facture/Invoice</b><br>
                <i class="fas fa-envelope"></i> -<br>
            </h2>
            @if ($coll_cash != null)
                <h3 style="padding-left:530px;">Date: {{ $ticket->created_at }}</h3>
                <h3 style="padding-left:530px;">FACTURE: 10001800</h3>
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
                <div><span>Email</span> malikahfaz123@gmail.com</div>

            </div>
        @endforeach
    </header>

    <center>

        <table>
            <thead>
                <tr>
                    <th class="service">Collector:</th>
                    <th class="desc">Total de la facture </th>

                    <th>Airline</th>
                    <th>Pnr #</th>


                </tr>
            </thead>
            <tbody>

                <tr>
                    <td class="service">Name : {{ $username->name }} </br> Phone : {{ $username->phone }}</br>Email :
                        {{ $username->email }} </td>
                    <td class="desc"> {{ $invoice->collected_cash }}</td>
                    @if ($data['type'] == 'Multi Way')
                    <td class="desc">
                        @foreach ($data['flight'] as $flight)
                            {{ $flight['name'][0] }}<br>
                        @endforeach
                    </td>
                    @else
                        <td class="desc"> {{ $data['name'][0] }}</td>
                    @endif

                    <td class="unit">{{ $id }}</td>


                </tr>






            </tbody>
        </table>

    </center>

    <h2><b>Flight Information</b></h2>


    <div class="card-body">
        @if ($data['type'] == 'One Way')
            @for ($i = 0; $i < (int) count($data['to']); $i++)
                <div class="row">
                    <div class="col-12 col-sm-4 text-center company-info">
                        <span class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">
                            Flight Take off From:
                        </span>
                        <span class="text-muted d-block">
                            {{ $data['from'][$i] }}
                        </span>
                    </div>
                    <div class="col-12 col-sm-4 text-center company-info">
                        <span class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">
                            Duration:
                        </span>
                        <span class="text-muted d-block">
                            @php
                                $timeiyaa = ltrim($data['itime'][$i], 'P');
                                $timeiyatwo = ltrim($timeiyaa, 'T');
                                $t2 = trim(strrev(chunk_split(strrev($timeiyatwo), 3, ' ')));

                            @endphp
                            {{ $t2 }}
                        </span>
                    </div>
                    <div class="col-12 col-sm-4 text-center company-info">
                        <span class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">
                            Flight Landing in:
                        </span>
                        <span class="text-muted d-block">
                            {{ $data['to'][$i] }}
                        </span>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-12 col-sm-4 text-center company-info"> <span
                            class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">Flight:</span> <span
                            class="text-muted d-block">{{ $data['fnumber'][$i] }}</span></div>
                    <div class="col-12 col-sm-4 text-center time-info mt-3 mt-sm-0"> <span
                            class="text-5 font-weight-500 text-dark">Departure</span> <span
                            class="text-muted d-block">{{ date('d-M-Y H:m', strtotime($data['fromDate'][$i])) }}</span>
                    </div>
                    <div class="col-12 col-sm-4 text-center time-info mt-3 mt-sm-0"> <span
                            class="text-5 font-weight-500 text-dark">Arrival</span> <span
                            class="text-muted d-block">{{ date('d-M-Y H:m', strtotime($data['toDate'][$i])) }}</span>
                    </div>
                </div>
                {{-- {{ dd($data) }} --}}
            @endfor
        @endif
        <main>

            @if ($data['type'] == 'Return')
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center trip-title">
                            <div class="col-5 col-md-auto text-center text-md-left">
                                <h5 class="m-0">{{ $data['bfrom'][0] }}</h5>
                            </div>
                            <div class="col-2 col-md-auto text-8 text-black-50 text-center trip-arrow">➝</div>
                            <div class="col-5 col-md-auto text-center text-md-left">
                                <h5 class="m-0">{{ $data['bto'][count($data['bto']) - 1] }}</h5>
                            </div>
                            <div class="col-12 col-md-auto text-3 text-dark text-center mt-2 mt-md-0 ml-md-auto">
                                {{ date('d-M-Y H:m', strtotime($data['bfromDate'][0])) }}</div>
                        </div>
                    </div>
                    <div class="card-body">
                        @for ($i = 0; $i < (int) count($data['bto']); $i++)
                            <div class="row">
                                <div class="col-12 col-sm-4 text-center company-info">
                                    <span class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">
                                        Flight Take off From:
                                    </span>
                                    <span class="text-muted d-block">
                                        {{ $data['bfrom'][$i] }}
                                    </span>
                                </div>
                                <div class="col-12 col-sm-4 text-center company-info">
                                    <span class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">
                                        Duration:
                                    </span>
                                    <span class="text-muted d-block">
                                        @php
                                            $timei = ltrim($data['bitime'][$i], 'P');
                                            $timeitwo = ltrim($timei, 'T');
                                            $t_to = trim(strrev(chunk_split(strrev($timeitwo), 3, ' ')));

                                        @endphp
                                        {{ $t_to }}
                                    </span>
                                </div>
                                <div class="col-12 col-sm-4 text-center company-info">
                                    <span class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">
                                        Flight Landing in:
                                    </span>
                                    <span class="text-muted d-block">
                                        {{ $data['bto'][$i] }}
                                    </span>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-12 col-sm-4 text-center company-info"> <span
                                        class="text-4 font-weight-500 text-dark mt-1 mt-lg-0">Flight:</span> <span
                                        class="text-muted d-block">{{ $data['bfnumber'][$i] }}</span></div>
                                <div class="col-12 col-sm-4 text-center time-info mt-3 mt-sm-0"> <span
                                        class="text-5 font-weight-500 text-dark">Departure</span> <span
                                        class="text-muted d-block">{{ date('d-M-Y H:m', strtotime($data['bfromDate'][$i])) }}</span>
                                </div>
                                <div class="col-12 col-sm-4 text-center time-info mt-3 mt-sm-0"> <span
                                        class="text-5 font-weight-500 text-dark">Arrival</span> <span
                                        class="text-muted d-block">{{ date('d-M-Y H:m', strtotime($data['btoDate'][$i])) }}</span>
                                </div>
                            </div>
                            <hr>
                        @endfor
                        <hr>
                        <div class="row">
                            <div class="col-sm-4"><strong class="font-weight-600">Class of Service:</strong>
                                <p>{{ $data['class'] }}</p>
                            </div>

                            <div class="col-sm-4"> <strong class="font-weight-600">Flight Type:</strong><br>
                                <p>{{ $data['type'] }} Flight</p>
                            </div>

                            <div class="col-sm-4"> <strong class="font-weight-600">Aircraft Info:</strong><br>
                                <p>{{ $data['baircraft'][0] }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            @endif
            @if ($data['type'] == 'Multi Way')
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
                                    $timeiyaa = ltrim($flight['segmentDuration'][$i], 'P');
                                    $timeiyatwo = ltrim($timeiyaa, 'T');
                                    $t2 = trim(strrev(chunk_split(strrev($timeiyatwo), 3, ' ')));

                                @endphp
                                {{ $t2 }}
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
                {{-- {{ dd($data) }} --}}
            @endif
            <p style="font-size:10px;"> L'achat de voyages, séjours ou autres prestations, entraîne l'adhésion du
                client
                aux conditions générales de vente et l'acceptation sans réserve del'intégralité de leurs dispositions,
                affichées dans les locaux.Toute annulation/remboursement de réservation sera traité au cas par cas en
                fonction des conditions générales de la compagnie aérienneet de l'agence.</p>
        </main>
        </br>
        <table>
            <thead>
                <tr>


                    <th>hello@gondaltravel.com</th>
                    <th>www.gondaltravel.com</th>
                    <th>0033950379906</th>


                </tr>
            </thead>
        </table>



        <!-- Footer End -->
    </div>
    <!-- Container End -->







</body>

</html>
