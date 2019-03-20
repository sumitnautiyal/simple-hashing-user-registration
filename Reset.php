<?php require_once("Include/Style.css")  ; ?>
<?php require_once("Include/Session.php")  ; ?>
<?php require_once("Include/Functions.php") ;  ?>
<?php require_once("Include/Db.php") ;  ?>
<?php
if (isset($_POST["Submit"])) {
	# code...
	$password=mysql_real_escape_string($_POST["password"]);
	$confirmPassword=mysql_escape_string($_POST["ConfirmPassword"]);
	if (empty($password) || empty($confirmPassword)) {
		# code...
		$_SESSION["message"]="All fields must be filled out";
		redirect_to("UserRegistration.php");
		header("Location:UserRegistration.php");
		exit;
			}elseif ($password !== $confirmPassword) {
		# code...
		$_SESSION["message"]="Passwords do not match";
		redirect_to("UserRegistration.php");
		
	}elseif (strlen($password<4)) {
		# code...
		$_SESSION["message"]="Password should include atleast 4 values";
		redirect_to("UserRegistration.php");
	}elseif (checkEmailExists($email)) {
			# code...
			$_SESSION["message"]="Email already in use";
			redirect_to("UserRegistration.php");
		}
	else{
		global $connectingDb;
		$hashedPassword=passwordEncrption($password);
		$query="INSERT INTO registration(name, email, password,token,active)VALUES('$username','$email','$hashedPassword','$token', 'OFF')";
		$execute=mysql_query($query);
		if ($execute) {
			# code...
			$_SESSION["successMessage"]="Great";
			redirect_to(UserRegistration.php);
		}
		else{
			$_SESSION["message"]="Something went wrong. Try Again!";
			redirect_to(UserRegistration.php);
		}
	}

}


?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
</head>
<body>
<div> <?php echo Message() ?></div> 
<div id="centerpage">
	<form action="UserRegistration.php" method="POST">
	<fieldset>
		<span class="fieldinfo">Username:</span><br><input type="text" name="Username"	value=""><br>
		<span class="fieldinfo">Email:</span><br><input type="Email" name="Email"	value=""><br>
		<span class="fieldinfo">Password:</span><br><input type="Password" name="Password"	value=""><br>
		<span class="fieldinfo">Confirm Password:</span><br><input type="Password" name="ConfirmPassword"	value=""><br>
		<input type="Submit" name="Submit" value="Register">
		 
		
	</fieldset>
	

	</form>


</div>




</body>
</html>