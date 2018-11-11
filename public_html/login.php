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
		die("entry not found");     //error entry not found
	}




	//Gets the current hashed password from the database
	$res2 = dbquery("SELECT * FROM Developer WHERE d_email='$email'");
	$res2 = $res2->fetch_object()->d_passhash;

	/*
	echo "res2: " . $res2 . "<br><br>";
	echo "pwd: " . $pwd . "<br><br>";
	echo "passtest: " . passtest($pwd, $res2) . "<br><br>";
	echo "reverse passtest: " . !passtest($pwd, $res2) . "<br><br>";
*/
	//If there isn't an entry with that password
    $passmatch = passtest($pwd, $res2);
	//Purposefully make the error message vague
	if (!$passmatch)
	{
		die ("Wrong e-mail/password!");
	}
	else
	{
		//Password and email match. Now create a session and send the user on its way!
		session_start();
		$id = dbquery("SELECT * FROM Developer WHERE d_email='$email';");
		$id = $id->fetch_object()->d_id;
		$_SESSION['dev'] = $id;
		setcookie("loggedIn", $res2->fetch_object()->d_id, time() + 2592000);
		echo "user id: " . $id . "<br><br>";
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