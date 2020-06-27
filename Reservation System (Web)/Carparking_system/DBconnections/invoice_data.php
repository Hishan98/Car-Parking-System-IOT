<?php
    session_start();

    include('dbconfig.php');

    $invoice_num = $_SESSION["invoice_num"];

    $sql="select * from report where invoice_num='".$invoice_num."' limit 1";
        
    $result=mysqli_query($con,$sql);
    $row = $result->fetch_assoc();

    if(mysqli_num_rows($result)==1){  

        $invoice_number = $row["invoice_num"];
        $slot_id = $row["slot_id"];
        $vehicle_number = $row["vehicle_num"];
        $parked_date = $row["parked_date"];
        $checkin_time = $row["in_time"];
        $checkout_time = $row["out_time"];
        $cost = $row["cost"];
    }
    else{
        echo 'Database connection error';
    }
    $con->close();       

?>