<?php require_once("Include/Style.css")  
//<?php include_once('fix_mysql.inc.php'); 
?>
<?php require_once("Include/Session.php")  ?>
<?php require_once("Include/Functions.php")  ?>
<?php require_once("Include/Db.php")  ?>
<?php
if (isset($_POST["Submit"])) {
	$Email=mysql_real_escape_string($_POST["Email"]);
	$Password=mysql_real_escape_string($_POST["Password"]);
	if (empty($Email) || empty($Password)) {
		# code...
		$_SESSION["message"]="All fields must be filled out";
		redirectTo("UserRegistration.php");
		header("Location:UserRegistration.php");
		exit;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
</head>
<body>
<div> <?php echo Message() ?></div> 
<div id="centerpage">
	<form action="Login.php" method="POST">
	<fieldset>
		<span class="fieldinfo">Email:</span><br><input type="Email" Name="Email"	value=""><br>
		<span class="fieldinfo">Password:</span><br><input type="Password" Name="Password"	value=""><br>
		<input type="Submit" name="Submit" value="Login">		
	</fieldset>
	</form>
</div>
</body>
</html>