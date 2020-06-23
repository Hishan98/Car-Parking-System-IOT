<?php

require "../../db/connection.php";
require "../../db/db_con.php";
include 'id_gen.php';

$fname=$_POST["FName"];
$lname=$_POST["LName"];
$email=$_POST["email"];
$usrnm=$_POST["username"];
$pswrd=$_POST["password"];
$phone=$_POST["phone"];
$town=$_POST["town"];
$v_type=$_POST["v_type"];

$state=0;

$sql1="INSERT INTO user VALUES($id, '$fname','$lname','$email','$phone','$town','$v_type')";
$sql2="INSERT INTO login VALUES($id,'$usrnm','$pswrd',1)";
if (mysqli_multi_query($conn, $sql1)) {
	$state++;
} if (mysqli_multi_query($conn, $sql2)) {
	$state++;
} if ($state==2){
	header('Location: ../login.php');
	$state=0;
} else {
	echo "error entering data";
}	
?>