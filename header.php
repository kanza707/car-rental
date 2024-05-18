<!DOCTYPE html>
<html lang="en">

<head>
  <title>CarRental - <?php echo $dynamictitle ?></title>
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

  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span> <?php echo $title ?> <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread"><?php echo  $subtitle; ?></h1>
        </div>
      </div>
    </div>
  </section>