<?php
session_start();

include('dbconfig.php');
if(isset($_POST['out_vnumber'])){

    //define variables
    $vnumber = $_POST['out_vnumber'];
    date_default_timezone_set("Asia/Colombo");
    $out_time=date("H:i");
    $chargers_perhour=60;

    //Get status from database
    $sql="select * from vip_vehicles where vehicle_num='".$vnumber."' limit 1";
    $result=mysqli_query($con,$sql);
    $row = $result->fetch_assoc();
    if($result->num_rows > 0){
        $status="Employee";
    }
    else{
        $status="Customer";
    }
   
    //Get in time from database
    $sql="select * from report where vehicle_num='".$vnumber."' AND cost IS NULL limit 1";
    $result=mysqli_query($con,$sql);
    $row = $result->fetch_assoc();

    if(mysqli_num_rows($result)==1){
        
        $in_time = $row["in_time"];
        $slotid=$row["slot_id"];
        $_SESSION["invoice_num"]=$row["invoice_num"];

        //calculate Cost
        $out_time_var = new DateTime($out_time);
        $in_time_var = new DateTime($in_time);
        $calculate = $out_time_var->diff($in_time_var);
        $diffrance = $calculate->format("%H");

        //check & set prices to customers and employees
        if($status=="Employee"){
            $cost=$diffrance*$chargers_perhour*0;
        }
        else{
            if($diffrance==0){
                $cost=1*$chargers_perhour;
            }
            else{
                $cost=$diffrance*$chargers_perhour;
            }
        }

        //update database
        $sql="UPDATE report SET out_time ='".$out_time."',cost ='".$cost."' WHERE vehicle_num = '".$vnumber."' AND cost IS NULL";

        if ($con->query($sql) === TRUE) {
            //update slots table
            $sql="UPDATE slots SET invoice_num = NULL ,status = NULL WHERE slot_num = '".$slotid."'";

            if ($con->query($sql) === FALSE) {
                echo "<script type='text/javascript'>alert('Sorry, update error...');</script>";
                echo "Error: " . $sql . "<br>" . $con->error;
            } 
            else{
                header("Location: ../out_system/invoice.php");
            }

        } else {
            echo "<script type='text/javascript'>alert('Sorry, update error...');</script>";
            echo "Error: " . $sql . "<br>" . $con->error;
        }

    }
    else{
        $_SESSION['checkout_error']="No records found under this number. Please Try again";
        header('Location: ../out_system/Out_Home.php');
    }     

    $con->close();
        
}
?>