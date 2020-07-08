<?php
session_start();

include('dbconfig.php');
if(isset($_POST['txt-slots-value'])){

    //create a sesion
    $_SESSION['txt-slots-value']= $_POST['txt-slots-value'];
    
    //define data
    $slotid=$_SESSION['txt-slots-value'];
    $vnumber=$_SESSION['vnumber'];
    $date= date("Y-m-d");
    $guardid=$_SESSION["emp_id"];
    date_default_timezone_set("Asia/Colombo");
    $in_time=date("H:i");

    $sql="INSERT INTO report (vehicle_num, parked_date, in_time, slot_id, guard_id) 
    VALUES ('$vnumber','$date','$in_time',$slotid,$guardid)";

     if ($con->query($sql) === TRUE) {
          echo "<script type='text/javascript'>alert('New record created successfully');</script>";
          header('Location: ../in_system/Final.php');
     } else {
          echo "<script type='text/javascript'>alert('Sorry, cannot place your booking...');</script>";
          echo "Error: " . $sql . "<br>" . $con->error;
     }

     //Get invoice number from report table
    $sql="select * from report where vehicle_num='".$vnumber."' AND cost IS NULL limit 1";
    $result=mysqli_query($con,$sql);
    $row = $result->fetch_assoc();
    $invoice_num = $row["invoice_num"];
    
    if ($result->num_rows > 0) {
          //update slots table
          $sql="UPDATE slots SET invoice_num ='".$invoice_num."',status ='1' WHERE slot_num = '".$slotid."' AND invoice_num IS NULL";

          if ($con->query($sql) === FALSE) {
               echo "<script type='text/javascript'>alert('Sorry, update error...');</script>";
               echo "Error: " . $sql . "<br>" . $con->error;
          } 
    }
    else{
          echo "<script type='text/javascript'>alert('Sorry, cannot get values from the database...');</script>";
          echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
        
}
?>