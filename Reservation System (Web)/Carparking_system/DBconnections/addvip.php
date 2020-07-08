<?php
session_start();

include('dbconfig.php');
if(isset($_POST['employeeID'])){

        //create a sesion
        // $_SESSION['txt-slots-value']= $_POST['txt-slots-value'];
    
        //define data

        $employeeID=$_POST['employeeID'];
        $vnumber=$_POST['vnumber'];
    
        $sql="INSERT INTO vip_vehicles (employee_id, vehicle_num) 
        VALUES ('".$employeeID."','".$vnumber."')";
    
        if ($con->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('New record created successfully');</script>";
            header('Location: ../admin/adminpanel.php');
        } else {
            echo "<script type='text/javascript'>alert('Sorry, cannot place your booking...');</script>";
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        $con->close();
}
?>