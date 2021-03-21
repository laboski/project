<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<style type="text/css">
		
		body{
			background-color: #466;
		}

		input{
			width: 40%;
			margin-right: 30%;
			margin-left: 30%;
			padding: 2em;
			margin-top: 2em;
		}

	</style>
</head>
<body>
	<form action="model/login.php" method="post">
		<input type="email" name="email" placeholder="Email" required><br>
		<input type="password" name="password" placeholder="Password" required><br>
		<input type="submit" name="submit" value="Submit"><br>
	</form>
</body>
</html>