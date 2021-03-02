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
        a{
            text-decoration: none;
            color: #000;
        }
        li{
            list-style: none;
            padding:15px;
            display: flex;
           
            
        }
        
        .del{
            margin-left: 100px;
        }
        h4{
            width: 200px;
            font-size: 25px;
        }
        button{
            margin-top: 30px;
            margin-right: 10px;
            height: 40px;
            padding: 10px;
            background-color: aqua;
            border: none;
            
            
        }
    </style>
</head>
<body>
<h1>Categories List</h1>
<ul class="menu">
        <li><a href="shop-list.php">Manage Shops</a></li>
        <li><a href="cat-list.php">Manage Categories</a></li>
        <li><a href="orders.php">Manage Orders</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <?php 
        include("confs/config.php");
        $result=mysqli_query($conn,"SELECT * FROM categories");
       
    ?>
    <ul>
         <?php  while($row=mysqli_fetch_assoc($result)):?>
            <li title="<?php echo $row['remark']?>">
                <h4><?php echo ucwords($row['name'])?></h4>
                <button ><a href="cat-edit.php?id=<?php echo $row['id']?>">edit</a></button>
                <button ><a href="cat-del.php?id=<?php echo $row['id']?>">del</a></button>
                
            </li>
        <?php endwhile;?> 
    </ul>
   
</body>
</html>