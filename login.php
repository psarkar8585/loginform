<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='red_error'>Password does not match</div>";
                }
            }else{
                echo "<div class='red_error'>Email does not match</div>";
            }
        }
        ?>
      <form action="login.php" method="post">
      <h2>LogIn</h2>
        <div class="form-group">
        <h5>Demo-test-defineway</h5>
        <label for="">Email id : <input type="emamil" class="form-control" name="email" placeholder="abc@gmail.com"></label><br>
                <label for="">Password : <input type="password" class="form-control" name="password" placeholder="xxxxxxx"></label><br>
            <input type="submit" value="Login" name="login" class="btn btn-primary">
            <p>Not registered yet <a href="registration.php">Register Here</a></p>
        </div>
      </form>
    </div>
</body>
</html>