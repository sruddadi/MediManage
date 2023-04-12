<?php
include('connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('NavBar3.php');
// date_default_timezone_set('Asia/Kolkata');
// $current_date = date('Y-m-d');

?>
<link rel="stylesheet" href="popup_style.css">
<?php
if (isset($_POST['btn_login'])) {

    require 'vendor/autoload.php';
    extract($_POST);
    $sql = "SELECT * FROM customer WHERE email='" . $email . "'";
    $query = $conn->query($sql);
    while ($row = mysqli_fetch_array($query)) {
        //print_r($row);
        extract($row);
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $contact = $row['contact'];
        $dob1 = $row['dob'];
        $gender = $row['gender'];
    }
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows != 0) {
        $row  = mysqli_fetch_array($result);
        $otp = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8);
        $passw = md5($otp);
        $q1 = "UPDATE `customer` SET `password`='$passw' WHERE `email`='$email'";
        if ($conn->query($q1) === TRUE) {
            $mail = new PHPMailer();
            try {
                $mail->SMTPDebug = 0;
                // $mail->isSMTP();
                $mail->SMTPKeepAlive = true;
                $mail->Mailer = 'smtp';
                $mail->Host       = 'smtp.gmail.com;';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'vaishnavkumarkoratpally@gmail.com';
                $mail->Password   = 'qilvzzslwtavnpri';
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;
                $mail->setFrom('vaishnavkumarkoratpally@gmail.com', 'Admin');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Request for temporary password';
                $mail->Body    = "Hi " . $fname . " " . $lname . ", <br><br> Need to reset your password? <br><br> Use your secret code! <br><br> <b>'" . $otp . "'</b><br><br> Use the above one time secret code to login to your account. <br><br> If you did not request a new password, please let us know
immediately by replying to this email. <br><br> Sincerely, <br> The MediManage Team";
                $mail->AltBody = 'Body in plain text for non-HTML mail clients';
                if ($mail->send()) {
?>

                    <div class="popup popup--icon -success js_success-popup popup--visible">
                        <div class="popup__background"></div>
                        <div class="popup__content">
                            <h3 class="popup__content__title">
                                Success<br><br><br>
                                </h1>
                                <p style="color:white; margin-left: -5px"> Email sent with temporary secret code, please check.<br><br><br></p>
                                <p>

                                    <?php echo "<script>setTimeout(\"location.href = 'login.php';\",2000);</script>"; ?>
                                </p>
                        </div>
                    </div>
                <?php
                }
            } catch (Exception $e) {
                ?>

                <div>
                    <div></div>
                    <div>
                        <h3>
                            Error
                            </h1>
                            <p style="color:white">Temporary password could not be generated due to a technical issue.</p>
                            <p>
                                <a href="forgot_password.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
                            </p>
                    </div>
                </div>

        <?php
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    } else {
        ?>

        <div class="popup popup--icon -error js_error-popup popup--visible">
            <div class="popup__background"></div>
            <div class="popup__content">
                <h3 class="popup__content__title" style="text-align: center;">
                    Error<br><br><br>
                    </h1>
                    <p style="color:white; margin-left: -7px;">This email does not exist<br><br><br><br></p>
                    <p>
                        <a href="forgot_password.php"><button class="button button--error" data-for="js_error-popup" style="margin-left: -60px;">Close</button></a>
                    </p>
            </div>
        </div>

<?php
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="utf-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/register.css"> -->
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            background-size: cover;
        }


        .cent {
            margin: auto;
            width: 50%;
            padding-top: 37px;
            font-family: verdana;
            font-size: 12px;
            padding-left: 22px;
        }

        .containerr {
            background: rgb(0, 0, 0, 0.9);
            width: 450px;
            height: 350px;
            padding-bottom: 20px;
            position: absolute;
            border-radius: 20px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin: auto;
            padding: 50px 15px 20px 40px;
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
            margin-bottom: 5px;
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
            margin-top: -35px;
            margin-bottom: 30px;
            font-size: 35px;
        }

        .textBox {
            margin: 10px 0;
            padding: 10px;
            height: 35px;
            width: 300px;
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
            text-decoration: underline;
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

        .iconBo {
            height: 35px;
            margin: 10px 0;
            width: 40px;
            line-height: 38px;
            text-align: center;
            color: white;
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
            margin-top: 20px;
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
            text-decoration: underline;
        }

        p {
            color: whitesmoke;
            margin-top: -49px;
            margin-left: 60px;
        }


        @media (max-width:991px) {
            .active11 {
                color: #5A5A5A;
                font-weight: bolder;
                font-size: larger;
                background-color: #00000000;
            }

            .active11:hover {
                color: #5A5A5A;
            }
        }
    </style>
</head>

<body>
    <div class="containerr">
        <form method="POST" name="forgotPasswordForm">

            <div class="box">
                <h1>Forgot Password?</h1>
                <div class="fl iconBo"><i class="fa fa-lock" aria-hidden="true" style="font-size:40px;color:white"></i></div>
                <div class="fr">
                    <p style="color:white;">Enter your email address and we'll send you a one time secret code via email to
                        reset your password.</p>
                </div>
                <div class="in">
                    <div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div class="fr">
                        <input type="email" required name="email" id="email" placeholder="Email Id" class="textBox" />
                    </div>
                </div>
                <div class="clr"></div>
            </div>

            <div>
                <input type="submit" name="btn_login" class="submit" value="Reset Password" />
            </div>
        </form>
    </div>
</body>

</html>