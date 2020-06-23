<?php
session_start();
if(isset($_SESSION["uname"]))  {
	if($_SESSION["utype"]!=0) {
		header("Location: ../index.php");
	}
}
include "../../db/connection.php";
include "../../db/db_con.php";

if(isset($_GET['del'])){
	$user_id = $_GET['del'];
	$sql1= "DELETE FROM user WHERE user_id='$user_id' ";
	$sql2= "DELETE FROM login WHERE user_id='$user_id' ";
	mysqli_query($conn,$sql1) or die('delete error!');
	mysqli_query($conn,$sql2) or die('delete error!');
	header("Location: viewUser.php");
}
?>