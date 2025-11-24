<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register - Divino Calculator</title>
	<link rel="stylesheet" href="style.css">
</head>
<body class="register-page">
	<div class="register-container">
		<div class="register-form">
			<h1>Register New User</h1>
			<h2>Divino Calculator</h2>
			
			<?php
			include_once('DivinoConnection.php');
			
			$error = "";
			$success = "";
			
			if(isset($_POST['register'])) {
				$username = mysqli_real_escape_string($divino_Connection, $_POST['username']);
				$password = mysqli_real_escape_string($divino_Connection, $_POST['password']);
				$confirm_password = mysqli_real_escape_string($divino_Connection, $_POST['confirm_password']);
				
				if(!empty($username) && !empty($password) && !empty($confirm_password)) {
					if($password === $confirm_password) {
						// Check if username already exists
						$check_query = "SELECT * FROM divino_users WHERE username = '$username'";
						$check_result = mysqli_query($divino_Connection, $check_query);
						
						if($check_result && mysqli_num_rows($check_result) == 0) {
							// Hash the password
							$hashed_password = password_hash($password, PASSWORD_DEFAULT);
							
							// Insert new user
							$insert_query = "INSERT INTO divino_users (username, password) VALUES ('$username', '$hashed_password')";
							$insert_result = mysqli_query($divino_Connection, $insert_query);
							
							if($insert_result) {
								$success = "User registered successfully! You can now <a href='DivinoLogin.php'>login</a>.";
							} else {
								$error = "Registration failed. Please try again.";
							}
						} else {
							$error = "Username already exists!";
						}
					} else {
						$error = "Passwords do not match!";
					}
				} else {
					$error = "Please fill in all fields!";
				}
			}
			?>
			
			<?php if(!empty($error)): ?>
				<div class="error-message"><?php echo $error; ?></div>
			<?php endif; ?>
			
			<?php if(!empty($success)): ?>
				<div class="success-message"><?php echo $success; ?></div>
			<?php endif; ?>
			
			<form method="post" action="DivinoRegister.php">
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
						<td><label for="confirm_password">Confirm Password:</label></td>
					</tr>
					<tr>
						<td><input type="password" id="confirm_password" name="confirm_password" required></td>
					</tr>
					<tr>
						<td>
							<button type="submit" name="register" class="DivinoCompute">Register</button>
						</td>
					</tr>
					<tr>
						<td style="text-align: center; padding-top: 15px;">
							<a href="DivinoLogin.php">Back to Login</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>

