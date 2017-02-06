<?php
	$servername = "localhost";
	$username = "epiph_ADMIN";
	$password = "d1s4rr4y1s4v1rus";
	$dbname = "epiph_db";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error . "<br>");
	}
	
	function dispError($conn) {
		echo $conn->error;
		$conn->close();
	}
?>