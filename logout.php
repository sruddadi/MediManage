<?php
session_start(); //to ensure you are using same session
if ($_SESSION["username"] == "user" || $_SESSION["username"] == "customer") {
  if (isset($_SESSION['email'])) {
    include_once "php/config.php";
    $status = "Offline now";
    $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id={$_SESSION['unique_id']}");
    if ($sql) {
      session_unset();
      session_destroy();
      header("location: login.php");
    }
  } else {
    header("location: users.php");
  }
}
session_destroy(); //destroy the session

?>
<script>
  window.location = "login.php";
</script>
<?php
//to redirect back to "index.php" after logging out
exit;
?>