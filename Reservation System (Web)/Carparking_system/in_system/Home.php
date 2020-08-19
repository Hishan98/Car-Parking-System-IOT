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

            //Check Already In the carpark
            $sqlq="select * from report where vehicle_num='".$vnumber."' AND out_time IS NULL";
            $resultq=mysqli_query($con,$sqlq);
            $rowq = $resultq->fetch_assoc();
 
            if($resultq->num_rows > 0){
                echo "<script type='text/javascript'>alert('Your Vehicle is already at the car park');</script>";    
            }
            else{
                //Get status from database
                $sql="select * from vip_vehicles where vehicle_num='".$vnumber."' limit 1";
                $result=mysqli_query($con,$sql);
                $row = $result->fetch_assoc();
    
                if($result->num_rows > 0){
                    $_SESSION['usr_status']="Employee";
                    header('Location: garage.php');
                }
                else{
                    $_SESSION['usr_status']="Customer";
                    header('Location: garage.php');
                }
            }

            //Get unavalible Slots from database
            $sql="select * from slots";
            $result=mysqli_query($con,$sql);
            $row = $result->fetch_assoc();
            $result_count=0;

            if($result->num_rows > 0){
                while($result_count<10){

                    $sql1 = "select * from slots ORDER BY slot_num ASC LIMIT  $result_count, 1";
                    $result1=mysqli_query($con,$sql1);
                    $rows = $result1->fetch_assoc();

                    if($rows["invoice_num"]==NULL){
                        $SlotNum="usr_stat".$result_count;
                        $_SESSION[$SlotNum]="Not Booked";     
                    }
                    else{
                        $SlotNum="usr_stat".$result_count;
                        $_SESSION[$SlotNum]="Booked"; 
                    }
                    $result_count++;
                }
            }
            else{
                echo'error Occoured...';
            }
            $con->close();
         }
    ?>
</html>