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
	<script type="text/javascript">
		function data_validation(){
			var i=document.forms["exit"]["r_id"];
			if (i.value==''){
				alert("Please enter Transaction ID");
				i.focus();
				return false;
			}else{
				return true;
			}
		}
	</script>
</HEAD>
<BODY>
	<?php include "../../session/session_disp.php";?>
	<H1>P A R K . A I A - EXIT</H1>
	<div class="login-page">
		<div class="form">
			<form method='post' name='exit' onsubmit="return data_validation()" action='checkTx_Exit.php'>
				<input type='text' name='r_id' placeholder='Enter Reservation ID'/>
				<button type='submit' value='submit'>Confirm Exit</button>
			</form>
		</div>
	</div>
</BODY>
</HTML>