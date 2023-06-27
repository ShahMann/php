<?php
session_start();

include_once 'db.php';

if(isset($_GET['all'])) {
    global $conn;

    $query = "TRUNCATE log";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Record deleted successfully 🥳🥳'); window.location.href='view.php'</script>";
    } else {
        echo "<script>alert('Error deleting record 😔😓😓'); window.location.href='view.php'</script> " . "<br>" .mysqli_error($conn);
    }


}
?>
