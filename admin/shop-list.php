<?php include("confs/auth.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Shopping  List</h1>
    <ul class="menu">
        <li><a href="shop-list.php">Manage Shops</a></li>
        <li><a href="cat-list.php">Manage Categories</a></li>
        <li><a href="orders.php">Manage Orders</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
<?php
include("confs/config.php");
$result = mysqli_query($conn, "
SELECT shops.*, categories.name
FROM shops LEFT JOIN categories
ON shops.category_id = categories.id

");
?>
<ul class="list">
<?php while($row = mysqli_fetch_assoc($result)): ?>
<li>
<img src="covers/<?php echo $row['cover'] ?>"
alt="" align="right" height="140">
<b><?php echo ucfirst($row['title'] )?></b>
<i>by made in <?php echo $row['made'] ?></i>
<small>(in <?php echo $row['name'] ?>)</small>
<span>$<?php echo $row['price'] ?></span>
<div><?php echo $row['summary'] ?></div>
[<a href="shop-del.php?id=<?php echo $row['id'] ?>" class="del">del</a>]
[<a href="shop-edit.php?id=<?php echo $row['id'] ?>">edit</a>]
</li>
<?php endwhile; ?>
</ul>
<a href="shop-new.php" class="new">New Shop</a>
</body>
</html>