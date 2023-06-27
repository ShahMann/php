<?php
session_start();

include_once 'db.php';

if (empty($_SESSION['email'])){
    header("Location: index.php");
} else {
    echo "Welcome" . " " . $_SESSION['username'];
    }
global $conn;
if ($conn->connect_error){
    die("Could not connect to the server: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import CSV File</title>
    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
        <br>    <br> 
        To Export Data: 
        <a href="export.php"><button type="submit" name="export">Click Here</button></a>
        <br>   <br> 
        To View Data: 
        <button type="submit" name="view"><a href="view.php">Click Here</a></button>
        <br>   <br> 
        To Add User: 
        <button type="submit" name="adduser"><a href="adduser.php">Click Here</a></button>
        <br>   <br>
        <form action="logout.php" method="post">
                    <input type="submit" class="btn btn-primary" name="logout" value="Logout">
                </form>
</body>
</html>
