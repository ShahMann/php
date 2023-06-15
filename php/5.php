<?php 
 if(isset($_POST['submit'])){

$username = $_POST['username'];
$password = $_POST['password'];

$name = ["Mann", "Shah"];

if(strlen($username) < 4){

    echo "Username should me atleast 5 Character";
}

// echo $username . " ";

// echo $password;

elseif (in_array($username, $name)) {

    echo "Welcome";

}

    else {
        echo "Chala jah" . " " . $username;
    }


}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="5.php" method="post">
        <input type="text" name="username" placeholder="Enter name">
        <br>
        <input type="password" name="password" placeholder="Enter Password">
        <br>
        <input type="submit" name="submit">


    </form>
</body>
</html>