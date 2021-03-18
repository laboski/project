<?php 


	/**
	 * 
	 */
	class CommentsModule
	{
		
		private $conn;

		function __construct($conn)
		{
			$this->conn = $conn;
		}

		public function createComment(int $threadid, string $username, string $comment, $datecreated)
		{
			// query to create comment

			$createcomment = 'INSERT INTO `trendscomments`(threadid, username, comment, datecreated)VALUES(?,?,?,?)';

			// stmt

			$stmt = $this->conn->prepare($createcomment);
				
			$stmt->bind_param('isss', $threadid, $username, $comment, $datecreated);

			$stmt->execute();	
			
		}

		public function getComments(int $threadid)
		{
			// comments 

			$comments = 'SELECT  comment FROM trendscomments WHERE threadid = ? ORDER BY comment ASC ';

			// stmt 

			$stmt = $this->conn->prepare($comments);
				
			$stmt->bind_param('i', $threadid);

			$stmt->execute();

			$result = $stmt->get_result();

			while($comments = $result->fetch_assoc()) {
				
				echo'<ul>';

				echo '<li>';

				echo htmlentities($comments['comment']);

				echo '<br>';

				echo 'By: '. htmlentities($_SESSION['username']);

				echo '</li>';

				echo '</ul>';
			}
			
		}
	}