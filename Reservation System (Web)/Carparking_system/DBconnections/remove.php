<?php
session_start();

include('dbconfig.php');
if(isset($_POST['employeeID'])){
        //define data
        $employeeID=$_POST['employeeID'];
    
        //Get employeeID from vip_vehicles table
        $sql="select * from vip_vehicles where employee_id='".$employeeID."'";
        $result=mysqli_query($con,$sql);
        $row = $result->fetch_assoc();

        if ($result->num_rows > 0) {

            $sql="DELETE FROM vip_vehicles WHERE employee_id = '".$employeeID."'";
            if ($con->query($sql) === TRUE) {
                header('Location: ../admin/adminpanel.php');

            } else {
                echo "<script type='text/javascript'>alert('Sorry, cannot remove VIP vehicle...');</script>";
                echo "Error: " . $sql . "<br>" . $con->error;
            }

        }
        else{
            $sql1="DELETE FROM users WHERE emp_id = '".$employeeID."'";
    
            if ($con->query($sql1) === TRUE) {
                header('Location: ../admin/adminpanel.php');
            } else {

                echo "<script type='text/javascript'>alert('Sorry, cannot remove selected Employee...');</script>";
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }
        $con->close();
}
?>