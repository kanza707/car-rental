<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cars - Book Now</title>
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
	<!-- END nav -->

	<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
				<div class="col-md-9 ftco-animate pb-5">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span>
					</p>
					<h1 class="mb-3 bread">Choose Your Car</h1>
				</div>
			</div>
		</div>
	</section>


	<section class="ftco-section bg-light">
		<div class="container">

			<div class="col-md-12 mt-2 mb-3">
				<?php if (isset($_GET['carbooked'])) { ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Congratulation! </strong> <?php echo $_GET['carbooked']; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php } elseif (isset($_GET['bookederror'])) { ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Alert! </strong> <?php echo $_GET['bookederror']; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php } ?>
			</div>
			<div class="row">
				<?php
				include_once 'db_connect.php';
				date_default_timezone_set('Asia/Karachi');
				$sqlshowcar = "SELECT * FROM add_cars ac inner join carcategory cc ON ac.CarCategoryid_FK = cc.CarCategoryid";
				$result = mysqli_query($conn, $sqlshowcar);
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
				?>
						<div class="col-md-4">
							<div class="car-wrap rounded ftco-animate">
								<div class="img rounded d-flex align-items-end" style="background-image: url('Admin/<?php echo $row['Car_Image'] ?>');">
								</div>
								<div class="text">
									<h2 class="mb-0"><a href="car-single.html"><?php echo $row['Car_Name'] ?></a></h2>
									<div class="d-flex mb-3">
										<span class="cat"><?php echo $row['CarCategoryName'] ?></span>
										<p class="price ml-auto">$<?php echo $row['CarRentPriceEachDay'] ?> <span>/day</span></p>
									</div>
									<p class="d-flex mb-0 d-block">
										<?php
										$id = $row['Car_ID'];

										// Fetch the latest booking record for the car
										$sqlcheckstatus = "SELECT * FROM bookcar WHERE Car_ID_Fk = $id ORDER BY BookCarid DESC LIMIT 1";
										$results = mysqli_query($conn, $sqlcheckstatus);
										$rows = mysqli_fetch_assoc($results);
										if ($rows) {
											$bookingdate = $rows['BookCarid'];
											$currentDate = date('Y-m-d');
											$dropoffDate = $rows['Dropoffdate'];
											if ($rows['Carstatus'] == "Booked") {
												if ($dropoffDate <= $currentDate) {
													$updatebookedtable = "UPDATE bookcar SET Carstatus='Not-Booked' WHERE BookCarid= $bookingdate";
													mysqli_query($conn, $updatebookedtable);
										?>
													<a href="BookNow.php?bookcarid=<?php echo $row['Car_ID'] ?>" class="btn btn-primary py-2 mr-1">Book
														now</a>
													<a href="car-single.php?carid=<?php echo $row['Car_ID'] ?>" class="btn btn-secondary py-2 ml-1">Details</a>
												<?php
												} else {
												?>
													<a href="" class="text-danger py-2 ml-1"><b>Already Booked</b></a>
													<a href="car-single.php?carid=<?php echo $row['Car_ID'] ?>" class="btn btn-secondary py-2 ml-1">Details</a>
													<br>
									<p style="font-size: 13px;" class="text-primary">End Date: <?php echo $rows['Dropoffdate'] ?></p>
								<?php }
											} else { ?>
								<a href="BookNow.php?bookcarid=<?php echo $row['Car_ID'] ?>" class="btn btn-primary py-2 mr-1">Book
									now</a>
								<a href="car-single.php?carid=<?php echo $row['Car_ID'] ?>" class="btn btn-secondary py-2 ml-1">Details</a>
							<?php }
										} else { ?>
							<a href="BookNow.php?bookcarid=<?php echo $row['Car_ID'] ?>" class="btn btn-primary py-2 mr-1">Book
								now</a>
							<a href="car-single.php?carid=<?php echo $row['Car_ID'] ?>" class="btn btn-secondary py-2 ml-1">Details</a>
						<?php
										}
						?>
						</p>

								</div>
							</div>
						</div>
					<?php
					}
				} else { ?>

					<div class="col-md-4">
						<h1>No Cars To Display</h1>
					</div>
				<?php }
				mysqli_close($conn);
				?>
			</div>
			<div class="row mt-5">
				<div class="col text-center">
					<div class="block-27">
						<ul>
							<li><a href="#">&lt;</a></li>
							<li class="active"><span>1</span></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">&gt;</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>


	<footer class="ftco-footer ftco-bg-dark ftco-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>book</span></a></h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
							blind texts.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Information</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">About</a></li>
							<li><a href="#" class="py-2 d-block">Services</a></li>
							<li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
							<li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
							<li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Customer Support</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">FAQ</a></li>
							<li><a href="#" class="py-2 d-block">Payment Option</a></li>
							<li><a href="#" class="py-2 d-block">Booking Tips</a></li>
							<li><a href="#" class="py-2 d-block">How it works</a></li>
							<li><a href="#" class="py-2 d-block">Contact Us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San
										Francisco, California, USA</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">

					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;
						<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</div>
	</footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/jquery.timepicker.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

</body>

</html>