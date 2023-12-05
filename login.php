<?php
include './includes/dbconn.php';
$message = "";
if (isset($_POST["login_btn"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    // $password = md5($_POST["password"]);
    $sql = "SELECT * FROM users WHERE email='$email' and password = '$password'";
    $result = mysqli_query($con, $sql); //execute query
    $row  = mysqli_fetch_array($result);
    if (is_array($row)) {
        //setting session
        $_SESSION["id"] = $row['id'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["lastname"] = $row['lastname'];
        $_SESSION["firstname"] = $row['firstname'];
    } else {
        $message = "Invalid Username or Password!";
    }
}
if (isset($_SESSION["id"])) {
    header("Location:index.php");
}
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <style>
        .form {
            width: 290px;
            height: 300px;
        }
    </style>
</head>

<body>
    <div class="form">
        <div class="title">
            <h2>Sign In</h2>
        </div>
        <div class="error-message"><?php
                                    if ($message != "") {
                                        echo $message;
                                    } ?>
        </div>

        <form method="post" action="login.php">

            <input type="email" name="email" placeholder="Email...">
            <input type="password" name="password" placeholder="password...">
            <input type="submit" name="login_btn" value="Login">
        </form>
        <div class="link">
            <p>Didn't have account ? <a href="signup.php">Sign up</a></p>
        </div>
    </div>
</body>

</html>