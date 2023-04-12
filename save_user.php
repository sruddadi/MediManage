<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('connect.php');
// $passw = hash('sha256', $_POST['password']);
extract($_POST);
// var_dump(get_defined_vars());
$password = md5($password);
$sql = "INSERT INTO admin (username, email,password, fname, lname, gender,contact,created_on)VALUES ('user', '$email','$password', '$firstName', '$secondName', '$Gender', '$phoneNo', '$current_date')";
if ($conn->query($sql) === TRUE) {
  $_SESSION['success'] = ' Record Successfully Added';
?>
  <link rel="stylesheet" href="popup_style.css">
  <div class="popup popup--icon -success js_success-popup popup--visible">
    <div class="popup__background"></div>
    <div class="popup__content">
      <h3 class="popup__content__title">
        Success
        </h1>
        <p style="color:white">Registration Successful</p>
        <p>

          <?php echo "<script>setTimeout(\"location.href = '/login1.php';\",2500);</script>"; ?>
        </p>
    </div>
  </div>
  <!-- <script type="text/javascript">
    // alert("Registered Successfully!")
    // window.location = "/login1.php";

  </script> -->
<?php
}
else { ?>
<link rel="stylesheet" href="popup_style.css">
    <div class="popup popup--icon -error js_error-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
            <h3 class="popup__content__title">
                Internal Server Error
                </h1>
                <p style="color:white">Please try again later</p>
                <p>
                    <a href="register.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
                </p>
        </div>
    </div>

<?php
}
?>