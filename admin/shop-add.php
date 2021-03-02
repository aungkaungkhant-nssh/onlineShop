<?php
    include("confs/config.php");
    $title = $_POST['title'];
    $made= $_POST['made'];
    $summary = $_POST['summary'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $cover = $_FILES['cover']['name'];
    $tmp = $_FILES['cover']['tmp_name'];
    if($cover){
        move_uploaded_file($tmp,"covers/$cover");
    }
    $sql="INSERT INTO shops (title,made,summary,price,category_id,cover,created_date,modified_date) VALUES ('$title','$made','$summary','$price','$category_id','$cover',now(),now())";
    mysqli_query($conn, $sql);
    header("location: shop-list.php");
   
?>
