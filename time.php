
<?php
include 'connect.php';
session_start();

$sql = "TRUNCATE `laundry_db`.`messages`";
$res = $conn->query($sql) ;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Refresh Div withour refershing the page completely</title>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
    $(document).ready(function(){
		 $("#div_refresh").load("chatbox.php");
        setInterval(function() {
            $("#div_refresh").load("chatbox.php");
        }, 10000);
    });

</script>
</head>
<body>
    <div id="div_refresh"></div>
</body>
</html>
