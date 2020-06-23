<?php
	session_start();
	if(isset($_SESSION["uname"]))  {
		if($_SESSION["utype"]!=0) {
			header("Location: ../index.php");
		}
	}
	include "../../db/connection.php";
	include "../../db/db_con.php";
	$select="SELECT * FROM slots";
	$sql= mysqli_query($conn,$select);
?>
<HTML>
<HEAD>
	<TITLE>Park Safely - Admin</TITLE>
	<link rel="stylesheet" href="/parksafely/styles.css">
</HEAD>
<BODY>
	<?php include "../../session/session_disp.php";?>
	<H1>P A R K S A F E L Y . L K</H1>
	<div class="form">
		<?php
		echo"<center>";
		echo"<h2>Transactions</h2>";
		echo"<table border='1' width='100%'>";
		echo"<tr>";
		echo"<th>"."Slot"."</th>";
		echo"<th>"."Availability"."</th>";
		echo"<th>"."Vehicle Parked"."</th>";
		echo"</tr>";

		while($row = mysqli_fetch_array($sql)){
			echo"<tr>";
			echo"<td>".$row['slot']."</td>";
			echo"<td>".$row['available']."</td>";
			echo"<td>".$row['vehicle_id']."</td>";
			echo"</tr>";
		}
		echo"</table>";
		echo"<a href='admin.php'>go back</a>";
		echo"</center>";
		?>
	</div>
</BODY>
</HTML>