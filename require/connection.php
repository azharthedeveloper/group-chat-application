<?php


mysqli_report(FALSE);

$connection = mysqli_connect('localhost', 'root', '', 'group_chat_application');

if (mysqli_connect_errno()) {
	die("<h1 style='color:red'>Database Connection Failed</h1>");
}


 ?>