@php use App\Models\Airport; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>GTravel Flight Itinerary - {{ $ticket->prn_no }}</title>
    <style>
        @page {
            size: A4;
            margin: 0.4em
        }
        body {
            position: relative;
            width: 8.07in;
            height: 11.4in;
            margin: 0 auto;
            color: #000;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        @media print {
            html,
            body {
                width: 8.07in;
                height: 11.4in
            }

            main {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
            }

            .row {
                margin: 0;
                padding: 0;
            }

            .container {
                padding: 0
            }
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #000;
            font-size: 1.4em;
            font-weight: 700;
            text-align: center;
            /* margin: 0 0 20px; */
        }

        header, main, footer {
            width:98%;
            margin: 0 auto;
            padding:3px;
        }

        header {
            padding: 5px 0;
            margin-bottom: 5px;
            border-bottom: 3px solid #5D6975;
            display: block;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 100px;
        }

        #company {
            float: right;
            text-align: right;
            /*width: 50%;*/
            margin-bottom: 0px;
            margin-top: 8px;
        }

        .to,
        .address {
            font-size: 1.2em;
        }

        span.name {
            display: inline-block;
            font-size: 1.0em;
            font-weight: 700;
            margin: 0;
            text-transform: uppercase;
        }

        #company h3 {
            display: inline-block;
            padding-bottom: 10px;
        }

        p.name {
            font-size: 1.3em;
            font-weight: 800;
            margin: 0;
            text-transform: uppercase;
        }

        h2.name {
            font-size: 1.3em;
            font-weight: 800;
            margin: 0;
            text-transform: uppercase;
        }

        h3.name {
            font-size: 1.2em;
            font-weight: 900;
            margin: 0;
        }
