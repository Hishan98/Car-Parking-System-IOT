<?php
	session_start();
	if(isset($_SESSION["uname"]))  {
		if($_SESSION["utype"]!="OUT") {
			header("Location: /parkaia/index.php");
		}
	}
?>
<HTML>
<HEAD>
	<TITLE>AIA Parking</TITLE>
	<link rel="stylesheet" href="/parkaia/styles.css">
</HEAD>
<BODY>
	<?php include "../../session/session_disp.php";?>
	<H1>P A R K . A I A - EXIT</H1>
	<div class="login-page">
		<div class="form">
			<h3>Thank you!</h3>
			<form method='post' name='exit' action='exit.php'>
				<button type='submit' value='submit'>Good Bye!</button>
				<?php 
					$_SESSION["t_id"]="";
					$_SESSION["cash"]="";
					$_SESSION["time"]="";
				?>
			</form>
		</div>
	</div>
</BODY>
</HTML>