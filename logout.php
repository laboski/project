<?php 
	
	session_start();

	function signOut()
	{
		if (isset($_SESSION['user_id'])) {
			unset($_SESSION['user_id']);
			session_destroy();
			header("Location: signin.php");
		}
	}

	signOut();