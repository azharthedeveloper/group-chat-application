<?php
session_start();
if (isset($_SESSION['user'])) {
	header("location: chat.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login/Group Chat Application</title>
	<link rel="stylesheet" href="CSS/style.css">
</head>
<body>
	<center>
		<h1>Group Chat Application</h1>
		<fieldset>
			<legend>Login Here</legend>
		<form action="login_process.php" method="POST">
			<div id="message">
					<?php echo isset($_GET['msg'])?$_GET['msg']:''; ?>
			</div>
			<table>
				<tr>
					<td>Email: </td>
					<td><input type="email" name="login_email" placeholder="Enter your Email" required></td>
				</tr>
				<tr>
					<td>Password: </td>
					<td><input type="password" name="login_password" placeholder="Enter your Password" required></td>
				</tr>
				<tr>
					<td align="center" colspan="2"><input type="submit" name="login" value="Login"></td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						Don't Have any Account?<a href="register.php" style="text-decoration: none;">Register Here</a>
					</td>
				</tr>
			</table>
		</form>
		</fieldset>
	</center>
</body>
</html>