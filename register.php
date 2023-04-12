<?php
include('connect.php');
include('NavBar2.php');
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            background: url(http://wrbbradio.org/wp-content/uploads/2016/10/grey-background-07.jpg) no-repeat center fixed;
            background-size: cover;
        }

        .centi {
            margin: auto;
            width: 50%;
            padding: 10px;
            font-family: verdana;
            font-size: 12px;
        }

        .containerrer {
            background: rgb(0, 0, 0, 0.9);
            width: 450px;
            height: 540px;
            border-radius: 20px;
            padding-bottom: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin: auto;
            padding: 50px 40px 20px 40px;
        }


        .fll {
            float: left;
            width: 110px;
            line-height: 35px;
        }

        .fontLabell {
            color: white;
        }

        .frr {
            float: right;
        }

        .clrr {
            clear: both;
        }

        .boxes {
            width: 360px;
            height: 35px;
            margin-top: 10px;
            font-family: verdana;
            font-size: 12px;
        }

        .containerrer h1 {
            color: whitesmoke;
            text-align: center;
            font-family: verdana;
            margin-top: -30px;
            margin-bottom: 40px;
        }


        .textBoxes {

            height: 35px;
            width: 300px;
            border: none;
            padding-left: 10px;
            /* height: 35px;
      width: 190px;
      border: none;
    padding-left: 20px; */
        }

        .news {
            float: left;
        }

        .male {
            margin-left: 10px;
        }

        .female {
            margin-left: 20px;
        }

        .iconBoxes {
            height: 35px;
            width: 40px;
            line-height: 38px;
            text-align: center;
            background: #ff6600;
        }

        .radio-button {
            margin-left: -30px;
        }

        .radios {
            color: white;
            line-height: 38px;

        }

        .termss {
            line-height: 35px;
            text-align: center;
            color: white;
        }

        .submits {
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

        .signup_links {
            margin: 20px 0;
            margin-left: -20px;
            text-align: center;
            font-size: 16px;
            color: #a0a0a0;
        }

        .signup_links a {
            color: white;
            text-decoration: none;
        }

        .signup_links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="containerrer">
        <h1>Sign Up</h1>
        <form autocomplete="off" method="POST" action="pages/save_customer.php" name="userform" onsubmit="successValidate()">
            <!--First name-->
            <div class="boxes">

                <div class="news iconBoxes">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="frr">
                    <input type="text" name="fname" placeholder="First Name" pattern="^[A-Z][a-zA-Z]{2,19}$" oninvalid="setCustomValidity('Please enter a valid input with at least 3 characters and the first letter capitalized.')" onchange="try{setCustomValidity('')}catch(e){}" class="textBoxes" autofocus="on" required />
                </div>
                <div class="clr"></div>
            </div>
            <!--First name-->


            <!--Second name-->
            <div class="boxes">

                <div class="fll iconBoxes"><i class="fa fa-user" aria-hidden="true"></i></div>
                <div class="frr">
                    <input type="text" required name="lname" placeholder="Last Name" pattern="^[A-Z][a-zA-Z]{2,19}$" oninvalid="setCustomValidity('Please enter a valid input with at least 3 characters and the first letter capitalized.')" onchange="try{setCustomValidity('')}catch(e){}" class="textBoxes" />
                </div>
                <div class="clrr"></div>
            </div>
            <!--Second name-->


            <!---Phone No.------>
            <div class="boxes">

                <div class="fll iconBoxes"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
                <div class="frr">
                    <input type="text" required id='phone' name="contact" pattern="^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$" oninvalid="setCustomValidity('Invalid US phone number format. Please use area code and 7-digit number, separated by space, dot or dash, and optionally add country code.')" onchange="try{setCustomValidity('')}catch(e){}" placeholder="Phone No." class="textBoxes" />
                </div>
                <div class="clrr"></div>
            </div>
            <!---Phone No.---->


            <!---Email ID---->
            <div class="boxes">

                <div class="fll iconBoxes"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                <div class="frr">
                    <input type="email" required name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" oninvalid="setCustomValidity('Invalid email format. Please ensure the email follows the standard format: example@example.com.')" onchange="try{setCustomValidity('')}catch(e){}" placeholder="Email Id" class="textBoxes" />
                </div>
                <div class="clrr"></div>
            </div>
            <!--Email ID----->


            <!---Password------>
            <div class="boxes">

                <div class="fll iconBoxes"><i class="fa fa-key" aria-hidden="true"></i></div>
                <div class="frr">
                    <input type="Password" required id="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" oninvalid="setCustomValidity('Password must be 8-12 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character. Please try again.')" onchange="try{setCustomValidity('')}catch(e){}" placeholder="Password" class="textBoxes" title="Please enter Alphabets." />
                </div>
                <div class="clrr"></div>
            </div>
            <!---Password---->

            <!---DOB------->
            <div class="boxes">

                <div class="fll iconBoxes"><i class="fa fa-birthday-cake" aria-hidden="true"></i></i></div>
                <div class="frr">
                    <input type="text" id="dob" placeholder="mm-dd-yyyy" pattern="^(19[3-9]\d|200[0-5])-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$" oninvalid="setCustomValidity('Please enter a date between 1930-01-01 and 2005-12-31 in the format yyyy-mm-dd.')" onchange="try{setCustomValidity('')}catch(e){}" onfocus="(this.type='date')" onblur="(this.type='text')" name="dob" class="textBoxes" required>
                </div>
                <div class="clrr"></div>
            </div>

            <!-----DOB----->

            <!---Gender----->
            <div class="boxes radios">


                <label for="gender">Gender:</label>
                <input type="radio" id="male" class="male" name="gender" value="Male" required>
                <label for="male"><i class="fa fa-male" aria-hidden="true"></i> Male</label>
                <input type="radio" id="female" class="female" name="gender" value="Female" required>
                <label for="female"><i class="fa fa-female" aria-hidden="true"></i> Female</label>


            </div>

            <!---Gender--->


            <!---Submit Button------>

            <div>
                <input type="submit" name="Submit" class="submits" value="Register" onclick="return validateForm()">
            </div>

            <!---Submit Button----->

            <div class="signup_links">
                Already have an account? <a href="dashboard.php">Log in here</a>
            </div>
        </form>
    </div>
</body>

</html>