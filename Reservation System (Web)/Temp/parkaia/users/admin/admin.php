<?php
	session_start();
	if(isset($_SESSION["uname"]))  {
		if($_SESSION["utype"]!=0) {
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
	<H1>P A R K . A I A - DASHBOARD</H1>
	<div class="login-page">
		<div class="form">
			<p>summary goes here</p>
		</div>
		<div class="form">
			<form>
				<button formaction="viewUser.php">View Users</button>
				<button formaction="viewTx.php">View Transactions</button>
				<button formaction="viewParks.php">View Parks</button>
			</form>
		</div>
	</div>
</BODY>
</HTML>