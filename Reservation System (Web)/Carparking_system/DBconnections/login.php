<?php
session_start();

include('dbconfig.php');
if(isset($_POST['email'])){
    
    $uname=$_POST['email'];
    $password=$_POST['pass'];
    $error="You Have Entered Incorrect Usernae or Password";
    
    $sql="select * from users where username='".$uname."'AND password='".$password."' limit 1";
    
    $result=mysqli_query($con,$sql);
    $row = $result->fetch_assoc();

    $_SESSION["type"] = $row["type"];
    $_SESSION["emp_id"] = $row["emp_id"];

    if(mysqli_num_rows($result)==1){     
          if($_SESSION["type"]=="admin"){
               header("Location: ../admin/adminpanel.php");
          }
          else{
               header("Location: ../in_system/Home.php");
          }
    }
    else{
         $_SESSION["error"] = $error;
         header("Location: ../index.php"); 
    }
    $con->close();
        
}
?>