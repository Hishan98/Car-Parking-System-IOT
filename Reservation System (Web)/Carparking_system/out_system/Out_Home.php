<?php
session_start();
if (isset($_SESSION['checkout_error'])) {
    $error=$_SESSION['checkout_error'];
    echo "<script type='text/javascript'>alert('$error');</script>";
    unset($_SESSION['checkout_error']);
} 
?>
<html>
    <head>
        <title>Check out</title>
        <link rel="icon" type="image/png" href="../images/icons/favicon.png"/>
        <link href='https://fonts.googleapis.com/css?family=Roboto Condensed' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="../css/out_home.css">
        <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    </head>
    <body>
        <form action="../DBconnections/checkout.php" method="POST">
        <h1 id="headding">Check Out</h1>
            <div id="first">
                <input class="search-txt" type="text" placeholder="Enter Vehicle Number..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Vehicle Number...'" name="out_vnumber" />
                <button class="search-btn" type="submit" value="Submit">Check Out</button>
            </div>
        </form>
    </body>
</html>