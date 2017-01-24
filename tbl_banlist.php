<?php
	require_once "db_conn.php";
	
	$sql = "CREATE TABLE IF NOT EXISTS banlist (
				id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				ip VARCHAR(45),
				level TINYINT UNSIGNED NOT NULL DEFAULT 0
			)";
			
	if ($conn->query($sql)) {
		echo "Banlist table created successfully<br>";
	} else {
		echo $conn->error . "<br>";
	}

	$conn->close();
?>
