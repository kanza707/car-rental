<?php

session_start();
if (isset($_SESSION['username']) || isset($_SESSION['useremail'])) {
  header("location: index.php");
} else {
  include_once 'db_connect.php';
  if (isset($_REQUEST['login_btn'])) {
    $user_name = $_REQUEST['admin_username'];
    $user_Password = $_REQUEST['admin_password'];
    $check_username_email = "SELECT * FROM `adminregistrtation` where Email = '$user_name' || Username =  '$user_name'";
    $user_email_validator = mysqli_query($conn, $check_username_email);
    $check_user_pass_login = "SELECT * FROM `adminregistrtation` where (Email = '$user_name' || Username =  '$user_name') and Passwords = '$user_Password'";
    $user_email_pass_work = mysqli_query($conn, $check_user_pass_login);
    $fetch_Assoc_userEmail_pass = mysqli_fetch_assoc($user_email_pass_work);

    if (mysqli_num_rows($user_email_validator) < 1) {
      header("location: login.php?emailexsist=Email Is Invalid");
    } elseif ((isset($fetch_Assoc_userEmail_pass['Username']) == $user_name ||
      isset($fetch_Assoc_userEmail_pass['Email']) == $user_name) && isset($fetch_Assoc_userEmail_pass['Passwords']) == $user_Password) {

      $_SESSION['Admin_Id'] = $fetch_Assoc_userEmail_pass['Adminid'];
      $_SESSION['username'] = $fetch_Assoc_userEmail_pass['Username'];
      $_SESSION['useremail'] = $fetch_Assoc_userEmail_pass['Email'];

      header("location: index.php");
    } else {
      header("location: login.php?erroremailpass=Invalid Username or Email And Password");
    }
  }
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin - Login Page</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>

  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form action="login.php" method="post">
                  <div class="form-group">
                    <label>Username or email *</label>
                    <input type="text" name="admin_username" class="form-control p_input">
                    <?php if (isset($_GET['emailexsist'])) { ?>
                      <p class='text-danger'><?php echo $_GET['emailexsist']; ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" name="admin_password" class="form-control p_input">
                  </div>
                  <?php if (isset($_GET['erroremailpass'])) { ?>
                    <p class='text-danger'><?php echo $_GET['erroremailpass']; ?></p>
                  <?php } ?>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="#" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="login_btn" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook mr-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="register.php"> Register Here</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
  </body>

  </html>

<?php } ?>