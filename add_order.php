  <?php include('head.php'); ?>

  <?php include('header.php'); ?>
  <?php include('sidebar.php'); ?>

  <?php
  include('connect.php');
  date_default_timezone_set('America/Chicago');
  $current_date = date('Y-m-d');

  ?>





  <!-- Page wrapper  -->
  <div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h3 style="color: #000000;">Appointment Details</h3>
      </div>
      <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
          <li class="breadcrumb-item active">Appointment Management</li>
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
                <form class="form-horizontal" method="POST" action="pages/save_order.php" name="userform" enctype="multipart/form-data">

                  <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date; ?>">

                  <div class="form-group">
                    <div class="row">
                      <label class="col-sm-3 control-label">Patient Name</label>
                      <div class="col-sm-9">
                        <select name="fname" id="event" class="form-control" required="">



                          <option value=" ">--Select patient--</option>
                          <?php
                          if ($_SESSION['username'] == 'customer') {
                            $sesid = $_SESSION['id'];
                            $sql2 = "SELECT * FROM customer where id=$sesid";
                          } else {
                            $sql2 = "SELECT * FROM customer";
                          }
                          $result2 = $conn->query($sql2);
                          while ($row2 = mysqli_fetch_array($result2)) {
                          ?>
                            <option value="<?php echo $row2['fname'] . ' ' . $row2['lname']; ?>"><?php echo $row2['fname'] . ' ' . $row2['lname']; ?> </option>
                          <?php } ?>
                        </select>




                      </div>
                    </div>
                  </div>




                  <div class="form-group">
                    <div class="row">
                      <label class="col-sm-3 control-label">Choose Service</label>
                      <div class="col-sm-9">
                        <select name="sname" id="sname" class="form-control" required="" onchange="s();">



                          <option value=" ">--Select Service--</option>
                          <?php
                          $sql2 = "SELECT * FROM service where id!=1";
                          $result2 = $conn->query($sql2);
                          while ($row2 = mysqli_fetch_array($result2)) {
                          ?>
                            <option required value="<?php echo $row2['id'] . ',' . $row2['prize']; ?>"><?php echo $row2['sname']; ?> </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="row">
                      <label class="col-sm-3 control-label">Description</label>
                      <div class="col-sm-8">
                        <textarea class="form-control" rows="4" name="discription" placeholder="Description" required style="height: 80px;"></textarea>
                      </div>
                    </div>
                  </div>





              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-sm-3 control-label">Consulting Fee</label>
              <div class="col-sm-9">
                <input type="number" name="prizes" id="prizes" readonly>
              </div>
            </div>
          </div>




          <div class="form-group">
            <div class="row">
              <label class="col-sm-3 control-label">Appointment Date</label>
              <div class="col-sm-9">
                <input type="date" name="dod" min=<?php echo $current_date ?> max="2023-12-31" class="form-control" placeholder="mm-dd-yyyy" required>
              </div>
            </div>
          </div>


          <div class="form-group">
            <div class="row">
              <label class="col-sm-3 control-label">Today's Date</label>
              <div class="col-sm-9">
                <input name="todays_date" class="form-control" readonly value="<?php echo date('y/m/d'); ?>">
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



  <script>
    function s() {
      //alert($('#sname').val());
      var sname = $('#sname').val();
      var price = sname.split(',');
      $('#prizes').val(price[1]);
    }
  </script>