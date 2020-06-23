<?php
	session_start();
	if(isset($_SESSION["uname"]))  {
		if($_SESSION["utype"]!="IN") {
			header("Location: /parkaia/index.php");
		}
	}
	include "../../db/connection.php";
	include "../../db/db_con.php";
	$id = 0;
	$slot=$_SESSION["parking_slot"];
	$v_id=$_POST["r_id"];
	if($conn){
		$sql1="SELECT reservation_number FROM reservation";
		$result1=mysqli_query($conn, $sql1);
		if ($result1->num_rows != 0) {
			while($row = $result1->fetch_assoc()) {
				if ($row["reservation_number"]>$id) {
					$id = $row["reservation_number"];
				}
			}
		}
		$sql2="SELECT reservation_number FROM live";
		$result2=mysqli_query($conn, $sql2);
		if ($result2->num_rows != 0) {
			while($row = $result2->fetch_assoc()) {
				if ($row["reservation_number"]>$id) {
					$id = $row["reservation_number"];
				}
			}
		}
		$id=$id+1;
		$startDate=date("Y-m-d");
		$startTime=date("H:i");
		echo "$id <br>";
		echo "$startDate <br>";
		echo "$startTime <br>";
		echo "$slot <br>";
		echo "$v_id <br>";
		$sql_w_l="INSERT INTO live VALUES ($id, '$startDate', '$startTime', '$slot', '$v_id')";
		if ($conn->query($sql_w_l) === TRUE) {
			echo "Added to Live Table";
			$sql_w_sl="UPDATE slots SET available='parked', vehicle_id='$v_id' WHERE slot='$slot'";
			if ($conn->query($sql_w_sl) === TRUE) {
				echo "Slots table updated";
				header("Location: ticket.php?display=$id");
			} else {
				echo "Error: " . $sql_w_sl . "<br>" . $conn->error;
			}
		} else {
			echo "Error: " . $sql_w_l . "<br>" . $conn->error;
		}
		mysqli_close($conn);
	} else {
		die("Connection Failed".mysqli_connect_error());
	}
	
	
?>