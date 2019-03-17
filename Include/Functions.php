<?php require_once("Include/Db.php");	?>
<?php

	function redirectTo($NewLocation)
	{
		header("Location:".$NewLocation);
	}
	function passwordEncrption($Password)
	{
		$blowFishHashFormat = "$2y$10$";
		$salt_length = 22;
		$salt= generateSalt($salt_length);
		$formatingBlowfishWithSalt = $blowFishHashFormat . $salt;
		$hash = crypt($Password,$formatingBlowfishWithSalt);
		return $hash;
	}
	function generateSalt($length)
	{
		$Unique_Random_String = md5(uniqid(mt_rand(),true));
		$Base64_String=base64_encode($Unique_Random_String);
		$Modified_Base64_String=str_replace('+', '.', $Base64_String);
		$salt=substr($Modified_Base64_String,0,$length);
		return $salt;
	}
	function passwordCheck($Password,$existingHash)
	{
		$hash=crypt($Password,$existingHash);
		/*$password is the value user enters, $existingHash is the value stored in the database*/
		if ($hash === $existingHash) {
					# code...
				return true;
				}		
		else{
				return false;
			}
	}
	function checkEmailExists($Email){
		global $connectingDb;
		$query="SELECT * FROM registration where email='$Email'";
		$execute=mysql_query($query);
		if (mysql_num_rows($execute>0)) {
			# code...
			return true;
		}else{
			return false;
		}
	}
	function loginAttempt($Email,$Password){

	}

?>
