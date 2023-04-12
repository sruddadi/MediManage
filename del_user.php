<?php
include 'connect.php';
session_start();

$chatsql = "SELECT * from admin WHERE id='" . $_GET["id"] . "'";
$sql = "DELETE FROM admin WHERE id='" . $_GET["id"] . "'";
$result = mysqli_query($conn, $chatsql);
$chatcount = mysqli_num_rows($result);
if ($chatcount == 1) {
    $row  = mysqli_fetch_array($result);
    $email = $row['email'];
}
$sql2 = "DELETE FROM users WHERE email = '$email'";
$res2 = $conn->query($sql2);
$res = $conn->query($sql);
$_SESSION['success'] = ' Record Successfully Deleted';
?>
<script>
    //alert("Delete Successfully");
    window.location = "view_user.php";
</script>