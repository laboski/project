<?php 
	session_start();

	require 'App/conn.php';
	require 'controller/threads.php';
	require 'controller/users.php';	

	if (!isset($_SESSION['user_id'])) {
		header("Location: signin.php");
	}		

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
		div{
			 display: inline-block;
			 background-color: #456;
			 width: 50%;
			 height: auto;
			 margin: 2em 25%;
		}

		a{
			text-decoration: none;
		}

		li{
			color: white;
			font-style: italic;
			padding: 1em;
		}

	</style>
</head>
<body>
	<header style="width: 100%; min-height: 100px; background-color: #245">
		<a href="user.php"><button>Profile</button></a><br>
		<a href="createthread.php"><button>Create Thread</button></a><br>
		<a href="logout.php"><button>Logout</button></a><br><br>
	</header><br>
	<div>
		<?php 

		$Threads = new ThreadModule($conn);

		$Threads->getThreads();
	 	?>
	 	
	 </div>
</body>
</html>

