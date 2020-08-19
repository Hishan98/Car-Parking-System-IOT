<?php
session_start();

include('dbconfig.php');
if(isset($_POST['employeeID'])){
    
        //define data

        $employeeID=$_POST['employeeID'];
        $vnumber=$_POST['vnumber'];
    
        $sql="INSERT INTO vip_vehicles (employee_id, vehicle_num) 
        VALUES ('".$employeeID."','".$vnumber."')";
    
        if ($con->query($sql) === TRUE) {
            $_SESSION['remove_error']="New record created successfully";
            header('Location: ../admin/adminpanel.php');
        } else {
            $_SESSION['remove_error']="Sorry, cannot Add VIP vehicle...";
            header('Location: ../admin/adminpanel.php');
        }
        $con->close();
}
?>