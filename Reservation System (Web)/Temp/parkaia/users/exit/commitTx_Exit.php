<?php
	session_start();
	if(isset($_SESSION["uname"]))  {
		if($_SESSION["utype"]!="OUT") {
			header("Location: /parkaia/index.php");
		}
	}
	include "../../db/connection.php";
	include "../../db/db_con.php";
	$id = $_SESSION["t_id"];
	if($conn){
		$sql="SELECT * FROM live WHERE reservation_number='$id';";
		$result=mysqli_query($conn, $sql);
		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			$slot=$row["slot"];
			$v_id=$row["vehicle_id"];
			$startDate=$row["start_date"];
			$startTime=$row["start_time"];
			$price=$_SESSION["cash"];
			$endDate=date("Y-m-d");
			$endTime=date("H:i");
			$duration=$_SESSION["time"];
			echo "$id<br>";
			echo "$startDate<br>";
			echo "$startTime<br>";
			echo "$endDate<br>";
			echo "$endTime<br>";
			echo "$v_id<br>";
			echo "$slot<br>";
			echo "$duration<br>";
			echo "$price<br>";			
			$sql_w_tx="INSERT INTO reservation VALUES ($id, '$startDate', '$startTime', '$endDate', '$endTime', '$v_id', '$slot', '$duration', '$price')";
			if ($conn->query($sql_w_tx) === TRUE) {
				echo "Added to Reservation Table";
				$sql_w_sl="UPDATE slots SET available='available', vehicle_id='' WHERE slot='$slot'";
				if ($conn->query($sql_w_sl) === TRUE) {
					echo "Slots table updated";
					$sql_d="DELETE FROM live WHERE reservation_number=$id";
					if ($conn->query($sql_d) === TRUE) {
						echo "Record Deleted from Live Table";
						header('Location: bill.php');
					} else {
						echo "Error: " . $sql_d . "<br>" . $conn->error;
					}
				} else {
					echo "Error: " . $sql_w_sl . "<br>" . $conn->error;
				}
			} else {
				echo "Error: " . $sql_w_tx . "<br>" . $conn->error;
			}
			
			
			
		} else {
			echo "no match";
		}
		mysqli_close($conn);
	} else {
		die("Connection Failed".mysqli_connect_error());
	}
?>