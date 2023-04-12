<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];
if ($_SESSION['username'] == "user") {
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} and username = 'customer' ORDER BY user_id DESC";
} else {
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} and username = 'user' ORDER BY user_id DESC";
}
$query = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($query) == 0) {
    $output .= "No users are available to chat";
} elseif (mysqli_num_rows($query) > 0) {
    include_once "data.php";
}
echo $output;
