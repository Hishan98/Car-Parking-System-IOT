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
	<script type="text/javascript">
		function data_validation(){
			var i=document.forms["exit"]["r_id"];
			if (i.value==''){
				alert("Please enter Vehicle Registration No");
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
	<H1>P A R K . A I A - ENTRANCE</H1>
	<div class="login-page">
		<div class="form">
			<form method='post' name='exit' onsubmit="return data_validation()" action='commitTx_In.php'>
				<h3>Please Enter Vehicle Details</h3>
				<?php
					$slot_id=$_POST["slot"];
					$_SESSION["parking_slot"]=$slot_id;
					echo "<p>Parking at slot ".$slot_id."</p>";
				?>
				<input type='text' name='r_id' placeholder='Enter Vehicle Registration No'/>
				<button type='submit' value='submit'>Confirm Details</button>
			</form>
		</div>
	</div>
</BODY>
</HTML>