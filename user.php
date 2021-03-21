<?php 

	// session start
	
	session_start();

	// get the required files

	require 'App/conn.php';
	require 'controller/users.php';
	require 'controller/threads.php';

	// check session variables

	if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
		
		// class instance

		$UsersModule = new UsersModule($conn);
		$ThreadModule = new ThreadModule($conn);
	}else{
		header("Location: signin.php");
	}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 		
 		a{
 			text-decoration: none;
 		}

 		li{
 			text-align: center;
 			width: 50%;
 			margin: 2em 25%;
 			list-style-type: none;
 			background-color: grey;
 			color: white;
 		}

 	</style>
 </head>
 <body>

 	<header style="width: 100%; min-height: 200px; background-color: #245">
		<a href="index.php"><button>Home</button></a><br>
		<a href="createthread.php"><button>Create Thread</button></a><br>
		<a href="logout.php"><button>Logout</button></a><br>
		</header><br>
 	<?php 

 		// display user details

 		$UsersModule->getUser(htmlentities($_SESSION['user_id']));

 		$ThreadModule->getThreadByUserId(htmlentities($_SESSION['user_id']));
 	 ?>
 </body>
 </html>