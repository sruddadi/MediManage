<?php include('head.php'); ?>

<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<?php
include('connect.php');
date_default_timezone_set('America/Chicago');
$current_date = date('Y-m-d');

if (isset($_POST["btn_update"])) {
    extract($_POST);

    $q1 = "UPDATE `service` SET `prize`='$consultationfee 'WHERE `id`='" . $_GET['id'] . "'";

    if ($conn->query($q1) === TRUE) {
        $_SESSION['success'] = ' Record Successfully Updated';
?>
        <script type="text/javascript">
            window.location = "view_services.php";
        </script>
    <?php
    } else {
        $_SESSION['error'] = 'Something Went Wrong';
    ?>
        <script type="text/javascript">
            window.location = "view_services.php";
        </script>
<?php
    }
}

?>

<?php
$que = "select * from service where id='" . $_GET["id"] . "'";
$query = $conn->query($que);
while ($row = mysqli_fetch_array($query)) {
    //print_r($row);
    extract($row);
    $service = $row['sname'];
    $price = $row['prize'];
}

?>





<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 style="color: #000000;">Edit services</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Services</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->

        <!-- /# row -->
        <div class="row">
            <div class="col-lg-8" style="margin-left: 10%;">
                <div class="card">
                    <div class="card-title">

                    </div>
                    <div class="card-body">
                        <div class="input-states">


                            <form class="form-horizontal" method="POST" enctype="multipart/form-data" name="userform">

                                <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date; ?>">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Service Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="service" class="form-control" placeholder="Service Name" id="event" onkeydown="return alphaOnly(event);" value="<?php echo $service; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Consultation Fee</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="consultationfee" id="cf" class="form-control" id="event" placeholder="Consultation Fee" value="<?php echo $price; ?>" required="">
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" name="btn_update" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- /# row -->

        <!-- End PAge Content -->


        <?php include('footer.php'); ?>