<?php include 'Navbar.php' ?>
<?php session_start(); ?>
<?php include('head.php'); ?>

<link rel="stylesheet" href="popup_style.css">

<?php
include('connect.php');
if (isset($_POST['btn_login'])) {
  $unm = $_POST['email'];

  $passw = md5($_POST['password']);
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM admin WHERE email='" . $unm . "' and password = '" . $passw . "'";
  $sqll = "SELECT * FROM customer WHERE email='" . $unm . "' and password = '" . $passw . "'";
  $chatsql = "SELECT * FROM users WHERE email='" . $unm . "' and password = '" . $password . "'";

  $result = mysqli_query($conn, $sql);
  $resultt = mysqli_query($conn, $sqll);
  $chatresult = mysqli_query($conn, $chatsql);

  $count = mysqli_num_rows($result);
  $countt = mysqli_num_rows($resultt);
  $chatcount = mysqli_num_rows($chatresult);

  if ($count == 1) { {
      $row  = mysqli_fetch_array($result);
      $chatrow = mysqli_fetch_array($chatresult);
      //print_r($row);
      $_SESSION["id"] = $row['id'];
      $_SESSION["username"] = $row['username'];
      $_SESSION["password"] = $row['password'];
      $_SESSION["email"] = $row['email'];
      $_SESSION["fname"] = $row['fname'];
      $_SESSION["lname"] = $row['lname'];
      $_SESSION["image"] = $row['image'];
      $status = "Active now";

      if ($_SESSION["username"] == "user") {
        $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$chatrow['unique_id']}");
        if ($sql2) {
          $_SESSION["unique_id"] = $chatrow['unique_id'];
          echo "success";
        } else {
          echo "Something went wrong. Please try again!";
        }
      }

?>
      <div class="popup popup--icon -success js_success-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
          <h3 class="popup__content__title">
            Success
            </h1>
            <p>Login Successfully</p>
            <p>
              <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
              <?php echo "<script>setTimeout(\"location.href = 'dashboard.php';\",1500);</script>"; ?>
            </p>
        </div>
      </div>
      <!--   <script>
     window.location="index.php";
     </script> -->
    <?php
    }
  } elseif ($countt == 1 && $chatcount == 1) {
    $row  = mysqli_fetch_array($resultt);
    $chatrow = mysqli_fetch_array($chatresult);
    //print_r($row);
    $_SESSION["id"] = $row['id'];
    $_SESSION["username"] = $row['username'];
    $_SESSION["password"] = $row['password'];
    $_SESSION["email"] = $row['email'];
    $_SESSION["fname"] = $row['fname'];
    $_SESSION["lname"] = $row['lname'];
    $_SESSION["image"] = $row['image'];
    $status = "Active now";
    $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$chatrow['unique_id']}");
    if ($sql2) {
      $_SESSION["unique_id"] = $chatrow['unique_id'];
      echo "success";
    } else {
      echo "Something went wrong. Please try again!";
    }
    ?>
    <div class="popup popup--icon -success js_success-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
        <h3 class="popup__content__title">
          Success
          </h1>
          <p> Login Successfully</p>
          <p>
            <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
            <?php echo "<script>setTimeout(\"location.href = 'dashboard.php';\",1500);</script>"; ?>
          </p>
      </div>
    </div>
    <!--   <script>
     window.location="index.php";
     </script> -->
  <?php
  } else { ?>
    <div class="popup popup--icon -error js_error-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
        <h3 class="popup__content__title">
          Error
          </h1>
          <p>Invalid Email or Password</p>
          <p>
            <a href="login.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
          </p>
      </div>
    </div>
    <!--  <script>
       // alert("Invalid email or Password!");
        window.location="login.php";
        </script> -->
<?php
    //// $message = "Invalid email or Password!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>


  <style type="text/css">
    .containerr {
      background: rgb(0, 0, 0, 0.9);
      width: 450px;
      height: 400px;
      padding-bottom: 20px;
      position: absolute;
      border-radius: 20px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      margin: auto;
      padding: 50px 15px 20px 40px;
    }

    body {
      background: url(http://wrbbradio.org/wp-content/uploads/2016/10/grey-background-07.jpg) no-repeat center fixed;
      background-size: cover;
    }

    .fl {
      float: left;
      width: 110px;
      line-height: 35px;
    }

    .fontLabel {
      color: white;
    }

    .fr {
      float: right;
    }

    .clr {
      clear: both;
    }

    .box {
      width: 360px;
      height: 35px;
      margin-top: 10px;
      font-family: verdana;
      font-size: 12px;
    }

    .box h1 {
      color: whitesmoke;
      text-align: center;
      margin-top: -50px;
      margin-bottom: 40px;
    }

    .textBox {
      margin: 10px 0;
      padding: 10px;
      height: 35px;
      width: 280px;
      border: none;
      padding-left: 10px;

    }

    .new {
      float: left;
    }

    .forgot {
      margin-top: 5px;
    }

    .forgot a {
      color: #adadad;
      font-size: small;
      text-decoration: underline !important;
    }

    .forgot a:hover {
      color: white;
    }

    .active11 {
      color: #000;
      border-radius: 5px;
      font-size: 16px;
      font-weight: 600;
      text-transform: uppercase;
      display: inline-block;
      padding: 10px 20px;
      background-color: #fff;
    }

    .active11:hover {
      color: #000;
    }

    .iconBox {
      height: 35px;
      margin: 10px 0;
      width: 40px;
      line-height: 38px;
      text-align: center;
      background: #ff6600;
    }

    .radio {
      color: white;
      background: #2d3e3f;
      line-height: 38px;
    }

    .terms {
      line-height: 35px;
      text-align: center;
      background: #2d3e3f;
      color: white;
    }

    .submit {
      border: none;
      color: white;
      width: 360px;
      height: 35px;
      background: #ff6600;
      text-transform: uppercase;
      margin-top: 40px;
      border-radius: 5px;
      font-weight: 800;
      cursor: pointer;
    }

    .center {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 200px;
      border: 3px solid green;
    }

    .boxterms {
      width: 357px;
      height: 0px;
      margin-top: 100px;
      font-family: verdana;
      font-size: 12px;
      line-height: 35px;
      text-align: center;
      color: white;
      padding-top: 31px;
    }

    .signup_link {
      margin: 20px 0;
      margin-left: -40px;
      text-align: center;
      font-size: 16px;
      color: #a0a0a0;
    }

    .signup_link a {
      color: white;
      text-decoration: none;
    }

    .signup_link a:hover {
      text-decoration: underline !important;
    }
  </style>
</head>

<!-- Main wrapper  -->
<div class="containerr">
  <?php
  $sql_login = "select * from manage_website";
  $result_login = $conn->query($sql_login);
  $row_login = mysqli_fetch_array($result_login);
  ?>
  <form id="form" name="myForm" method="POST">

    <div class="box">
      <h1 style="font-family: verdana; color: whitesmoke; font-size: 38px; margin-top: -51px;">Log In</h1>

      <div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true"></i></div>
      <div class="fr">
        <input type="email" name="email" id="email" placeholder="Email Id" class="textBox" required />
      </div>
      <div class="clr"></div>
    </div>

    <div class="box">

      <div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
      <div class="fr">
        <input type="Password" name="password" id="password" placeholder="Password" class="textBox" required />
        <div class="forgot">
          <a href="forgot_password.php">Forgot Password?</a>
        </div>
      </div>

      <div class="clr"></div>
    </div>



    <div>
      <input id="button" type="submit" name="btn_login" class="submit" value="Login" />
    </div>

    <div class="signup_link">
      New to MediManage? <a href="register.php">Sign Up Now</a>
    </div>


  </form>
</div>


</div>

<!-- End Wrapper -->
<!-- All Jquery -->
<script src="js/lib/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="js/lib/bootstrap/js/popper.min.js"></script>
<script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Menu sidebar -->
<script src="js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="js/custom.min.js"></script>

</body>

</html>