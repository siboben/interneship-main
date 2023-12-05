<?php
include './includes/dbconn.php';
$message = "";
if (isset($_POST["sign_up_btn"])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $create_datetime = date("Y-m-d H:i:s");
    if ($password != $cpassword) {
        $message = "Two passwords must be the same";
    } else {
        $query    = "INSERT into `users` (firstname, password, email, create_datetime,lastname)
        VALUES ('$fname', '" . md5($password) . "', '$email', '$create_datetime','$lname')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            $created_user_id = mysqli_insert_id($con);
            $_SESSION["id"] = $created_user_id;
            $_SESSION["email"] = $email;
            $_SESSION["lastname"] = $lname;
            $_SESSION["firstame"] = $fname;
        } else {
            $message = "Error while creating a new account" . mysqli_error($con);
        }
    }
}
if (isset($_SESSION["id"])) {
    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- link html to css -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="form">
        <div class="title">
            <p>Create Account</p>
        </div>
        <div class="error-message"><?php
                                    if ($message != "") {
                                        echo $message;
                                    } ?>
        </div>
        <form method="post" action="#">
            <input type="text" name="firstname" placeholder="First Name..." required>
            <input type="text" name="lastname" placeholder="Last Name...">
            <input type="email" name="email" placeholder="Email...">
            <input type="password" name="password" placeholder="password...">
            <input type="password" name="cpassword" placeholder="confrim password...">
            <input type="submit" name="sign_up_btn" value="Sign Up">
        </form>
        <div class="link" style="margin-top:70px;">
            <p>Already have an account ? <a href="login.php">sign in</a></p>
        </div>
    </div>
</body>

</html>