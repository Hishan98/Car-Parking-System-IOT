<?php session_start();
include "../db/connection.php";
include "../db/db_con.php";
$u=$_POST["user"];
$p=$_POST["pass"];
if($conn){
	$sql="SELECT * FROM users WHERE username='$u' AND password='$p';";
	$result=mysqli_query($conn, $sql);
	if ($result->num_rows == 1) {
		$row = $result->fetch_assoc();
		$_SESSION["utype"]=$row["type"];
		if ($row["type"]=='IN'){
			header('Location: ../users/entrance/entrance.php');
			$_SESSION["uname"]=$row["username"];
		} elseif ($row["type"]=='OUT'){
			header('Location: ../users/exit/exit.php');
			$_SESSION["uname"]=$row["username"];
		} elseif ($row["type"]=='ADMIN'){
			header('Location: ../users/admin/admin.php');
			$_SESSION["uname"]=$row["username"];
		} else {
			header('Location: login.php');
		}
	} else {
		echo "no match";
		while($row = $result->fetch_assoc()) {
			echo "id: " . $row["user_id"]. " - Username: " . $row["username"]. " Password: " . $row["password"]. "<br>";
		}
	}
	mysqli_close($conn);
} else {
	die("Connection Failed".mysqli_connect_error());
}
?>