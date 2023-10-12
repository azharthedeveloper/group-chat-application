<?php


session_start();
require 'require/connection.php';
$user_id = $_SESSION['user']['user_id'];
$query = "UPDATE users SET is_online = '0' WHERE user_id = '{$user_id}'";
$result = mysqli_query($connection,$query);

if ($result) {
	session_destroy();
	$error_msg="<h4 style='color:green'>Logged Out</h4>";
	header("location: index.php?msg=$error_msg");
}


 ?>