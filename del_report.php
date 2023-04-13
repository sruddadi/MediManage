<?php
include 'connect.php';
session_start();



$sql = "DELETE FROM `reports` WHERE id='" . $_GET["id"] . "'";
$res = $conn->query($sql);
$file_path = "uploads/" . $_GET["path"];
// Delete the file from the server
unlink($file_path);
$_SESSION['success'] = ' Record Successfully Deleted';
if ($_SESSION['username'] == 'user') {
    header("Location: view_reportemployee.php");
    exit();
} else {
    header("Location: view_report.php");
    exit();
}
?>
<!-- <script>
    window.location = "view_reportemployee.php";
    //alert("Delete Successfully");
</script> -->