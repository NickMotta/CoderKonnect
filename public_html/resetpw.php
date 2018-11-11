<?php
	require_once 'database.php';
	
	echo "<!DOCTYPE html>";
    echo "<HTML><BODY>";
	
	$realEmail = trim($_POST["email"]);
	$emailAddress = dbescape($realEmail);
	$password = dbescape(trim($_POST["newpass"]));
	
	$passhash = passhash($password);
	
	$url = "coderkonnect.com/verifypw.php?email=$emailAddress&password=$passhash";
	
	mail($realEmail, "Verification Link", $url);
	
	echo "Please check email $emailAddress for verification link!";
	echo "</BODY></HTML>";
?>