<?php
session_start();
include_once 'db_connect.php';
if (empty($_SESSION['username']) || empty($_SESSION['useremail'])) {
  header("location: login.php");
} else {
  include_once 'Header.php';
  $countcarbooked = "SELECT count(*) as 'Booked' FROM `bookcar` where `Carstatus` = 'Booked';";

  $countnotcarbooked = "SELECT COUNT(DISTINCT not_booked.Car_ID_Fk) as NotBooked FROM bookcar as not_booked LEFT JOIN bookcar as booked ON not_booked.Car_ID_Fk = booked.Car_ID_Fk AND booked.Carstatus = 'Booked' WHERE not_booked.Carstatus = 'Not-Booked' AND booked.Car_ID_Fk IS NULL;";

  $toalnoofcards = "SELECT count(*) as TotalCars FROM `add_cars`;";

  $totalData = mysqli_query($conn, $countcarbooked);
  $totalnotcarbookedData = mysqli_query($conn, $countnotcarbooked);
  $allcars = mysqli_query($conn, $toalnoofcards);
  $row = mysqli_fetch_assoc($totalData);
  $row1 = mysqli_fetch_assoc($totalnotcarbookedData);
  $row2 = mysqli_fetch_assoc($allcars);
  $totalNoofcars = $row['Booked'];
  $totalNoofcarsnotbooked = $row1['NotBooked'];
  $AllCarsData = $row2['TotalCars'];
?>

  <div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Doughnut chart</h4>
          <canvas id="doughnutChart" style="height:250px"></canvas>
        </div>
      </div>
    </div>
  </div>

<?php include_once 'Footer.php';
} ?>
<script>
  var doughnutPieData = {
    datasets: [{
      data: [<?php echo $totalNoofcars ?>, <?php echo $totalNoofcarsnotbooked ?>, <?php echo $AllCarsData ?>],
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 206, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(153, 102, 255, 0.5)',
        'rgba(255, 159, 64, 0.5)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
    }],

    labels: [
      'No Of Booked Cars',
      'No Of Not Booked Cars',
      'Total Number of Cars',
    ]
  };
  var doughnutPieOptions = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
  };
  if ($("#doughnutChart").length) {
    var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
    var doughnutChart = new Chart(doughnutChartCanvas, {
      type: 'doughnut',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }
</script>