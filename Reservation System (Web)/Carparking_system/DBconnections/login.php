<?php
session_start();

include('dbconfig.php');
if(isset($_POST['email'])){
    
    $uname=$_POST['email'];
    $password=$_POST['pass'];
    $error="You Have Entered Incorrect Usernae or Password";
    
    $sql="select * from users where username='".$uname."'AND password='".$password."' limit 1";
    
    $result=mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)==1){
         header("Location: ../Home.php"); 
         exit();
    }
    else{
         $_SESSION["error"] = $error;
         header("Location: ../index.php"); 
         exit();
    }
        
}
?>