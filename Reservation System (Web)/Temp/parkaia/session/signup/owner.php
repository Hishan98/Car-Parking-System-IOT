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
	<title>Create New Owner Account - ParkSafely</title>
	<script>
	function checkForms(){

		if(document.forms['signup_o']['FName'].value==''  ){
			alert("Please enter first name");
			return false;
			}
		else if(document.forms['signup_o']['LName'].value==''  ){
			alert("Please enter last name");
			return false;
			}
		else if(document.forms['signup_o']['email'].value==''  ){
			alert("Please enter a valid email address");
			return false;
			}
		else if(document.forms['signup_o']['username'].value==''  ){
			alert("Enter your usernsme");
			return false;
			}
		else if(document.signup_o.username.value.length>7){
			alert("Maximum 7 characters");
			return false;
			}
		else if(document.forms['signup_o']['password'].value==''  ){
			alert("Enter your password");
			return false;
			}
		else if(document.signup_c.password.value.length<6){
			alert("Minimum 6 characters");
			return false;
			}
		else if(document.forms['signup_o']['phone'].value==''  ){
			alert("Enter your phone number");
			return false;
			}
		else if(isNaN(document.signup_o.phone.value)){
			alert("Enter a vaild phone number");
			return false;
			}	
		else if(document.signup_o.phone.value.length!=10){
			alert("Enter a vaild phone number");
			return false;
			}
		else if(!checkEmail(document.signup_o.email)){
			alert('Invalid Email Address');
			return false;
		}
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
			<h4>(Owner Account)</h4>
			<form method="post" name="signup_o" onsubmit="return checkForms()" action="o_signup.php">
				<input type="text" name="FName" placeholder="First name"/>
				<input type="text" name="LName" placeholder="Last name"/>
				<input type="text" name="email" placeholder="Email"/>
				<input type="text" name="username" placeholder="Username"/>
				<input type="password" name="password" placeholder="Create a Password(6 or more characters)"/>
				<input type="text" name="phone" placeholder="Mobile number"/>
				<input type="text" name="address" placeholder="Address"/>
				<p class="message">Read the Agreement before Registering.<a href="#">Click here</a></p>
				<button type="submit" value="submit">Agree and Register</button> 
			</form>
		</div>
	</div>
</body>
</html>