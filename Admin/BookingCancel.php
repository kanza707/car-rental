<?php
include_once 'db_connect.php';
$bookingid =  $_GET['bookid'];

$bookingcancelquery = "UPDATE `bookcar` SET `Carstatus`='Not-Booked' WHERE `BookCarid`= $bookingid";
$result = mysqli_query($conn, $bookingcancelquery);
if ($result) {
  header("location: ShowBooking.php?success=Booking Cancel Successfully");
} else {
  header("location: ShowBooking.php?error=Booking Failed");
}
