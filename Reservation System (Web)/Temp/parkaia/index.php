<?php
	session_start();
	if(isset($_SESSION["uname"]))  {
		if($_SESSION["utype"]=="ADMIN") {
			header("Location: users/admin/admin.php");
		} elseif($_SESSION["utype"]=="OUT") {
			header("Location: users/exit/exit.php");
		} elseif($_SESSION["utype"]=="IN") {
			header("Location: users/entrance/entrance.php");
		} elseif($_SESSION["utype"]=="CASH") {
			header("Location: users/cash/cash.php");
		}
	}
?>
<html>
<head>
	<script type="text/javascript">
		function data_validation(){
			var u=document.forms["signin"]["user"];
			var p=document.forms["signin"]["pass"];
			if (u.value==''){
				alert("Please enter username");
				u.focus();
				return false;
			}
			else if (p.value==''){
				alert("Please enter password");
				p.focus();
				return false;
			}else{
				return true;
			}
		}
	</script>
	<title>AIA PARKING</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body class="bg">
	<h1>P A R K . A I A</h1>
	<h3 style="font-family:Roboto">PLEASE LOGIN TO CONTINUE</h3>
	
	<div class="login-page">
		<img src="img/back.jpg" width="100%">
		<div class="form">
			<form method="post" name="signin" onsubmit="return data_validation()" action="session/logger.php">
			  <input type="text" name="user" placeholder="username"/>
			  <input type="password" name="pass" placeholder="password"/>
			  <button type="submit" value="submit">l o g i n</button>
			</form>
		</div>
	</div>
	<h2 style="font-family:Roboto">PARK.AIA, We are the best parking solution for you</h2>
</body>
</html>