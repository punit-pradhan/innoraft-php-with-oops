<?php
session_start();
if (isset($_POST['username']) || isset($_POST['password'])) {
    if ($_POST['username'] == "punit" && $_POST['password'] == "1234") {
        $uname = $_POST['username'];
        $pass = $_POST['password'];
        $_SESSION['uname'] = $uname;
        $_SESSION['pass'] = $pass;
        echo "<script> location.href='welcome.php' </script>";
    }
}
if (isset($_SESSION['uname']) && isset($_SESSION['pass'])) {
    echo "<script> location.href='welcome.php' </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php-Task-Seven</title>
</head>
<body>
    <form action="" method="POST">
        Username: <input type="text" name="username"><br><br>
        Password: <input type="text" name="password"><br><br>
        <input type="submit" name="submitbtn">
    </form>
</body>
</html>