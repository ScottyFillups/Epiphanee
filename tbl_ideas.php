<?php
	require_once "db_conn.php";
	
	$sql = "CREATE TABLE IF NOT EXISTS ideadata (
				id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				title VARCHAR(80),
				cont TEXT,
				ip VARCHAR(45),
				likes INT UNSIGNED NOT NULL DEFAULT 0,
				dislikes INT UNSIGNED NOT NULL DEFAULT 0,
				date TIMESTAMP
			)";
			
	if ($conn->query($sql)) {
		echo "Ideas table created successfully<br>";
	} else {
		echo $conn->error . "<br>";
	}

	$conn->close();
?>
