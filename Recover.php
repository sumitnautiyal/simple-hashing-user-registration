<?php require_once("Include/Style.css")  ;
//<?php include_once('fix_mysql.inc.php'); 
?>
<?php require_once("Include/Session.php")  ; ?>
<?php require_once("Include/Functions.php") ;  ?>
<?php require_once("Include/Db.php") ;  ?>
<?php
if (isset($_POST["Submit"])) {
	$email=mysql_real_escape_string($_POST["email"]);
	if (empty($email)) {

		$_SESSION["message"]="Email Requrired";
		redirect_to("Recover.php");
	}elseif (! checkEmailExists($email)) {
	
			$_SESSION["message"]="Email not found";
			redirect_to("UserRegistration.php");
		}
	else{
		global $connectingDb;
		$query="SELECT * FROM registration WHERE email='$email';
		$execute=mysql_query($query);
		if ($admin=mysql_fetch_array($execute)) {
			$admin["Name"];
			$admin["Token"];
			$subject="Reset Password";
			$body='Hi '. $admin["Name"] . ' Here is the link to activate your account'
			http://localhost/User_Registration/Reset.php?token . 	$admin["Token"];
			$senderEmail="From: sumit.nautiyal54@gmail.com"
			if (mail($email, $subject, $body, $senderEmail)) {
				$_SESSION["successMessage"]="Check your email to reset your password";
				redirect_to(Login.php);
			}
		}else{
			$_SESSION["message"]="Something went wrong. Try Again!";
			redirect_to(UserRegistration.php);
		}
	}

}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
</head>
<body>
<div> <?php echo Message() ?></div> 
<div id="centerpage">
	<form action="Recover.php" method="POST">
	<fieldset>
		<span class="fieldinfo">Email:</span><br><input type="Email" name="Email"	value=""><br>
		<input type="Submit" name="Submit" value="Submit">
		 
		
	</fieldset>
	

	</form>


</div>




</body>
</html>