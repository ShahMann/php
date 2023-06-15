<!-- 
$connection =new mysqli('127.0.0.1', 'root', 'root');

if(!$connection){

    die ("error");
}

$sql = "CREATE DATABASE demo";
if ($connection->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $connection->error;
} -->


<?php

if(isset($_POST['submit'])){

    // echo "We got the information";
    $username = $_POST['username'];
    $password = $_POST['password'];
    //To escape the data to the sql database 
    
    // if($username && $password){
        // echo $username;
        // echo $password;
        // } else {
            //     echo "This is Required to be filled";
            // }
            
$connection = mysqli_connect('localhost','root','root','loginapp');
            
$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);
    
$hashFormat = "$5$5000$";
$salt = "itisjustforthemoresecurityofinfo6737";
// $hashFormat_salt = $hashFormat.$salt;

$password = crypt($password,$hashFormat.$salt);

    if($connection){
        echo "You are connected";
    }   else{
        die('Sorry connection failed');
    }

    $query = "INSERT INTO user(username,password)";
    $query .= "VALUES ('$username','$password')";

    $result = mysqli_query($connection,$query);

    if(!$result){
        die ('Try again'.mysqli_error($connection));
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
        <form action="demo.php" method="post">
            <div class="form-group">
            <label for="username">username</label>
            <input type="text" class="form-control" name="username" >
            </div> 
            <div class="form-group">
            <label for="password">password</label>
            <input type="password" class="form-control" name="password">
            </div> <br>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">

        </form>


        </div>




    </div>
</body>
</html>