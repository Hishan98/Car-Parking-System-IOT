<?php
// session_start();

// if (!isset($_SESSION['type'])) {
//     header('Location: ../index.php');
// } else if ($_SESSION['type'] != 'guard') {
//     header('Location: ../index.php');
// } else {
// }
// if (!isset($_SESSION['txt-slots-value'])) {
//     header('Location: ../in_system/garage.php');
// }
?>
<html>
    <head>
        <link href='https://fonts.googleapis.com/css?family=Roboto Condensed' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="../css/final.css">
    </head>
    <body>
        <div id="base_container">
            <img src="../images/tenor.gif" id="finalimg">
            <p id="hedding">Thank you</p>
        </div>
        <img src="../images/city.png" id="bgimg">
        <img src="../images/city.png" id="bgimg2">
        <script>
            var timer = setTimeout(function() {
                window.location='../in_system/Home.php';
            }, 3000);
        </script>

    </body>
</html>