<?php
include './includes/dbconn.php';
//sign up user
if (isset($_POST['sign_up_btn'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $insert = "INSERT INTO `users`(
        `firstname`,
        `email`,
        `password`,
        `lastname`)
    VALUES(
        '$firstname',
        '$email',
        '$password',
        '$lastname')";
    $sql = mysqli_query($con, $insert);
    if ($sql) {
        echo "insert is successful";
    } else {
        echo "insert failed";
    }
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



<?php
// $age = 40;
// if ($age < 18) {
//     echo "you are young";

//     if ($gender = 'female') {
//     } else {
//     }
// } else if ($age > 18 && $age < 25) {
//     echo "you are adult";
// } else if ($age > 50) {
// } else {
//     echo " you are no where located";
// }
?>