<?php 


	/**
	 * 
	 */
	class UsersModule
	{

		private $conn;
		
		function __construct($conn)
		{
			$this->conn = $conn;
		}

		public function signUp(string $username, string $password, string $email, string $gender, string $ip, int $is_admin, $datecreated):int
		{
			// query for signup

			$signup = 'INSERT INTO `trendusers`(username, password, email, gender, ip, is_admin, datecreated)VALUES(?,?,?,?,?,?,?)';

			//stmt

			$stmt = $this->conn->prepare($signup);

			$stmt->bind_param('sssssis', $username, $password, $email, $gender, $ip, $is_admin, $datecreated);

			$stmt->execute();

			return $this->conn->insert_id;
		}

		public function signIn(string $email, string $password)
		{
			// query to sign in

			$signin = 'SELECT userid, username FROM trendusers
			 		   WHERE email = ? AND password = ?';

			// stmt

			$stmt = $this->conn->prepare($signin);

			$stmt->bind_param('ss', $email, $password);

			$stmt->execute();

			$result = $stmt->get_result();

			return $result->fetch_assoc();
		}

		public function signOut()
		{
			if (isset($_SESSION['user_id'])) {
				unset($_SESSION['user_id']);
				session_destroy();
				header("Location: signin.php");
			}
		}

		
		public function getUser(int $userid)
		{
			// query

			$username = 'SELECT username, email, gender, datecreated FROM trendusers
			 			 WHERE userid = ?';

			// stmt

			$stmt = $this->conn->prepare($username);

			$stmt->bind_param('i', $userid);

			$stmt->execute();

			$result = $stmt->get_result();

			while ($rows = $result->fetch_assoc()) {
				
				echo '<ul>';	
				echo '<li>';
				echo'Username:';
				echo $rows['username'];
				echo '</li>';
				echo '<li>';
				echo'Email:';
				echo $rows['email'];
				echo '</li>';
				echo '<li>';
				echo'Gender:';
				echo $rows['gender'];
				echo '</li>';
				echo '<li>';
				echo'Joined:';
				echo $rows['datecreated'];
				echo '</li>';
				echo '</ul>';
			}
		}

		public function getUserByUsername(string $username)
		{
			// query

			$username = 'SELECT username, email, gender, datecreated FROM trendusers
			 			 WHERE username = ?';

			// stmt

			$stmt = $this->conn->prepare($username);

			$stmt->bind_param('s', $username);

			$stmt->execute();

			$result = $stmt->get_result();

			return $result->fetch_assoc();
		}


	}