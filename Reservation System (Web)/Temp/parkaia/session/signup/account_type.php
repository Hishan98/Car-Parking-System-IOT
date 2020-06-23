<?php
	session_start();
	if(isset($_SESSION["uname"]))  {
		if($_SESSION["utype"]==0) {
			header("Location: users/admin/admin.php");
		} elseif($_SESSION["utype"]==1) {
			header("Location: users/clients/user.php");
		} elseif($_SESSION["utype"]==2) {
			header("Location: users/owner/facilitator.php");
		}
	}
?>
<html>
<head>
	<title>Select Account Type - ParkSafely</title>
	<link rel="stylesheet" href="/parksafely/styles.css">
</head>
<body>
	<h1>P A R K S A F E L Y . L K</h1>
	<div class="login-page">
		<div class="form">
			<form>
				<p>Are you a motorist looking for better parking?</p>
				<button formaction="customer.php">Sign Up as new user</button>
				<p>Are you an owner of a parking space looking for more customers?</p>
				<button formaction="owner.php">Sign Up as Parking Space provider</button>
			</form>
		</div>
	</div>
</body>
</html>