.pt-50{
    padding-top: 50px;
}
.mt-50{
    margin-top: 50px;
}
        /* header >.container{
    height:105px;
    overflow:hidden;
  } */
        /* div{
    display:block;
  } */
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        /* .container{
    overflow:hidden;
  } */
        .logo {
            float: left;
            display: inline-block;
            width: 49.5%;
        }

        .head-content {
            display: inline-block;
            width: 49.5%;
        }

        .logo img {
            width: 100px;
            margin-top: 1px;
        }

        .booking {
            clear: both;
            float: right;
        }

        .booking span {
            text-transform: uppercase;
            font-size: 15px;
            margin: 10px auto;
            clear: both;
            text-align: right;
        }

        .booking span h3 {
            text-align: right;
            font-weight: 800;
        }

        .agency {
            clear: both;
            width: 100%;
        }

        .contact-info {
            width: 70%;
            float: left;
        }

        .contact {
            width: 25%;
            float: right;
        }

        .contact-info span {
            font-size: 15px;
            margin: 5px auto;
            clear: both;
            text-align: left;
        }

        .contact-info span strong {
            text-transform: uppercase;
        }

        .contact-info > span > p {
            margin: 0;
            font-size: 13px;
            font-weight: 600;
        }

        .contact span strong {
            text-transform: uppercase;
        }

        .contact span {
            font-size: 15px;
            margin: 5px auto;
            clear: both;
            text-align: left;
        }

        .contact span p {
            margin: 0;
            font-size: 13px;
            font-weight: 600;
        }

        .heading {
            border-bottom: 1px solid #5D6975;
        }

        .heading div {
            display: inline-block;
        }

        .heading span {
            display: inline-block;
        }

        .heading p {
            font-size: 13px;
            font-weight: 600;
            margin: 0;
        }

        .passenger {
            border-bottom: 1px solid #5D6975;
            text-align: left;
        }

        .passenger > .pdetails {
            display: block;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 10px;
        }

        /* table tr{
    width: 99%;
  } */

        table th {
            padding: 5px;
        }

        table td {
            padding: 5px;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
            border-bottom: 1px solid #000;
        }

        .passenger table th {
            font-weight: 600;
            margin: 0;
            text-align: left;
        }

        .passenger span{
            font-size: 1.2em;
    font-weight: 900;

            font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace;

        }
       .passenger table td {
            font-size: 1.1em;
    font-weight: 900;

            font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace;

        }
        .pdetails p {
            font-size: 15px;
            font-weight: 800;
            font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace;
            text-transform: uppercase;
            float: left;
        }

        footer {
            color: black;
            /*width: 99%;*/
            position: absolute;
            bottom: 10px;
            padding:10px;
        }

        .footer-sec .row .col-12 h5 {
            font-size: 14px;
            font-weight: 600;
            text-align: center;
        }

        footer p {
            margin: 0;
            padding: 0;
            line-height: 1.2;
            text-align: justify;
        }

        footer .row .col-sm {
            text-align: center;
            font-weight: 600;
            width: 33%;
            display: inline-block;
        }

        .flight-line {
            line-height: 1.5;
            display: block !important;
        }

        .flight-line span.line {
            display: inline-block;
            width: 75%;
            border: 1px solid grey;
        }

        .flight-stop {
            position: relative;
            top: -.125rem;
            display: inline-block;
            width: .375rem;
            height: .375rem;
            margin: 0 40%;
            border-radius: .375rem;
            background-color: #d1435b;
            background-image: none;
            line-height: 0;
            /* box-shadow:0 0 0 .125rem #fff; */
            /* zoom:1; */
        }

        .airplane-icon {
            display: inline-block;
            width: 1.2rem;
        }

        .airplane-icon img {
            display: inline-block;
            width: 1.3rem;
        }

        .baggage-icon {
            display: inline-block;
            width: 1.3rem;
            clear: both;
        }

        .baggage-icon img {
            display: block;
            width: 1.3rem;
            padding-bottom: 15px;
        }

        .flight-depart-detail {
            display: inline-block;
            max-width: 32%;
            padding-right: .375rem;
            text-align: right
        }

        .baggage span {
            display: block;
            margin: 0 auto;
            clear: both;
        }

        .flight > .row {
            border-bottom: 1px solid;
        }

        .semi-bold {
            font-weight: 800
        }

        .bold {
            font-size: 1.8em;
            clear: both;
            font-weight: 600
        }

        .time {
            font-size: 1.2em;
            clear: both;
            font-weight: 600;
        }

        .depart {
            display: inline-block;
            width: 25%;
            text-align: center;
        }
        .depart > span{
            display: block;
            margin: 0 auto;
            clear: both;
        }

        .depart-line {
            display: inline-block;
            width: 45%;
            text-align: center;
        }

        .arrival {
            display: inline-block;
            width: 25%;
            text-align: center;
        }
        .arrival span{
            display: block;
            margin: 0 auto;
            clear: both;
        }
        

        .day,
        .year {
            font-size: 17px;
            clear: both;
            display: block !important
        }

        .date {
            font-size: 20px;
            font-weight: 600
        }

        .flight-number {
            font-size: 15px;
            font-weight: 800;
            clear: both;
            display: block !important
        }

        .flight-class {
            font-size: 15px;
            clear: both;
            display: block !important
        }

        .aircraft {
            font-size: 15px;
            clear: both;
            display: block !important
        }

        td.flight-name {
            font-size: 15px !important;
            width: 15%;
            font-weight: 600;
        }

        td.depart-date {
            width: 10%;
            text-align: center;
        }

        td.depart-arival {
            width: 46%;
            line-height: 1.2;
            text-align: center;
        }

        td.flight-details {
            width: 15%;
            text-align: center;
        }

        td.baggage {
            width: 10%;
            text-align: center;
        }
        /*h1,*/
        /*h2,*/
        /*h3,*/
        /*h4,*/
        /*h5,*/
        /*h6{ font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace;  }*/
        /*p { font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace; }*/
        /*blockquote { font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace;  }*/
        /*pre { font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace;}*/
        /*   .heading{*/
        /*    color: #000;*/
        /*    font-size: 1.1em;*/
        /*    font-weight: 700;*/
        /*    text-align: center;*/
        /*    margin: 0 0 20px;*/
        /*}*/
        #top-heading h1{
            color: #000;
            font-size: 2rem;
            position:absolute;
            top: 10%;
            left: 45%;
        }
        span.flight-name{
            font-weight: 600;
          }
          td.flight{
            font-size: 15px !important;
            width: 15%;
          }
    </style>
