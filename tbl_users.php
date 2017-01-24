<?php
	require_once "db_conn.php";
	
	$sql = "CREATE TABLE IF NOT EXISTS users (
				id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				ip VARCHAR(45)
			)";
			
	if ($conn->query($sql)) {
		echo "Users table created successfully<br>";
	} else {
		echo $conn->error . "<br>";
	}

	$conn->close();
?>
