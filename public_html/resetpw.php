<?php
	require_once 'database.php';
	
	echo "<!DOCTYPE html>";
    echo "<HTML><BODY>";
	
	$emailAddress = dbescape(trim($_POST["email"]));
	$password = dbescape(trim($_POST["newpass"]));
	
	$passhash = passhash($password);
	
	$url = "coderkonnect.com/verifypw.php?email=$emailAddress&password=$passhash";
	
	mail($emailAddress, "Verification Link", $url);
	
	echo "Please check email $emailAddress for verification link!";
	echo "</BODY></HTML>";
?>