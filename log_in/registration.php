<?php
session_start();

include_once 'db.php';

if (isset($_POST['signup'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $batch = mysqli_real_escape_string($conn, $_POST['batch']);
    $hashed_password = md5($password);

    
        $query = "INSERT INTO log (email, username, password, dob, batch,image) VALUES ('$email', '$username', '$hashed_password', '$dob', '$batch','')";
        if (mysqli_query($conn, $query)) {
            header("location: index.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Registration Form in PHP with Validation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-offset-2">
                <div class="page-header">
                    <h2>Registration Form in PHP with Validation</h2>
                </div>
                <p>Please fill in all fields in the form</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" maxlength="30" required="">
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" maxlength="50" required="">
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" class="form-control" value="<?php echo $dob; ?>" maxlength="12" required="">
                        <span class="text-danger"><?php if (isset($dob_error)) echo $dob_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" maxlength="8" required="">
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Batch</label>
                        <input type="text" name="batch" class="form-control" value="<?php echo $batch; ?>" required="">
                    </div>
                    <input type="submit" class="btn btn-primary" name="signup" value="Submit">
                    <br>
                    Already have an account? <a href="index.php" class="btn btn-default">Login</a>
                </form>
            </div>
        </div>    
    </div>
</body>
</html>
