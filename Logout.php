<?php require_once("Include/Session.php")  ; ?>
<?php require_once("Include/Functions.php") ; ?>
<?php
	$_SESSION["userId"]=NULL;
	$expireTime=time()-86400;
	setcookie("settingEmail", NULL, $expireTime);
	setcookie("settingName", NULL, $expireTime);
	session_destroy();
	redirect_to("Login.php");
?>