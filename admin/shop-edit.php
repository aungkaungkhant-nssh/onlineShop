<?php include("confs/auth.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        form,label{
            display: block;
            margin-top: 8px;
        }
    </style>
</head>
<body>
    <ul class="menu">
    <li><a href="shop-list.php">Manage Shopss</a></li>
    <li><a href="cat-list.php">Manage Categories</a></li>
    <li><a href="orders.php">Manage Orders</a></li>
    <li><a href="logout.php">Logout</a></li>
    </ul>
    <?php 
        include("confs/config.php");
        $id=$_GET['id'];
        $result=mysqli_query($conn,"SELECT * FROM shops where id=$id");
        $row=mysqli_fetch_assoc($result);
    ?>
    <h1>Edit shop</h1>
    <form action="shop-update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']?>">
            <label for="title">Book Title</label>
            <input type="text" name="title" id="title" value="<?php echo $row['title'] ?>">
            

            <label for="author">Author</label>
            <input type="text" name="made" id="made"  value="<?php echo $row['made'] ?>">
           
            <label for="sum">Summary</label>
            <textarea name="summary" id="sum"><?php echo $row['summary'] ?></textarea>
            <label for="price">Price</label>
            <input type="text" name="price" id="price" value="<?php echo $row['price'] ?>">
            
            <label for="categories">Category</label>
            <select name="category_id" id="categories">
            <option value="0">-- Choose --</option>
            <?php 
                $categories=mysqli_query($conn,"SELECT id ,name FROM categories");
                while($cat=mysqli_fetch_assoc($categories)):
            ?>
            <option value="<?php echo $cat['id'] ?>"
                    <?php if ($cat['id']==$row['category_id']) echo "selected"?> >
                    <?php echo $cat['name'] ?>
            
            </option>
            <?php endwhile;?>
            </select>
            <br><br>
            <img src="covers/<?php echo $row['cover'] ?>" alt="" height="150">
            <label for="cover">Change Cover</label>
            <input type="file" name="cover" id="cover">
            <br><br>
            <input type="submit" value="Update Shop">
            <a href="shop-list.php">Back</a>
    </form>
</body>
</html>