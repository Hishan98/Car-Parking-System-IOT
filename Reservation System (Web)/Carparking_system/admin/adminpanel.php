<?php 
	session_start();

	if (!isset($_SESSION['type'])) {
		header('Location: ../index.php');
	} else if ($_SESSION['type'] != 'admin') {
		header('Location: ../index.php');
	} else {
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Panel</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
    <link rel="icon" type="image/png" href="../images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto Condensed' rel='stylesheet'>

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/admin_util.css">
	<link rel="stylesheet" type="text/css" href="../css/admin_main.css">
<!--===============================================================================================-->

</head>
<body>
	<div class="navigation">
		<button class="side_button" id="btn_home" onclick="Home_Function()"><i class="fa fa-home fa-lg" aria-hidden="true"></i>Home</button>
		<button class="side_button" id="btn_guards" onclick="guard_Function()"><i class="fa fa-tasks fa-lg" aria-hidden="true"></i>Settings</button>
		<form action="../DBconnections/logout.php" method="POST">
			<button class="side_button" id="btn_logout"><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i>Logout</button>
		</form>
	</div>
		<div class="container-table100" id="container-home" style="display: flex;"> 
			<div class="search_area">
			<h1 class="report-hedding">AIA Park</h1>
				<form id="search_form" action="" method="POST">
					<div class="date_container">
						<input type="date" id="check_date" name="checkindate" placeholder="yyyy-mm-dd" value="" min="2020-01-01" max="2030-12-31">
					</div>
					<button id="search_btn" type="submit" value="Submit"><i class="fa fa-search" aria-hidden="true"></i>
						Search
					</button>
				</form>
				<form action="../DBconnections/excelexport.php" method="POST">
					<button id="download_btn" type="submit" value="Submit"><i class="fa fa-print" aria-hidden="true"></i>Download</button>
				</form>
			</div>
			<div class="wrap-table100" id="All_table">
				<div class="table100 ver1 m-b-1">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Invoice number</th>
									<th class="cell100 column2">Vehicle number</th>
									<th class="cell100 column3">Parked date</th>
									<th class="cell100 column4">Time</th>
									<th class="cell100 column5">Slot ID</th>
									<th class="cell100 column6">Guard ID</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
								<?php 
									include('../DBconnections/dbconfig.php');

									if(isset($_POST['checkindate']) && $_POST['checkindate']!=NULL){
										$check_date = $_POST['checkindate'];	
										$sql="select * from report where parked_date='".$check_date."'";
										$result=$con-> query($sql);
										
										//set session for Download button
										$_SESSION["sql-query"] = $sql;
									
										if($result-> num_rows >0){
											while($row = $result-> fetch_assoc()){
												echo'
													<tr class="row100 body">
														<td class="cell100 column1">'.$row["invoice_num"].'</td>
														<td class="cell100 column2">'.$row["vehicle_num"].'</td>
														<td class="cell100 column3">'.$row["parked_date"].'</td>
														<td class="cell100 column4">'.$row["in_time"].' - '.$row["out_time"].'</td>
														<td class="cell100 column5">'.$row["slot_id"].'</td>
														<td class="cell100 column6">'.$row["guard_id"].'</td>
													</tr>												
												';
											}
										}
									}
									else{
										$sql="select * from report";
										$result=$con-> query($sql);

										//set session for Download button
										$_SESSION["sql-query"] = $sql;

										if($result-> num_rows >0){
											while($row = $result-> fetch_assoc()){
												echo'
													<tr class="row100 body">
														<td class="cell100 column1">'.$row["invoice_num"].'</td>
														<td class="cell100 column2">'.$row["vehicle_num"].'</td>
														<td class="cell100 column3">'.$row["parked_date"].'</td>
														<td class="cell100 column4">'.$row["in_time"].' - '.$row["out_time"].'</td>
														<td class="cell100 column5">'.$row["slot_id"].'</td>
														<td class="cell100 column6">'.$row["guard_id"].'</td>
													</tr>
												';
											}
										}
									}
									$con->close();
								?>	
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
	<div id="container-Guards" style="display: none;">
		<div class="Main-container">
		<div class="left-container">
			<h1 id="Employees-hedding">Employees</h1>
				<div class="wrap-table101">
					<div class="table100 ver1 m-b-1">
						<div class="table100-head">
							<table>
								<thead>
									<tr class="row100 head">
										<th class="cell100 settings-column1">Employee ID</th>
										<th class="cell100 settings-column2">Vehicle Number</th>
									</tr>
								</thead>
							</table>
						</div>

						<div class="table100-body js-pscroll">
							<table>
								<tbody>
									<?php 
									include('../DBconnections/dbconfig.php');

									$sql="select * from vip_vehicles";
									$result=$con-> query($sql);
									if($result-> num_rows >0){
										while($row = $result-> fetch_assoc()){
											echo'
												<tr class="row100 body">
													<td class="cell100 settings-column1">'.$row["employee_id"].'</td>
													<td class="cell100 settings-column2">'.$row["vehicle_num"].'</td>
												</tr>	
											';
										}
									}
									$con->close();
									?>												
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<button class="btn_settings" id="vip_btn" data-toggle="modal" data-target="#VipModal"><i class="fa fa-id-card" aria-hidden="true"></i><br>Add VIP</button>
			<button class="btn_settings" id="guard_btn" data-toggle="modal" data-target="#GuardModal"><i class="fa fa-user-plus"  aria-hidden="true"></i><br>Add Guard</button>
			<button class="btn_settings" id="remove_btn" data-toggle="modal" data-target="#RemoveModal"><i class="fa fa-trash" aria-hidden="true"></i><br>Remove</button>
			<div class="right-container">
			<h1 id="guards-hedding">Guards</h1>
				<div class="wrap-table101">
						<div class="table100 ver1 m-b-1">
							<div class="table100-head">
								<table>
									<thead>
										<tr class="row100 head">
											<th class="cell100 settings-column1">Employee ID</th>
											<th class="cell100 settings-column2">Username</th>
										</tr>
									</thead>
								</table>
							</div>

							<div class="table100-body js-pscroll">
								<table>
									<tbody>
										<?php 
										include('../DBconnections/dbconfig.php');

										$sql="select * from users WHERE type='guard'";
										$result=$con-> query($sql);
										if($result-> num_rows >0){
											while($row = $result-> fetch_assoc()){
												echo'
													<tr class="row100 body">
														<td class="cell100 settings-column1">'.$row["emp_id"].'</td>
														<td class="cell100 settings-column2">'.$row["username"].'</td>
													</tr>
												';
											}
										}
										$con->close();
										?>	
									</tbody>
								</table>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	<!-- VIP Modal -->
	<div class="modal fade" id="VipModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add VIP Vehicle</h4>
				</div>
				<div class="modal-body">
					<form action="../DBconnections/addvip.php" method="POST">
						<div class="form-group">
							<label for="exampleInputEmail1">Employee ID</label>
							<input type="text" class="form-control" id="formGroupExampleInput" name="employeeID" placeholder="Eg: E12345">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Vehicle Number</label>
							<input type="text" class="form-control" id="formGroupExampleInput2" name="vnumber" placeholder="Eg: CAW2224">
						</div>
						<button type="submit" class="btn btn-primary">Create</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Guard Modal -->
	<div class="modal fade" id="GuardModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add new Guard</h4>
				</div>
				<div class="modal-body">
					<form action="../DBconnections/addguard.php" method="POST">
						<div class="form-group">
							<label for="exampleInputPassword1">Username</label>
							<input type="text" class="form-control" id="formGroupExampleInput2" name="uname" placeholder="Manuja">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-primary">Create</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Remove Modal -->
	<div class="modal fade" id="RemoveModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Remove VIP/Guard</h4>
				</div>
				<div class="modal-body">
					<form action="../DBconnections/remove.php"" method="POST">
						<div class="form-group">
							<label for="exampleInputEmail1">Employee ID</label>
							<input type="text" class="form-control" id="formGroupExampleInput" name="employeeID" placeholder="Eg: E12345">
						</div>
						<button type="submit" class="btn btn-primary">Remove</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


<!--===============================================================================================-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>	
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});
			
		
	</script>
<!--===============================================================================================-->
<script src="../js/admin_main.js"></script>

</body>
</html>