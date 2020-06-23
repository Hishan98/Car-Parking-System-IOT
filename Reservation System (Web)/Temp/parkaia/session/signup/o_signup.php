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
$address=$_POST["address"];

$state=0;

$sql1="INSERT INTO owner VALUES($id, '$fname','$lname','$email','$phone','$address')";
$sql2="INSERT INTO login VALUES($id,'$usrnm','$pswrd',2)";
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