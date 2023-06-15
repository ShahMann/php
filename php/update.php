<?php include "db.php";

include "function.php";

if (isset($_POST['submit'])) {
    global $connection;
    $usernames = $_POST['username'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    $query = "UPDATE user SET ";
    $query .= "username = '$usernames, ";
    $query .= "password = '$password' ";
    $query .= "WHERE username = $username";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query Error' .  mysqli_error($connection));
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="col-xs-6">
            <form action="update.php" method="post">
                <div class="form-group">
                    <label for="usernames">Username</label>
                    <input type="text" id="usernames" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" name="password">
                </div> <br>
                <div class="form-group">
                    <select name="id" id="id">


                        <?php
                        showData();
                        ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Update">

            </form>
        </div>
    </div>
</body>

</html>

