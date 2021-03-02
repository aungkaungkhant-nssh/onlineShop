<?php
    session_start();
    include("admin/confs/config.php");
    $cart = 0;
    if(isset($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $qty) {
    $cart += $qty;
    }
}
    if(isset($_GET['cat'])){
        $cat_id = $_GET['cat'];
        $shops=mysqli_query($conn,"SELECT * FROM shops WHERE category_id=$cat_id");
    }
    else{
        $shops=mysqli_query($conn,"SELECT * FROM shops");
    }
    $cat=mysqli_query($conn,"SELECT * FROM categories");
?>
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
    <h1>Shop store</h1>
    <div class="info">
    <a href="view-cart.php">
        (<?php echo $cart ?>) books in your cart
    </a>
    </div>
    <div class="sidebar">
        <ul class="cats">
            <li><a href="index.php">All categories</a></li>
            <?php while($row=mysqli_fetch_assoc($cat)):?>   
                <li>
                    <a href="index.php?cat=<?php echo $row['id']?>"><?php echo ucfirst($row['name'])?></a>
                </li>
            <?php endwhile ;?>
        </ul>
    </div>
    <div class="main">
            <ul class="shops">
                <?php while($row=mysqli_fetch_assoc($shops)):?>
                    <li>
                    <img src="admin/covers/<?php echo $row['cover'] ?>" height="150">
                    <b>
                    <a href="shop-detail.php?id=<?php echo $row['id'] ?>">
                    <?php echo $row['title'] ?>
                    </a>
                    </b>
                    <i>$<?php echo $row['price'] ?></i>
                    <a href="add-to-cart.php?id=<?php echo $row['id'] ?>"
                    class="add-to-cart">Add to Cart</a>
                    </li>
                <?php endwhile;?>
            </ul>
    </div>
    <div class="footer">
    &copy; <?php echo date("Y") ?>. All right reserved.
    </div>
</body>
</html>