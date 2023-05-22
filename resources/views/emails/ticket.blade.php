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
    
    <style>
       .header {
  border: 1px solid red;
  padding: 15px;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}

[class*="col-"] {
  float: left;
  padding: 15px;
  border: 1px solid red;
}

.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}

</style>
        
  
</head>
<body>
    
    
    
    
    
    
     <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">

<!--HEADER -->

		<tbody>
		    <tr>
			<td align="center">
				<!--<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">-->
				<!--	<tbody><tr>-->
				<!--		<td align="center" valign="top" background="{{asset('images/br.jpg')}}" bgcolor="#66809b" style="background-size:cover; background-position:top;height=" 400""="">-->
							<!--<table class="col-600" width="600" height="128" border="0" align="center" cellpadding="0" cellspacing="0">-->

							<!--	<tbody><tr>-->
							<!--		<td height="40"></td>-->
							<!--	</tr>-->


							<!--	<tr>-->
							<!--		<td align="center" style="line-height: 0px;">-->
									    
							<!--			<img style="display:block; line-height:0px; font-size:0px; border:0px;" src="{{asset('images/logo.png')}}" width="109" height="115" alt="logo">-->
							<!--		</td>-->
							<!--	</tr>-->



							<!--	<tr>-->
							<!--		<td align="center" style="font-family: 'Raleway', sans-serif; font-size:36px; color:#ffffff; line-height:24px; font-weight: bold; letter-spacing: 5px;">-->
							<!--			THANKS <span style="font-family: 'Raleway', sans-serif; font-size:32px; color:#ffffff; line-height:39px; font-weight: 300; letter-spacing: 5px;">FOR BOOKING</span>-->
							<!--		</td>-->
									
								
							<!--	</tr>-->





							<!--	<tr>-->
							<!--		<td align="center" style="font-family: 'Lato', sans-serif; font-size:15px; color:#ffffff; line-height:24px; font-weight: 300;">-->
							<!--			Now you will recieve Email everytime automatically <br>on your ticket updates.-->
							<!--		</td>-->
							<!--	</tr>-->


							<!--	<tr>-->
							<!--		<td height="50"></td>-->
							<!--	</tr>-->
							<!--</tbody></table>-->
				<!--		</td>-->
				<!--	</tr>-->
				<!--</tbody></table>-->
			</td>
		</tr>


<!-- END HEADERR -->

<center>
     <h1><strong>Gondal Travel</strong></h1>
                    <i class="fas fa-phone-alt"></i> +33 7 67 77 59 22<br>
                    <i class="fas fa-envelope"></i> infosupport@gondaltravel.com<br>
                    
                    @php
$coll_cash = App\Models\CashCollector::where('prn_no',$ticket->prn_no)->first();
@endphp

@if($coll_cash!=null)
    <h1>Flight/GDS PNR: {{$ticket->prn_no}}</h1></center>
    @else
    <h1>Flight Reservation # : {{$ticket->prn_no}}</h1></center>
@endif

<!-- START SHOWCASE -->

	
<!-- END SHOWCASE -->


<!-- START TITLE -->

		<tr>
			<td align="center">
				<table align="center" class="col-600" width="600" border="0" cellspacing="0" cellpadding="0">
					<tbody><tr>
						<td align="center" bgcolor="#333">
							<table class="col-600" width="600" align="center" border="0" cellspacing="0" cellpadding="0">
								<tbody><tr>
									<td height="33"></td>
								</tr>
								<tr>
									<td>


										<table class="col1" width="183" border="0" align="left" cellpadding="0" cellspacing="0">

											<tbody><tr>
											<td height="18"></td>
											</tr>

											<tr>
												



											</tr>
										</tbody></table>



										<table class="col3_one" width="380" border="0" align="left" cellpadding="0" cellspacing="0">

											<tbody><tr align="left" valign="top">
												<td style="font-family: 'Raleway', sans-serif; font-size:20px; color:#fbb016; line-height:30px; font-weight: bold;">
											</tr>


											<tr>
												<td height="5"></td>
											</tr>


											<tr align="left" valign="top">
												<td style="font-family: 'Lato', sans-serif; font-size:14px; color:#fff; line-height:24px; font-weight: 300;">
												@for ($i = 0; $i < (int)count($data['to']); $i++)
												<ul style="font-color:white;">
  <li>Flight Take Off From : 
{{$data['from'][$i]}} </li>
  <li>Duration : {{$data['itime'][$i]}} </li>
  <li>Flight Landing in : {{$data['to'][$i]}}
