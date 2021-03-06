<?php
session_start();
include_once "config.php";

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
mysqli_set_charset($connection, "utf8");

$action = $_POST['action'] ?? '';
$status = 0;

// Users data into mysql database
if (!$connection){
	throw new Exception("Cannot connect to database");

#User Registration Data
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

	#User Login Verify Data
	}elseif('login'==$action){
        $username = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        if ( $username && $password ) {
        	#Pul user register data by verify email
            $query = "SELECT id, password FROM users WHERE email='{$username}'";
            $result = mysqli_query($connection,$query);

            if(mysqli_num_rows($result)>0){
                $data = mysqli_fetch_assoc($result);
                #Database _Password & _id
                $_password = $data['password'];
                $_id = $data['id'];

                #Verify login password = database password
                if(password_verify($password,$_password)){
                    $_SESSION['id'] = $_id;
                    header("Location: words.php");
                    die();
                }else{
                    $status = 4;
                }
            }else{
                $status = 5;
            }

        }else{
            $status = 2;
        }
        header("Location: index.php?status={$status}");

    #Added vocabulary data
	}elseif('addword'==$action){
		$word = $_REQUEST['word']??'';
        $meaning = $_REQUEST['meaning']??'';
        $user_id = $_SESSION['id']??0;
        if($word && $meaning && $user_id){
            $query = "INSERT INTO words (user_id, word, meaning) VALUES('{$user_id}','{$word}','{$meaning}')";
            mysqli_query($connection, $query);
        }
        header( 'Location: words.php' );
	}
}