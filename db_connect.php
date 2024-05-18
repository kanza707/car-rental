<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "carrentalsystem";

$conn =  mysqli_connect($hostname, $username, $password, $db_name) or die("Connection Failed");
