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

          // $_SESSION['error']='Sorry, cannot place your booking...';
          // header('Location: ../in_system/Home.php');
     }

    $con->close();
        
}
?>