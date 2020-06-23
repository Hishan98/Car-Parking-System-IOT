<?php
	session_start();
	if(isset($_SESSION["uname"]))  {
		if($_SESSION["utype"]!=0) {
			header("Location: ../index.php");
		}
	}
	include "../../db/connection.php";
	include "../../db/db_con.php";
	$select="SELECT * FROM users";
	$sql= mysqli_query($conn,$select);
?>
<HTML>
<HEAD>
	<TITLE>AIA Parking</TITLE>
	<link rel="stylesheet" href="/parkaia/styles.css">
</HEAD>
<BODY>
	<?php include "../../session/session_disp.php";?>
	<H1>P A R K . A I A - USERS</H1>
	<div class="form">
		<?php
		echo"<center>";
		echo"<h2>Users</h2>";
		echo"<table border='1' width='100%'>";
		echo"<tr>";
		echo"<th>"."Username"."</th>";
		echo"<th>"."Full Name"."</th>";
		echo"<th>"."User Type"."</th>";
		echo"</tr>";

		while($row= mysqli_fetch_array($sql)){
			echo"<tr>";
			echo"<td>".$row['username']."</td>";
			echo"<td>".$row['name']."</td>";
			echo"<td>".$row['type']."</td>";
			$x=$row['idusers'];
			echo"<td><a href='customer.php?del=$x'>edit</a></td>";
			echo"<td><a href='delete_customer_record.php?del=$x'>delete</a></td>";
			echo"</tr>";
		}
		echo"</table>";
		echo"<p><a href='admin.php'>Go Back</a> | <a href='customer.php'>Add New User</a></p>";
		echo"</center>";
		?>
	</div>
</BODY>
</HTML>