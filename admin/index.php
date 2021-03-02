<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form,label{
            display: block;
            margin-top: 8px;
        }

    </style>
</head>
<body>
<h1>Login to Book Store Administration</h1>
<form action="login.php" method="post">
    <label for="name">Name</label>
    <input type="text" id="name" name="name">
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
    <br><br>
    <input type="submit" value="Admin Login">
</form>
</body>
</html>
