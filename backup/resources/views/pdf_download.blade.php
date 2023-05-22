@php use App\Models\Airport; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="author" content="https://{{__('logixbit.com')}}">
  <title>GTravel Flight Itinerary - {{$ticket->prn_no}}</title>
  <style>
  @page{
    size:A4;
    margin:0.4em;
  }
  body {
    position: relative;
    width:8.07in;
    height:11.4in;
    margin: 0 auto;
    color: #000;
    background: #FFFFFF;
    font-family: Arial, sans-serif;
    font-size: 12px;
  }
  @media print{
    html,body{
      width:8.07in;
      height:11.4in;
    }
    main{
      margin:0;
      border:initial;
      border-radius:initial;
      width:initial;
      min-height:initial;
    }
    .row{
      margin:0;
      padding:0;
    }
    .container{
      padding:0
    }
  }
  h1,h2,h3,h4,h5,h6{
    color:black;
    font-size:1.4em;
    font-weight:400;
    text-align:center;
    margin:0 0 5px;
  }
  header, main, footer{
    width:98%;
    margin: 0 auto;
    padding:3px;
  }
  header{
    padding: 5px 0;
    margin-bottom:5px;
    border-bottom:3px solid black;
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
    /*width:40%;*/
    margin-bottom: 0px;
    margin-top:10px;
  }
  .to , .address{
    font-size:1.2em;
  }
  span.name{
    font-size: 1.1em;
    font-weight: 700;
    margin: 0;
    text-transform:uppercase;
  }
  #company h3{
    text-align:right !important;
    padding-bottom:10px;
  }
  p.name{
    font-size: 1.3em;
    font-weight: normal;
    margin: 0;
    text-transform: uppercase;
  }
  h2.name {
    font-size: 1.3em;
    font-weight: normal;
    margin: 0;
    text-transform: uppercase;
  }
  h3.name {
    font-size: 1.6em;
    font-weight: 600;
    margin: 0;
  }
  /* header >.container{
    height:105px;
    overflow:hidden;
  } */
  /* div{
    display:block;
  } */
  .clearfix:after{
    content:"";
    display:table;
    clear:both;
  }
  a{
    color:#5D6975;
    text-decoration:underline;
  }
  /* .container{
    overflow:hidden;
  } */
  .logo{
    float: left;
    display:inline-block;
    width:49.5%;
  }
  .head-content{
    display:inline-block;
    width:49.5%;
  }
  .logo img{
    width:100px;
    margin-top:1px;
  }
  .booking{
    clear:both;
    float:right;
  }
  .booking span{
    text-transform:uppercase;
    font-size:15px;
    margin:10px auto;
    clear:both;
    text-align:right;
  }
  .booking span h3{
    text-align:right;
    font-weight:800;
  }
  .agency{
    clear:both;
    width:100%;
  }
  .contact-info{
    width:70%;
    float: left;
  }
  .contact{
    width:25%;
    float:right;
  }
  .contact-info span{
    font-size:15px;
    margin:5px auto;
    clear:both;
    text-align:left;
  }
  .contact-info span strong{
    text-transform:uppercase;
  }
  .contact-info > span > p{
    margin:0;
    font-size:13px;
    font-weight:600;
  }
  .contact span strong{
    text-transform:uppercase;
  }
  .contact span{
    font-size:15px;
    margin:5px auto;
    clear:both;
    text-align:left;
  }
  .contact span p{
    margin:0;
    font-size:13px;
    font-weight:600;
  }
  .heading{
    border-bottom:1px solid black;
  }
  .heading div{
    display:inline-block;
  }
  .heading span{
    display:inline-block;
  }
  .heading p{
    font-size:13px;
    font-weight:600;
    margin:0;
  }
  .passenger{
    border-bottom:1px solid black;
    padding-bottom:10px;
    text-align:left;
  }
  .passenger > .pdetails {
    display:block;
    overflow:hidden;
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
  table th{
    padding: 5px;
  }
  table td {
    padding: 5px;
  }
  table th {
    white-space: nowrap;
    font-weight: normal;
    border-bottom: 1px solid #000;
    text-align:left;
  }
  .passenger table th {
    font-weight: 600;
    margin: 0;
    text-align:left;
  }
  .passenger table td {
    font-size: 15px;
    font-weight: 700;
    text-transform: uppercase;
  }
  .pdetails p{
    font-size:15px;
    font-weight:700;
    text-transform:uppercase;
    float:left;
  }
  footer {
    color: black;
    /*width: 99%;*/
    position: absolute;
    bottom: 10px;
    padding:10px;
  }
  .footer-sec .row .col-12 h5{
    font-size:14px;
    font-weight:600;
    text-align:center;
  }
  footer p{
    margin:0;
    padding:0;
    line-height:1.2;
    text-align:justify;
  }
  footer .row .col-sm{
    text-align:center;
    font-weight:600;
    width: 33%;
    display: inline-block;
  }
  .flight-line{
    line-height:1.5;
    display:block !important;
  }
  .flight-line span.line{
    display:inline-block;
    width:75%;
    border:1px solid grey;
  }
  .flight-stop{
    position:relative;
    top:-.125rem;
    display:inline-block;
    width:.375rem;
    height:.375rem;
    margin:0 40%;
    border-radius:.375rem;
    background-color:#d1435b;
    background-image:none;
    line-height:0;
    /* box-shadow:0 0 0 .125rem #fff; */
    /* zoom:1; */
  }
  .airplane-icon{
    display:inline-block;
    width:1.2rem;
  }
  .airplane-icon img{
    display:inline-block;
    width:1.3rem;
  }
  .baggage-icon{
    display:inline-block;
    width:1.3rem;
    clear:both;
  }
  .baggage-icon img{
    display:block;
    width:1.3rem;
    padding-bottom:15px;
  }
  .flight-depart-detail{
    display:inline-block;
    max-width:32%;
    padding-right:.375rem;
    text-align:right
  }
  .baggage span{
    display:block;
    margin: 0 auto;
    clear:both;
  }
  .flight > .row{
    border-bottom:1px solid;
  }
  .semi-bold{
    font-weight:800
  }
  .bold{
    font-size:1.8em;
    clear:both;
    font-weight:600
  }
  .time{
    font-size: 1.2em;
    clear: both;
    font-weight: 600;
  }
  .depart{
    display:inline-block;
    width:25%;
    text-align:center;
  }
  .depart-line{
    display:inline-block;
    width:45%;
    text-align:center;
  }
  .arrival{
    display:inline-block;
    width:25%;
    text-align:center;
  }
  .day,.year{
    font-size:17px;
    clear:both;
    display:block!important
  }
  .date{
    font-size:20px;
    font-weight:600
  }
  .flight-number{
    font-size:15px;
    font-weight:800;
    clear:both;
    display:block!important
  }
  .flight-class{
    font-size:15px;
    clear:both;
    display:block!important
  }
  .aircraft{
    font-size:15px;
    clear:both;
    display:block!important
  }
  td.flight{
    font-size:15px!important;
    width:15%;
  }
  td.depart-date{
    width:10%;
    text-align:center;
  }
  td.depart-arival{
    width:46%;
    /*line-height:1.5;*/
    text-align:center;
  }
  td.flight-details{
    width: 15%;
    text-align:center;
  }
  td.baggage {
    width: 10%;
    text-align: center;
  }
  span.flight-name{
    font-weight: 600;
  }
  table th{
      /*font-weight: 600;*/
  }
  .depart span{
      display:block;
      clear:both;
  }
  .arrival span{
      display:block;
      clear:both;
  }
  .counter{
    border-radius: 100%;
    padding: 2px;
    border:2px solid;
  }
  span.city {
    font-size: 1.1em;
    font-weight: 700;
    margin: 0;
    text-transform: uppercase;
    margin-left: 130px;
    width: 500px;
  }
  th.flight{
      width:150px;
  }
  th.depart-date{
      width:95px;
  }
  th.depart-arival{
      /*width:370px;*/
  }
  th.baggage{
      width:70px;
      text-align:center;
  }
</style>
</head>
<body>
@php
//$coll_cash = App\Models\CashCollector::where('prn_no',$ticket->prn_no)->first();
$coll_cash = App\Models\Ticket::where('prn_no', $ticket->prn_no)->first();
@endphp
<header class="clearfix">
  <div id="logo">
    <!--<img src="https://gondaltravel.com/images/logo-web-small.png"/>-->
    <!--<img src="https://gondaltravel.com/images/logo_black.png">-->
    <img src="{{ asset('images/logo_black.png') }}" alt="logo">
    <span style="clear:both;display:block;font-size:1.4em;font-weight:600;">Gondal Travel</span>
  </div>
  <div id="logo"><span style="font-size: 1.3em;font-weight:700;text-transform:uppercase;margin-left: 160px;width:100%;">{{ Airport::where('iata', $data['from'][0])->first()->city }} - {{ Airport::where('iata', end($data['to']))->first()->city }} <?php if(isset($data['bto'])){?> - {{ Airport::where('iata', end($data['bto']))->first()->city }} <?php } ?> </span></div>
  <div id="company">
    <span class="name">Booking Ref #</span>
    <h3>786{{  $ticket->id }}</h3>
    <span class="name">Confirmed#</span>
    <h3 class="name">{{$ticket->prn_no}}</h3><br>
  </div>
</header>
<main>
  <div class="container passenger">
    <table border="0" cellspacing="0" cellpadding="0" style="margin:0">
      <div>
          <span class="name">Passanger Name</span>
      </div>
      <tbody>
        <tr>
    <?php $counter=1;?>
    @foreach($passengers as $pass)
        <td style="white-space: nowrap;">
            <span style="display: inline-block; width: 20px; height: 20px; line-height: 20px; text-align: center; border-radius: 50%; background-color: #ddd; color: #000; font-weight: bold; margin-right: 10px;">
                {{$loop->iteration}}
            </span>
            <span>
            @if($pass->age == "Adult" && $pass->gender == "Male")
                Mr.
            @elseif($pass->age == "Adult" && $pass->gender == "Female")
                Ms.
            @elseif($pass->age == "Child" && $pass->gender == "Female")
                Miss.
            @elseif($pass->age == "Child" && $pass->gender == "Male")
                Master. 
            @endif

    </span> {{$pass->name}} {{$pass->surname}} <small style="font-size:10px;"><sup>({{$pass->age}})</sup></small><br>
            <span style="border-radius:100%;padding:2px;margin-left:32px;">@if($ticket->ticket_num > 0) ETKT: {{ explode(',',$ticket->ticket_num)[$loop->index] }} @endempty</span>
        </td>
        <?php $counter++;?>
        @if($counter > 3)
            <?php $counter=1;?>
            </tr><tr>
        @endif
    @endforeach
    @if($counter > 1)
        <?php $remaining_td = 4 - $counter; ?>
        @for($i=0; $i<$remaining_td; $i++)
            <td></td>
        @endfor
    @endif
</tr>

      </tbody>
    </table>
  </div>
  <div class="container flight">
    <div class="row">
        <table border="0" cellspacing="0" cellpadding="0" style="margin:0;">
            <thead>
            <tr>
                <th class="flight">Flight</th>
                <th class="depart-date">Date</th>
                <th class="depart-arival"><span style="float:left;margin-left:0px">Departure</span><span style="float:right;margin-right:20px">Arrivals</span></th>
                <th class="baggage" style="width: 115px;">Baggage</th>
            </tr>
            </thead>
        </table>
    </div>
    <?php //echo '<pre>';print_r($ticket);
      $stop_count = (int)count($data['to']) - 1;
      //echo $stop_count;exit;
      $transit_time = null;
    
      for ($i = 0; $i < (int)count($data['to']); $i++):
        
        $dep_timestamp = strtotime($data['fromDate'][$i]);
        $dep_day = date('l', $dep_timestamp);
        $dep_date = date('d', $dep_timestamp);
        $dep_month = date('M', $dep_timestamp);
        $dep_year = date('Y', $dep_timestamp);
        $dep_time = date('H:i ', $dep_timestamp);
        if(@$data['fromDate'][$i+1]!=null){
          $datetime1 = new DateTime($data['toDate'][$i]);
          $datetime2 = new DateTime($data['fromDate'][$i+1]);
          $interval = $datetime1->diff($datetime2);
          $transit_time = $interval->format('%hh:%imin');
        }
        $arr_timestamp = strtotime($data['toDate'][$i]);
        $arr_day = date('l', $arr_timestamp);
        $arr_date = date('d', $arr_timestamp);
        $arr_month = date('M', $arr_timestamp);
        $arr_year = date('Y', $arr_timestamp);
        $arr_time = date('H:i', $arr_timestamp);
        $flight_time = str_replace('PT','',$data['itime'][$i]);
        $flight_time = str_replace('H','H ',$flight_time);
        
    ?>
    <div class="row">
        <table border="0" cellspacing="0" cellpadding="0">
          <tbody>
              <tr>
                <td class="flight">
                    <span class="flight-name">{{$data['name'][$i]}}</span>
                    <span class="flight-number">{{$data['fnumber'][$i]}}</span>
                    <span class="flight-class">{{$data['class']}} <?php if(isset($data['class_type'][$i]['class'])){ echo $data['class_type'][$i]['class']; }?></span>
                </td>
                <td class="depart-date">
                  <span class="day">{{$dep_day}}</span>
                  <span class="date">{{$dep_date}}-{{$dep_month}}</span>
                  <span class="year">{{$dep_year}}</span>
                </td>
                <td class="depart-arival">
                  <div class="depart" <?php if(isset($data['fromterminal'][$i]) && $data['fromterminal'][$i]!='null'){ ?>style="margin:10px 0px 2px 0px;"<?php }else{ ?>style="margin:5px 0px 2px 0px;"<?php } ?>>
                    <span class="bold">{{$data['from'][$i]}}</span>
                    <span class="time">{{$dep_time}}</span>
                    <span style="font-size:11px">{{ Airport::where('iata', $data['from'][$i])->first()->name }}</span>
                    <?php if(isset($data['fromterminal'][$i]) && $data['fromterminal'][$i]!='null'){ ?>
                    <span style="font-size:11px">Terminal-{{$data['fromterminal'][$i]}}</span>
                    <?php } ?>
                  </div>
                  <div class="depart-line">
                    <div class="flight-line">
                      <span class="line"></span>
                      <span class="airplane-icon"><img src="https://gondaltravel.com/images/plane-solid.png"></span>
                    </div>
                    <span><b>{{$flight_time}}</b></span>
                  </div>
                  <div class="arrival" <?php if(isset($data['toterminal'][$i]) && $data['toterminal'][$i]!='null'){ ?>style="margin:10px 0px 2px 0px;"<?php }else{ ?>style="margin:5px 0px 2px 0px;"<?php } ?>>
                    <span class="bold">{{$data['to'][$i]}}</span>
                    <span class="time">{{$arr_time}}</span>
                    <span style="font-size:11px">{{ Airport::where('iata', $data['to'][$i])->first()->name }}</span>
                    <?php if(isset($data['toterminal'][$i]) && $data['toterminal'][$i]!='null'){ ?>
                    <span style="font-size:11px">Terminal-{{$data['toterminal'][$i]}}</span>
                    <?php } ?>
                  </div>
                </td>
                <td class="baggage">
                    <div style="display:flex;">
                        <div style="margin-right:5px;">
                          <span class="baggage-icon"><img src="https://gondaltravel.com/images/suitcase-solid.png"></span>
                          <span>{{($ticket->bags) ? $ticket->bags : $data['weight'] }}</span>
                        </div>
                        <div style="margin-left:5px;">
                          <span class="baggage-icon"><img src="https://gondaltravel.com/images/bag.png"></span>
                          <span>1 Bag</span>
                        </div>
                    </div>
                </td>
              </tr>
          </tbody>
        </table>
      </div>

      <?php if($transit_time!=null){ ?>
        <div class="row">
          <div style="text-align:center;font-size:13px;font-weight:400;width:100%;">Layover Time: <b>{{$transit_time}}</b></div>
        </div>
      <?php } $transit_time =null; ?>
    <?php endfor; ?>
  </div>

  <?php if($data['type']=="Return"): ?>
    <div class="container flight">
        <div class="row heading">
          <div style="text-align:center;font-size:17px;font-weight:700;padding-left:5px;"><b>Return Ticket</b></div>
        </div>
      <?php
        $transit_time = null;
        for ($i = 0; $i < (int)count($data['bto']); $i++):
        $dep_timestamp = strtotime($data['bfromDate'][$i]);
        $dep_day = date('l', $dep_timestamp);
        $dep_date = date('d', $dep_timestamp);
        $dep_month = date('M', $dep_timestamp);
        $dep_year = date('Y', $dep_timestamp);
        $dep_time = date('H:i', $dep_timestamp);
        if(@$data['bfromDate'][$i+1]!=null){
          @$datetime1 = new DateTime($data['btoDate'][$i]);
          @$datetime2 = new DateTime($data['bfromDate'][$i+1]);
          @$interval = $datetime1->diff($datetime2);
          @$transit_time = $interval->format('%hh:%imin');
        }
        $arr_timestamp = strtotime($data['btoDate'][$i]);
        $arr_day = date('l', $arr_timestamp);
        $arr_date = date('d', $arr_timestamp);
        $arr_month = date('M', $arr_timestamp);
        $arr_year = date('Y', $arr_timestamp);
        $arr_time = date('H:i', $arr_timestamp);
        $flight_time = str_replace('PT','',$data['bitime'][$i]);
        $flight_time = str_replace('H','H ',$flight_time);
        
        
        
      ?>
        <div class="row">
          <table border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                  <td class="flight">
                      <span class="flight-name">{{$data['bname'][$i]}}</span>
                      <span class="flight-number">{{$data['bfnumber'][$i]}}</span>
                      <span class="flight-class">{{$data['class']}} {{@$data['class_type'][count($data['bname'])]['class']}}</span>
                  </td>
                  <td class="depart-date">
                    <span class="day">{{$dep_day}}</span>
                    <span class="date">{{$dep_date}}-{{$dep_month}}</span>
                    <span class="year">{{$dep_year}}</span>
                  </td>
                  <td class="depart-arival" <?php if(isset($data['bfromterminal'][$i]) && $data['bfromterminal'][$i]!='null'){ ?>style="margin:10px 0px 2px 0px;"<?php }else{ ?>style="margin:5px 0px 2px 0px;"<?php } ?>>
                    <div class="depart">
                      <span class="bold">{{$data['bfrom'][$i]}}</span>
                      <span class="time">{{$dep_time}}</span>
                      <span style="font-size:11px">{{ Airport::where('iata', $data['bfrom'][$i])->first()->name }}</span>
                      <?php if(isset($data['bfromterminal'][$i]) && $data['bfromterminal'][$i]!='null'){ ?>
                      <span style="font-size:11px">Terminal-{{$data['bfromterminal'][$i]}}</span>
                      <?php } ?>
                    </div>
                    <div class="depart-line">
                      <div class="flight-line">
                        <span class="line"></span>
                        <span class="airplane-icon"><img src="https://gondaltravel.com/images/plane-solid.png"></span>
                      </div>
                      <span><b>{{$flight_time}}</b></span>
                    </div>
                    <div class="arrival" <?php if(isset($data['btoterminal'][$i]) && $data['btoterminal'][$i]!='null'){ ?>style="margin:10px 0px 2px 0px;"<?php }else{ ?>style="margin:5px 0px 2px 0px;"<?php } ?>>
                      <span class="bold">{{$data['bto'][$i]}}</span>
                      <span class="time">{{$arr_time}}</span>
                      <span style="font-size:11px">{{ Airport::where('iata', $data['bto'][$i])->first()->name }}</span>
                      <?php if(isset($data['btoterminal'][$i]) && $data['btoterminal'][$i]!='null'){ ?>
                      <span style="font-size:11px">Terminal-{{$data['btoterminal'][$i]}}</span>
                      <?php } ?>
                    </div>
                  </td>
                  <td class="baggage">
                    <div style="display:flex;">
                        <div style="margin-right:5px;">
                          <span class="baggage-icon"><img src="https://gondaltravel.com/images/suitcase-solid.png"></span>
                          <span>{{($ticket->bags) ? $ticket->bags : $data['weight'] }}</span>
                        </div>
                        <div style="margin-left:5px;">
                          <span class="baggage-icon"><img src="https://gondaltravel.com/images/bag.png"></span>
                          <span>1 Bag</span>
                        </div>
                    </div>
                </td>
                </tr>
            </tbody>
          </table>
        </div>
        <?php if($transit_time!=null){ ?>
        <div class="row">
          <div style="text-align:center;font-size:13px;font-weight:400;">Layover Time: <b>{{$transit_time}}</b></div>
        </div>
        <?php } $transit_time =null; ?>
      <?php endfor; ?>
    </div>
  <?php endif; ?>
</main>

<footer>
  <div class="container footer-sec">
    <div class="row">
      <div class="col-12">
        <h5>Terms & Conditions</h5>
        <p>The following terms and conditions should be <b>read carefully</b>.</p>
        <p>1)Check-in counters open <b>3 hours prior</b> to flight departure and close <b>1 hour prior</b> to flight departure. If you fail to report on time you may be denied boarding.</p>
        <p>2)The passenger's name(s) should be checked as per their passport/identity proof, departure and arrival dates, times, flight number, terminal, and baggage information.</p>
        <p>3) When traveling internationally, please confirm your travel documentation requirements with your airline or relevant Embassy, such as your <b>passport, visa, and ok to board</b>.</p>
        <p>4)Some countries may impose local taxes (VAT, tourist tax, etc.) that must be paid locally.</p>
        <p>5) We are not responsible for schedule changes or flight cancellations by the airline before or after tickets are issued.</p>
        <p>6) We cannot be held liable for any loss, damage or mishap to the traveler's or his/her belongings due to accident, theft or other unforeseeable circumstances.</p>
        <p>7)Booking amendments will be subject to the airline's terms and conditions, including penalties, fare difference, and availability.</p>
        <p>8)A cancellation or refund of a booking will be handled on a case-by-case basis depending on the airline and agency policies.</p>
        <p>9)Should you need amendments, cancellations, or ancillary services, contact your travel partner.</p>
        <h5>Bon Voyage!</h5>
      </div>
    </div>
    <table>
        <tr>
            <td>
                <div class="col-sm"> <span class="name" style="text-align: left">Customer Service</span></div>
                <div class="col-sm"><span class="name">FRA: 0187653786</span></div>
                <div class="col-sm">UK: 00448007074285</div>
                <div class="col-sm">USA: 0018143008040</div>
            </td>
            <td><div class="col-sm" style="text-align:center;">www.gondaltravel.com</div></td>
            <td align="right">
                @if($coll_cash)
                  @php
                  $colname = App\Models\User::where('id',$ticket->user_id)->first();
                  @endphp
                  <div>
                    <span class="name">Booking Partner</span>
                    <p class="name" style="text-align: right">{{$colname->name}}</p
                  </div>
                  <div>
                    <span class="name">Office Phone:</span>
                    <p class="name" style="text-align: right"><i class="fa-solid fa-phone">{{$colname->phone}}</p>
                  </div>
                @endif
                <div class="col-sm">
                    <i class="fa-solid fa-envelope"></i> hello@gondaltravel.com
                </div>
            </td>
        </tr>
    </table>
  </div>
</footer>
<!-- Container End -->
</body>
</html>