<?php
	require_once("db_conn.php");
	
	$ip = $_SERVER["REMOTE_ADDR"];
	$sql = "INSERT INTO users (ip) VALUES ('" . $ip . "')";
	
	if ( $conn->query($sql) ) {
		session_name("activated");
		session_start();
		$_SESSION["activated"] = true;
		header("Location: /");
		die();
	} else {
		echo $conn->error . "<br><br>
							 <h3>Please ignore the preceeding message, that's for our code monkey team.</h3>
							 <p>We'd appreciate if you contact our team of monkeys and told them something is wrong with ins_user.php</p>
							 <p>Contact our monkeys at pscott@zeptohost.com</p>
							 <p>Thank you. You will be redirected to the homepage in 15 seconds.</p>";
		header('Refresh: 15;url=/');
		die();
	}
?>
