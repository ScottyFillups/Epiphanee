<!DOCTYPE html>
<html>
	<head>
		<title>Epiphanee.org | Eureka!</title>
		<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
		<link rel="icon" type="image/png" href="icons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="icons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="icons/manifest.json">
		<link rel="mask-icon" href="icons/safari-pinned-tab.svg" color="#333333">
		<link rel="shortcut icon" href="icons/favicon.ico">
		<meta name="msapplication-config" content="icons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="/main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<main class="container">
			<header id="top">
				<h1 class="green">A summary...</h1>
				<h2 class="greenbox">We want you to understand what you agree to</h2>
				<p>
					By using our site, you agree to our <a href="disclaimer.php">Website Disclaimer</a>. By posting, upvoting or downvoting any 
					content on our site, you also agree to our <a href="privacy.php">Privacy Policy</a>. You will be prompted to accept our privacy policy
					when you attempt to do any of the preceding actions. In short, you must be aware that:
				</p>
			</header>
			<?php require_once "summaryContent.php" ?>
			<h4 class="greenbox">
				Seems simple enough right? There's a link to the homepage in the footer.
			</h4>
		</main>
		<?php require_once "footer.php" ?>
	</body>
</html>