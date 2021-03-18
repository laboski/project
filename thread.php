<?php 

	session_start();

	require 'App/conn.php';
	require 'controller/threads.php';
	require 'controller/comments.php';

	$ThreadsModule = new ThreadModule($conn);
	$CommentsModule = new CommentsModule($conn);

	if (isset($_SESSION['user_id']) && isset($_SESSION['threadid'])) {

		$thread = $ThreadsModule->getThreadByThreadId($_SESSION['threadid']);
	}else{
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
		<a href="index.php"><button>Home</button></a><br>
		<a href="logout.php"><button>Logout</button></a><br>
	</header><br>
	<div class="content">
		<?= htmlentities($thread['content']) ?>
	</div>
	<div>
		<?php 

			// form action


			if (isset($_POST['submit'])) {

				$threadid = htmlentities($_SESSION['threadid']);

				$username  = htmlentities($_SESSION['username']);

				$comment  = htmlentities($_POST['comment']);

				$datecreated = GLOBAL_DATE;

				$CommentsModule->createComment($threadid, $username, $comment, $datecreated);
			}

		 ?>
		<form action="thread.php" method="post">
			<textarea name="comment"></textarea><br>
			<input type="submit" name="submit" value="submit">
		</form>
		<div>
			<?php 

			// display comments below

			$threadid = htmlentities($_SESSION['threadid']);

			$CommentsModule->getComments($threadid);			

			?>
		</div>
	</div>
</body>
</html>