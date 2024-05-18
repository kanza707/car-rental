<?php
session_start();
if (empty($_SESSION['username']) || empty($_SESSION['useremail'])) {
  header("location: login.php");
} else {
  include_once 'Header.php';
  include_once 'db_connect.php';
?>

  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Cars</h4>
          <p class="card-description"> A car, or an automobile, is a motor vehicle with wheels. Most definitions of cars state that they run primarily on roads, seat one to eight people, have four wheels, and mainly transport people, not cargo.</p>
          <?php if (isset($_GET['success'])) { ?>
            <p class='text-success'><?php echo $_GET['success']; ?></p>
          <?php } elseif (isset($_GET['error'])) { ?>
            <p class='text-danger'><?php echo $_GET['error']; ?></p>
          <?php } ?>
          <form action="Car_queries.php" method="post" class="forms-sample" enctype="multipart/form-data">

            <!-- Car Name Textbox -->
            <div class="form-group" contenteditable="true">
              <label for="exampleInputName1">Car Name <span class="text-danger">*</span> </label>
              <input type="text" class="form-control" id="exampleInputName1" name="car_name" placeholder="Like Audi A5, Mehran..." required >
            </div>


            <!-- Car Category Dropdown -->
            <div class="form-group">
              <label for="exampleSelectGender">Car Category <span class="text-danger">*</span></label>
              <select class="form-control" name="car_category_id" id="exampleSelectGender" required>
                <option selected disabled>-- Select Category --</option>
                <?php
                $sql_show_categoreis = "SELECT `CarCategoryid`,`CarCategoryName` FROM `carcategory`";
                $resulcategories = mysqli_query($conn, $sql_show_categoreis);
                while ($row = mysqli_fetch_assoc($resulcategories)) { ?>
                  <option value="<?php echo $row['CarCategoryid'] ?>"><?php echo $row['CarCategoryName'] ?></option>

                <?php } ?>
              </select>
            </div>


            <!-- Car Rent Each Day Number Textbox -->
            <div class="form-group">
              <label for="exampleInputEmail3">Car Rent Price Each Day</label>
              <input type="number" class="form-control" name="CarRentPriceEachDay" id="exampleInputEmail3" placeholder="300....">
            </div>


            <!-- Car Image Upload -->
            <div class="form-group">
              <label>Upload Car Image</label>
              <input type="file" name="choosefile" class="form-control">
            </div>


            <!-- Car Milegae Textbox -->
            <div class="form-group">
              <label for="exampleInputEmail3">Car Milegae</label>
              <input type="number" class="form-control" name="Car_Milegae" id="exampleInputEmail3" placeholder="100km..">
            </div>


            <!-- Car Transmission Textbox -->
            <div class="form-group">
              <label for="exampleSelectTransmission">Car Transmission</label>
              <select class="form-control" id="exampleSelectTransmission" name="Car_Transmission">
                <option selected disabled>-- Select Car Transmission -- </option>
                <option value="Automatic">Automatic</option>
                <option value="Manual">Manual</option>
              </select>
            </div>



            <!-- Car Seats Textbox -->
            <div class="form-group">
              <label for="exampleSelectSeats">Car Seats</label>
              <select class="form-control" id="exampleSelectSeats" name="Car_Seats">
                <option selected disabled>-- Select Car Seats -- </option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select>
            </div>



            <!-- Car Fuel Textbox -->
            <div class="form-group">
              <label for="exampleSelectFuel">Car Fuel</label>
              <select class="form-control" id="exampleSelectFuel" name="Car_Fuel">
                <option selected disabled>-- Select Car Fuel -- </option>
                <option value="Diesel">Diesel</option>
                <option value="Petrol">Petrol</option>
                <option value="Cng">Cng</option>
                <option value="Electric">Electric</option>
              </select>
            </div>

            <div class="form-group">
              <label for="exampleTextarea1">Car Description</label>
              <textarea class="form-control" id="exampleTextarea1" name="Car_Description" rows="4"></textarea>
            </div>


            <div class="form-group">
              <label for="exampleTextarea1">Car Features</label>
              <div class="form-check form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="Car_Features_Name[]" value="Airconditions"> Airconditions </label>
              </div>

              <div class="form-check form-check-success">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="Car_Features_Name[]" value="Child Seat"> Child Seat</label>
              </div>

              <div class="form-check form-check-info">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="Car_Features_Name[]" value="GPS"> GPS </label>
              </div>

              <div class="form-check form-check-danger">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="Car_Features_Name[]" value="Luggage"> Luggage </label>
              </div>

              <div class="form-check form-check-warning">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="Car_Features_Name[]" value="Music"> Music </label>
              </div>

              <div class="form-check form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="Car_Features_Name[]" value="Seat Belt"> Seat Belt</label>
              </div>

              <div class="form-check form-check-success">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="Car_Features_Name[]" value="Sleeping Bed"> Sleeping Bed
                </label>
              </div>

              <div class="form-check form-check-info">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="Car_Features_Name[]" value="Water"> Water </label>
              </div>

              <div class="form-check form-check-danger">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="Car_Features_Name[]" value="Bluetooth"> Bluetooth </label>
              </div>

              <div class="form-check form-check-warning">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="Car_Features_Name[]" value="Onboard computer"> Onboard computer</label>
              </div>

              <div class="form-check form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="Car_Features_Name[]" value="Audio input"> Audio input </label>
              </div>

              <div class="form-check form-check-success">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="Car_Features_Name[]" value="Long Term Trips"> Long Term Trips</label>
              </div>

              <div class="form-check form-check-info">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="Car_Features_Name[]" value="Car Kit"> Car Kit</label>
              </div>

              <div class="form-check form-check-danger">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="Car_Features_Name[]" value="Remote central locking"> Remote central locking </label>
              </div>

              <div class="form-check form-check-warning">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="Car_Features_Name[]" value="Climate control"> Climate control</label>
              </div>
            </div>


            <!-- 
            <div class="form-group">
              <label for="exampleInputPassword4">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleSelectGender">Gender</label>
              <select class="form-control" id="exampleSelectGender">
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>
            <div class="form-group">
              <label>File upload</label>
              <input type="file" name="img[]" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputCity1">City</label>
              <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
            </div>
            <div class="form-group">
              <label for="exampleTextarea1">Textarea</label>
              <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
            </div> -->
            <button type="submit" name="savecardata" class="btn btn-primary mr-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php include_once 'Footer.php';
} ?>