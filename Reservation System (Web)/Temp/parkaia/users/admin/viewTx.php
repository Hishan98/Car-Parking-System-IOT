<?php
	session_start();
	if(isset($_SESSION["uname"]))  {
		if($_SESSION["utype"]!=0) {
			header("Location: ../index.php");
		}
	}
	include "../../db/connection.php";
	include "../../db/db_con.php";
	$select="SELECT * FROM reservation";
	$sql= mysqli_query($conn,$select);
?>
<HTML>
<HEAD>
	<TITLE>AIA Parking</TITLE>
	<link rel="stylesheet" href="/parksafely/styles.css">
</HEAD>
<BODY>
	<?php include "../../session/session_disp.php";?>
	<H1>P A R K . A I A - TRANSACTIONS</H1>
	<div class="form">
		<?php
		echo"<center>";
		echo"<h2>Transactions</h2>";
		echo"<table border='1' width='100%'>";
		echo"<tr>";
		echo"<th>"."Reservation Number"."</th>";
		echo"<th>"."Start"."</th>";
		echo"<th>"."End"."</th>";
		echo"<th>"."Vehicle Number"."</th>";
		echo"<th>"."Slot"."</th>";
		echo"<th>"."Duration"."</th>";
		echo"<th>"."Amount"."</th>";
		echo"</tr>";

		while($row= mysqli_fetch_array($sql)){
			echo"<tr>";
			echo"<td>".$row['reservation_number']."</td>";
			echo"<td>".$row['start_date']." - ".$row['start_time']."</td>";
			echo"<td>".$row['end_date']." - ".$row['end_time']."</td>";
			echo"<td>".$row['vehicle_id']."</td>";
			echo"<td>".$row['slot']."</td>";
			echo"<td>".$row['duration']."</td>";
			echo"<td>".$row['amount']."</td>";
			echo"</tr>";
		}
		echo"</table>";
		echo"<a href='admin.php'>go back</a>";
		echo"</center>";
		?>
	</div>
</BODY>
</HTML>