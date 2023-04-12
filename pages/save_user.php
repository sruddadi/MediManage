<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');
$passw = md5($_POST['password']);

extract($_POST);
$ran_id = rand(time(), 100000000);
$status = "Offline now";
$sql = "INSERT INTO `admin`(`username`, `email`, `password`, `fname`, `lname`, `gender`, `dob`, `contact`, `address`,`group_id`) VALUES ('user','$email','$passw','$fname','$lname','$gender','$dob','$contact','$address',2)";
$chatsql = "INSERT INTO `users`(`unique_id`,`fname`, `lname`, `email`, `password`, `img`, `status`, `username`) VALUES ('$ran_id','$fname','$lname','$email','$passw', '', '$status','user')";
if ($conn->query($sql) === TRUE && $conn->query($chatsql) === TRUE) {
      $_SESSION['success'] = ' Record Successfully Added';
?>
      <script type="text/javascript">
            window.location = "../view_user.php";
      </script>
<?php
} else {
      $_SESSION['error'] = 'Something Went Wrong';
?>
      <script type="text/javascript">
            window.location = "../view_user.php";
      </script>
<?php } ?>