</head>
<body>
@php
    $coll_cash = App\Models\Ticket::where('prn_no', $ticket->prn_no)->first();
@endphp

@php
    $colname = App\Models\User::where('id', $coll_cash->user_id)->first();
@endphp
{{-- {{ dd($colname) }} --}}
<header class="clearfix">

    <div id="logo">
        @if(isset($type) && $type  == 'pdf')
            <!--<img src="{{ public_path('images/logo_black.png') }}">-->
            <img src="{{ asset('images/logo_black.png') }}" alt="logo">
            <span style="clear:both;display:block;font-size:1.4em;font-weight:600;">Gondal Travel</span>
        @else
        <img src="{{ $url . '/images/logo_black.png' }}">
        <span style="clear:both;display:block;font-size:1.4em;font-weight:600;">Gondal Travel</span>
        @endif
    </div>


@php
$firstE = reset($main_data['flight']);
//dd($main_data['flight'][0]['endlocation']);exit;
 //dd($firstE!=null)
@endphp
@if ($firstE)
<h3 style="text-align:center;">{{ Airport::where('iata', $firstE['startlocation'])->first()->city }}-{{ Airport::where('iata', $firstE['endlocation'])->first()->city }}
<!--@for ($i=1;$i<(int)count($main_data['flight']);$i++)-->
<!--    {{ Airport::where('iata', $main_data['flight'][$i]['startlocation'])->first()->city }}- {{ Airport::where('iata', $main_data['flight'][$i]['endlocation'])->first()->city }}-->
<!--@endfor-->
</h3>
@endif

{{-- <h3 style="text-align:center;">{{ Airport::where('iata', $main_data['flight'][0]['startlocation'])->first()->name }}-{{ Airport::where('iata', $main_data['flight'][1]['startlocation'])->first()->name }}-{{ Airport::where('iata', $main_data['flight'][1]['endlocation'])->first()->name }}</h3> --}}

    <div id="company">
        <span class="name">BOOKING REF#</span>
        <span class="name">786{{  $ticket->id }}</span><br>
        <span class="name">Confirmed#</span>
        <span class="name">{{ $ticket->prn_no }}</span>
    </div>
</header>

<main>
    <div class="container passenger">
        <table border="0" cellspacing="0" cellpadding="0">
            {{-- <thead>
            <tr>
                <th class="unit">Full Name</th>
                <th class="desc">Passport</th>
                <th class="total">Contact Number</th>
                <th class="total">Email</th>
            </tr>
            </thead> --}}
            <tbody>
            {{-- {{ dd(count($passengers)) }} --}}
            <?php
               for ($i=0;$i<(int)count($passengers);$i++)
              if($passengers[$i]['gender']=='Female'){
              $gender='Mrs.';}
              else {
                $gender='Mr.';
              }
             ?>

