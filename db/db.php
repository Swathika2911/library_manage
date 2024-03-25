<?php
//ob_start();
//error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
$con = mysqli_connect('localhost', 'root', '', 'library');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>
