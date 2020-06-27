<?php
session_start();

if (!isset($_SESSION['type'])) {
    header('Location: ../index.php');
} else if ($_SESSION['type'] != 'guard') {
    header('Location: ../index.php');
} else {
}
if (!isset($_SESSION['txt-slots-value'])) {
    header('Location: ../in_system/garage.php');
}
?>
<html>
    <head>
        <title>Thank You</title>
        <link rel="icon" type="image/png" href="../images/icons/favicon.png"/>
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="../css/final.css">
    </head>
    <body>
        <div id="base_container" data-aos="fade-up">
            <img src="../images/tenor.gif" id="finalimg">
            <h1 id="hedding">Thank You!</h1>
        </div>
        <img src="../images/city.png" id="bgimg">
        <img src="../images/city.png" id="bgimg2">
        <script>
            var timer = setTimeout(function() {
                window.location='../in_system/Home.php';
            }, 2000);
        </script>
    </body>
</html>