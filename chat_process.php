<?php 
session_start();
require 'require/connection.php';
if (isset($_SESSION['user'])) {
$user = $_SESSION['user'];

$user_id = $_SESSION['user']['user_id'];
date_default_timezone_set("Asia/Karachi");



if (isset($_POST['action']) && $_POST['action'] == 'show_chats') {
	// code...
	// echo "Working";

	$query = "SELECT * FROM users,messages WHERE users.user_id = messages.user_id";
	$result = mysqli_query($connection,$query);
	if ($result->num_rows>0) {
		while ($row = mysqli_fetch_assoc($result)) {
			if ($row['user_id'] == $user_id) {
				// echo "<pre>";
				// print_r($row);
				// echo "</pre>";
				?>
				<div id="sender">
					<span id="msg_time">
				<?php
				$time_stamp = $row['message_time'];
				echo date("h:i:s A", $time_stamp);
				?>
				</span>
				<span id="user_name"><?php echo $row['first_name']." ".$row['last_name']; ?></span>
					<img src="<?php echo $row['img_path'];?>" alt="">
					<div id="message"><?php echo $row['message']; ?></div>
				</div>
				<?php
			}else{
				?>
				<div id="reciever">
					<span id="msg_time">
				<?php
				$time_stamp = $row['message_time'];
				echo date("h:i:s A", $time_stamp);
				?>
				</span>
				<span id="user_name"><?php echo $row['first_name']." ".$row['last_name']; ?></span>
					<img src="<?php echo $row['img_path'];?>" alt="">
					<div id="message"><?php echo $row['message']; ?></div>
				</div>
				<?php
			}
		}
	}
}
elseif(isset($_POST['action']) && $_POST['action'] == 'send_message'){
	// echo "<pre>";
	// print_r($_POST);

	extract($_POST);
	$time = time();

	$query = "INSERT INTO messages (message, user_id, message_time) VALUES('{$message}', {$user_id}, '{$time}')";
	$result = mysqli_query($connection,$query);
	if ($result) {
		echo "Message Sent";
	}
}elseif(isset($_POST['action']) && $_POST['action'] == 'show_users'){
	$query = "SELECT * FROM users";
	$result = mysqli_query($connection,$query);
	if (mysqli_num_rows($result)) {
		while ($row = mysqli_fetch_assoc($result)) {
			?>
			<div id="users">
				<img src="<?php echo $row['img_path']; ?>" alt="">
				<span><?php echo $row['first_name']." ".$row['last_name']; ?></span>
				<?php
				if ($row['is_online'] == 1) {
					?>
					<span style="color: green;">Online</span>
					<?php
				}else{
					?>
					<span style="color: grey;">Offline</span>
					<?php
				}


				 ?>
			</div>
			<?php
		}
	}
}

}else{
	$error_msg = "<h4 style='color:red'>Login First!</h4>";
	header("location: login.php?msg=$error_msg");
}

?>