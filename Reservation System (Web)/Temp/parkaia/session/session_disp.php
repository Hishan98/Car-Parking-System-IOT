<?php	
	if(isset($_SESSION["uname"]))  {
		echo '<p class="account">Hello '.$_SESSION["uname"].' | <a href="/parkaia/session/logoff.php">Logout</a></p>';
	} else {
		echo '<p class="account"><a href="/parkaia/session/login.php">Login</a> | <a href="/parkaia/session/signup/account_type.php">Signup</a></p>';
	}
?>