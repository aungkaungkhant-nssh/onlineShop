<?php
session_start();
$name = $_POST['name'];
$password = $_POST['password'];
if($name==="admin" and $password == "214365"){
    $_SESSION['auth']=true;
    header("location: shop-list.php");
}else{
    header("location: index.php");
}