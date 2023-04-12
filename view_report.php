<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>



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

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- /# row -->

        <!-- End PAge Content -->


        <?php include('footer.php'); ?>

        <!--  Author Name: Nikhil Bhalerao - www.nikhilbhalerao.com
PHP, Laravel and Codeignitor Developer -->


        <!-- <script>
            var addButtonTrigger = function addButtonTrigger(el) {
                el.addEventListener('click', function() {
                    var popupEl = document.querySelector('.' + el.dataset.for);
                    popupEl.classList.toggle('popup--visible');
                });
            };

            Array.from(document.querySelectorAll('button[data-for]')).
            forEach(addButtonTrigger);
        </script> -->