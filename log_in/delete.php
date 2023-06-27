<?php
session_start();

include_once 'db.php';

if(isset($_GET['delete'])) {
    global $conn;
    $id = $_GET['delete'];

    $query = "DELETE FROM log WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Record deleted successfully 🥳🥳'); window.location.href='view.php'</script>";
    } else {
        echo "<script>alert('Error deleting record 😔😓😓'); window.location.href='view.php'</script> " . "<br>" .mysqli_error($conn);
    }

    

    mysqli_close($conn);
}


?>

