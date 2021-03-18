<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<form action="model/join.php" method="post">
		<input type="text" name="username" placeholder="Username" required><br>
		<input type="password" name="password" placeholder="Password" required><br>
		<input type="email" name="email" placeholder="Email" required><br>
		<select name="gender">
			<option>M</option>
			<option>F</option>
		</select><br>
		<input type="submit" name="submit" value="Submit"><br>
	</form>
</body>
</html>