</li>
  <li>Flight : {{$data['fnumber'][$i]}}</li>
  <li>Departure : {{date('d-M-Y H:m', strtotime($data['fromDate'][$i]))}}</li>
  <li>Arrival : {{date('d-M-Y H:m', strtotime($data['toDate'][$i]))}}</li>
</ul>  
		@endfor										</td>
											</tr>

											<tr>
												<td height="10"></td>
											</tr>

										

										</tbody></table>
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										<table class="col3_one" width="380" border="0" align="right" cellpadding="0" cellspacing="0">

											<tbody><tr align="left" valign="top">
												<td style="font-family: 'Raleway', sans-serif; font-size:20px; color:#fbb016; line-height:30px; font-weight: bold;">Passengers Information 
											</tr>


											<tr>
												<td height="5"></td>
											</tr>


											<tr align="left" valign="top">
												<td style="font-family: 'Lato', sans-serif; font-size:14px; color:#fff; line-height:24px; font-weight: 300;">
							  @foreach($passengers as $pass)
												<ul style="font-color:white;">
  <li>Name : 
{{$pass->name}} {{$pass->surname}}. </li>
  <li>Age-Type : {{$pass->age}}. </li>
  
</ul>  
		@endforeach										</td>
											</tr>

											<tr>
												<td height="10"></td>
											</tr>

										

										</tbody></table>
										
										
										
										
										
										
										
										
										
									</td>
									
				
								</tr>
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								<tr>
									<td height="33"></td>
								</tr>
							</tbody></table>
						</td>
					</tr>
				</tbody></table>
			</td>
		</tr>


<!-- END TITLE -->


<!--ABOUT -->

	


<!-- END ABOUT -->



<!-- CHECKOUT BELOW -->

	


<!-- END CHECKOUT BELOW -->


