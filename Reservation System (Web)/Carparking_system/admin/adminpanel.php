<?php
session_start();
    if (!isset($_SESSION['type'])) {
        header('Location: ../index.php');
    } else if ($_SESSION['type'] != 'admin') {
        header('Location: ../index.php');
    } else {
}
?>
<html>
    <head>
        <title>Admin Panel</title>
    </head>
    <body>
        <H1>Admin yakooo</H1>
    </body>
</html>