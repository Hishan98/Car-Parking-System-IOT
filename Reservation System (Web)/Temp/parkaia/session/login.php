<?php
	session_start(); 
	if(isset($_SESSION["uname"]))  {
		header("Location: ../index.php");
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
	<title>Login to ParkSafely</title>
	<link rel="stylesheet" href="/parkaia/styles.css">
</head>
<body class="bg">
	<h1>P A R K . A I A</h1>
	<div class="login-page">
		<div class="form">
			<form method="post" name="signin" onsubmit="return data_validation()" action="logger.php">
			  <input type="text" name="user" placeholder="username"/>
			  <input type="password" name="pass" placeholder="password"/>
			  <button type="submit" value="submit">l o g i n</button>
			  <p>Not registered? <a href="signup/account_type.php">Create an account</a></p>
			  <p><a href="../index.php">Back to Home Page</a></p>
			</form>
		</div>
	</div>
</body>
</html>