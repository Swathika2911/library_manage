<?php 
ob_start(); 
session_start();
include_once "db/db.php"; 

$sel = "SELECT * FROM supplier WHERE supp_uname = '".$_GET['UserName']."'";
$result = mysqli_query($con, $sel);
$res = mysqli_fetch_object($result);

if($res)
{
    echo "<input type='submit' name='register' value='Register' class='btn' disabled><br><font color='#CC0000'>User name already exists</font>";
}
else
{
    echo "<input type='submit' name='register' value='Register' class='btn'>";
}
?>
