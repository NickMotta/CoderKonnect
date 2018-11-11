<?php
	require_once 'database.php';
	
	$firstName = dbescape(trim($_POST["first_name"]));
	$lastName = dbescape(trim($_POST["last_name"]));
	$email = dbescape(trim($_POST["email"]));
	$password = dbescape(trim($_POST["password"]));
	$confpass = dbescape(trim($_POST["confpass"]));
	
	if(ctype_alpha($firstName) == false)
	{
		die("ERROR! First name must be alphanumeric!");
	}
	if(ctype_alpha($lastName) == false)
	{
		die("ERROR! Last name must be alphanumeric!");
	}
	
	$passhash1 = passhash($password);
	$passhash2 = passhash($confpass);
	
	if($passhash1 != $passhash2)
	{
		die("ERROR! Retype your password!");
	}
	
	$query = dbquery("SELECT d_email FROM Developer WHERE d_email=\"$email\";");
	
	if($query.fetch_object()->num_rows <= 0)
	{
		die("ERROR! Account already exists with that email!");
	}
	
	
	
?>
