<?php
session_start();
include("DBConnection.php");
include('connect.php');

$fromUser = $_POST["fromUser"];
$toUser = $_POST["toUser"];
$message = $_POST["message"];

$output="";
if($_SESSION["username"]=='user'){
  $sql = "insert into messages (FromUser, ToUser, Message) values ('$fromUser',1,'$message')";
}
else {
  $sql = "insert into messages (FromUser, ToUser, Message) values ('$fromUser',2,'$message')";
}

if($connect -> query($sql))
{
    $output.="";
}
else
{
    $output.="Error. Please Try Again.";
}
echo $output;
?>
