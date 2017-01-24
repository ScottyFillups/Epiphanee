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
				<h1 class="green">Eureka!</h1>
				<h2 class="greenbox">We're humbled by your decision to submit an idea</h2>
				<p>
					Since this is your first time posting, you must first accept our <a href="privacy.html">Privacy Policy</a>
					before you can post anything. In short, you must be aware that:
				</p>
			</header>
			<?php require_once "summaryContent.php" ?>
			<section id="agree">
				<h3 class="pinkbox">
					By clicking "I Agree", you agree to our <a href="privacy.html">Privacy Policy</a> and 
					acknowledge that we will store your IP address.
				</h3>
				<h4 class="greenbox">
					Remember, you can still browse ideas without agreeing to our privacy policy. That means we won't store your IP address or use cookies.
					Keep in mind that by using this site you still agree to our <a href="disclaimer.html">Website Disclaimer</a>.
				</h4>
				<form action="activate.php">
					<input id="activate" class="pinkSubmit" name="activate" type="submit" value="I Agree">
					<button class="pinkSubmit" type="button" id="decline">I Decline</button>
				</form>
			</section>
		</main>
		<footer>
			<p>
				<a href="/"><span class="glyphicon glyphicon-home"></span> Home</a>
				<a href="#top"><span class="glyphicon glyphicon-arrow-up"></span> Top</a>
				<a href="aboutus.html"><span class="glyphicon glyphicon-user"></span> About Us</a>
				<a href="disclaimer.html"><span class="glyphicon glyphicon-exclamation-sign"></span> Website Disclaimer</a>
				<a href="privacy.html"><span class="glyphicon glyphicon-eye-open"></span> Privacy Policy</a>
			</p>
			<small>Copyright Epiphanee.org 2016<small>
		</footer>
	</body>
</html>