<!--START PRICING-->

		<!--<tr>-->
		<!--	<td align="center">-->
		<!--		<table width="600" class="col-600" align="center" border="0" cellspacing="0" cellpadding="0" style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">-->
		<!--			<tbody><tr>-->
		<!--				<td height="50"></td>-->
		<!--			</tr>-->
		<!--			<tr>-->
		<!--				<td>-->


		<!--					<table style="border:1px solid #e2e2e2;" class="col2" width="287" border="0" align="left" cellpadding="0" cellspacing="0">-->


		<!--						<tbody><tr>-->
		<!--							<td height="40" align="center" bgcolor="#333" style="font-family: 'Raleway', sans-serif; font-size:18px; color:#fbb016; line-height:30px; font-weight: bold;">Class of service </td>-->
		<!--						</tr>-->


		<!--						<tr>-->
		<!--							<td align="center">-->
		<!--								<table class="insider" width="237" border="0" align="center" cellpadding="0" cellspacing="0">-->
		<!--									<tbody><tr>-->
		<!--										<td height="20"></td>-->
		<!--									</tr>-->

		<!--									<tr align="center" style="line-height:0px;">-->
		<!--										<td style="font-family: 'Lato', sans-serif; font-size:20px; color:black; font-weight: bold; line-height: 44px;">{{$data['class']}}</td>-->
		<!--									</tr>-->


		<!--									<tr>-->
		<!--										<td height="15"></td>-->
		<!--									</tr>-->


		<!--									<tr>-->
		<!--										<td height="15"></td>-->
		<!--									</tr>-->



										


		<!--								</tbody></table>-->
		<!--							</td>-->
		<!--						</tr>-->
		<!--						<tr>-->
		<!--							<td height="30"></td>-->
		<!--						</tr>-->
		<!--					</tbody></table>-->





		<!--					<table width="1" height="20" border="0" cellpadding="0" cellspacing="0" align="left">-->
		<!--						<tbody><tr>-->
		<!--							<td height="20" style="font-size: 0;line-height: 0;border-collapse: collapse;">-->
		<!--								<p style="padding-left: 24px;">&nbsp;</p>-->
		<!--							</td>-->
		<!--						</tr>-->
		<!--					</tbody></table>-->


		<!--					<table style="border:1px solid #e2e2e2;" class="col2" width="287" border="0" align="right" cellpadding="0" cellspacing="0">-->


		<!--						<tbody><tr>-->
		<!--							<td height="40" align="center" bgcolor="#333" style="font-family: 'Raleway', sans-serif; font-size:18px; color:#fbb016; line-height:30px; font-weight: bold;">Flight Type</td>-->
		<!--						</tr>-->


		<!--						<tr>-->
		<!--							<td align="center">-->
		<!--								<table class="insider" width="237" border="0" align="center" cellpadding="0" cellspacing="0">-->
		<!--									<tbody><tr>-->
		<!--										<td height="20"></td>-->
		<!--									</tr>-->

		<!--									<tr align="center" style="line-height:0px;">-->
		<!--										<td style="font-family: 'Lato', sans-serif; font-size:20px; color:black; font-weight: bold; line-height: 44px;">{{$data['type']}}</td>-->
		<!--									</tr>-->


		<!--									<tr>-->
		<!--										<td height="30"></td>-->
		<!--									</tr>-->



										


		<!--								</tbody></table>-->
										
										
										
										
										
										
							
										
										
										
		<!--							</td>-->
		<!--						</tr>-->
		<!--						<tr>-->
		<!--							<td height="30"></td>-->
		<!--						</tr>-->
		<!--					</tbody></table>-->

		<!--				</td>-->
		<!--			</tr>-->
		<!--		</tbody></table>-->
		<!--	</td>-->
			
		<!--</tr>-->
			<!--2nd price wala-->
		<!--	<tr>-->
		<!--		<td align="center">-->
		<!--		<table width="600" class="col-600" align="center" border="0" cellspacing="0" cellpadding="0" style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">-->
		<!--			<tbody><tr>-->
		<!--				<td height="50"></td>-->
		<!--			</tr>-->
		<!--			<tr>-->
		<!--				<td>-->


		<!--					<table style="border:1px solid #e2e2e2;" class="col2" width="287" border="0" align="left" cellpadding="0" cellspacing="0">-->


		<!--						<tbody><tr>-->
		<!--							<td height="40" align="center" bgcolor="#333" style="font-family: 'Raleway', sans-serif; font-size:18px; color:#fbb016; line-height:30px; font-weight: bold;">Aircraft Info</td>-->
		<!--						</tr>-->


		<!--						<tr>-->
		<!--							<td align="center">-->
		<!--								<table class="insider" width="237" border="0" align="center" cellpadding="0" cellspacing="0">-->
		<!--									<tbody><tr>-->
		<!--										<td height="20"></td>-->
		<!--									</tr>-->

		<!--									<tr align="center" style="line-height:0px;">-->
		<!--										<td style="font-family: 'Lato', sans-serif; font-size:20px; color:black; font-weight: bold; line-height: 44px;">{{$data['aircraft'][0]}}</td>-->
		<!--									</tr>-->


		<!--									<tr>-->
		<!--										<td height="15"></td>-->
		<!--									</tr>-->


		<!--									<tr>-->
		<!--										<td height="15"></td>-->
		<!--									</tr>-->



										


		<!--								</tbody></table>-->
		<!--							</td>-->
		<!--						</tr>-->
		<!--						<tr>-->
		<!--							<td height="30"></td>-->
		<!--						</tr>-->
		<!--					</tbody></table>-->





		<!--					<table width="1" height="20" border="0" cellpadding="0" cellspacing="0" align="left">-->
		<!--						<tbody><tr>-->
		<!--							<td height="20" style="font-size: 0;line-height: 0;border-collapse: collapse;">-->
		<!--								<p style="padding-left: 24px;">&nbsp;</p>-->
		<!--							</td>-->
		<!--						</tr>-->
		<!--					</tbody></table>-->


		<!--					<table style="border:1px solid #e2e2e2;" class="col2" width="287" border="0" align="right" cellpadding="0" cellspacing="0">-->


		<!--						<tbody><tr>-->
		<!--							<td height="40" align="center" bgcolor="#333" style="font-family: 'Raleway', sans-serif; font-size:18px; color:#fbb016; line-height:30px; font-weight: bold;">Airline</td>-->
		<!--						</tr>-->


		<!--						<tr>-->
		<!--							<td align="center">-->
		<!--								<table class="insider" width="237" border="0" align="center" cellpadding="0" cellspacing="0">-->
		<!--									<tbody><tr>-->
		<!--										<td height="20"></td>-->
		<!--									</tr>-->

		<!--									<tr align="center" style="line-height:0px;">-->
		<!--										<td style="font-family: 'Lato', sans-serif; font-size:20px; color:black; font-weight: bold; line-height: 44px;">{{$data['fcode']}}</td>-->
		<!--									</tr>-->


		<!--									<tr>-->
		<!--										<td height="30"></td>-->
		<!--									</tr>-->



										


		<!--								</tbody></table>-->
										
										
										
										
										
										
							
										
										
										
		<!--							</td>-->
		<!--						</tr>-->
		<!--						<tr>-->
		<!--							<td height="30"></td>-->
		<!--						</tr>-->
		<!--					</tbody></table>-->

		<!--				</td>-->
		<!--			</tr>-->
		<!--		</tbody></table>-->
		<!--	</td>-->
			
			
			
		<!--</tr>-->

