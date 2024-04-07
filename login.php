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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body style="
    background-image: url('background.jpg'); /* Replace 'background-image.jpg' with your actual background image */
    background-size: cover;
    background-position: center;
    font-family: Arial, sans-serif;
    color: #fff;
">
    <div class="container" style="
        max-width: 400px;
        margin: 100px auto;
        padding: 20px;
        border-radius: 10px;
        background-color: rgba(0, 0, 0, 0.7); /* Adding transparency */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Adding shadow effect */
    ">
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
                    echo "<div style='margin-bottom: 20px;' class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div style='margin-bottom: 20px;' class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
      <form action="login.php" method="post">
        <div class="form-group">
            <input style='margin-bottom: 20px;' type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input style='margin-bottom: 20px;' type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn" style='text-align: center;'>
            <input style='padding: 10px 20px; border: none; border-radius: 5px; background-color: #007bff; color: #fff; cursor: pointer;' type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
     <div><p style='color: #fff;'>Not registered yet? <a style='color: #ffc107;' href="registration.php">Register Here</a></p></div>
    </div>
</body>
</html>
