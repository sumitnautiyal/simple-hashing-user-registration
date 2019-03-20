<?php require_once("Include/Session.php") ; ?>
<?php require_once("Include/Db.php") ; ?>
<?php require_once("Include/Functions.php") ; ?>
<?php require_once("Include/Style.css") ; ?>

<?php
	global $connectingDb;
	if (isset($_GET['token']) {
	$urlToken=$_GET['token'];
	$query="UPDATE registration SET active='ON' WHERE token='urlToken' ";
	$execute=mysql_query($query);
		if ($execute) {
			$_SESSION["successMessage"]="Your account is activated successfully";
			redirect_to("Login.php");
		} else {
			$_SESSION["successMessage"]="Somthing went wrong,. Please try again";
			redirect_to("Login.php");
		}
	}


>?
