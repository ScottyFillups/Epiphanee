<?php 
	function updateCount($conn, $type, $id) {
		$sql = "SELECT " . $type . " FROM ideadata WHERE id = " . $id;
		if ( $result = $conn->query($sql) ) {
			while ( $row = $result->fetch_assoc() ) {
				return $row[$type];
			}
		} else {
			return $conn->error;
			$conn->close();
		}
	}
?>