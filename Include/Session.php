<?php
session_start();
function Message()
{
	if (isset($_SESSION["message"])) {
		# code...
		$output="<div class=\"message\">";
		$output.=htmlentities($_SESSION["message"]);
		$output.="</div>";
		$_SESSION["message"]=NULL;
		return $output;
	}
}
function successMessage()
{
	if (isset($_SESSION["successMessage"])) {
		# code...
		$output="<div class=\"successMessage\">";
		$output.=htmlentities($_SESSION["successMessage"]);
		$output.="</div>";
		$_SESSION["message"]=NULL;
		return $output;
	}
}

?>
