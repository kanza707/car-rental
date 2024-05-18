<?php
session_start();
if (empty($_SESSION['username']) || empty($_SESSION['useremail'])) {
  header("location: login.php");
} else {
  include_once 'Header.php';
  include_once 'db_connect.php';
  $sqlshowuser = "SELECT * FROM `bookcar` 
inner join add_cars ON
bookcar.Car_ID_Fk = add_cars.Car_ID
inner join userregistrtation ON
bookcar.Userid_FK = userregistrtation.Userid
";
  $result  = mysqli_query($conn, $sqlshowuser);
?>
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Show All Bookings</h4>
          </p>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th> Booking ID </th>
                  <th> Pick-up Location </th>
                  <th> Drop-off location </th>
                  <th> Pick-up Date </th>
                  <th> Drop-off Date</th>
                  <th> Pick-up Time</th>
                  <th> Car Status </th>
                  <th> Car Name </th>
                  <th> Client Name </th>
                  <th> Actions </th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                ?>

                    <tr>
                      <td class="py-1">
                        <?php echo $row['BookCarid'] ?>
                      <td>
                        <?php echo $row['Pickuplocation'] ?>
                      </td>
                      <td>
                        <?php echo $row['Dropofflocation'] ?> </td>
                      <td>
                        <?php echo $row['Pickupdate'] ?> </td>

                      </td>
                      <td>
                        <?php echo $row['Dropoffdate'] ?> </td>

                      </td>
                      <td>
                        <?php echo $row['Pickuptime'] ?>
                      </td>
                      <td>
                        <?php echo $row['Carstatus'] ?>
                      </td>

                      <td>
                        <?php echo $row['Car_Name'] ?>
                      </td>
                      <td>
                        <?php echo $row['Name'] ?>
                      </td>
                      <td>
                        <?php if ($row['Carstatus'] == "Booked") { ?>
                          <a href="BookingCancel.php?bookid=<?php echo $row['BookCarid'] ?>" onclick="return confirm('Are Tou Sure You Want To Cancel This Booking')"><span class="badge badge-danger">Booking Cancel</span></a>
                        <?php } else { ?>
                          <span class="badge badge-success">Not-Booked</span>
                        <?php }  ?>
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