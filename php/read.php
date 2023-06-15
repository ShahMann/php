<?php  
include "db.php";
    

    $query = "SELECT * FROM user";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die ("Failed");
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        table,td,th {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>

</head>
<body>
<table>
        <tr> 
            <th>Id</th>
            <th>Username</th>
            <th>Password</th>
        </tr>

        <?php

        while ($row = mysqli_fetch_row($result)) {

            echo "<tr> 
                    <td>$row[0]</td> 
                    <td>$row[1]</td> 
                    <td>$row[2]</td>
                </tr>";
        }
        ?>




    </table>

</body>
</html>