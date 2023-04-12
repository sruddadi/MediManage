<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');

extract($_POST);

$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$sname = $_REQUEST['sname'];
$pieces = explode(" ", $fname);
$prizes = $_REQUEST['prizes'];
$discription = $_REQUEST['discription'];
$dod = $_REQUEST['dod'];
$tod = $_REQUEST['todays_date'];

$sql = "INSERT INTO `order`(`fname`, `lname`, `sname`, `discription`, `prizes`, `delivery date`, `delivery_status`, `todays_date`) VALUES ('$pieces[0]','$pieces[1]','$sname','$discription','$prizes','$dod','0','$tod')";

if ($conn->query($sql) === TRUE) {
      $_SESSION['success'] = ' Record Successfully Added';
?>
      <script type="text/javascript">
            window.location = "../view_order.php";
      </script>
<?php
} else {
      $_SESSION['error'] = 'Something Went Wrong';
?>
      <script type="text/javascript">
            window.location = "../view_order.php";
      </script>
<?php } ?>