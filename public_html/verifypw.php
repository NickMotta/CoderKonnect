<?php
	require_once 'database.php';
	
	echo "<!DOCTYPE html>";
    echo "<HTML><BODY>";
	
	$emailAddress = dbescape(trim($_GET["email"]));
	$passhash = dbescape(trim($_GET["password"]));
	
	dbquery("UPDATE Developer SET d_passhash=\"$passhash\" WHERE d_email=\"$emailAddress\";");
	
	echo "Password has been successfully updated!";
	echo "</BODY></HTML>";
?>