<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
    <style>
        .container{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Dashboard</h1>
        <?php echo "Hello " . $_SESSION['user'] ?>;
        <br>
        <button><a href="logout.php" class="btn btn-warning">Logout</a></button>
    </div>
</body>
</html>