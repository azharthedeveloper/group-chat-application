<?php 

session_start();
require 'require/connection.php';
if (isset($_SESSION['user'])) {
	header("location: chat.php");
}

if (isset($_REQUEST['login'])) {
	// echo "<pre>";
	// print_r($_REQUEST);

	extract($_REQUEST);

	$query = "SELECT * FROM users WHERE email = '{$login_email}' AND password = '{$login_password}'";
	$result = mysqli_query($connection,$query);

	if ($result->num_rows>0) {
		$row = mysqli_fetch_assoc($result);
		// echo "<pre>";
		// print_r($row);
		$user_id = $row['user_id'];
		$_SESSION['user'] = $row;
		$update_query = "UPDATE users SET is_online = '1' WHERE user_id = $user_id";
		$result2 = mysqli_query($connection,$update_query);
		if ($result2) {
			header("location: chat.php");
		}
	}else{
		$error_msg = "<h4 style='color:red'>Incorrect Email or Password</h4>";
		header("location: login.php?msg=$error_msg");
	}
}else{
	$error_msg = "<h4 style='color:red'>Login First!</h4>";
	header("location: login.php?msg=$error_msg");
}

?>