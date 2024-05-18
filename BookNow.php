<?php
session_start();
include_once 'db_connect.php';
if (isset($_SESSION['user_username']) || isset($_SESSION['user_useremail'])) {
  $bookedcarid =  $_GET['bookcarid'];
  $sqlcheckstatusbooked = "SELECT * FROM `bookcar` where `Car_ID_Fk` = $bookedcarid";
  $getdetails = mysqli_query($conn, $sqlcheckstatusbooked);
  $finalconvertdata =  mysqli_fetch_assoc($getdetails);
  $removespace = trim(isset($finalconvertdata['Carstatus']) ? $finalconvertdata['Carstatus'] : null);

  if ($removespace == "Booked") {
    header("location: car.php");
  } else {

?>
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
              <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Book Now <i class="ion-ios-arrow-forward"></i></span></p>
              <h1 class="mb-3 bread">Book Now</h1>
            </div>
          </div>
        </div>
      </section>


      <section class="ftco-section bg-light">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <form action="BookNowQuery.php" method="post">
                <h2>Make your trip</h2>
                <div class="form-group">
                  <label for="pickarea" class="label">Pick-up location</label>
                  <input type="hidden" name="carid" value="<?php echo $_GET['bookcarid'] ?>" readonly>
                  <select name="pickup_area" id="pickarea" class="form-control">
                    <option>-- Select Area --</option>
                    <!-- Malir -->
                    <optgroup label="Malir">
                      <option value="Abbas Town">Abbas Town</option>
                      <option value="Baba and Bhit Islands">Baba and Bhit Islands</option>
                      <option value="Baghdadi, Karachi">Baghdadi, Karachi</option>
                      <option value="Bahadurabad">Bahadurabad</option>
                      <option value="Baldia Colony">Baldia Colony</option>
                      <option value="Baloch Colony">Baloch Colony</option>
                      <!-- Add more Malir areas here -->
                    </optgroup>
                    <!-- Defence -->
                    <optgroup label="Defence">
                      <option value="Defence Housing Authority, Karachi">Defence Housing Authority, Karachi</option>
                      <option value="Defence View">Defence View</option>
                      <option value="Delhi Colony">Delhi Colony</option>
                      <!-- Add more Defence areas here -->
                    </optgroup>
                    <!-- Gulshan -->
                    <optgroup label="Gulshan">
                      <option value="Gulistan-e-Johar">Gulistan-e-Johar</option>
                      <option value="Gulshan-e-Iqbal">Gulshan-e-Iqbal</option>
                      <option value="Gulshan-e-Maymar">Gulshan-e-Maymar</option>
                      <!-- Add more Gulshan areas here -->
                    </optgroup>
                    <!-- Naizmabad -->
                    <optgroup label="Naizmabad">
                      <option value="Garden East">Garden East</option>
                      <option value="Garden West">Garden West</option>
                      <option value="Garden, Karachi">Garden, Karachi</option>
                      <!-- Add more Naizmabad areas here -->
                    </optgroup>
                    <!-- Add more neighborhoods and areas as needed -->
                  </select>
                </div>
                <div class="form-group">
                  <label for="droparea" class="label">Drop-off location</label>
                  <select name="drop_area" id="droparea" class="form-control">
                    <option>-- Select Area --</option>
                    <!-- Malir -->
                    <optgroup label="Malir">
                      <option value="Abbas Town">Abbas Town</option>
                      <option value="Baba and Bhit Islands">Baba and Bhit Islands</option>
                      <option value="Baghdadi, Karachi">Baghdadi, Karachi</option>
                      <option value="Bahadurabad">Bahadurabad</option>
                      <option value="Baldia Colony">Baldia Colony</option>
                      <option value="Baloch Colony">Baloch Colony</option>
                      <!-- Add more Malir areas here -->
                    </optgroup>
                    <!-- Defence -->
                    <optgroup label="Defence">
                      <option value="Defence Housing Authority, Karachi">Defence Housing Authority, Karachi</option>
                      <option value="Defence View">Defence View</option>
                      <option value="Delhi Colony">Delhi Colony</option>
                      <!-- Add more Defence areas here -->
                    </optgroup>
                    <!-- Gulshan -->
                    <optgroup label="Gulshan">
                      <option value="Gulistan-e-Johar">Gulistan-e-Johar</option>
                      <option value="Gulshan-e-Iqbal">Gulshan-e-Iqbal</option>
                      <option value="Gulshan-e-Maymar">Gulshan-e-Maymar</option>
                      <!-- Add more Gulshan areas here -->
                    </optgroup>
                    <!-- Naizmabad -->
                    <optgroup label="Naizmabad">
                      <option value="Garden East">Garden East</option>
                      <option value="Garden West">Garden West</option>
                      <option value="Garden, Karachi">Garden, Karachi</option>
                      <!-- Add more Naizmabad areas here -->
                    </optgroup>
                    <!-- Add more neighborhoods and areas as needed -->
                  </select>
                </div>
                <div class="d-flex">
                  <div class="form-group mr-2">
                    <label for="" class="label">Pick-up date</label>
                    <input type="date" name="pickupdate" id="datepicker" class="form-control" placeholder="Date" min="<?php echo date('Y-m-d'); ?>">
                  </div>
                  <div class="form-group ml-2">
                    <label for="" class="label">Drop-off date</label>
                    <input type="date" name="dropoffdate" class="form-control" placeholder="Date" min="<?php echo date('Y-m-d'); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="label">Pick-up time</label>
                  <input type="text" class="form-control" name="time_pick" id="time_pick" placeholder="Time">
                </div>
                <div class="form-group">
                  <input type="submit" name="BookCar" value="Rent A Car Now" class="btn btn-secondary py-3 px-4">
                </div>
              </form>
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
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
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
                    <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
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
                Copyright &copy;<script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
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
      <script>
        $('#datepicker').datetimepicker({
          format: 'DD-MM-YYYY',
          minDate: new Date
        });
      </script>
    </body>

    </html>


<?php }
} else {
  header("location: Login.php");
}
