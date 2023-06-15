<?php 
 if(isset($_POST['submit'])){

$username = $_POST['username'];
$password = $_POST['password'];
    
$connection = mysqli_connect('127.0.0.1', 'root', 'root', 'loginapp');

    if($connection){
        echo "Sucess";
    }else {
        die ("error");
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="col-sm-6">
            <form action="sql.php" method="post">
                <div class="form-group" >
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>    
                    <input type="password" id="password" name="password" class="form-control">
                 </div>

                <input class="btn btn-primary" type="submit" name="submit" value="Submit">

            </form>
        </div>
    </div>
</body>
</html>