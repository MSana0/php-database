<!DOCTYPE html>
<html>
<head>
	<title>PHP-DATABASE REGISTER</title>
</head>
<body>
	<h1>php-database register</h1>
	<?php
	$host="localhost";
	$user="user";
	$pass="123";
	$dbn="task";
	//$errors=array();
	$db = mysqli_connect($host,$user,$pass,$dbn);
	if (mysqli_connect_error()) {
		echo "Database Connection Failed!...";
		echo "<br>";
		echo mysqli_connect_error();
	}
	else
	{
		if (isset($_POST['register'])) {
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password_1 = $_POST['password_1'];
			$password_2 = $_POST['password_2'];
			if (empty($username)) {
				echo "please provide username.";//array_push($errors, "Username is required");
			}
			echo "<br>";
			if (empty($email)) {
				echo "please provide email.";//array_push($errors, "Email is required");
			}
			echo "<br>";
			if (empty($password_1)) {
				echo "please provide password.";//array_push($errors, "Password is required");
			}
			echo "<br>";
			if ($password_1!=$password_2) {
				echo "passwords do not match.";//array_push($errors, "Passwords do not match");
			}
			echo "<br>";
			$password=md5($password_1); //encrypting password
			$stmt = mysqli_prepare($db, "insert into user (username, email, password) value ('$username','$email','$password')");
			if(mysqli_stmt_execute($stmt))
			{
				echo "Welcome $username.";
			}
			else
			{
				echo "failed to insert data.";
			}
			/*if(count($errors)==0)
			{
				$password=md5($password_1); //encrypting password
				$sql = "INSERT INTO user (username, email, password) VALUES('$username','$email','$password')";
				mysqli_query($db, $sql);

			}*/
		}
	}
	mysqli_close($db);
	?>
</body>
</html>