<?php
	function banUser($conn, $ip) {
		$checkQr = "SELECT level FROM banlist
					WHERE ip='" . $ip . "'";
		
		if ( $result = $conn->query($checkQr) ) {
			if ( $row = $result->fetch_assoc() ) {
				$updateQr = "UPDATE banlist 
							SET level = level + 1
							WHERE ip = '" . $ip . "'";
				//the query does not take into affect when the return statement is called, hence the +1
				if ( $conn->query($updateQr) ) {
					return ($row["level"] + 1);
				} else {
					echo $conn->error;
					$conn->close();
				}
			} else {
				$updateQr = "INSERT INTO banlist (ip, level) VALUES ('" . $ip . "', '1')";
				if ( $conn->query($updateQr) ) {
					return "1";
				} else {
					echo $conn->error;
					$conn->close();
				}
			}
		} else {
			echo $conn->error;
			$conn->close();
		}
	}
?>
