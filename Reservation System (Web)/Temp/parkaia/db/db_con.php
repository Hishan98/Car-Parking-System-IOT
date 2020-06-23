<?php
	include 'connection.php';	
	
	//aluth connection ekak hadanna
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	//connection awlak nm error pennanna
	if (mysqli_connect_error()){
		die("mysql connection failed: ".mysqli_connect_error());
	}
?>