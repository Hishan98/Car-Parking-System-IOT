<?php
	session_start();
	if(isset($_SESSION["uname"]))  {
		if($_SESSION["utype"]==0) {
			header("Location: users/admin/admin.php");
		} elseif($_SESSION["utype"]==1) {
			header("Location: users/clients/user.php");
		} elseif($_SESSION["utype"]==2) {
			header("Location: users/owner/facilitator.php");
		}
	}
?>
<html>
<head>
	<title>Create New Customer Account - ParkSafely</title>
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
			<form method="post" name="signup_c" onsubmit="return checkForms()" action="c_signup.php">
				<input type="text" name="FName" placeholder="First name"/>
				<input type="text" name="LName" placeholder="Last name"/>
				<input type="text" name="email" placeholder="Email"/>
				<input type="text" name="username" placeholder="Username"/>
				<input type="password" name="password" placeholder="Create a Password(6 or more characters)"/>
				<input type="text" name="phone" placeholder="Mobile number"/>
				<input type="text" name="town" placeholder="Home Town"/>
				<p>Type of the vehicles you want to park</p>
				<div class="message">
					<input type="radio" name="v_type" value="BIKE">Bike<br>
					<input type="radio" name="v_type" value="CAR">Car / Van<br>
					<input type="radio" name="v_type" value="HEAVY">Heavy Duty vehicle
				</div>
				<p class="message">Read the Agreement before Registering.<a href="#">Click here</a></p>
				<button type="submit" value="submit">Agree and Register</button> 
			</form>
		</div>
	</div>
</body>
</html>