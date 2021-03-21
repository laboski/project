<?php 

	session_start();

	require 'App/conn.php';
	require 'controller/threads.php';
	require 'controller/comments.php';

	$ThreadsModule = new ThreadModule($conn);
	$CommentsModule = new CommentsModule($conn);

	if (isset($_SESSION['user_id']) && isset($_SESSION['threadid'])) {

		$thread = $ThreadsModule->getThreadByThreadId(htmlentities($_SESSION['threadid']));
	}else{
		header("Location: signin.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
		.content{

			display: inline-block;
			width: 50%;
			background-color: #456;
			width: 50%;
			height: auto;
			margin: 2em 25%;
			font-style: italic;
			color: white;
			padding: 1em;
		}

		textarea{
			width: 50%;
			margin: 1em 25%;
			height: 200px;
		}

		input{
			width: 40%;
			margin: 1em 30%;
			padding: 1em;			
		}

		.comments{
			display: inline-block;
			height: auto;
			width: 50%;
			text-align: center;
			background-color: #456;
			margin: 3em 25%;
			padding: 1em;
			font-style: italic;
			font-family: serif;
			font-weight: 50%;
			color: white;
		}

		li{
			list-style-type: none;
		}

	</style>
</head>
<body>
	<header style="width: 100%; min-height: 100px; background-color: #245">
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
		<div class="comments">
			<?php 

			// display comments below

			$threadid = htmlentities($_SESSION['threadid']);

			$CommentsModule->getComments($threadid);			

			?>
		</div>
	</div>
</body>
</html>	