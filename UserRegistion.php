<?php require_once("Include/Style.css")  
//<?php include_once('fix_mysql.inc.php'); 
?>
<?php require_once("Include/Session.php")  ?>
<?php require_once("Include/Functions.php")  ?>

<?php require_once("Include/Db.php")  ?>
<?php
if (isset($_POST["Submit"])) {
	# code...
	$Username=mysql_real_escape_string($_POST["Username"]);
	$Email=mysql_real_escape_string($_POST["Email"]);
	$Password=mysql_real_escape_string($_POST["Password"]);
	$ConfirmPassword=mysql_escape_string($_POST["ConfirmPassword"]);
	if (empty($Username) && empty($Email) && empty($Password) && empty($ConfirmPassword)) {
		# code...
		$_SESSION["message"]="All fields must be filled out";
		redirectTo("UserRegistration.php");
		header("Location:UserRegistration.php");
		exit;
	}elseif ($Password! == $ConfirmPassword) {
		# code...
		$_SESSION["message"]="Passwords do not match";
		redirectTo("UserRegistration.php");
		
	}elseif (strlen($Password<4)) {
		# code...
		$_SESSION["message"]="Password should include atleast 4 values";
		redirectTo("UserRegistration.php");
	}elseif (checkEmailExists($Email)) {
			# code...
			$_SESSION["message"]="Email already in use";
			redirectTo("UserRegistration.php");
		}
	else{
		global $connectingDb;
		$hashedPassword=passwordEncrption($Password);
		$query="INSERT INTO registration(Name, Email, Password)VALUES('$Username','$Email','$hashedPassword')";
		$execute=mysql_query($query);
		if ($execute) {
			# code...
			$_SESSION["successMessage"]="Great";
			redirectTo(UserRegistration.php);
		}
		else{
			$_SESSION["message"]="Something went wrong. Try Again!";
			redirectTo(UserRegistration.php);
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
		<span class="fieldinfo">Username:</span><br><input type="text" Name="Username"	value=""><br>
		<span class="fieldinfo">Email:</span><br><input type="Email" Name="Email"	value=""><br>
		<span class="fieldinfo">Password:</span><br><input type="Password" Name="Password"	value=""><br>
		<span class="fieldinfo">Confirm Password:</span><br><input type="Password" Name="ConfirmPassword"	value=""><br>
		<input type="Submit" name="Submit" value="Register">
		 
		
	</fieldset>
	

	</form>


</div>




</body>
</html>