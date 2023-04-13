<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php');
if (isset($_GET['id'])) { ?>
    <div class="popup popup--icon -question js_question-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
            <h3 class="popup__content__title">
                Sure
                </h1>
                <p>Are You Sure To Delete This Record?</p>
                <p>
                    <a href="del_report.php?id=<?php echo $_GET['id']; ?>&path=<? echo $row['report_name'] ?>" class="button button--success" data-for="js_success-popup">Yes</a>
                    <a href="view_report.php" class="button button--error" data-for="js_success-popup">No</a>
                </p>
        </div>
    </div>
<?php } ?>


<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 style="color: #000000;"> View Reports</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->


        <!-- /# row -->
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Report Type</th>
                        <th>Report File Name</th>
                        <!--  <th>Email</th> -->
                        <th>Email ID</th>
                        <th>Action</th>
                        <!-- <th>discription</th>
                   <th>Pick up date</th>
                   <th>Dilivery date</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connect.php';
                    $email = $_SESSION["email"];
                    $sql = "SELECT * FROM reports where email='$email'";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['report_type']; ?></td>
                            <td><a href="view_file.php?id=<?php echo $row['id']; ?>"><?php echo $row['report_name']; ?></a></td>
                            <td><?php echo $row['email']; ?></td>
                            <td> <a href="view_report.php?id=<?= $row['id']; ?>&path=<?= $row['report_name'] ?>"><button type="button" class="btn btn-xs btn-danger" data-for="js_question-popup"><i class="fa fa-trash"></i></button></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- /# row -->

        <!-- End PAge Content -->
        <?php include('footer.php'); ?>


        // <!--  Author Name: Nikhil Bhalerao - www.nikhilbhalerao.com
// PHP, Laravel and Codeignitor Developer -->

        <link rel="stylesheet" href="popup_style.css">
        <?php if (!empty($_SESSION['success'])) {  ?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Success
                        </h1>
                        <p><?php echo $_SESSION['success']; ?></p>
                        <p>
                            <a href="view_report.php"><button class="button button--success" data-for="js_success-popup">Close</button></a>
                        </p>
                </div>
            </div>
        <?php unset($_SESSION["success"]);
        } ?>
        <?php if (!empty($_SESSION['error'])) {  ?>
            <div class="popup popup--icon -error js_error-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Error
                        </h1>
                        <p><?php echo $_SESSION['error']; ?></p>
                        <p>
                            <a href="view_report.php"><button class="button button--success" data-for="js_success-popup">Close</button></a>
                        </p>
                </div>
            </div>
        <?php unset($_SESSION["error"]);
        } ?>
        <script>
            var addButtonTrigger = function addButtonTrigger(el) {
                el.addEventListener('click', function() {
                    var popupEl = document.querySelector('.' + el.dataset.for);
                    popupEl.classList.toggle('popup--visible');
                });
            };

            Array.from(document.querySelectorAll('button[data-for]')).
            forEach(addButtonTrigger);
        </script>
        <script>
            var addButtonTrigger = function addButtonTrigger(el) {
                el.addEventListener('click', function() {
                    var popupEl = document.querySelector('.' + el.dataset.for);
                    popupEl.classList.toggle('popup--visible');
                });
            };

            Array.from(document.querySelectorAll('button[data-for]')).
            forEach(addButtonTrigger);
        </script>