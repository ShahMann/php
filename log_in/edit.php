<?php
session_start();

include_once 'db.php';

if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']); 

    if (isset($_POST['update'])) {
        try {
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $dob = $_POST['dob'];
            $batch = $_POST['batch'];

            if (isset($_FILES['image'])) {
                $image_name = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];

                // Extract file extension
                $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);

                $new_filename = $username . '.' . $image_extension;

                $destination = './profile/' . $new_filename;
                move_uploaded_file($image_tmp, $destination);

                $query = "UPDATE log SET email = '$email', username = '$username', batch = '$batch', password = '$password', DOB = '$dob', image = '$new_filename' WHERE id = $id";

                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo "<script>alert('Record updated successfully 🎉'); window.location.href='view.php'</script>";
                } else {
                    throw new Exception(mysqli_error($conn));
                }
            } else {
                throw new Exception('Error uploading image 😔');
            }

            mysqli_close($conn);
            exit();
        } catch (Exception $e) {
            echo "<script>alert('Error updating record 😔: " . $e->getMessage() . "'); window.location.href='view.php'</script>";
        }
    }
}

try {
    $query = "SELECT * FROM log WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        throw new Exception('Invalid ID');
    }
} catch (Exception $e) {
    echo "<script>alert('Error retrieving record 😔: " . $e->getMessage() . "'); window.location.href='view.php'</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student Record</title>
    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <h2>Edit Student Record</h2>
    <form method="POST" enctype="multipart/form-data">
        <label for="id">ID:</label>
        <input disabled="disabled" name="id" value="<?php echo $row['id']; ?>">
        <br><br>
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $row['email']; ?>">
        <br><br>
        <label for="username">User Name:</label>
        <input type="text" name="username" value="<?php echo $row['username']; ?>">
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" value="">
        <br><br>
        <label for="dob">Date Of Birth:</label>
        <input type="date" name="dob" value="<?php echo $row['dob']; ?>">
        <br><br>
        <label for="batch">Batch:</label>
        <input type="text" name="batch" value="<?php echo $row['batch']; ?>">
        <br><br>
        <label for="image">Profile Image:</label>
        <input type="file" name="image">
        <br><br>
        <input type="submit" name="update" value="Update">
    </form>
    <button type="button"><a href="view.php">Back</a></button>
</body>
</html>
