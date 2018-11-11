<?php
	require_once 'database.php';
	
	$firstName = dbescape(trim($_POST["first_name"]));
	$lastName = dbescape(trim($_POST["last_name"]));
	$email = dbescape(trim($_POST["email"]));
	$password = dbescape(trim($_POST["password"]));
	$confpass = dbescape(trim($_POST["confpass"]));
	
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
	else
	{
		echo <<<_END
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Coder Konnect</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <nav class="navbar navbar-expand-sm bg-primary navbar-dark text-white rounded-0">
        <a class="navbar-brand" href="index.html">Logo</a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link text-white" href="login.html">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Register</a>
            </li>
        </ul>
    </nav>

</head>
<body>
<div class="container shadow-lg mb-4 bg-white rounded border border-primary mt-3">
    <h1 class="display-1 text-center">Registration Successful!</h1>
    <br><br>
    <h1 class="display-5 text-center mb-5">Click the button below to be brought to the log-in screen.</h1>

    <div class="container w-50">
        <form action="login.html" class="">
            <button class="btn-primary btn-block rounded btn-lg mb-3"><h1 class="display-5">Log-in</h1></button>
        </form>
    </div>
</div>
</body>



_END;

	}


	
	
	
?>
