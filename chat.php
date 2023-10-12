<?php 

session_start();
if (isset($_SESSION['user'])) {
$user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CHATS/<?php echo $user['first_name']." ".$user['last_name']; ?></title>
	<link rel="stylesheet" href="CSS/style.css">
	<script type="text/javascript" src="Javascript/main.js"></script>
</head>
<body>
	<center>
		<h1>Group Chat Application</h1>
	</center>
		<table cellspacing="20">
			<tr>
				<td style="width:70vw;">
					<div id="header">
						<img src="<?php echo $user['img_path']; ?>" alt="">
						<span id="full_name"><?php echo $user['first_name']." ".$user['last_name']; ?></span>
						<button id="logout_btn"><a href="logout.php" style="text-decoration: none;">Logout</a></button>
					</div>
					<div id="chat_box">
						
					</div>
					<div id="send_message">
						<input type="text" id="message_field">
						<button onclick="send_message()">Send</button>
					</div>
				</td>
				<td style="width:20vw;">
					<div id="header2">All Users</div>
					<div id="show_users">
						
					</div>
				</td>
			</tr>
		</table>
	
</body>
</html>
<?php
}else{
	$error_msg = "<h4 style='color:red'>Login First!</h4>";
	header("location: index.php?msg=$error_msg");
}


 ?>