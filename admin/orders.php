<?php include("confs/auth.php")?>
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
<h1>Order List</h1>
    <ul class="menu">
        <li><a href="book-list.php">Manage Books</a></li>
        <li><a href="cat-list.php">Manage Categories</a></li>
        <li><a href="orders.php">Manage Orders</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <?php 
        include("confs/config.php");
        $orders=mysqli_query($conn,"SELECT * FROM orders");
    ?>
    <ul class="orders">
            <?php while($order=mysqli_fetch_assoc($orders)):?>
                <?php if($order['status']):?>
                    <li class="delivered">
                    <?php else:?>
                    <li>
                <?php endif;?>
                <div class="order">
                    <b><?php echo $order['name'] ?></b>
                    <i><?php echo $order['email'] ?></i>
                    <span><?php echo $order['phone'] ?></span>
                    <p><?php echo $order['address'] ?></p>
                    
                    <?php if($order['status']):?>
                        *<a href="order-status.php?id=<?php echo $order['id']?> & status=0">Undo</a>
                        <?php else:?>
                        *<a href="order-status.php?id=<?php echo $order['id']?> & status=1">Mark as delivered</a>
                    <?php endif;?>
                </div>
                <div class="items">
                    <?php
                         $order_id=$order['id'];
                         $items=mysqli_query($conn,"SELECT order_items.*,shops.title 
                         FROM 
                         order_items LEFT JOIN shops ON 
                         order_items.shop_id=shops.id WHERE order_items.order_id=$order_id");
                         while($item = mysqli_fetch_assoc($items)):
                    ?>
                        <b>
                    <a href="../book-detail.php?id=<?php echo $item['book_id'] ?>">
                    <?php echo $item['title'] ?>
                    </a>
                    (<?php echo $item['qty'] ?>)
                        </b>
                    <?php endwhile?>
                </div>
            <?php endwhile;?>
            </li>

    
    </ul>
</body>
</html>