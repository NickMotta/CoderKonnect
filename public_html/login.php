<?php

	/**
	 * Created by PhpStorm.
	 * User: Nick
	 * Date: 11/11/2018
	 * Time: 4:19 AM
	 */
	require_once 'database.php';

	//Get the information from POST
	$email = dbescape(trim($_POST['email']));
	$pwd = dbescape(trim($_POST['password']));

	//Checks the database for the e-mail
	$res1 = dbquery("SELECT * FROM Developer WHERE d_email='$email'");

	//If the result came up empty
	if (!isset($res1))
	{
		die("Wrong e-mail/password!");     //error entry not found
	}

	//Hash the passed password
	$passwordHashed = passhash($pwd);

	//Gets the current hashed password from the database
	$res2 = dbquery("SELECT * FROM Developer WHERE d_passhash='$passwordHashed'");

	//If there isn't an entry with that password
	//Purposefully make the error message vague
    echo $res2->fetch_object()->d_passhash;
	if ($res2->fetch_object()->d_passhash !== $passwordHashed)
	{
		die ("Wrong e-mail/password!");
	}
	else
	{
		//Password and email match. Now create a session and send the user on its way!
		session_start();
		$_SESSION['dev'] = $res2->fetch_object()->d_id;
		setcookie("loggedIn", $res2->fetch_object()->d_id, time() + 2592000);
		
		$query = dbquery("SELECT d_profileSetup FROM Developer WHERE d_email='$email';");
		
		if(($query->fetch_object()->d_profileSetup) == false)
		{
			header("Location: InitialProfileSetup.html");
		}
		else 
		{
			header("Location: dashboard.html");
		}
	}
?>