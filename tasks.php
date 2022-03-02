<?php
include_once "config.php";

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
$action = $_POST['action'] ?? '';
$status = 0;

// Insert users data into mysql database
if (!$connection){
	throw new Exception("Cannot connect to database");
}else{
	if ("register" == $action){
		$username = $_POST['email'] ?? '';
		$password = $_POST['password'] ?? '';
		if ($username && $password){
			#Password Encrypt
			$hash = password_hash( $password, PASSWORD_BCRYPT );
			#Database Connection
			$query = "INSERT INTO users(email, password) VALUES('{$username}','{$hash}')";
			mysqli_query($connection, $query);

			#Database Error
			if (mysqli_error($connection)){
				$status = 1;
			}else{
				$status = 3;
			}
		}else{
			$status = 2;
		}
		header("Location: index.php?status={$status}");
	}
}