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
	if($conn1->connect_error){
		echo "Database Connection Failed!...";
		echo "<br>";
		echo $conn1->connect_error;
	}
	else
	{
		echo "Database Connection Successful!...";
		$sql1 = "insert into user (Username, Password) values ('abc', '123')";
		$stmt1 = $conn1->prepare("insert into user (Username, Password) values (?,?)");
		$stmt1->bind_param("ss", $p1, $p2);
		$p1 = $_POST['Username'];
		$p2 = $_POST['Password'];

		$status = $stmt1->execute();
		if($status)
		{
			echo "Data Inserted Successfully!";
		}
		else
		{
			echo "Failed to insert data.";
			echo "<br>";
			echo $conn1->error;
		}
	}
	
	$conn1->close();
	
	?>
</body>
</html>