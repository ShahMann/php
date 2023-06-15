<?php
include "database.php";

function showData(){
    global $connection;
$query = "SELECT * FROM user";

$result = mysqli_query($connection,$query);

if(!$result){
    die ('Try again');
}

while($row =mysqli_fetch_assoc($result)){

    $id = $row['username'];
    echo "<option value='$id'>$id</option>";
    }
}