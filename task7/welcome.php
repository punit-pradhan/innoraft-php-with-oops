<?php
session_start();
if (!isset($_SESSION['uname']) && !isset($_SESSION['pass'])) {
    echo "<script> location.href='index.php' </script>";
}
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    echo "<script> location.href='index.php' </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <ul>
            <li><a href="task/task1/index.php">Task_1</a></li>
            <li><a href="task/task2/index.php">Task_2</a></li>
            <li><a href="task/task3/index.php">Task_3</a></li>
            <li><a href="task/task4/index.php">Task_4</a></li>
            <li><a href="task/task5/index.php">Task_5</a></li>
            <li><a href="task/task6/index.php">Task_6</a></li>
            <input type="submit" name="logout" value="Logout">
        </ul>
    </form>
</body>
</html>