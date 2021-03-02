<?php
$dbhost="localhost";
$dbuser="admin";
$dbpass="123456";
$dbname="store";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_select_db($conn, $dbname);
?>