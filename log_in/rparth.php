<?php
if(isset($_POST['submit1']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $password=$_POST['password'];
    $confirm_pass=$_POST['confirm_pass'];   
}
if($password == $confirm_pass)
{
    $enc_pass = md5($password);
    $connection = mysqli_connect('localhost', 'root', 'root', 'user_registration');
    if (!$connection) {
        die("Database connection failed");
    }
    else{
        $sql_insert = "INSERT INTO user_data(fname,lname,email,state,city,password) VALUES ('$fname'
        ,'$lname','$email','$state','$city','$enc_pass')";

        $result = mysqli_query($connection,$sql_insert);

        if(!$result){
            die('Query Failed'.mysqli_error($connection));
        }
    }
    
}
else
{
    echo "<script>alert('Password and Confirm Password must be same')</script>";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <form action="" method="POST">
        <div class="wrapper">
            <label for="fname">Enter First Name</label>
            <input type="text" name="fname" required> <br>
        </div>
        <div class="wrapper">
            <label for="lname">Enter Last Name</label>
            <input type="text" name="lname" required> <br>
        </div>
        <div class="wrapper">
            <label for="name">Email</label>
            <input type="text" name="email" required> <br>
        </div>
        <div class="wrapper">
            <label for="name">State</label>
            <input type="text" name="state" required> <br>
        </div>
        <div class="wrapper">
            <label for="name">City</label>
            <input type="text" name="city" required> <br>
        </div>

        <div class="wrapper">
            <label for="password">Enter Password</label>
            <input type="password" name="password" required><br>
        </div>
        <div class="wrapper">
            <label for="confirm_pass">Confirm Password</label>
            <input type="password" name="confirm_pass" required><br>
        </div>
        <button type="submit" name="submit1">Register</button>
    
    </form>
</body>
</html>