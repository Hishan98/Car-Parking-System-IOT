<?php
	session_start();
	if(isset($_SESSION["uname"]))  {
		if($_SESSION["utype"]!="OUT") {
			header("Location: /parkaia/index.php");
		}
	}
	include "../../db/connection.php";
	include "../../db/db_con.php";
	$id = $_POST["r_id"];
	if($conn){
		$sql="SELECT * FROM live WHERE reservation_number='$id';";
		$result=mysqli_query($conn, $sql);
		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			$startDate=$row["start_date"];
			$startTime=$row["start_time"];
			$starterTime=$startDate.' '.$startTime;
			echo date("Y-m-d H:i");
			echo "<br>$starterTime<br>";
			$welawa1=strtotime($starterTime);
			$welawa2=strtotime(date("Y-m-d H:i"));
			$wenasa=$welawa2+19800-$welawa1;
			$winadi=$wenasa/60;
			$gaana=$winadi*0.5;
			
			echo "$welawa1 <br>";
			echo "$welawa2 <br>";
			echo "$wenasa <br>";
			echo "$winadi <br>";
			echo "$gaana <br>";
			
			$_SESSION["t_id"]=$id;
			$_SESSION["cash"]=$gaana;
			$_SESSION["time"]=$winadi;
			header('Location: cash.php');
		} else {
			echo "no match";
			header('Location: exit.php');
		}
		mysqli_close($conn);
	} else {
		die("Connection Failed".mysqli_connect_error());
	}
?>