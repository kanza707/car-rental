<?php
session_start();
include_once 'db_connect.php';
if (isset($_REQUEST['Add_Car_Category'])) {
  $Admin_Id =  $_SESSION['Admin_Id'];
  $category = $_REQUEST['Category_Name'];
  $Category_Insert = "INSERT INTO `carcategory`(`CarCategoryName`, `Adminid_FK`) VALUES ('$category',$Admin_Id)";
  $result = mysqli_query($conn, $Category_Insert);
  if ($result) {
    header("location: AddCarCategory.php?success=Car Category Added Successfully");
  } else {
    header("location: AddCarCategory.php?error=Failed");
  }
}

if (isset($_REQUEST['savecardata'])) {

  $car_name =  $_REQUEST['car_name'];
  $car_category_id =  $_REQUEST['car_category_id'];
  $CarRentPriceEachDay =  $_REQUEST['CarRentPriceEachDay'];

  $filename = $_FILES["choosefile"]["name"];
  $tempname = $_FILES["choosefile"]["tmp_name"];
  $folder = "CarImages/" .  uniqid() . $filename;


  $Car_Milegae =  $_REQUEST['Car_Milegae'];
  $Car_Transmission =  $_REQUEST['Car_Transmission'];
  $Car_Seats =  $_REQUEST['Car_Seats'];
  $Car_Fuel =  $_REQUEST['Car_Fuel'];
  $Car_Description =  $_REQUEST['Car_Description'];
  $Admin_Id =  $_SESSION['Admin_Id'];

  $checkallinsert = false;
  // Image Move Code To Folder
  move_uploaded_file($tempname, $folder);

  $add_cars_insert = "INSERT INTO `add_cars`(`Car_Name`, `CarCategoryid_FK`, `CarRentPriceEachDay`, `Car_Image`, `Car_Milegae`, `Car_Transmission`, `Car_Seats`, `Car_Fuel`, `Car_Description`, `Adminid_FK`) VALUES ('$car_name',$car_category_id,$CarRentPriceEachDay,'$folder',$Car_Milegae,'$Car_Transmission',$Car_Seats,'$Car_Fuel','$Car_Description',$Admin_Id)";
  mysqli_query($conn, $add_cars_insert);

  $lastinsertid = $conn->insert_id;
  $car_features = $_REQUEST['Car_Features_Name'];
  foreach ($car_features as $value) {
    $sqlQueryFeatureQuery = "INSERT INTO `car_features`(`Car_Features_Name`,`Car_ID_Fk`) VALUES ('$value',$lastinsertid)";
    mysqli_query($conn, $sqlQueryFeatureQuery);
    $checkallinsert = true;

  }

  if($checkallinsert) {
    header("location: AddCars.php?success=Car Added Successfully");
  } else {
    header("location: AddCars.php?error=Failed");
  }

}

mysqli_close($conn);
