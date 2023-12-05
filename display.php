<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All users</title>
    <link rel="stylesheet" href="./css/index.css" type="text/css">
</head>

<body>
    <?php
    include './includes/dbconn.php'; //connection to db
    include('./includes/header.php');
    $select = mysqli_query($con, "SELECT* FROM users");
    $count = mysqli_num_rows($select); //return number of rows in table
    ?>
    <center>
        <h1 style="color:white;margin-top:100px;">User list</h1>
        <table border="1" style="background: #fff;
        margin-top:10px;">

            <thead>
                <th>ID</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>email</th>
                <th>create_datetime</th>
                <th colspan="2">operation</th>
            </thead>
            <tbody>
                <?php
                while ($fetch = mysqli_fetch_array($select)) {
                ?>
                <tr>
                    <td><?php echo $fetch['id']; ?></td>
                    <td><?php echo $fetch['firstname']; ?></td>
                    <td><?php echo $fetch['lastname']; ?></td>
                    <td><?php echo $fetch['email']; ?></td>
                    <td>
                        <?php echo $fetch['create_datetime']; ?></td>
                    <td>
                        <a href="updateuser.php?id=<?= $fetch['id']; ?>">Update</a>
                    </td>
                    <td>
                        <a href="deletuser.php?id=<?= $fetch['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </center>
</body>

</html>