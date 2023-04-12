<?php session_start();
include('connect.php');
if (!isset($_SESSION["email"])) {
?>
    <script>
        window.location = "login.php";
    </script>
<?php

} else {


?>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->

                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>

                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">


                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                if ($_SESSION["username"] == 'admin' || $_SESSION["username"] == 'user') {
                                    $sql = "select * from admin where id = '" . $_SESSION["id"] . "'";
                                } else {
                                    $sql = "select * from customer where id = '" . $_SESSION["id"] . "'";
                                }
                                $query = $conn->query($sql);
                                while ($row = mysqli_fetch_array($query)) {
                                    //print_r($row);
                                    extract($row);
                                    $fname = $row['fname'];
                                    $lname = $row['lname'];
                                    $email = $row['email'];
                                    $contact = $row['contact'];
                                    $gender = $row['gender'];
                                }
                                ?>
                                <img src="avatar.png" alt="user" class="profile-pic" />
                                <label style="color: whitesmoke;">Hello, <?php echo "$fname", " ", "$lname"; ?></label></a>

                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="profile.php"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="changepassword.php"><i class="ti-key"></i> Change Password</a></li>
                                    <!--   <li><a href="#"><i class="ti-wallet"></i> Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li><a href="#"><i class="ti-settings"></i> Setting</a></li> -->
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
    <?php } ?>