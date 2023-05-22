<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('images/favicon.png')}}">
  <title>GTravel Flight Itinerary - {{$ticket->prn_no}}</title>
  <meta name="author" content="https://logixbit.com">
  <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  <style>
    html{font:12px/1 'Open Sans',Helvetica,sans-serif;overflow:auto;size:A4;margin:0;padding:0}body{box-sizing:border-box;width:8.25in;height:11.6in;margin:0 auto;overflow:hidden;padding:.15in;background:#FFF;border:1px #D3D3D3 solid;border-radius:1px;box-shadow:0 0 1in -.25in rgba(0,0,0,0.5);font-family:Helvetica,sans-serif;line-height:1.5}@page{size:A4;margin:.5em}@media print{html,body{width:8.25in;height:11.6in}.main-page{margin:0;border:initial;border-radius:initial;width:initial;min-height:initial;box-shadow:initial;background:initial;page-break-after:always}.row{margin:0;padding:0;flex-wrap:unset}.container{padding:0}}h1,h2,h3,h4,h5,h6{color:#5D6975;font-size:1.4em;font-weight:400;text-align:center;margin:0 0 20px}.row{margin:0;flex-wrap:unset}.top-head{margin-bottom:10px;border-bottom:3px solid #5D6975}#logo{margin-right:15px!important}.top-head img{width:130px;margin:0 -15px;padding-bottom:5px}.clearfix:after{content:"";display:table;clear:both}a{color:#5D6975;text-decoration:underline}.booking{clear:both;justify-content:space-between;float:right}.booking span{text-transform:uppercase;font-size:15px;margin:10px auto;clear:both;text-align:right}.booking span h3{text-align:right;font-weight:800}.agency{clear:both;justify-content:space-between;float:right;width:100%}.contact-info span{font-size:15px;margin:5px auto;clear:both;text-align:right}.contact-info span strong{text-transform:uppercase}.contact-info > span > p{margin:0;font-size:13px;font-weight:600}.contact span strong{text-transform:uppercase}.contact span{font-size:15px;margin:5px auto;clear:both;text-align:right}.contact span p{margin:0;font-size:13px;font-weight:600}.heading{border-bottom:1px solid #5D6975}.heading span{display:inline-block}.heading p{font-size:13px;font-weight:600;margin:0}.pdetails p{font-size:15px;font-weight:700;text-transform:uppercase;float:left;word-break:break-all}.passenger{border-bottom:1px solid #5D6975;padding-bottom:10px;text-align:left}.passenger .row .col-sm{word-break:break-word}.passenger > .heading > .col-sm-2,.col-sm-4{margin:0;text-align:left!important}.passenger > .heading > p{margin:0;padding-right:5px;padding-left:5px}footer{color:#5D6975;bottom:0;padding:10px 0;font-size:12px}.footer-sec .row .col-12 h5{font-size:15px;font-weight:600;text-align:center}footer p{margin:0;padding:0;line-height:1.2}footer .row .col-sm{text-align:center;font-weight:600}.flight-line{line-height:3;}.flight-line span{display:inline-block;width:75%;border:1px solid grey}.flight-stop{position:relative;top:-.125rem;display:inline-block;width:.375rem;height:.375rem;margin:0 40%;border-radius:.375rem;background-color:#d1435b;background-image:none;line-height:0;box-shadow:0 0 0 .125rem #fff;zoom:1}.airplane-icon{display:inline-block;width:1.9rem}.flight-details{display:flex;flex-flow:row wrap;flex:1 1 78%;text-align:center}.flight-depart-detail{display:flex;max-width:32%;padding-right:.375rem;flex-direction:column;align-items:flex-end;flex:0 1 32%;text-align:right}.baggage span{display:block}.flight > .heading > .col-sm-1,.col-sm-2,.col-sm-3,.col-sm-5{margin:0;padding-right:2px;padding-left:2px;text-align:center}.semi-bold{font-weight:800}.bold{font-size:30px;clear:both;font-weight:600}.time{font-size:18px;clear:both}.depart{display:inline-block;clear:both;width:30%;text-align:center}.depart-line{display:inline-block;clear:both;width:35%;text-align:center}.arrival{display:inline-block;clear:both;width:30%;text-align:center}.day,.year{font-size:17px;clear:both;display:block!important}.date{font-size:20px;font-weight:600}.flight-number{font-size:15px;font-weight:800;clear:both;display:block!important}.flight-class{font-size:15px;clear:both;display:block!important}.aircraft{font-size:15px;clear:both;display:block!important}.flight-name{font-size:15px!important;clear:both;display:block!important}
  </style>
</head>
<body>
@php
$coll_cash = App\Models\CashCollector::where('prn_no',$ticket->prn_no)->first();
@endphp
<div class="main-page">
  <header class="clearfix">
    <div class="container top-head">
      <div class="row">
        <div class="col-md-7">
          <?php
            $image_link = asset('images/logo-web-small.png');
          ?>
          <img style="float:left;" src="{{$image_link}}"/>
        </div>
        <div class="col-md-5">
          <div class="row booking">
            <span><strong>Booking Reference</strong>
            <h3>{{$ticket->prn_no}}</h3>
            </span>
          </div>
          <div class="row agency">
            @if($coll_cash!=null)
              @php
              $colname = App\Models\User::where('id',$coll_cash->collector_id)->first();
              @endphp
              <div class="contact-info">
                <span><p>Booked by:</p>
                <strong>{{$colname->name}}</strong></span>
              </div>
              <div class="contact">
                <span><p >Office Phone:</p>
                <strong>{{$colname->phone}}</strong></span>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </header>

  <section>
    <div class="container passenger">
      <div class="row heading">
        <div class="col-sm-4">
          <p>Passanger Details</p>
        </div>
      </div>
      <?php $count=1; ?>
      @foreach($passengers as $pass)
        <div class="row pdetails">
          <div class="col-sm-4">
            <p>{{$count}} - {{$pass->name}} {{$pass->surname}}</p>
          </div>
        </div>
        <?php $count++; ?>
      @endforeach
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
        <div class="row heading">
          <div class="col-sm-2">
            <p class="flight-name">{{$data['name'][$i]}}</p>
            <span class="flight-number">{{$data['fnumber'][$i]}}</span>
            <span class="flight-class">{{$data['class']}}</span>
          </div>
          <div class="col-sm-2">
            <span class="day">{{$dep_day}}</span>
            <span class="date">{{$dep_date}}-{{$dep_month}}</span>
            <span class="year">{{$dep_year}}</span>
          </div>
          <div class="col-sm-7">
            <div class="depart">
              <span class="bold">{{$data['from'][$i]}}</span>
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
              <span class="bold">{{$data['to'][$i]}}</span>
              <span class="time">{{$arr_time}}</span>
            </div>
          </div>
          <div class="col-sm-1 baggage">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="airplane-icon">
                <path d="M128 480h256V80c0-26.5-21.5-48-48-48H176c-26.5 0-48 21.5-48 48v400zm64-384h128v32H192V96zm320 80v256c0 26.5-21.5 48-48 48h-48V128h48c26.5 0 48 21.5 48 48zM96 480H48c-26.5 0-48-21.5-48-48V176c0-26.5 21.5-48 48-48h48v352z"/>
              </svg>
            <span>{{$data['weight']}}</span>
          </div>
          
        </div>
        <?php if($transit_time!=null){ ?>
          <div class="row heading">
            <div class="col-sm-12" style="text-align:center;font-size:13px;font-weight:400;">Transit Time: <b>{{$transit_time}}</b></div>
          </div>
        <?php } $transit_time =null; ?>
      <?php endfor; ?>
    </div>

    <?php if($data['type']=="Return"): ?>
      <div class="container flight">
          <div class="row heading">
            <div class="col-sm-12" style="text-align:center;font-size:17px;font-weight:700;"><b>Return Ticket</b></div>
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
        
          
          <div class="row heading">
            <div class="col-sm-2">        
              <p class="flight-name">{{$data['bname'][$i]}}</p>
              <span class="flight-number">{{$data['bfnumber'][$i]}}</span>
              <span class="flight-class">{{$data['class']}}</span>
            </div>
            <div class="col-sm-2">
              <span class="day">{{$dep_day}}</span>
              <span class="date">{{$dep_date}}-{{$dep_month}}</span>
              <span class="year">{{$dep_year}}</span>
            </div>
            <div class="col-sm-7">
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
            <div class="col-sm-1 baggage">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="airplane-icon">
                <path d="M128 480h256V80c0-26.5-21.5-48-48-48H176c-26.5 0-48 21.5-48 48v400zm64-384h128v32H192V96zm320 80v256c0 26.5-21.5 48-48 48h-48V128h48c26.5 0 48 21.5 48 48zM96 480H48c-26.5 0-48-21.5-48-48V176c0-26.5 21.5-48 48-48h48v352z"/>
              </svg>
              <span>{{$data['weight']}}</span>
            </div>
          </div>
          <?php if($transit_time!=null){ ?>
          <div class="row heading">
            <div class="col-sm-12" style="text-align:center;font-size:13px;font-weight:400;">Transit Time: <b>{{$transit_time}}</b></div>
          </div>
          <?php } $transit_time =null; ?>
        <?php endfor; ?>
      </div>
    <?php endif; ?>
  </section>

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
</div>
<!-- Container End -->

</body>
</html>
