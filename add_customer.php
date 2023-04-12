<?php include('head.php'); ?>

<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<?php
include('connect.php');
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');

?>





<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 style="color: #000000;">Patient Details</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Patient Management</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->

        <!-- /# row -->
        <div class="row">
            <div class="col-lg-8" style="    margin-left: 10%;">
                <div class="card">
                    <div class="card-title">

                    </div>
                    <div class="card-body">
                        <div class="input-states">
                            <form class="form-horizontal" method="POST" action="pages/save_customer.php" name="userform" enctype="multipart/form-data">

                                <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date; ?>">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="fname" class="form-control" pattern="^[A-Z][a-zA-Z]{2,19}$" oninvalid="setCustomValidity('Please enter a valid input with at least 3 characters and the first letter capitalized.')" onchange="try{setCustomValidity('')}catch(e){}" placeholder="First Name" id="event" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Last Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="lname" id="lname" class="form-control" pattern="^[A-Z][a-zA-Z]{2,19}$" oninvalid="setCustomValidity('Please enter a valid input with at least 3 characters and the first letter capitalized.')" onchange="try{setCustomValidity('')}catch(e){}" id="event" placeholder="Last Name" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" oninvalid="setCustomValidity('Invalid email format. Please ensure the email follows the standard format: example@example.com.')" onchange="try{setCustomValidity('')}catch(e){}" placeholder="Email" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" oninvalid="setCustomValidity('Password must be 8-12 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character. Please try again.')" onchange="try{setCustomValidity('')}catch(e){}" placeholder="Password" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Gender</label>
                                        <div class="col-sm-9">
                                            <select name="gender" id="gender" class="form-control" required="">
                                                <option value="">--Select Gender--</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Date Of Birth</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="dob" class="form-control" pattern="^(19[3-9]\d|200[0-5])-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$" oninvalid="setCustomValidity('Please enter a date between 1930-01-01 and 2005-12-31 in the format yyyy-mm-dd.')" onchange="try{setCustomValidity('')}catch(e){}" placeholder="Birth Date">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Contact</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="contact" class="form-control" placeholder="Contact Number" pattern="^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$" oninvalid="setCustomValidity('Invalid US phone number format. Please use area code and 7-digit number, separated by space, dot or dash, and optionally add country code.')" onchange="try{setCustomValidity('')}catch(e){}" id="tbNumbers" required="">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>




        <?php include('footer.php'); ?>