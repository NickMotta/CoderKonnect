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
$res = dbquery("SELECT * FROM Developer WHERE d_email='$email'");

//If the result came up empty
if (!isset($res))
{
    die("Error: No e-mail found!");     //error entry not found
}

//Hash the passed password
$passwordHashed = passhash($pwd);

//Gets the current hashed password from the database
$res = dbquery("SELECT * FROM Developer WHERE d_passhash='$passwordHashed'");

//If there isn't an entry with that password
if (!isset($res))
{
    die ("Wrong e-mail/password!");
}
else
{
    //Password and email match. Now create a session and send the user on its way!
    session_start();
    $_SESSION['dev'] = $res->fetch_object()->DID;
    setcookie("loggedIn", $res->fetch_object()->DID, time() + 2592000);
    header("Location: dashboard.html");
}
?>