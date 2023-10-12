<?php 
session_start();
if (isset($_SESSION['user'])) {
	header("location: chat.php");
}


require 'require/connection.php';
if (isset($_REQUEST['register'])) {
	// echo "<pre>";
	// print_r($_REQUEST);

	extract($_REQUEST);

	if (isset($_FILES['single_file'])) {
            $image = $_FILES['single_file'];
            $folder = "Images";

            if (!is_dir($folder)) {
                if(!mkdir($folder)){
                    $error_msg = "<h4 style='color:red'>Could Not Create Folder $folder</h4>";
                    header("location: register.php?msg=$error_msg");

                }
            }
            $org_name = $image['name'];
            $filename = time()."_".$image['name'];
            $temp_name = $image['tmp_name'];
            $path = $folder."/".$filename;

            $handle = move_uploaded_file($temp_name, $path);

            if ($handle) {
                echo $insert_query = "INSERT INTO users (first_name, last_name, email, password, img_name, img_path) VALUES('{$first_name}', '{$last_name}', '{$email}', '{$password}', '{$org_name}', '{$path}')";
                $result = mysqli_query($connection, $insert_query);
                if ($result) {
                    $error_msg = "<h4 style='color:green'>Registered Successfully</h4>";
                    header("location: register.php?msg=$error_msg");
                }else{
                    $error_msg = "<h4 style='color:red'>Could Not Register</h4>";
                    header("location: register.php?msg=$error_msg");
                }
            }
            
        }
}



?>