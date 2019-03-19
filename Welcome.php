<?php require_once("Include/Session.php")  ?>
<?php require_once("Include/Functions.php")  ?>
<?php confirmLogin() ; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome User</title>
</head>
<body>
	<?php
		echo "Your Id is" . $_SESSION['userId'] . "with the name of" . "$_SESSION["userName"]" . "and email as" . $_SESSION["userEmail"] ;
	?>
	<h1>Welcome User</h1>
	<<a href="Logout.php"></a>
</body>
</html>