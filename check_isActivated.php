<?php	
	function checkActivation($conn) {
		session_name("activated");
		session_start();
		
		if ( isset($_SESSION["activated"]) ) {
			return true;
		} else {
			$ip = $_SERVER["REMOTE_ADDR"];
			$checkQr = "SELECT ip FROM users
						WHERE ip='" . $ip . "'";
			
			if ( $result = $conn->query($checkQr) ) {
				if ( $result->fetch_row() ) {
					$_SESSION["activated"] = true;
					return true;
				} else {
					return false;
				}
				//do not do an else{$conn->close()} here... the if will return false if the user doesn't have a userban record...
			} else {
				echo $conn->error;
				$conn->close();
			}
		}
	}
?>
