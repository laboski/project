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
</head>
<body>
	<header style="width: 100%; min-height: 200px; background-color: #245">
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