{{-- {{ dd($main_data) }} --}}
                <tr>

                        <td class="unit"><span class="pass">Passenger:</span>
                             @for ($i=0;$i<(int)count($passengers);$i++)
                             @if($passengers[$i]['gender']=='Female')
                           <span style="border-radius:100%;padding:2px;border:2px solid;">{{$i+1}}</span> Mrs.{{ $passengers[$i]['name'] }}
                            @else
                           <span style="border-radius:100%;padding:2px;border:2px solid;">{{$i+1}}</span> Mr.{{ $passengers[$i]['name'] }}
                            @endif
                            @endfor</td>

                    {{-- <td class="unit">{{ $pass->pidno }}</td>
                    <td class="desc">{{ $pass->contact_no }}</td>
                    <td class="total" style="text-transform:lowercase">{{ $pass->email }}</td> --}}
                </tr>

            </tbody>
        </table>

    </div>

    {{-- {{ dd($main_data) }} --}}
    <div class="container flight">
        <table border="0" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>Flight</th>
                <th></th>
                <th></th>
                <th>Date</th>
                <th></th>
                <th>Departure</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Arrivals</th>
                <th>Baggage</th>
            </tr>
            </thead>
        </table>
        @foreach ($main_data['flight'] as $data)
                <?php //echo '<pre>';print_r($ticket);
                $stop_count = (int)count($data['to']) - 1;
                //echo $stop_count;exit;
                $transit_time = null;
            for ($i = 0;
                 $i < (int)count($data['to']);
                 $i++):

                //echo $data['fromDate'][$i];exit;
                $dep_timestamp = strtotime($data['fromDate'][$i]);
                $dep_day = date('l', $dep_timestamp);
                $dep_date = date('d', $dep_timestamp);
                $dep_month = date('M', $dep_timestamp);
                $dep_year = date('Y', $dep_timestamp);
                $dep_time = date('h:i A', $dep_timestamp);


                if (@$data['fromDate'][$i + 1] != null) {
                    $datetime1 = new DateTime($data['toDate'][$i]);
                    $datetime2 = new DateTime($data['fromDate'][$i + 1]);
                    $interval = $datetime1->diff($datetime2);
                    $transit_time = $interval->format('%hh:%imin');
                }

                $arr_timestamp = strtotime($data['toDate'][$i]);
                $arr_day = date('l', $arr_timestamp);
                $arr_date = date('d', $arr_timestamp);
                $arr_month = date('M', $arr_timestamp);
                $arr_year = date('Y', $arr_timestamp);
                $arr_time = date('h:i A', $arr_timestamp);
                $flight_time = str_replace('PT', '', $data['segmentDuration'][$i]);
                $flight_time = str_replace('H', 'H ', $flight_time);

                ?>

            <div class="row">
                <table border="0" cellspacing="0" cellpadding="0">

                    <tbody>
                    <tr>
                        <td class="flight">
                            <span class="flight-name">{{$data['name'][$i]}}</span>
                            <span class="flight-number">{{ $data['code'] }}-{{ $data['number'] }}</span>
                            <span class="flight-class">{{ $main_data['cabin'] }} {{ $main_data['class'] }}</span>
                        </td>
                        <td class="depart-date">
                            <span class="day">{{ $dep_day }}</span>
                            <span class="date">{{ $dep_date }}-{{ $dep_month }}</span>
                            <span class="year">{{ $dep_year }}</span>
                        </td>
                        <td colspan="2" class="depart-arival">
                            <div class="depart">
                                {{-- {{ dd($data['departureTerminal'][$i]!='null' ) }} --}}

                                <span class="bold">{{ $data['from'][$i] }} </span>
                                <span class="time">{{ $dep_time }}</span>
                                <span style="font-size: 11px">{{ Airport::where('iata', $data['from'][$i])->first()->name }}</span>
                                @if ($data['departureTerminal'][$i]!='null' )
                                <span style="font-size: 11px">Terminal-{{ $data['departureTerminal'][$i] }}</span>
                                @endif
                                {{-- {{ dd($data['departureTerminal'][$i]) }} --}}
                            </div>
                            <div class="depart-line">
                                <div class="flight-line">
                                    <span class="line"></span>
                                    <span class="airplane-icon">
                                        @if(isset($type) && $type  == 'pdf')
                                            <!--<img src="{{ public_path('images/plane-solid.png') }}">-->
                                            <img src="{{ asset('images/plane-solid.png') }}">
                                        @else
                                        <img src="{{ $url . '/images/plane-solid.png' }}">
                                        @endif
                                    </span>
                                </div>

                                <span><b>{{$flight_time}}</b></span>
                            </div>
                            <div class="arrival">
                                <span class="bold">{{ $data['to'][$i] }}</span>
                                <span class="time">{{ $arr_time }}</span>
                                <span style="font-size: 11px">{{ Airport::where('iata', $data['to'][$i])->first()->name }}</span>
                                @if ($data['arrivalTerminal'][$i]!='null' )
                                <span style="font-size: 11px">Terminal-{{ $data['arrivalTerminal'][$i] }}</span>
                                @endif
                            </div>
                        </td>
                        <td class="baggage">
                                    <span class="baggage-icon">
                                        @if(isset($type) && $type  == 'pdf')
                                            <!--<img src="{{ public_path('images/suitcase-solid.png') }}">-->
                                            <img src="{{ asset('images/suitcase-solid.png') }}">
                                        @else
                                        <img src="{{ $url . '/images/suitcase-solid.png' }}">
                                        @endif
                                    </span>
                            <span>{{ $main_data['bags'] }}</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

                <?php if ($transit_time != null){ ?>
            <div class="row">
                <div style="text-align:center;font-size:14px;font-weight:400;width:100%;">Transit Time:
                    <b>{{ $transit_time }}</b>
                </div>
            </div>
            <?php } $transit_time = null; ?>
            <?php endfor; ?>
        @endforeach
    </div>

