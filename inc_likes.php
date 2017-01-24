<?php 
	if (isset($_GET["activated"]) && $_GET["activated"] == false) {
		header("Location: /activate_p.html");
		die();
	} else {
		require_once "db_conn.php";
		require_once "check_isActivated.php";
		
		if ( !checkActivation($conn) ) {
			echo "activate_l.php";
			die();
		}
	}
	
	require_once("update_count.php");
	
	$ip = $_SERVER["REMOTE_ADDR"];
	$id = $conn->real_escape_string($_REQUEST["id"]);		//id is retrieved via js and not mysql table; user could change id of article
	//select 1 just returns a bunch of 1s... just used for boolean expressions. do not use if you want actually data from table
	$checkQr = "SELECT 1 FROM userlikes
				WHERE ip='" . $ip . "' 
				AND article_id='" . $id . "'";
				
	if ($result = $conn->query($checkQr)) {
		if ( $result->fetch_row() ) {
			$updateQr = "UPDATE ideadata 
						SET likes = likes - 1
						WHERE id = " . $id;
				
			$delQr = "DELETE FROM userlikes
					 WHERE ip='" . $ip . "' 
					 AND article_id='" . $id . "'";
					
			if ( $conn->query($updateQr) && $conn->query($delQr) ) {
				echo updateCount($conn, "likes", $id);
			} else {
				dispError($conn);
			}
		} else {
			$updateQr = "UPDATE ideadata 
				SET likes = likes + 1
				WHERE id = " . $id;
				
			$insQr = "INSERT INTO userlikes
					(ip, article_id) VALUES
					('" . $ip . "', '" . $id . "')";
					
			if ( $conn->query($updateQr) && $conn->query($insQr) ) {
				echo updateCount($conn, "likes", $id);
			} else {
				dispError($conn);
			}
		}
	} else {
		dispError($conn);
	}
?>