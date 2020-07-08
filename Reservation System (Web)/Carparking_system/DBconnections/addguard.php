<?php
session_start();

include('dbconfig.php');
if(isset($_POST['uname'])){
        //define data
        $username=$_POST['uname'];
        $password=$_POST['password'];
    
        $sql="INSERT INTO users (username, password) 
        VALUES ('".$username."','".$password."')";
    
        if ($con->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('New record created successfully');</script>";
            header('Location: ../admin/adminpanel.php');
        } else {
            echo "<script type='text/javascript'>alert('Sorry, cannot create new Guard...');</script>";
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        $con->close();
}
?>