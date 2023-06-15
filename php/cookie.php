<?php
$name = "cookie";
$value = 1000;
// $date = date_default_timezone_set('Asia/Kolkata');
$expiration = time() + (10);
setcookie($name,$value,$expiration);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Super Global</title>
    </head>
    <body>
        <?php 
        if(isset($_COOKIE['cookie'])){
            $cname = $_COOKIE['cookie'];
            echo $cname;
        } else {
            echo "Cookie Not Set";
        }
        
        ?>
    </body>
    </html>
    
