<?php
	session_start();
	if(isset($_SESSION["uname"]))  {
		if($_SESSION["utype"]!=0) {
			header("Location: ../index.php");
		}
	}
	include "../../db/connection.php";
	include "../../db/db_con.php";

	if(isset($_GET['del'])){
		$u = $_GET['del'];
		$select= "SELECT * FROM user WHERE user_id='$u' ";
		$sql=mysqli_query($conn,$select) or die('select error!');
		$row= mysqli_fetch_array($sql);
		$fname=$row['f_name'];
		$lname=$row['s_name'];
		$email=$row['email'];
		$phone=$row['phone'];
		$town=$row['town'];
		$v_type=$row['v_type'];
	}
?>
<html>
<head>
	<title>ParkSafely - Admin</title>
	<script>
	function checkForms(){

		if(document.forms['signup_c']['FName'].value==''  ){
			alert("Please enter first name");
			return false;
			}
		else if(document.forms['signup_c']['LName'].value==''  ){
			alert("Please enter last name");
			return false;
			}
		else if(document.forms['signup_c']['email'].value==''  ){
			alert("Please enter a valid email address");
			return false;
			}
		else if(document.forms['signup_c']['username'].value==''  ){
			alert("Enter your usernsme");
			return false;
			}
		else if(document.signup_c.username.value.length>7){
			alert("Maximum 7 characters");
			return false;
			}
		else if(document.forms['signup_c']['password'].value==''  ){
			alert("Enter your password");
			return false;
			}
		else if(document.signup_c.password.value.length<6){
			alert("Minimum 6 characters");
			return false;
			}
		else if(document.forms['signup_c']['phone'].value==''  ){
			alert("Enter your phone number");
			return false;
			}
		else if(isNaN(document.signup_c.phone.value)){
			alert("Enter a vaild phone number");
			return false;
			}	
		else if(document.signup_c.phone.value.length!=10){
			alert("Enter a vaild phone number");
			return false;
			}
		else if(!checkRadio()){
			alert("Select a vehicle type");
			return false;
		}
		else if(!checkEmail(document.signup_c.email)){
			alert('Invalid Email Address');
			return false;
		}
	}

	function checkRadio(){
		var radios = document.getElementsByName("v_type");
		var formValid = false;

		var i = 0;
		while (!formValid && i < radios.length) {
			if (radios[i].checked) formValid = true;
			i++;        
		}
		return formValid;
	}

	function checkEmail(email){
			var abc = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

			if (abc.test(email.value) == false) 
			{
				return false;
			} else {
				return true;
			}
	}
	</script>
	<link rel="stylesheet" href="/parksafely/styles.css">
</head>
<body>
	<h1>P A R K S A F E L Y . L K</h1>
	<div class="page">
		<div class="form">
			<h3>Create an Account</h3>
			<h4>(Customer Account)</h4>
			<?php
				echo "<form method='post' name='signup_c' onsubmit='return checkForms()' action='c_signup.php?id=$u'>";
				echo "<input type='text' name='FName' placeholder='First name' value='$fname'/>";
				echo "<input type='text' name='LName' placeholder='Last name' value='$lname'/>";
				echo "<input type='text' name='email' placeholder='Email' value='$email'/>";
				echo "<input type='text' name='phone' placeholder='Mobile number' value='$phone'/>";
				echo "<input type='text' name='town' placeholder='Home Town' value='$town'/>";
				echo "<button type='submit' value='submit'>Update</button>";
				echo "</form>";
			?>
		</div>
	</div>
</body>
</html>