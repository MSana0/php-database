<!DOCTYPE html>
<html>
<head>
	<title>PHP-DATABASE</title>
</head>
<body>
	<h1>php-database</h1>
	<?php

	$host = "localhost";
	$Username = "user";
	$Password = "123";
	$dbname = "task";

	echo "Mysqli object-oriented";
	echo "<br>";

	$conn1 = new mysqli($host, $Username, $Password, $dbname);
	$stmt = "select ID, Username, Password from user";
	$res = $conn1->query($stmt);
	//$row = fetch_assoc($res);
	if($row['Username']==$Username && $row['Password']==$Password)
	{
		echo "Login Successful! Welcome ".$row['Username'];
	}
	else
	{
		echo "Failed to login!";
	}
	
	$conn1->close();
	
	?>
</body>
</html>