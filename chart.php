<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php

$q = "SELECT fname, SUM(prizes) as total_prizes FROM `order` GROUP BY fname"; // Group by fname and sum the prizes
$result = $conn->query($q);
$chart_data = "";
$productname = array();
$sales = array();
while ($row = mysqli_fetch_array($result)) {
  $productname[]  = $row['fname'];
  $sales[] = $row['total_prizes']; // Use the total_prizes from the query result
}
?>


<!-- Page wrapper  -->
<div class="page-wrapper">
  <!-- Bread crumb -->
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-primary">Analytics</h3>
    </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">Daily Analytics</li>
      </ol>
    </div>
  </div>
  <!-- End Bread crumb -->
  <!-- Container fluid  -->
  <div class="container-fluid">
    <html lang="en">

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Graph</title>
    </head>

    <body>
      <div style="width:80%;height:80%;text-align:center">
        <h2 class="page-header">Analytics Reports </h2>
        <div> </div>
        <canvas id="chartjs_bar"></canvas>
      </div>
    </body>
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: <?php echo json_encode($productname); ?>,
          datasets: [{
            backgroundColor: [
              "#5969ff",
              "#ff407b",
              "#25d5f2",
              "#ffc750",
              "#2ec551",
              "#7040fa",
              "#ff004e"
            ],
            data: <?php echo json_encode($sales); ?>,
          }]
        },
        options: {
          legend: {
            display: true,
            position: 'bottom',

            labels: {
              fontColor: '#71748d',
              fontFamily: 'Circular Std Book',
              fontSize: 14,
            }
          },
          scales: {
            yAxes: [{
              display: true,
              ticks: {
                beginAtZero: true
              }
            }]
          }

        }
      });
    </script>

    </html>
  </div>


  <!-- /# row -->

  <!-- End PAge Content -->


  <?php include('footer.php'); ?>