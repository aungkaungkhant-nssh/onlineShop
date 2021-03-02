<?php
include("confs/config.php");
$id=$_GET['id'];
mysqli_query($conn,"DELETE * FROM shops WHERE id=$id");
header("location: shop-list.php");
