<?php
session_start();

include('dbconfig.php');
if(isset($_POST['employeeID'])){
        //define data
        $employeeID=$_POST['employeeID'];
        $vehicleNum=$_POST['vehicleNum'];

        //Get employeeID from vip_vehicles table
        $sql="select * from vip_vehicles where employee_id='".$employeeID."'";
        $result=mysqli_query($con,$sql);
        $row = $result->fetch_assoc();

        if ($result->num_rows > 0) {
            if($vehicleNum!=null || $vehicleNum!=""){

                $sql="DELETE FROM vip_vehicles WHERE employee_id = '".$employeeID."' AND vehicle_num = '".$vehicleNum."'";
                if ($con->query($sql) == TRUE) {
                    $_SESSION['remove_error']="vehicle Removed successfully...";
                    header('Location: ../admin/adminpanel.php');

                } else {
                    $_SESSION['remove_error']="Sorry, cannot remove VIP vehicle...";
                    header('Location: ../admin/adminpanel.php');
                    echo "Error: " . $sql . "<br>" . $con->error;
                }
            }
            else{
                $_SESSION['remove_error']="Please enter a vehicle number if you are removing a vehicle.";
                header('Location: ../admin/adminpanel.php');
            }

        }
        else{
            $sql="select * from users where emp_id='".$employeeID."'";
            $result=mysqli_query($con,$sql);
            $row = $result->fetch_assoc();

            if ($result->num_rows > 0) {
                $sql1="DELETE FROM users WHERE emp_id = '".$employeeID."'";
        
                if ($con->query($sql1) === TRUE) {
                    $_SESSION['remove_error']="Guard Removed successfully...";
                    header('Location: ../admin/adminpanel.php');
                } else {
                    $_SESSION['remove_error']="Sorry, cannot remove selected Employee...";
                    echo "Error: " . $sql . "<br>" . $con->error;
                    header('Location: ../admin/adminpanel.php');

                }
            }
            else{
                $_SESSION['remove_error']="Please enter a correct Employee id";
                header('Location: ../admin/adminpanel.php');
            }
        }
        $con->close();
}
?>