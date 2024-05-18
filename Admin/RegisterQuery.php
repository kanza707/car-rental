<?php
date_default_timezone_set('Asia/Karachi');
include_once 'db_connect.php';

$uname = $_REQUEST['username'];
$email = $_REQUEST['emailaddress'];
$password = $_REQUEST['password'];
// To Remove Space from Words just Like (Asad Ali : output  = AsadAli) 
$new_str = preg_replace("/\s+/", "", $uname);

$checkemail = "SELECT * FROM `adminregistrtation` where Email = '$email'";
$emailresult = mysqli_query($conn, $checkemail);
$checkusername = "SELECT * FROM `adminregistrtation` where Username = '$uname'";
$usernameresult = mysqli_query($conn, $checkusername);
if (mysqli_num_rows($emailresult) > 0) {
  header("location: Register.php?emailerror=Email Already Exsist");
} elseif (mysqli_num_rows($usernameresult) > 0) {
  header("location: Register.php?usererror=Username Already Exsist");
} else {
  // Register Code
  $RegisterQuery = "INSERT INTO `adminregistrtation`(`Username`, `Email`,`Passwords`) VALUES ('$new_str','$email','$password')";

  // To Run This Query
  $result = mysqli_query($conn, $RegisterQuery);
  if ($result) {
    header("location: Register.php?success=Registration Successfully");
  } else {
    header("location: Register.php?error=Registration Failed");
  }
}

// To Close This Connection
mysqli_close($conn);
