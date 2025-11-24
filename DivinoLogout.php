<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Logging Out - Divino Calculator</title>
	<link rel="stylesheet" href="style.css">
</head>
<body class="logout-page">
	<div class="logout-container">
		<div class="logout-message">
			<h1>Logging Out</h1>
			<h2>Please wait...</h2>
			<div class="spinner"></div>
			<p>You are being redirected to the login page.</p>
		</div>
	</div>
	
	<?php
	session_start();

	// Destroy all session data
	$_SESSION = array();

	// Destroy the session cookie
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-42000, '/');
	}

	// Destroy the session
	session_destroy();

	// Redirect to login page after a short delay
	header("refresh:2;url=DivinoLogin.php");
	exit();
	?>
</body>
</html>

