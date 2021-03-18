<?php
	
	session_start();

	require '../App/conn.php';
	require '../controller/users.php';

	$Users = new UsersModule($conn);

	// form action

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// get data
		$username = htmlentities($_POST['username']);

		$password = sha1($_POST['password']);

		$email    = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

		$gender   = $_POST['gender'];

		$ip       = $_SERVER['REMOTE_ADDR'];

		$is_admin = 0;

		$datecreated = GLOBAL_DATE;

		$_SESSION['user_id'] = $Users->signUp($username, $password, $email, $gender, $ip, $is_admin, $datecreated);

		header("Location: ../index.php");
	}