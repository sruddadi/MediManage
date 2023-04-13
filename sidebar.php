 <?php
    include('connect.php');
    $sql = "select * from admin where id = '" . $_SESSION["id"] . "'";
    $result = $conn->query($sql);
    $row1 = mysqli_fetch_array($result);
    $q = "select * from tbl_permission_role where role_id='" . $row1['group_id'] . "'";
    $ress = $conn->query($q);
    //$row=mysqli_fetch_all($ress);
    $name = array();
    while ($row = mysqli_fetch_array($ress)) {
        $sql = "select * from tbl_permission where id = '" . $row['permission_id'] . "'";
        $result = $conn->query($sql);
        $row1 = mysqli_fetch_array($result);
        array_push($name, $row1[1]);
    }
    $_SESSION['name'] = $name;
    $useroles = $_SESSION['name'];

    ?>

 <!-- Left Sidebar  -->
 <div class="left-sidebar">
     <!-- Sidebar scroll-->
     <h1 style="margin-top:-45px; margin-left:20px; color: white; font-family: Tahoma, sans-serif;">MediManage</h1>
     <div class="scroll-sidebar">
         <!-- Sidebar navigation-->
         <nav class="sidebar-nav">
             <ul id="sidebarnav">
                 <li class="nav-devider"></li>
                 <li class="nav-label">Home</li>
                 <li> <a href="dashboard.php" aria-expanded="false"><i class="fa fa-tachometer"></i>Dashboard</a>
                 </li>

                 <li class="nav-label">Menu</li>

                 <?php if ($_SESSION["username"] == 'admin') {
                        if (isset($useroles)) {
                            if (in_array("manage_user", $useroles)) { ?>

                             <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Employee Management</span></a>
                                 <ul aria-expanded="false" class="collapse">
                                     <?php if (isset($useroles)) {
                                            if (in_array("add_user", $useroles)) { ?>
                                             <li><a href="add_user.php">Add Employee</a></li>
                                     <?php }
                                        } ?>
                                     <li><a href="view_user.php">View Employee</a></li>
                                 </ul>
                             </li>
                 <?php }
                        }
                    } ?>



                 <?php if ($_SESSION["username"] == 'admin' || $_SESSION["username"] == 'user') { ?>
                     <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-user-plus"></i><span class="hide-menu">Patient Management</span></a>
                         <ul aria-expanded="false" class="collapse">
                             <li><a href="add_customer.php">Add Patient</a></li>
                             <li><a href="view_customer.php">View Patients</a></li>
                         </ul>
                     </li>
                 <?php } ?>



                 <?php if ($_SESSION["username"] == 'admin' || $_SESSION["username"] == 'user' || $_SESSION["username"] == 'customer') { ?>
                     <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Appointment Management</span></a>
                         <ul aria-expanded="false" class="collapse">
                             <li><a href="add_order.php">Schedule appointment</a></li>
                             <li><a href="view_order.php">Manage appointments</a></li>
                         </ul>
                     </li>
                 <?php } ?>








                 <?php if ($_SESSION["username"] == 'admin') { ?>
                     <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">Analytical Reports</span></a>
                         <ul aria-expanded="false" class="collapse">
                             <li><a href="chart.php">Report</a></li>

                         </ul>
                     </li>
                 <?php } ?>





                 <?php if ($_SESSION["username"] == 'admin' || $_SESSION["username"] == 'user') { ?>
                     <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-wrench"></i><span class="hide-menu">Services</span></a>
                         <ul aria-expanded="false" class="collapse">
                             <li><a href="add_services.php">Add Services </a></li>
                             <li><a href="view_services.php">View Services</a></li>
                         </ul>
                     </li>




                     <?php if ($_SESSION["username"] == 'admin') { ?>


                     <?php } ?>




                 <?php } ?>

                 <?php if ($_SESSION["username"] == 'user') { ?>
                     <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-plus-square"></i><span class="hide-menu">Medical Reports</span></a>
                         <ul aria-expanded="false" class="collapse">
                             <li><a href="view_reportemployee.php">Manage reports</a></li>
                         </ul>
                     </li>
                 <?php } ?>

                 <?php if ($_SESSION["username"] == 'customer') { ?>
                     <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-plus-square"></i><span class="hide-menu">Medical Reports</span></a>
                         <ul aria-expanded="false" class="collapse">
                             <li><a href="add_report.php">Add report</a></li>
                             <li><a href="view_report.php">Manage reports</a></li>
                         </ul>
                     </li>
                 <?php } ?>

                 <?php if ($_SESSION["username"] == 'user' || $_SESSION["username"] == 'customer') { ?>
                     <li> <a target="_blank" href="users.php" aria-expanded="false"><i class="fa fa-phone"></i><span class=" hide-menu">Contact Support</span></a>

                     </li>

                 <?php } ?>



             </ul>
         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </div>
 <!-- End Left Sidebar  -->