<!DOCTYPE html>
<html lang="en">

<head>
	<title>CarRental - HomePage</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/aos.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html">Car<span>Book</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
					<!-- <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li> -->
					<!-- <li class="nav-item"><a href="pricing.html" class="nav-link">Pricing</a></li> -->
					<li class="nav-item"><a href="car.php" class="nav-link">Cars</a></li>
					<?php
					session_start();
					if (isset($_SESSION['User_Id'])) { ?>
						<li class="nav-item"><a href="TrackHistory.php" class="nav-link">Track Orders</a></li>
						<li class="nav-item"><a href="Logout.php" class="nav-link">Logout</a></li>
					<?php } else { ?>
						<li class="nav-item"><a href="Login.php" class="nav-link">Login</a></li>
					<?php } ?>

					<li class="nav-item"><a href="UserRegister.php" class="nav-link">Register</a></li>
					<!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
				</ul>
			</div>
		</div>
	</nav>
	<div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
				<div class="col-lg-8 ftco-animate">
					<div class="text w-100 text-center mb-md-5 pb-md-5">
						<h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
						<p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
						<a href="https://vimeo.com/45830194" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="ion-ios-play"></span>
							</div>
							<div class="heading-title ml-5">
								<span>Easy steps for renting a car</span>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section ftco-no-pt bg-light">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-md-12	featured-top">
					<div class="row no-gutters">
						<div class="col-md-4 d-flex align-items-center">
							<form action="#" class="request-form ftco-animate bg-primary">
								<h2>Make your trip</h2>
								<div class="form-group">
									<label for="" class="label">Pick-up location</label>
									<input type="text" class="form-control" placeholder="City, Airport, Station, etc">
								</div>
								<div class="form-group">
									<label for="" class="label">Drop-off location</label>
									<input type="text" class="form-control" placeholder="City, Airport, Station, etc">
								</div>
								<div class="d-flex">
									<div class="form-group mr-2">
										<label for="" class="label">Pick-up date</label>
										<input type="text" class="form-control" id="book_pick_date" placeholder="Date">
									</div>
									<div class="form-group ml-2">
										<label for="" class="label">Drop-off date</label>
										<input type="text" class="form-control" id="book_off_date" placeholder="Date">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="label">Pick-up time</label>
									<input type="text" class="form-control" id="time_pick" placeholder="Time">
								</div>
								<div class="form-group">
									<input type="submit" value="Rent A Car Now" class="btn btn-secondary py-3 px-4">
								</div>
							</form>
						</div>
						<div class="col-md-8 d-flex align-items-center">
							<div class="services-wrap rounded-right w-100">
								<h3 class="heading-section mb-4">Better Way to Rent Your Perfect Cars</h3>
								<div class="row d-flex mb-4">
									<div class="col-md-4 d-flex align-self-stretch ftco-animate">
										<div class="services w-100 text-center">
											<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
											<div class="text w-100">
												<h3 class="heading mb-2">Choose Your Pickup Location</h3>
											</div>
										</div>
									</div>
									<div class="col-md-4 d-flex align-self-stretch ftco-animate">
										<div class="services w-100 text-center">
											<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
											<div class="text w-100">
												<h3 class="heading mb-2">Select the Best Deal</h3>
											</div>
										</div>
									</div>
									<div class="col-md-4 d-flex align-self-stretch ftco-animate">
										<div class="services w-100 text-center">
											<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
											<div class="text w-100">
												<h3 class="heading mb-2">Reserve Your Rental Car</h3>
											</div>
										</div>
									</div>
								</div>
								<p><a href="#" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>

	<?php include_once 'footer.php';
	?>