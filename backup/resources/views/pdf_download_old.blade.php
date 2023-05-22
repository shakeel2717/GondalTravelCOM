<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="author" content="https://{{__('logixbit.com')}}">
  <title>GTravel Flight Itinerary - {{$ticket->prn_no}}</title>

  <style>
  @page{
    size:A4;
    margin:.5em
  }
  body {
    position: relative;
    width:8.15in;
    height:11.5in;
    margin: 0 auto;
    color: #000;
    background: #FFFFFF;
    font-family: Arial, sans-serif;
    font-size: 14px;
  }

  @media print{
    html,body{
      width:8.25in;
      height:11.6in
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
    color:#5D6975;
    font-size:1.4em;
    font-weight:400;
    text-align:center;
    margin:0 0 20px;
  }
  main, footer{
    width:99%;
  }
  header{
    padding: 5px 0;
    margin-bottom:5px;
    border-bottom:3px solid #5D6975;
    width:99%;
    display: block;
  }

  #logo {
    float: left;
    margin-top: 8px;
  }

  #logo img {
    height: 120px;
  }

  #company {
    float: right;
    text-align: right;
    width:50%;
    margin-bottom: 0px;
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
    border-bottom:1px solid #5D6975;
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
    border-bottom:1px solid #5D6975;
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
    color: #5D6975;
    width: 99%;
    position: absolute;
    bottom: 10px;
  }
  .footer-sec .row .col-12 h5{
    font-size:15px;
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
    font-size:2.2em;
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
  td.flight-name{
    font-size:15px!important;
    width:15%;
    font-weight: 600;
  }
  td.depart-date{
    width:10%;
    text-align:center;
  }
  td.depart-arival{
    width:46%;
    line-height:1.5;
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

</style>


</head>
<body>
@php
$coll_cash = App\Models\CashCollector::where('prn_no',$ticket->prn_no)->first();
@endphp
<header class="clearfix">
  <div id="logo">
    <img src="https://gondaltravel.com/images/logo-web-small.png"/>
  </div>
  <div id="company">
    <span class="name">Booking Reference</span>
    <h3 class="name">{{$ticket->prn_no}}</h3>
    @if($coll_cash!=null)
      @php
      $colname = App\Models\User::where('id',$coll_cash->collector_id)->first();
      @endphp
      <div>
        <span class="name">Booked by:</span>
        <p class="name">{{$colname->name}}</p
      </div>
      <div>
        <span class="name">Office Phone:</span>
        <p class="name">{{$colname->phone}}</p>
      </div>
    @endif
  </div>
</header>
<main>
  <div class="container passenger">
    <table border="0" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th class="unit">Full Name</th>
          <th class="desc">Passport</th>
          <th class="total">Contact Number</th>
          <th class="total">Email</th>
        </tr>
      </thead>
      <tbody>
        @foreach($passengers as $pass)
          <tr>
            <td class="unit">{{$pass->name}} {{$pass->surname}}</td>
            <td class="unit">{{$pass->pidno}}</td>
            <td class="desc">{{$pass->contact_no}}</td>
            <td class="total">{{$pass->email}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="container flight">
    <?php //echo '<pre>';print_r($ticket);
      $stop_count = (int)count($data['to']) - 1;
      //echo $stop_count;exit;
      $transit_time = null;

      for ($i = 0; $i < (int)count($data['to']); $i++):

        //echo $data['fromDate'][$i];exit;
        $dep_timestamp = strtotime($data['fromDate'][$i]);
        $dep_day = date('l', $dep_timestamp);
        $dep_date = date('d', $dep_timestamp);
        $dep_month = date('M', $dep_timestamp);
        $dep_year = date('Y', $dep_timestamp);
        $dep_time = date('h:i A', $dep_timestamp);


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
        $arr_time = date('h:i A', $arr_timestamp);

        $flight_time = str_replace('PT','',$data['itime'][$i]);
        $flight_time = str_replace('H','H ',$flight_time);

    ?>
      <div class="row">
        <table border="0" cellspacing="0" cellpadding="0">
          <tbody>
              <tr>
                <td class="flight-name">{{$data['name'][$i]}}</td>
                <td class="depart-date">
                  <span class="day">{{$dep_day}}</span>
                  <span class="date">{{$dep_date}}-{{$dep_month}}</span>
                  <span class="year">{{$dep_year}}</span>
                </td>
                <td class="depart-arival">
                  <div class="depart">
                    <span class="bold">{{$data['from'][$i]}}</span>
                    <span class="time">{{$dep_time}}</span>
                  </div>
                  <div class="depart-line">
                    <div class="flight-line">
                      <span class="line"></span>
                      <span class="airplane-icon"><img src="https://gondaltravel.com/images/plane-solid.png"></span>
                    </div>
                    <span><b>{{$flight_time}}</b></span>
                  </div>
                  <div class="arrival">
                    <span class="bold">{{$data['to'][$i]}}</span>
                    <span class="time">{{$arr_time}}</span>
                  </div>
                </td>
                <td class="flight-details">
                  <span class="flight-number">{{$data['fnumber'][$i]}}</span>
                  <span class="flight-class">{{$data['class']}}</span>
                  <span class="aircraft">{{$data['aircraft'][0]}}</span>
                </td>
                <td class="baggage">
                  <span class="baggage-icon"><img src="https://gondaltravel.com/images/suitcase-solid.png"></span>
                  <span>{{$data['weight']}}</span>
                </td>
              </tr>
          </tbody>
        </table>
      </div>

      <?php if($transit_time!=null){ ?>
        <div class="row">
          <div style="text-align:center;font-size:13px;font-weight:400;width:100%;">Transit Time: <b>{{$transit_time}}</b></div>
        </div>
      <?php } $transit_time =null; ?>
    <?php endfor; ?>
  </div>

  <?php if($data['type']=="Return"): ?>
    <div class="container flight">
        <div class="row heading">
          <div style="text-align:center;font-size:17px;font-weight:700;"><b>Return Ticket</b></div>
        </div>
      <?php
        $transit_time = null;
        for ($i = 0; $i < (int)count($data['bto']); $i++):

        $dep_timestamp = strtotime($data['bfromDate'][$i]);
        $dep_day = date('l', $dep_timestamp);
        $dep_date = date('d', $dep_timestamp);
        $dep_month = date('M', $dep_timestamp);
        $dep_year = date('Y', $dep_timestamp);
        $dep_time = date('h:i A', $dep_timestamp);

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
        $arr_time = date('h:i A', $arr_timestamp);


        $flight_time = str_replace('PT','',$data['bitime'][$i]);
        $flight_time = str_replace('H','H ',$flight_time);

      ?>
        <div class="row">
          <table border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                  <td class="flight-name">{{$data['bname'][$i]}}</td>
                  <td class="depart-date">
                    <span class="day">{{$dep_day}}</span>
                    <span class="date">{{$dep_date}}-{{$dep_month}}</span>
                    <span class="year">{{$dep_year}}</span>
                  </td>
                  <td class="depart-arival">
                    <div class="depart">
                      <span class="bold">{{$data['bfrom'][$i]}}</span>
                      <span class="time">{{$dep_time}}</span>
                    </div>
                    <div class="depart-line">
                      <div class="flight-line">
                        <span class="line"></span>
                        <span class="airplane-icon"><img src="https://gondaltravel.com/images/plane-solid.png"></span>
                      </div>
                      <span><b>{{$flight_time}}</b></span>
                    </div>
                    <div class="arrival">
                      <span class="bold">{{$data['bto'][$i]}}</span>
                      <span class="time">{{$arr_time}}</span>
                    </div>
                  </td>
                  <td class="flight-details">
                    <span class="flight-number">{{$data['bfnumber'][$i]}}</span>
                    <span class="flight-class">{{$data['class']}}</span>
                    <span class="aircraft">{{$data['baircraft'][0]}}</span>
                  </td>
                  <td class="baggage">
                    <span class="baggage-icon"><img src="https://gondaltravel.com/images/suitcase-solid.png"></span>
                    <span>{{$data['weight']}}</span>
                  </td>
                </tr>
            </tbody>
          </table>
        </div>

        <!-- <div class="row heading">
          <div class="col-sm-2">
            <p class="flight-name">{{$data['bname'][$i]}}</p>
          </div>
          <div class="col-sm-2">
            <span class="day">{{$dep_day}}</span>
            <span class="date">{{$dep_date}}-{{$dep_month}}</span>
            <span class="year">{{$dep_year}}</span>
          </div>
          <div class="col-sm-5">
            <div class="depart">
              <span class="bold">{{$data['bfrom'][$i]}}</span>
              <span class="time">{{$dep_time}}</span>
            </div>
            <div class="depart-line">
              <div class="flight-line">
                <span></span>
                <svg version="1.1" id="Layer_1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 12" enable-background="new 0 0 12 12" xml:space="preserve" class="airplane-icon">
                    <path fill="#898294" d="M3.922,12h0.499c0.181,0,0.349-0.093,0.444-0.247L7.949,6.8l3.233-0.019C11.625,6.791,11.989,6.44,12,6 c-0.012-0.44-0.375-0.792-0.818-0.781L7.949,5.2L4.866,0.246C4.77,0.093,4.602,0,4.421,0L3.922,0c-0.367,0-0.62,0.367-0.489,0.71 L5.149,5.2l-2.853,0L1.632,3.87c-0.084-0.167-0.25-0.277-0.436-0.288L0,3.509L1.097,6L0,8.491l1.196-0.073 C1.382,8.407,1.548,8.297,1.632,8.13L2.296,6.8h2.853l-1.716,4.49C3.302,11.633,3.555,12,3.922,12"></path>
                </svg>
              </div>
              <span><b>{{$flight_time}}</b></span>
            </div>
            <div class="arrival">
              <span class="bold">{{$data['bto'][$i]}}</span>
              <span class="time">{{$arr_time}}</span>
            </div>
          </div>
          <div class="col-sm-2">
            <span class="flight-number">{{$data['bfnumber'][$i]}}</span>
            <span class="flight-class">{{$data['class']}}</span>
            <span class="aircraft">{{$data['baircraft'][0]}}</span>
          </div>
          <div class="col-sm-1 baggage">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="airplane-icon">
              <path d="M128 480h256V80c0-26.5-21.5-48-48-48H176c-26.5 0-48 21.5-48 48v400zm64-384h128v32H192V96zm320 80v256c0 26.5-21.5 48-48 48h-48V128h48c26.5 0 48 21.5 48 48zM96 480H48c-26.5 0-48-21.5-48-48V176c0-26.5 21.5-48 48-48h48v352z"/>
            </svg>
            <span>{{$data['weight']}}</span>
          </div>
        </div> -->
        <?php if($transit_time!=null){ ?>
        <div class="row">
          <div style="text-align:center;font-size:13px;font-weight:400;">Transit Time: <b>{{$transit_time}}</b></div>
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
        <p>1) Please read the following terms and conditions.Check-in counters open 3 hours prior to departure off flight and close 1 hour prior to departure of flight ,you may be denied boarding if you fail to
        report on time.</p>
        <p>2) Please Re-check the passenger name(s) as per the passport/identity proof, departure, arrival date, time, flight number, terminal, baggage details etc.</p>
        <p>3) In case of International travel, please check your requirements for travel documentation like validPassport/visa/Ok to Board/travel and medical insurance with the airline and relevant Embassy
        orConsulate before commencing your journey.</p>
        <p>4) The local authorities in certain countries may impose additional taxes (VAT, tourist tax etc.), which generally has to be paid locally.</p>
        <p>5) We are not responsible for any schedule change/flight cancellation by the airline before and after issuance of the tickets.</p>
        <p>6) We will not be held responsible for any loss or damage to traveler’s and his/her belongings due to any accident, theft or other Mishap / Unforeseen circumstances.</p>
        <h5>Bon Voyage!</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-sm">0033950379906</div>
      <div class="col-sm">www.gondaltravel.com</div>
      <div class="col-sm">hello@gondaltravel.com</div>
    </div>
  </div>
</footer>
<!-- Container End -->
</body>
</html>
