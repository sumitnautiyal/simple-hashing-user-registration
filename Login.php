<?php require_once("Include/Style.css")  
//<?php include_once('fix_mysql.inc.php'); 
?>
<?php require_once("Include/Session.php")  ?>
<?php require_once("Include/Functions.php")  ?>
<?php require_once("Include/Db.php")  ?>
<?php
if (isset($_POST["Submit"])) 
{
	$email=mysql_real_escape_string($_POST["email"]); 
	$Password=mysql_real_escape_string($_POST["Password"]);
	if (empty($email) || empty($Password)) 
	{
		$_SESSION["message"]="All fields must be filled out";
		redirect_to("Login.php");
	}
	else{
		if (confirmingAccountActiveStatus) {	//Check if the user has not confirmed account through email
				$foundAccount=loginamettempt($email,$Password);
				if ($foundAccount){
					redirect_to("Welcome.php");
				}
				else{
					$_SESSION["message"]="Invalid Email or Password";
					redirect_to("Login.php");
				}else{
					$_SESSION["message"]="Account Confirmation Required";
					redirect_to("Login.php");
				}
			}
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
		<span class="fieldinfo">email:</span><br><input type="email" nameme="email"	value=""><br>
		<span class="fieldinfo">Password:</span><br><input type="Password" nameme="Password"	value=""><br>
		<input type="Submit" nameme="Submit" value="Login">		
	</fieldset>
	</form>
</div>
</body>
</html>