</br>
<!-- END PRICING -->
<center>

<table style="width:70%">
  <tr>
    <th>Class of service : <b>{{$data['class']}}</b></th>
    <th>Flight Type : <b>{{$data['type']}}</b></th>
    <th>Aircraft Info : <b>{{$data['aircraft'][0]}}</b></th>
    <th>Airline : <b></b>{{$data['fcode']}}</b> </th>
  </tr>
 
 
</table>

</center>


@if($coll_cash!=null)
<center><h1> <strong> Invoice/Reciept Information </strong></h1></center>
<center>
    @php
    $colname = App\Models\User::where('id',$coll_cash->collector_id)->first()->name;
    @endphp
<h3>Collector Name:{{$colname}}</h3>
<h3>Cash Recieved:{{$coll_cash->collected_cash}}</h3>
<h3>Prn #:{{$coll_cash->prn_no}}</h3>
</center>
@endif

<center>
     <h1><strong>Terms & Conditions</strong></h1>
     </center>
                <p>1) Please read the following terms and conditions.Check-in counters open 3 hours prior to departure off flight and close 1 hour prior to departure of flight ,you may be denied boarding if you fail to report on time.</p>
                <p>2) Please Re-check the passenger name(s) as per the passport/identity proof, departure, arrival date, time, flight number, terminal, baggage details etc.</p>
                <p>3) In case of International travel, please check your requirements for travel documentation like validPassport/visa/Ok to Board/travel and medical insurance with the airline and relevant Embassy orConsulate before commencing your journey.</p>
                <p>4) The local authorities in certain countries may impose additional taxes (VAT, tourist tax etc.), which generally has to be paid locally.</p>
                <p>5) We are not responsible for any schedule change/flight cancellation by the airline before and after issuance of the tickets.</p>
                <p>6) We will not be held responsible for any loss or damage to traveler’s and his/her belongings due to any accident, theft or other Mishap / Unforeseen circumstances.</p>
                <p>7) Any amendments of the booking will be as per the airline terms and conditions comprising of penalties, fare difference which may change upon subject to availability by the airline.</p>
                <p>8) Any Cancellation/Refund of booking will be handled from case to case basis depending on the airline and agency terms and conditions. </p>
                <p>9) For any amendments, cancellation or ancillary services etc, you may connect with the agency from where you had issued the tickets.</p>
</br>
<!-- START FOOTER -->


	
				</tbody></table>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    





</body>
</html>
