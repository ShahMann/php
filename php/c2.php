<!DOCTYPE html>
<?php
$cookie_name = "Mann";
$cookie_value = "Shah";
setcookie($cookie_name, $cookie_value, time() + (10), "/"); // 86400 = 1 day
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

</body>
</html>