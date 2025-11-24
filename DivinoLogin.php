<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - Divino Calculator</title>
	<link rel="stylesheet" href="style.css">
</head>
<body class="login-page">
	<div class="login-container">
		<div class="login-form">
			<h1>Login</h1>
			<h2>Divino Calculator</h2>
			
			<?php
			session_start();
			
			// Redirect if already logged in
			if(isset($_SESSION['divino_logged_in']) && $_SESSION['divino_logged_in'] === true) {
				header("Location: DivinoMainPage.php");
				exit();
			}
			
			include_once('DivinoConnection.php');
			
			$error = "";
			
			if(isset($_POST['login'])) {
				$username = mysqli_real_escape_string($divino_Connection, $_POST['username']);
				$password = mysqli_real_escape_string($divino_Connection, $_POST['password']);
				
				if(!empty($username) && !empty($password)) {
					$query = "SELECT * FROM divino_users WHERE username = '$username'";
					$result = mysqli_query($divino_Connection, $query);
					
					if($result && mysqli_num_rows($result) > 0) {
						$user = mysqli_fetch_assoc($result);
						
						// Check password (using password_verify if hashed, or plain text comparison)
						if(password_verify($password, $user['password']) || $user['password'] === $password) {
							$_SESSION['divino_logged_in'] = true;
							$_SESSION['divino_username'] = $user['username'];
							$_SESSION['divino_user_id'] = $user['id'];
							
							header("Location: DivinoMainPage.php");
							exit();
						} else {
							$error = "Invalid username or password!";
						}
					} else {
						$error = "Invalid username or password!";
					}
				} else {
					$error = "Please enter both username and password!";
				}
			}
			?>
			
			<?php if(!empty($error)): ?>
				<div class="error-message"><?php echo $error; ?></div>
			<?php endif; ?>
			
			<form method="post" action="DivinoLogin.php">
				<table style="width: 100%;">
					<tr>
						<td><label for="username">Username:</label></td>
					</tr>
					<tr>
						<td><input type="text" id="username" name="username" required autofocus></td>
					</tr>
					<tr>
						<td><label for="password">Password:</label></td>
					</tr>
					<tr>
						<td><input type="password" id="password" name="password" required></td>
					</tr>
					<tr>
						<td>
							<button type="submit" name="login" class="DivinoCompute">Login</button>
						</td>
					</tr>
					<tr>
						<td style="text-align: center; padding-top: 15px;">
							<a href="DivinoRegister.php">Register New User</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>

