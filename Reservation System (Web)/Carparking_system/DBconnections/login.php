<?php
session_start();

include('dbconfig.php');
if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['pass'];

    //decrypt password
    $pass_decrypted=md5($password);
    $error="You Have Entered Incorrect Username or Password";
    
    $sql="select * from users where username='".$uname."'AND password='".$pass_decrypted."' limit 1";
    
    $result=mysqli_query($con,$sql);
    $row = $result->fetch_assoc();

    $_SESSION["type"] = $row["type"];
    $_SESSION["emp_id"] = $row["emp_id"];

    if(mysqli_num_rows($result)==1){     
          if($_SESSION["type"]=="admin"){
               header("Location: ../admin/adminpanel.php");
          }
          else{
               header("Location: ../checkin_out.php");
          }
    }
    else{
         $_SESSION["error"] = $error;
         header("Location: ../index.php"); 
    }
    $con->close();
        
}
