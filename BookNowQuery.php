<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require_once 'vendor/autoload.php';

include_once 'db_connect.php';
if (isset($_SESSION['user_username']) || isset($_SESSION['user_useremail'])) {

  if (isset($_REQUEST['BookCar'])) {

    $cardid  =  $_REQUEST['carid'];
    $pickup_area  =  $_REQUEST['pickup_area'];
    $drop_area  =  $_REQUEST['drop_area'];
    $pickupdate  =  $_REQUEST['pickupdate'];
    $dropoffdate  =  $_REQUEST['dropoffdate'];
    $time_pick  =  $_REQUEST['time_pick'];
    $User_Id  = $_SESSION['User_Id'];

    $sqlInsertQuery = "INSERT INTO `bookcar`(`Pickuplocation`, `Dropofflocation`, `Pickupdate`, `Dropoffdate`, `Pickuptime`,`Carstatus`, `Car_ID_Fk`, `Userid_FK`) VALUES ('$pickup_area','$drop_area','$pickupdate','$dropoffdate','$time_pick','Booked',$cardid,$User_Id);";


    $result = mysqli_query($conn, $sqlInsertQuery);
    $mail = new PHPMailer(true);

    try {

      $mail->SMTPDebug  = SMTP::DEBUG_SERVER;
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'asadmaqsoom9@gmail.com';
      $mail->Password = 'wxjc kswv noji omfq';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;
      $mail->isHTML(true);
      $mail->setFrom('asadmaqsoom9@gmail.com', 'Car Book');
      $mail->addAddress($_SESSION['user_useremail']);
      $mail->Subject = "Car Booking Details";
      $mail->Body = "Hello <b>" . $_SESSION['user_username'] . "</b>,<br><br>You have successfully booked the car $cardid.<br>
      Booking Dates: $pickupdate <br><br>
      Ending Dates: $dropoffdate <br><br>
      Thank you for choosing CarBook.";
      $mail->send();
      echo "Email Sent Successfully";
      if ($result) {
        header("location: car.php?carbooked=Car Has Been Successfully Booked");
      } else {
        header("location: car.php?bookederror=Something Went Wrong");
      }
    } catch (Exception $e) {
      echo "Message Not Send. Mail Error: {$mail->ErrorInfo}";
    }
  } else {
    header("location: car.php?bookederror=Something Went Wrong");
  }
} else {
  header("location: Login.php");
}
