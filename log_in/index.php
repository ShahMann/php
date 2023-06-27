<?php
session_start();
if(isset($_SESSION['email'])){
    header("Location: home.php");
}
include_once 'db.php';

if (isset($_POST['login'])) {
    $login_error = '';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = md5($password);

    $query = "SELECT * FROM log WHERE email='$email' AND password='$hashed_password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $row['username'];
        header("location: home.php");
        exit();
    } else {
        $login_error = "Invalid email or password";
        echo "<script>alert('$login_error')</script>";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-offset-2">
                <div class="page-header">
                    <h2>Login</h2>
                </div>
                <p>Please enter your email and password</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required="">
                    </div>
                    <input type="submit" class="btn btn-primary" name="login" value="Login">
                </form>
                <br>
                Not a user? <a href="registration.php">Sign up Here</a>
            </div>
        </div>    
    </div>
</body>
</html>
