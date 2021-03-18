<?php
	
	session_start();

	require '../App/conn.php';
	require '../controller/users.php';

	$Users = new UsersModule($conn);

	// form action

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// get data

		$email    = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

		$password = sha1($_POST['password']);

		$user = $Users->signIn($email, $password);

		if (!empty($user)) {
			
			$_SESSION['user_id'] = $user['userid'];

			$_SESSION['username'] = $user['username'];

			header("Location: ../index.php");
		}else{
			
			header("Location: ../signin.php");
		}
	}