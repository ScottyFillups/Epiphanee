<?php
	function isBanned($conn, $ip) {
		$checkQr = "SELECT level FROM banlist
					WHERE ip='" . $ip . "'";
		
		if ( $result = $conn->query($checkQr) ) {
			if ( $row = $result->fetch_assoc() ) {
				if ( $row["level"] < 3 ) {
					return false;
				} else {
					return true;
				}
			}
			//do not do an else{$conn->close()} here... the if will return false if the user doesn't have a userban record...
		} else {
			echo $conn->error;
			$conn->close();
		}
	}
?>
