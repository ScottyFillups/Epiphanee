<!DOCTYPE html>
<html>
	<head>
		<title>Epiphanee.org | Eureka!</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="error.css">
	</head>
	<body>
		<main class="container">
			<?php
				if ( isset($_POST['g-recaptcha-response']) ) {
					$url = "https://www.google.com/recaptcha/api/siteverify";
					//$privateKey = "6LftFiQTAAAAAD_9tcta-ocMa_H02lGhgIrsCA7N"; local
					$privateKey = "6LdizyMTAAAAAP3VIDTcb4f56XSFx-5Wu5x42ft7";
					$recapResponse = $_POST["g-recaptcha-response"];
					$ip = $_SERVER["REMOTE_ADDR"];
					
					$response = file_get_contents($url."?secret=".$privateKey."&response=".$recapResponse."&remoteip=".$ip);
					$data = json_decode($response);
					
					if ( isset($data->success) && $data->success ) {
						if (isset($_GET["activated"]) && $_GET["activated"] == false) {
							$status = "?activated=false";
						} else {
							$status = "";
						}
						//local require_once "/php/ins_idea.php" . $status; 
						require_once "/home/epiph/public_html/php/ins_idea.php";
					} else {
						echo "<h3 class='title'>Oops!</h3>
							  <p>You failed the reCaptcha. It's fine, we all mess up sometimes <3</p>
							  <small>This page will redirect you back to the homepage in 10 seconds.</small>";
						header('Refresh: 10;url=/');
						die();
					}
				}
			?>
		</main>
	</body>
</html>
