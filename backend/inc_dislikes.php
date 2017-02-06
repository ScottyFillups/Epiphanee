<?php
	require_once("db_conn.php");
	require_once("update_count.php");

	$ip = $_SERVER["REMOTE_ADDR"];
	$id = $conn->real_escape_string($_REQUEST["id"]);		//id is retrieved via js and not mysql table; user could change id of article

	$checkQr = "SELECT 1 FROM userdislikes
				WHERE ip='" . $ip . "'
				AND article_id='" . $id . "'";

	if ($result = $conn->query($checkQr)) {
		if ( $result->fetch_row() ) {
			$updateQr = "UPDATE ideadata
						SET dislikes = dislikes - 1
						WHERE id = " . $id;

			$delQr = "DELETE FROM userdislikes
					 WHERE ip='" . $ip . "'
					 AND article_id='" . $id . "'";

			if ( $conn->query($updateQr) && $conn->query($delQr) ) {
				echo updateCount($conn, "dislikes", $id);
			} else {
				dispError($conn);
			}
		} else {
			$updateQr = "UPDATE ideadata
				SET dislikes = dislikes + 1
				WHERE id = " . $id;

			$insQr = "INSERT INTO userdislikes
					(ip, article_id) VALUES
					('" . $ip . "', '" . $id . "')";

			if ( $conn->query($updateQr) && $conn->query($insQr) ) {
				echo updateCount($conn, "dislikes", $id);
			} else {
				dispError($conn);
			}
		}
	} else {
		dispError($conn);
	}
?>
