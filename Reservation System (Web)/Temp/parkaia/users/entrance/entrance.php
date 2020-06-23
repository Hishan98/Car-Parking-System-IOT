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
			<form method='post' name='exit' action='details.php'>
				<?php
					include "../../db/connection.php";
					include "../../db/db_con.php";
					if($conn){
						$sql="SELECT * FROM slots;";
						$result=mysqli_query($conn, $sql);
						if ($result->num_rows != 0) {
							while($row = $result->fetch_assoc()) {
								//echo "id: " . $row["slot"]. " - state: " . $row["available"]. " " . $row["vehicle_id"]. "<br>";
								if ($row["available"] == "available"){
									echo "<button name='slot' type='submit' value='".$row["slot"]."'>".$row["slot"]."</button>";
								} else {
									echo "<button type='button' disabled>".$row["slot"]."</button>";
								}
							}
						} else {
							echo "error: parking lots not found";
						}
						mysqli_close($conn);
					} else {
						die("Connection Failed".mysqli_connect_error());
					}
				?>
			</form>
		</div>
	</div>
</BODY>
</HTML>