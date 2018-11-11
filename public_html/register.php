<?php
	require_once 'database.php';
	
	$firstName = dbescape(trim($_POST["first_name"]));
	$lastName = dbescape(trim($_POST["last_name"]));
	$email = dbescape(trim($_POST["email"]));
	$password = dbescape(trim($_POST["password"]));
	$confpass = dbescape(trim($_POST["confpass"]));


	//scaffoldig for debugging
$firstName = "Nicholas";
$lastName = "Motta";
$email = "titties@sprinkles.com";
$password = "test123";
$confpass = "test123";


	
	$passhash1 = passhash($password);
	$passhash2 = passhash($confpass);
	echo ($passhash1 == $passhash2);
	
	$query = dbquery("SELECT d_email FROM Developer WHERE d_email='$email';");
	

	if(!isset($query))
	{
		die("ERROR! Account already exists with that email!");
	}
	else
	{
        $query = dbquery("INSERT INTO Developer SET d_firstName='$firstName', d_lastName='$lastName',d_email='$email', d_passhash='$passhash1'");
	}

	if (!isset($query))
	{
		die ("ERROR! Something went wrong while trying to register a new user.");
	}


	
	
	
?>
