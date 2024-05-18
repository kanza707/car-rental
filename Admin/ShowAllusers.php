<?php
session_start();
if (empty($_SESSION['username']) || empty($_SESSION['useremail'])) {
  header("location: login.php");
} else {
  include_once 'Header.php';
  include_once 'db_connect.php';
  $sqlshowuser = "SELECT * FROM `userregistrtation`";
  $result  = mysqli_query($conn, $sqlshowuser);
?>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Show All Users</h4>
          </p>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th> User </th>
                  <th> Name </th>
                  <th> Email </th>
                  <th> Address </th>
                  <th> Phone Number </th>
                  <th> Created_At </th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                ?>

                    <tr>
                      <td class="py-1">
                        <img src="assets/images/user_avatar.png" alt="image" />
                      </td>
                      <td>
                        <?php
                        if (empty($row['Name'])) {
                          echo "<span class='badge badge-danger'>No Data Provided</span>";
                        } else {
                          echo "<span class='badge badge-success'>" . $row['Name'] . "</span>";
                        }
                        ?>
                      </td>
                      <td>
                        <?php echo $row['Email'] ?>
                      </td>
                      <td>
                        <?php
                        if (empty($row['Address'])) {
                          echo "<span class='badge badge-danger'>No Data Provided</span>";
                        } else {
                          echo "<span class='badge badge-success'>" . $row['Address'] . "</span>";
                        }
                        ?>

                      </td>
                      <td>
                        <?php
                        if (empty($row['PhoneNumber'])) {
                          echo "<span class='badge badge-danger'>No Data Provided</span>";
                        } else {
                          echo "<span class='badge badge-success'>" . $row['PhoneNumber'] . "</span>";
                        }
                        ?>
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

<?php
  include_once 'Footer.php';
  mysqli_close($conn);
} ?>