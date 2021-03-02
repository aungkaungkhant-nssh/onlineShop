<?php 
include("confs/config.php");
$name=$_POST["name"];
$remark=$_POST["remark"];
mysqli_query($conn,"insert into categories (name,remark,created_date,modified_date) VALUES ('$name','$remark',now(),now())");
header("location: cat-list.php");