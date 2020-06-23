<?php
	session_start();
	if(isset($_SESSION["uname"]))  {
		if($_SESSION["utype"]!="IN") {
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
	<H1>P A R K . A I A - ENTRANCE</H1>
	<div class="login-page">
		<div class="form">
			<h3>Enjoy your stay</h3>
			<form method='post' name='exit' action='entrance.php'>
				<?php echo "your parking id is: ".$_GET['display'] ?>
				<button type='submit' value='submit'>OK</button>
				<?php 
					$_SESSION["parking_slot"]="";
				?>
			</form>
		</div>
	</div>
</BODY>
</HTML>