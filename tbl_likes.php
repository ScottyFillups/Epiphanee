<?php
	require_once "db_conn.php";
	
	$sql = "CREATE TABLE IF NOT EXISTS userlikes (
				id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				ip VARCHAR(45),
				article_id INT UNSIGNED NOT NULL
			)";
			
	if ($conn->query($sql)) {
		echo "User likes table created successfully<br>";
	} else {
		echo $conn->error . "<br>";
	}

	$conn->close();
?>
