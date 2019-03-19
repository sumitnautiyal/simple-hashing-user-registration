<?php require_once("Include/Session.php")  ?>
<?php require_once("Include/Functions.php")  ?>
<?php
	$_SESSION["userId"]=NULL;
	session_destroy();
	redirect_to("Login.php");
?>