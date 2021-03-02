<?php include("confs/auth.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label,input{
            display: block;
            margin-top: 8px;
        }
    </style>
</head>

<body>
    <h1>Add category</h1>
    <ul class="menu">
        <li><a href="shop-list.php">Manage Books</a></li>
        <li><a href="cat-list.php">Manage Categories</a></li>
        <li><a href="orders.php">Manage Orders</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <form action="cat-add.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name">
        <label for="remark">Remark</label>
        <input type="text" name="remark">
        <br><br>
        <input type="submit" value="add category">    
    </form>
</body>
</html>