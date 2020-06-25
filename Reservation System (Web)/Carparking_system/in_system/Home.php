<?php
session_start();

if (!isset($_SESSION['type'])) {
    header('Location: ../index.php');
} else if ($_SESSION['type'] != 'guard') {
    header('Location: ../index.php');
} else {
}
?>
<html>
    <head>
        <title>Vehicle number</title>
        <link rel="icon" type="image/png" href="../images/icons/favicon.png"/>
        <link href='https://fonts.googleapis.com/css?family=Roboto Condensed' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="../css/home.css">
        <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    </head>
    <body>
        <div class="bg-image"></div>
        <form action="#" method="POST">
            <div id="first">
                <input class="search-txt" type="text" placeholder="Enter Vehicle Number..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Vehicle Number...'" name="vnumber" />
                <button class="search-btn" type="submit" value="Submit">Next</button>
            </div>
        </form>
    </body>
    <?php
         if(isset($_POST['vnumber'])){
            $_SESSION['vnumber'] = $_POST['vnumber'];
            header('Location: garage.php');
            // echo "<script type='text/javascript'>alert('$vnum');</script>";
         }
    ?>
</html>