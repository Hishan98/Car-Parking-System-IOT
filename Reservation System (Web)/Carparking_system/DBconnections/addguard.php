<?php
session_start();

include('dbconfig.php');
if(isset($_POST['uname'])){
        //define data
        $emp_id=$_POST['emp_id'];
        $username=$_POST['uname'];
        $password=$_POST['password'];
        
        //Password encryption
        $pass_encrypted=md5($password);


        $sql="INSERT INTO users (emp_id,username, password) 
        VALUES ('".$emp_id."','".$username."','".$pass_encrypted."')";
    
        if ($con->query($sql) === TRUE) {
            $_SESSION['remove_error']="New Guard created successfully";
            // echo "<script type='text/javascript'>alert('New record created successfully');</script>";
            header('Location: ../admin/adminpanel.php');
        } else {
            $_SESSION['remove_error']="Guard id Already exists..";
            // echo "<script type='text/javascript'>alert('Guard id Already exists..');</script>";
            header('Location: ../admin/adminpanel.php');
            // echo "Error: " . $sql . "<br>" . $con->error;
        }
        $con->close();
}
?>