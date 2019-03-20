<?php require_once("Include/Style.css") ; 
//<?php include_once('fix_mysql.inc.php'); 
?>
<?php require_once("Include/Session.php")  ; ?>
<?php require_once("Include/Functions.php") ;  ?>
<?php require_once("Include/Db.php")  ; ?>
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
					$_SESSION["userId"]=$foundAccount['Id'];
					$_SESSION["userName"]=$foundAccount['Name'];
					$_SESSION["userEmail"]=$foundAccount['Email'];
					if (isset($_POST["Remember"])) {
						$expireTime=time()+86400;
						setcookie("settingEmail",$email,$expireTime);
						setcookie("settingName",$userName,$expireTime);
					}
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
		<span class="fieldinfo">email:</span><br><input type="email" name="email"	value=""><br>
		<span class="fieldinfo">Password:</span><br><input type="Password" name="Password"	value=""><br>
		<input type="checkbox" name="Remember" ><span class="fieldinfo"></span> Remember Me <br>	
		<a href="Recover.php"><span class="fieldinfo"> Forgot Password </span></a>
		<input type="Submit" name="Submit" value="Login"><br>
	</fieldset>
	</form>
</div>
</body>
</html>