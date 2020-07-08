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
        <div id="base-container">
            <div id="down-container"> 
            <h1 id="headding">Check IN</h1>
                <form action="#" method="POST">
                    <div id="first">
                        <input class="search-txt" type="text" placeholder="Enter Vehicle Number..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Vehicle Number...'" name="vnumber" />
                        <button class="search-btn" type="submit" value="Submit">Next</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <?php
         if(isset($_POST['vnumber'])){

            include('../DBconnections/dbconfig.php');
            $_SESSION['vnumber'] = $_POST['vnumber'];
            $vnumber=$_POST['vnumber'];

            //Get status from database
            $sql="select * from vip_vehicles where vehicle_num='".$vnumber."' limit 1";
            $result=mysqli_query($con,$sql);
            $row = $result->fetch_assoc();
            $in_time = $row["in_time"];
            if($result->num_rows > 0){
                $_SESSION['usr_status']="Employee";
                header('Location: garage.php');
            }
            else{
                $_SESSION['usr_status']="Customer";
                header('Location: garage.php');
            }
         }
    ?>
</html>