<?php
	require_once 'database.php';
	
	echo "<!DOCTYPE html>";
    echo "<HTML><BODY>";
	
	$emailAddress = dbescape(trim($_POST["email"]));
	$password = dbescape(trim($_POST["newpass"]));
	
	$passhash = passhash($password);
	
	$url = "http://142.93.204.188/CoderKonnect/public_html/verifypw.php?email=$emailAddress&password=$passhash";
	
	mail($emailAddress, "Verification Link", $url);
	
	echo "Please check email $emailAddress for verification link!";
	echo "</BODY></HTML>";
?>