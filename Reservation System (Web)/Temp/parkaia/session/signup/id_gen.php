<?php

$id=0;
$sql="SELECT * FROM login";
$result=mysqli_query($conn, $sql);
if ($result->num_rows != 0) {
	//lokuma id eka hoyanna!
	while($row = $result->fetch_assoc()) {
		if ($row["user_id"] > $id) {
			$id = $row["user_id"];
		}
	}
}
$id++;
//echo $id;
?>