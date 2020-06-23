<?php
	session_start();
	
	if(isset($_SESSION["uname"]))  {
		unset($_SESSION["uname"]);
	}
	if(isset($_SESSION["utype"]))  {
		unset($_SESSION["utype"]);
	}
	
	header("Location: ../index.php");
	exit;
?>
<html>
<head>
	<title>Logged Off</title>
	<link rel="stylesheet" href="/parkaia/styles.css">
</head>
<body>
	<div class="page">
		<h1>P A R K . A I A</h1>
		<h3>You are now logged off</h2>
		<p><a href="../index.php">home</a></p>
	</div>
</body>
</html>
