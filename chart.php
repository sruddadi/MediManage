
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php

$q = "SELECT * FROM `order`";
         $result = $conn->query($q);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
             $productname[]  = $row['fname']  ;
            $sales[] = $row['prizes'];
        }
 

 
 
?>
 <?php
 include('connect.php');

if($_SESSION["username"]=='admin' || $_SESSION["username"]=='user'){
    
    $q = "select * from admin where id = '".$_SESSION['id']."'";
}
else {
   $q = "select * from customer where id = '".$_SESSION['id']."'";
}
 
  $q1 = $conn->query($q);
  while($row = mysqli_fetch_array($q1)){
    extract($row);
    $db_pass = $row['password'];
  }

if(isset($_POST["btn_password"])){
  
  $old = md5($_POST['old_password']);
  $pass_new = md5($_POST['new_password']);
  $confirm_new = md5($_POST['confirm_password']);
//$passw = hash('sha256',$p);
//echo $pass_new;

  if($db_pass!=$old){ ?> 
    <?php $_SESSION['error']='Old Password not matched';?>
   <!--  <script>
    alert('OLD Paasword not matched');
    </script> -->
  <?php } else if($pass_new!=$confirm_new){ ?> 
    <?php $_SESSION['error']='NEW Password and CONFIRM password not Matched';?>
   <!--  <script>
    alert('NEW Password and CONFIRM password not Matched');
    </script> -->
  <?php } else {
    //$pass = md5($_POST['password']);
if($_SESSION["username"]=='admin' || $_SESSION["username"]=='user'){
    
   $sql = "update  admin set `password`='$pass_new' where id = '".$_SESSION['id']."'";
}
else {
  $sql = "update  customer set `password`='$pass_new' where id = '".$_SESSION['id']."'";
}    
  
  $res = $conn->query($sql);
  ?>
   <div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p>Password changed Successfully...</p>
    <p>
 <?php  if($_SESSION["username"]=='admin' || $_SESSION["username"]=='user'){ ?>
      <a href="logout.php"><button class="button button--success" data-for="js_success-popup">Close</button></a>
     <?php }  else { ?>
      <a href="../logout.php"><button class="button button--success" data-for="js_success-popup">Close</button></a>
     <?php } ?>
    </p>
  </div>
</div>
  <?php
    
  }
}


?>


  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Analytics</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Daily Analytics</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
               <html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
    </head>
    <body>
        <div style="width:80%;hieght:80%;text-align:center">
            <h2 class="page-header" >Analytics Reports </h2>
            <div>Product </div>
            <canvas  id="chartjs_bar"></canvas> 
        </div>    
    </body>
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
</html>   
                </div>
                
               
                <!-- /# row -->

                <!-- End PAge Content -->
           

<?php include('footer.php');?>



<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
