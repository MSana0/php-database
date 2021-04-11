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
	session_start();
	
	$db = mysqli_connect($host, $Username, $Password, $dbname);
	$sql = "select * from user where Username =='$Username'and Password =='$Password'";
	$res = $db->query($sql);
	$row = $res->mysqli_fetch_assoc($res);
	if($row['Username']==$Username && $row['Password']==$Password)
	{
		echo "Login Successful! Welcome ".$row['Username'];
	}
	else
	{
		echo "Failed to login!";
	}
	
	$db->close();
	
	?>
</body>
</html>