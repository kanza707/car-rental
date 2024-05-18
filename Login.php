<?php

session_start();
if (isset($_SESSION['user_username']) || isset($_SESSION['user_useremail'])) {
  header("location: car.php");
} else {
  include_once 'db_connect.php';
  if (isset($_REQUEST['login_btn'])) {
    $user_name = $_REQUEST['user_username'];
    $user_Password = $_REQUEST['user_password'];
    $check_username_email = "SELECT * FROM `UserRegistrtation` where Email = '$user_name' || Username =  '$user_name'";
    $user_email_validator = mysqli_query($conn, $check_username_email);
    $check_user_pass_login = "SELECT * FROM `UserRegistrtation` where (Email = '$user_name' || Username =  '$user_name') and Passwords = '$user_Password'";
    $user_email_pass_work = mysqli_query($conn, $check_user_pass_login);
    $fetch_Assoc_userEmail_pass = mysqli_fetch_assoc($user_email_pass_work);

    if (mysqli_num_rows($user_email_validator) < 1) {
      header("location: login.php?emailexsist=Email Is Invalid");
    } elseif (
      (isset($fetch_Assoc_userEmail_pass['Username']) == $user_name ||
        isset($fetch_Assoc_userEmail_pass['Email']) == $user_name) && isset($fetch_Assoc_userEmail_pass['Passwords']) == $user_Password
    ) {

      $_SESSION['User_Id'] = $fetch_Assoc_userEmail_pass['Userid'];
      $_SESSION['user_username'] = $fetch_Assoc_userEmail_pass['Username'];
      $_SESSION['user_useremail'] = $fetch_Assoc_userEmail_pass['Email'];

      header("location: index.php");
    } else {
      header("location: login.php?erroremailpass=Invalid Username or Email And Password");
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="Enter your description here" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>User - Login</title>
</head>

<body>
  <section class="vh-100" style="background-color: #328bbe;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign In</p>

                  <form class="mx-1 mx-md-4" action="Login.php" method="post">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input type="text" name="user_username" id="form3Example3c" class="form-control" />
                        <label class="form-label" for="form3Example3c">Your Email</label>
                        <?php if (isset($_GET['emailexsist'])) { ?>
                          <p class='text-danger'><?php echo $_GET['emailexsist']; ?></p>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input type="password" name="user_password" id="form3Example4c" class="form-control" />
                        <label class="form-label" for="form3Example4c">Password</label>
                        <?php if (isset($_GET['erroremailpass'])) { ?>
                          <p class='text-danger'><?php echo $_GET['erroremailpass']; ?></p>
                        <?php } ?>
                      </div>
                    </div>



                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" name="login_btn" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Sign In</button>
                    </div>
                    <a href="index.php"> Go To Web</a>
                  </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">\
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>