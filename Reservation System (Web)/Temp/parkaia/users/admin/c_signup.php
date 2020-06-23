<?php

require "../../db/connection.php";
require "../../db/db_con.php";

$id=$_GET["id"];
$fname=$_POST["FName"];
$lname=$_POST["LName"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$town=$_POST["town"];

$state=0;

$sql1="UPDATE user SET f_name='$fname', s_name='$lname', email='$email', phone='$phone', town='$town' WHERE user_id=$id";
echo $sql1;
if (mysqli_multi_query($conn, $sql1)) {
	header('Location: viewUser');
} else {
	echo "error entering data";
}
?>