<?php 

	session_start();

	require 'App/conn.php';
	require 'controller/threads.php';

	if (!isset($_SESSION['user_id'])) {
		header("Location: signin.php");
	}

	$Threads = new ThreadModule($conn);

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<header style="width: 100%; min-height: 200px; background-color: #245">
		<a href="index.php"><button>Home</button></a><br>
		<a href="user.php"><button>Profile</button></a><br>
		<a href="logout.php"><button>Logout</button></a><br>
	</header><br>
 	<?php 

 		if (isset($_POST['submit'])) {
 			$title = $_POST['title'];
 			$content = $_POST['content'];
 			$user_id = htmlentities($_SESSION['user_id']);
 			$datecreated = date('Y/m/d');

 			$_SESSION['threadid'] = $Threads->createThread($user_id, $title, $content, $datecreated);

 			header("Location: index.php");
 		}


 	 ?>
 	<form action="createthread.php" method="post">
 		<input type="text" name="title" placeholder="Title"><br>
 		<textarea name="content" placeholder="Content goes here"></textarea><br>
 		<input type="submit" name="submit" value="Submit">
 	</form>
 </body>
 </html>