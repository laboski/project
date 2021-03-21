<?php  


	/**
	 * 
	 */
	class ThreadModule
	{

		private $conn;
		
		function __construct($conn)
		{
			$this->conn = $conn;
		}

		public function createThread(int $userid, string $title, string $content, $datecreated)
		{
			// query for create thread


			$createthread = 'INSERT INTO `trendsthreads`(userid, title, content, datecreated) VALUES(?,?,?,?)';

			//stmt

			$stmt = $this->conn->prepare($createthread);
			
			$stmt->bind_param('isss', $userid, $title, $content, $datecreated);

			$stmt->execute();

			return $this->conn->insert_id;

		}

		public function getThreadByThreadId($threadid)
		{
			// query to get thread by id

			$getthreadbythreadid = 'SELECT * FROM `trendsthreads` WHERE threadid = ?';

			// stmt

			$stmt = $this->conn->prepare($getthreadbythreadid);

			$stmt->bind_param('i', $threadid);

			$stmt->execute();

			$result = $stmt->get_result();

			return $result->fetch_assoc();
		 
		}

		public function getThreads()
		{
			// query to get thread by id

			$getthreadbythreadid = 'SELECT * FROM `trendsthreads` ORDER BY title ASC';

			// query

			$result = $this->conn->query($getthreadbythreadid);

			while ($threads = $result->fetch_assoc()) {

				// get thread id

				$_SESSION['threadid'] = $threads['threadid'];
			 	
			 	echo '<ul>';
				echo "<a href='thread.php'>";	
				echo '<li>';
				echo $threads['title'];
				echo '</li>';
				echo '</a>';
				echo '</ul>';

			}
		}



		public function getThreadByUserId(int $userid)
		{
			// query to get user thread

			$getUsersthread = 'SELECT title FROM trendsthreads WHERE userid = ?';

			// stmt

			$stmt = $this->conn->prepare($getUsersthread);

			$stmt->bind_param('i', $userid);

			$stmt->execute();

			$result = $stmt->get_result();
			
			while ($threads = $result->fetch_assoc()) {
				echo '<ul>';
				echo "<a href='thread.php'>";	
				echo '<li>';
				echo $threads['title'];
				echo '</li>';
				echo '</a>';
				echo '</ul>';
			}
			
			
		}

		
	}