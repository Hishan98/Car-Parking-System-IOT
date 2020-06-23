<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="aiacarpark";
    
    $con = mysqli_connect($host,$user,$password,$db);

    // Check connection
    if ($con->connect_error) {
        echo "<script type='text/javascript'>alert('Database Connection error');</script>";    
    }
?>