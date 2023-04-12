<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<!DOCTYPE html>
<html>
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> Add Reports</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Add Reports</li>
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
                            <form class="form-horizontal" method="POST" action="submit_report.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Report Type:</label>
                                        <div class="col-sm-9">
                                            <select id="report-type" name="report_type" class="form-control" required>
                                                <option value="">Select Report Type</option>
                                                <option value="Blood Test">Blood Test</option>
                                                <option value="X-Ray">X-Ray</option>
                                                <option value="MRI">MRI</option>
                                                <option value="Ultrasound">Ultrasound</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Report File</label>
                                        <div class="col-sm-9">
                                            <input type="file" id="report-file" name="report_file" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" value="Submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>


</html>


<?php include('footer.php'); ?>