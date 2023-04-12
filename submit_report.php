<?php
session_start();
date_default_timezone_set('America/Chicago');
$current_date = date('Y-m-d');
include('connect.php');


$email = $_SESSION["email"];
$report_type = $_POST["report_type"];

if ($_FILES["report_file"]["error"] == UPLOAD_ERR_OK) {
    $report_name = $_FILES["report_file"]["name"];
    $report_file_tmp = $_FILES["report_file"]["tmp_name"];


    $destination_directory = "uploads/";


    if (move_uploaded_file($report_file_tmp, $destination_directory . $report_name)) {

        $stmt = $conn->prepare("INSERT INTO `reports`(`email`,`report_type`,`report_name`,`report_file`) VALUES (?,?,?,?)");
        if (!$stmt) {
            die("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("ssss", $email, $report_type, $report_name, $report_name);

        if ($stmt->execute() === TRUE) {
?>
            <link rel="stylesheet" href="../popup_style.css">
            <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Success
                    </h3>
                    <p style="color: white;">Report Added Successfully</p>
                    <p>
                        <script>
                            setTimeout("location.href = 'view_report.php';", 1500);
                        </script>
                    </p>
                </div>
            </div>

        <?php
        } else {
            var_dump($conn->error);
        ?>
            <link rel="stylesheet" href="../popup_style.css">
            <div class="popup popup--icon -error js_error-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Something Went Wrong!
                    </h3>
                    <p style="color:white">Please try again later</p>
                    <p>
                        <a href="/add_report.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
                    </p>
                </div>
            </div>

<?php
        }
    } else {
        echo "Error moving uploaded file";
    }
} else {
    echo "Error uploading file: " . $_FILES["report_file"]["error"];
}
?>