<?php
include './includes/dbconn.php';
$user_id = $_SESSION["id"];
if ($user_id == "") {
    header("Location:login.php");
}
$lname = $_SESSION['lastname'];
$fname = $_SESSION['firstname'];
$email = $_SESSION['email'];
$message = "";
if (isset($_POST["update_btn"])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];


    // upload img
    $imagename = time() . $_FILES['profile']['name'];
    $imgtemp = $_FILES['profile']['tmp_name'];
    $imgerror = $_FILES['profile']['error'];
    if ($imgerror == 4) {
        $q = "SELECT * FROM users WHERE id=1";
        $r = mysqli_query($con, $q);
        $d = mysqli_fetch_array($r);
        $imagename = $d['profile_image'];
    }
    $move_file = move_uploaded_file($imgtemp, "./uploads/$imagename");

    $query    = "UPDATE users SET firstname = '$fname', lastname = '$lname', email = '$email',profile_image='$imagename' WHERE id = '$user_id'";
    $result   = mysqli_query($con, $query);
    if (!$result) {
        $message = "Error while creating a new account" . mysqli_error($con);
    } else {
        $message = "Your profile details successfully updated.";
    }
}
// if (isset($_SESSION["id"])) {
//     header("Location:myprofile.php");
// }

if (isset($_GET['id'])) {
    $update_user_id = $_GET['id'];

    $q = "SELECT * FROM users WHERE id='$update_user_id'";
    $r = mysqli_query($con, $q);
    $d = mysqli_fetch_array($r);
    $f = $d['firstname'];
    $l = $d['lastname'];
    $e = $d['email'];
    $profile = $d['profile_image'];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update user</title>
        <!-- link html to css -->
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/index.css">
        <style>
            .form {
                width: 500px;
                height: 400px;

            }

            .form input {

                text-align: start;
                padding-left: 10px;
                left: 20px;
            }
        </style>

    </head>

    <body>
        <?php include('./includes/header.php'); ?>

        <div class="form">
            <div class="title">
                <h2>Update User</h2>
            </div>
            <div class="error-message"><?php
                                        if ($message != "") {
                                            echo $message;
                                        }
                                        ?>
            </div>

            <form method="post" action="#" enctype="multipart/form-data">
                <input type="text" name="firstname" value="<?= $f ?>" placeholder="First Name..." required>
                <input type="text" name="lastname" value="<?= $l ?>" placeholder="Last Name...">
                <input type="email" name="email" value="<?= $e ?>" placeholder="Email...">
                <input type="file" name="profile">
                <input type="submit" name="update_btn" value="update" style="text-align:center;">
            </form>
        </div>
    </body>

    </html>
<?php } ?>