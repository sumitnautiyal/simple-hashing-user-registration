<?php require_once("Include/Db.php") ;	?>
<?php

	function redirect_to($newLocation)
	{
		header("Location:". $newLocation);
		exit;
	}
	function passwordEncrption($password)
	{
		$blowFishHashFormat = "$2y$10$";
		$saltLength = 22;
		$salt= generateSalt($saltLength);
		$formatingBlowfishWithSalt = $blowFishHashFormat . $salt;
		$hash = crypt($password,$formatingBlowfishWithSalt);
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
	function passwordCheck($password,$existingHash)
	{
		$hash=crypt($password,$existingHash);
		/*$password is the value user enters, $existingHash is the value stored in the database*/
		if ($hash === $existingHash) {
					# code...
				return true;
				}		
		else{
				return false;
			}
	}
	function checkEmailExists($email){
		global $connectingDb;
		$query="SELECT * FROM registration WHERE email='$email'";
		$execute=mysql_query($query);
		if (mysql_num_rows($execute>0)) {
			# code...
			return true;
		}else{
			return false;
		}
	}
	function loginAttempt($email,$password){
		$query="SELECT * FROM registration WHERE email='$email' 	";
		$execute=mysql_query($query);
		if($admin=mysql_fetch_assoc($execute)){
			if(passwordCheck($password, $admin['password'])){		//making super global of admin
					return $admin;
			}else{
				return NULL;
			}
		}
	}
	function confirmingAccountActiveStatus(){
		global $connectingDb;
		$query="SELECT * FROM registration WHERE active='ON'";
		$execute=mysql_query($query);
		
	}
	function login(){
		if (isset($_SESSION["userId"]) || isset($_COOKIE["settingEmail"])) {
			return TRUE;
		}
	}
	function confirmLogin(){
		if (!login()) {
			$_SESSION["message"]="You have to login first";
			redirect_to("Login.php");
		}
	}

?>
