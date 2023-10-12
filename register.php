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
	<title>Register/Group Chat Application</title>
	<link rel="stylesheet" href="CSS/style.css">
</head>
<body>
	<center>
		<h1>Group Chat Application</h1>
		<fieldset>
			<legend>Register Here</legend>
			<form action="register_process.php" method="POST" enctype="multipart/form-data">
				<div id="message">
					<?php echo isset($_GET['msg'])?$_GET['msg']:''; ?>
				</div>
				<table id="register_table">
					<tr>
						<td>First Name: </td>
						<td><input type="text" name="first_name" id="first_name" placeholder="Enter your First Name"> </td>
					</tr>
					<tr>
						<td>Last Name: </td>
						<td><input type="text" name="last_name" id="last_name" placeholder="Enter your Last Name"> </td>
					</tr>
					<tr>
						<td>Email: </td>
						<td><input type="text" name="email" id="email" placeholder="Enter your Email"> </td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input type="password" name="password" id="password" placeholder="Enter your Password"> </td>
					</tr>
					<tr>
						<td>Profile Picture: </td>
						<td><input type="file" id="single_file" name="single_file"></td>
					</tr>
					<tr>
						<td align="center" colspan="2"><input type="submit" name="register" value="Register"></td>
					</tr>
					<tr>
						<td align="center" colspan="2">Already Have an Account?<a href="login.php" style="text-decoration: none;">Login Here</a></td>
					</tr>

				</table>
			</form>
		</fieldset>
	</center>
</body>
</html>