<?php
session_start();
if (empty($_SESSION['username']) || empty($_SESSION['useremail'])) {
  header("location: login.php");
} else {
  include_once 'Header.php';
  include_once 'db_connect.php';
  $shopwcategories = "SELECT * FROM adminregistrtation ar inner join carcategory cc ON ar.Adminid = cc.Adminid_FK;";
  $result  = mysqli_query($conn, $shopwcategories);
?>

  <div class="row">

    <!-- Add Category Code -->
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Car Category</h4>
          <p class="card-description"> Like : Cheverolet , Subaru .... </p>
          <form class="forms-sample" method="post" action="Car_queries.php">
            <div class="form-group">
              <label for="exampleInputName1">Category Name</label>
              <input type="text" class="form-control" id="exampleInputName1" name="Category_Name" placeholder="Name">
            </div>
            <button type="submit" class="btn btn-primary mr-2" name="Add_Car_Category">Submit</button>
            <button class="btn btn-dark" onclick="clicked();">Cancel</button>
          </form>
          <div class="col-md-12 mt-5">
            <?php if (isset($_GET['success'])) { ?>
              <div class="alert alert-success" role="alert">
                <?php echo $_GET['success']; ?>
              </div>
            <?php } elseif (isset($_GET['error'])) { ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>


    <!-- Show Categories Code -->
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Show All Categories</h4>
          </p>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th> Category Id </th>
                  <th> Category Name </th>
                  <th> Admin Id </th>
                  <th> Created_At </th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                ?>

                    <tr>
                      <td>
                        <?php echo $row['CarCategoryid'] ?>
                      </td>
                      <td>
                        <?php echo $row['CarCategoryName'] ?>
                      </td>
                      <td>
                        <?php echo $row['Name'] ?>
                      </td>
                      <td>
                        <?php echo $row['Created_At'] ?>
                      </td>
                    </tr>

                <?php }
                } else {
                  echo "<tr class='text-center'><td colspan='5'>No Record Found</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>

<?php include_once 'Footer.php';
} ?>

<script>
  function clicked() {
    event.preventDefault();
    window.location.href = "AddCarCategory.php";
  }
</script>