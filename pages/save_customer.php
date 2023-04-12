<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');
$passw = md5($_POST['password']);
//$passw = hash('sha256',$p);
//echo $passw;exit;
extract($_POST);
$sql1 = "SELECT * FROM customer where email='" . $email . "'";
$chatsql1 = "SELECT * FROM users where email='" . $email . "'";
$query = mysqli_query($conn, $sql1);
$chatquery = mysqli_query($conn, $chatsql1);
if ($query->num_rows == 0 && $chatquery->num_rows == 0) {
  $ran_id = rand(time(), 100000000);
  $status = "Offline now";
  $sql = "INSERT INTO `customer`(`username`, `fname`, `lname`, `contact`, `email`, `password`, `DOB`, `gender`) VALUES ('customer','$fname','$lname','$contact','$email','$passw', '$dob', '$gender')";
  $chatsql = "INSERT INTO `users`(`unique_id`,`fname`, `lname`, `email`, `password`, `img`, `status`, `username`) VALUES ('$ran_id','$fname','$lname','$email','$passw', '', '$status', 'customer')";
  if ($conn->query($sql) === TRUE && $conn->query($chatsql) === TRUE) {
?>
    <link rel="stylesheet" href="../popup_style.css">
    <div class="popup popup--icon -success js_success-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
        <h3 class="popup__content__title">
          Success
          </h1>
          <p style="color: white;">Record Added Successfully</p>
          <p>
            <?php echo "<script>setTimeout(\"location.href = '../view_customer.php';\",1500);</script>"; ?>
          </p>
      </div>
    </div>

  <?php
  } else {
  ?>
    <link rel="stylesheet" href="../popup_style.css">
    <div class="popup popup--icon -error js_error-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
        <h3 class="popup__content__title">
          Something Went Wrong!
          </h1>
          <p style="color:white">Please try again later</p>
          <p>
            <a href="../register.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
          </p>
      </div>
    </div>

  <?php
  }
} else {
  ?>
  <link rel="stylesheet" href="../popup_style.css">
  <div class="popup popup--icon -error js_error-popup popup--visible">
    <div class="popup__background"></div>
    <div class="popup__content">
      <h3 class="popup__content__title">
        Error
        </h1>
        <p style="color:white">User with this email already exists, Please try logging in.</p>
        <p>
          <a href="../login.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
        </p>
    </div>
  </div>

<?php

}

?>