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
			<?php
			echo "<p>Transaction ID : ".$_SESSION["t_id"]."<p>";
			echo "<p>Price of ticket: Rs. ".$_SESSION["cash"]."<p>";
			
			?>
			<form method='post' name='exit' action='commitTx_Exit.php'>
				<button type='submit' value='submit'>Confirm Payment</button>
			</form>
		</div>
	</div>
</BODY>
</HTML>