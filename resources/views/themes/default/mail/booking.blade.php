<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="UTF-8">
		<title> Online Booking </title>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700%7CRaleway:700' rel='stylesheet' type='text/css'>
		<style>
			body
			{
				font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
			}
			table tr, td, th
			{
				padding: 5px 0;
			}
			.heading{
			    text-align: right;
								color: #ed9222;
								font-size: 20px;
								font-weight: bold;
							text-decoration: none;
			}
		</style>
	</head>
	<body>
		<div style="max-width: 700px;
			margin: 0 auto;
			border: solid 1px #eee;
			width: 100%;">
			<header style="padding:10px 20px;
				margin-bottom: 30px;
				border-bottom: solid 1px #eee;
				background: url(header.png);
				background-size: cover;">
				<table style="border:0; width: 100%;">
					<tbody>
						<tr>
							<td><div class="heading"> Hills Trek Pvt. Ltd. </div></td>
							<td> <div class="heading"> Phone:  
							{{$data->phone}}
							</div> </td>
						</tr>
					</tbody>
				</table>
				</header><!-- /header -->
				<main style="    padding: 10px 20px;">
					<!--  trip details-->
					<div>
						<div>
							<h3 style="
							margin: 0;
							padding: 5px 20px;
							background: #414143;
							display: inline-block;
							color: #ffffff;
							font-size: 15px;
							font-weight: 600;
							">Trip Details</h3>
						</div>
						<div style="border: solid 1px #414143;padding: 20px;margin-bottom: 30px;">
							<table width="80%">
								<tbody>
									<tr>
										<td><b>Package </b> </td>
										<td>{{$trip}}</td>
									</tr>
									<tr>
										<td><b>Trip Start Date </b> </td>
										<td>{{$trip_start_date}}</td>
									</tr>
									<tr>
										<td><b>Number of People  </b> </td>
										<td>{{$nop}}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- trip details  -->
					<!--  Personal Information-->
					<div>
						<div>
							<h3 style="
							margin: 0;
							padding: 5px 20px;
							background: #414143;
							display: inline-block;
							color: #ffffff;
							font-size: 15px;
							font-weight: 600;
							">Personal Information</h3>
						</div>
						<div style="border: solid 1px #414143;padding: 20px;margin-bottom: 30px;">
							<table width="100%">
								<tbody>
									<tr>
										<td><b>Full Name </b> </td>
										<td>{{$title}} {{$first_name}} {{$middle_name}} {{$last_name}}</td>
									</tr>
									<tr>
										<td><b>Date of Birth </b> </td>
										<td> {{$dob}} </td>
									</tr>
									<tr>
										<td><b>Country </b> </td>
										<td>{{$country}}</td>
									</tr>
									<tr>
										<td><b>Passport Number </b> </td>
										<td>{{$passport_number}}</td>
									</tr>
									<tr>
										<td><b>Email </b> </td>
										<td>{{$email}}</td>
									</tr>
									<tr>
										<td><b>Phone  </b> </td>
										<td>{{$phone}}</td>
									</tr>
									<tr>
										<td><b>Cell Phone  </b> </td>
										<td>{{$mobile}}</td>
									</tr>
									<tr>
										<td><b>Occupation </b> </td>
										<td>{{$occupation}}</td>
									</tr>
									<tr>
										<td><b>Mailing Address </b> </td>
										<td>{{$mailing_address}}</td>
									</tr>
									<tr>
										<td><b>Emergency Contact Name </b> </td>
										<td>{{$emergency_contact}}</td>
									</tr>
									<tr>
										<td><b>Relationship </b> </td>
										<td>{{$relationship}}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- Personal Information  -->
					<!--  Flight Details-->
					<div>
						<div>
							<h3 style="
							margin: 0;
							padding: 5px 20px;
							background: #414143;
							display: inline-block;
							color: #ffffff;
							font-size: 15px;
							font-weight: 600;
							">Flight Details</h3>
							
						</div>
						
						<div style="border: solid 1px #414143;padding: 20px;margin-bottom: 30px;">
							<table width="100%">
								<tbody>
									<tr>
										<td><b>Arrival Date </b> </td>
										<td>{{$arrival_date}}</td>
									</tr>
									<tr>
										<td><b>HH </b> </td>
										<td> {{$arrival_hour}} : {{$arrival_minute}} {{$arrival_ampm}} </td>
									</tr>
									<tr>
										<td><b>Arrival Flight No.  </b> </td>
										<td> {{$arrival_flight}} </td>
									</tr>
									<tr>
										<td><b>Airport Pickup  </b> </td>
										<td>{{$arrival_pickup}}</td>
									</tr>
									<tr>
										<td colspan="2" style="border-bottom: solid 1px #000; padding: 8px;  "> </td>
									</tr>
									<tr>
										<td><b>Depature  Date </b> </td>
										<td>{{$depature_date}}</td>
									</tr>
									<tr>
										<td><b>HH </b> </td>
										<td>{{$depature_hour}} : {{$depature_minute}} {{$depature_ampm}}</td>
									</tr>
									<tr>
										<td><b>Depature Flight No.  </b> </td>
										<td>{{$depature_flight}} </td>
									</tr>
									<tr>
										<td><b>Airport Dropoff</b> </td>
										<td>{{$depature_dropoff}}</td>
									</tr>
								</tbody>
							</table>
						</div>
						
					</div>
					<!-- Flight Details  -->
					<!--  Special Requirement-->
					<div>
						<div>
							<h3 style="
							margin: 0;
							padding: 5px 20px;
							background: #414143;
							display: inline-block;
							color: #ffffff;
							font-size: 15px;
							font-weight: 600;
							">Special Requirement</h3>
						</div>
						<div style="border: solid 1px #414143;padding: 20px;margin-bottom: 30px;">
							<table width="100%">
								<tbody>
									<tr>
										<td> {{ $special_message }} </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- Special Requirement  -->
					<!--  Special Requirement-->
					<div>
						
						<div style="border: solid 1px #414143;padding: 20px;margin-bottom: 30px;">
							<table width="100%">
								
								<tbody>
									<tr>
										<td>I found you on <b> {{$source}} </b></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- Special Requirement  -->
					
					
				</main>
				<div style="
					background: #383838;
					padding: 30px 20px 20px;
					text-align: center;
					">
					<ul style="list-style: none;
						margin: 0;
						padding: 0;
						display: inline-flex;
						text-align: center;">
						<li style="
							display: inline-block;
							margin-right: 10px;
							"><a href="{{$data->facebook_link}}"> Facebook </a></li>
							<li style="
								display: inline-block;
								margin-right: 10px;
								"><a href="{{$data->twitter_link}}"> Twitter </a></li>
								
								</ul>
									<h4 style="color: #fff;
									font-weight: 600;
									margin: 10px 0 0;
									line-height: 26px;"> {{$data->address}} <br> Phone: {{$data->phone}}
									</h4>
								</div>
								<!--<div style="background: #313131;-->
								<!--	padding: 8px 20px;-->
								<!--	text-align: center;-->
								<!--	font-size: 14px;">-->
								<!--	<p style="color: #fff; margin: 0;"><a href="" style="color: #fff;margin-right: 8px;">Terms and Conditions</a> | <a href="" style="color: #fff;margin-right: 8px;">Travel Insurance</a> | <a href="" style="color: #fff;margin-right: 8px;">Embassies &amp; Consulates</a> | <a href="" style="color: #fff;margin-left: 8px;">FAQ</a></p>-->
								<!--</div>-->
								<!-- 
								<div style="padding: 15px 30px;
									text-align: center;
									font-size: 15px;
									color: #383838;">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.  </p>
								</div>
								-->
							</div>
						</body>
					</html>