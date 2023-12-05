<?php
//delete single user
include './includes/dbconn.php';
if (isset($_GET['id'])) { //user id  passed from page
    $del_user_id = $_GET['id'];
    $delUser = "DELETE FROM users where id = '$del_user_id'";
    $runsql = mysqli_query($con, $delUser);
    if ($runsql == true) {
?>
        <script>
            alert('User deleted successfully');
        </script>
<?php
        // header('Location:display.php');
    } else {
        echo "user not deleted" . mysqli_error($con);
    }
}
mysqli_close($con); //used to close database connection
?>