</main>
<footer>
    <div class="container footer-sec">
        <div class="row">
            <div class="col-12">
                <h5 style="margin:4px 0px 0px 0px;">Terms & Conditions</h5>
                <p>The following terms and conditions should be <b>read carefully.</b></p>
                <p>1)Check-in counters open <b>3 hours prior</b> to flight departure and close <b>1 hour prior</b> to flight departure. If you fail to
                    report on time you may be denied boarding.</p>
                <p>2)The passenger's name(s) should be checked as per their passport/identity proof, departure and arrival dates, times, flight
                    number, terminal, and baggage information.</p>
                <p>3) When traveling internationally, please confirm your travel documentation requirements with your airline or relevant Embassy,
                    such as your <b style="text-transform: lowercase">passport, visa, and Ok to Board.</b></p>
                <p>4)Some countries may impose local taxes (VAT, tourist tax, etc.) that must be paid locally.</p>
                <p>5) We are not responsible for schedule changes or flight cancellations by the airline before or after tickets are issued.</p>
                <p>6) We cannot be held liable for any loss, damage or mishap to the traveler's or his/her belongings due to accident, theft or
                    other unforeseeable circumstances.</p>
                <p>7)Booking amendments will be subject to the airline's terms and conditions, including penalties, fare difference, and availability.</P>
                <p>8)A cancellation or refund of a booking will be handled on a case-by-case basis depending on the airline and agency policies.</p>
                <p>9)Should you need amendments, cancellations, or ancillary services, contact your travel partner.</p>
                <h2>Bon Voyage!</h2>
            </div>
        </div>
       <table>
        <tr>
           <td><div class="col-sm"> <span class="name" style="text-align: left">Customer Service</span></div>
            <div class="col-sm"><span class="name">FRA: 0187653786</span></div>
            <div class="col-sm">UK: 00448007074285</div>
            <div class="col-sm">USA: 0018143008040</div></td>
            <td><div class="col-sm" style="text-align:center;">www.gondaltravel.com</div></td>
            <td align="right">
            @if ($coll_cash)
                <div>
                    <span class="name">Booking Partner</span>
                    <p class="name" style="text-align: right">{{ $colname->name }}</p></div>
                <div>
                    <span class="name">Office Phone:</span>
                    <p class="name" style="text-align: right"><i class="fa-solid fa-phone"></i> {{ $colname->phone }}</p>
                </div>
            @endif

            <div class="col-sm"><i class="fa-solid fa-envelope"></i> hello@gondaltravel.com</div></td>
        </tr>
        </table>
    </div>
</footer>
<!-- Container End -->
</body>
{{-- {{ dd($main_data) }} --}}
</html>
