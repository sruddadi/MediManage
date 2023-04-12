<?php 

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $mailFrom = $_POST['mail'];

    $mailTo = "srikar.honey123@gmail.com";
    $headers = "From: ".$mailFrom;
    $txt = "You have received an email from ".$name.".\n\n".$message;

    mail($mailTo,$subject,$txt,$headers);
    header("Location: Contact.php?mailsend");
}

?>