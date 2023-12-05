<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$dbname = "Banking";

$con = mysqli_connect($host, $username, $password, $dbname) or die('Unable To connect') . mysqli_error($con);
// $db = mysqli_select_db($con, $dbname);
// $con = mysqli_connect($host, $username, $password, $dbname);
// if ($con == true) {
//     echo "Connecting to success";
// } else {
//     echo "Error";
// }