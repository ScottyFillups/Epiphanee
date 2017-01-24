<?php
	if (isset($_GET["activated"]) && $_GET["activated"] === false) {
		$status = "?activated=false";
	} else {
		$status = "";
	}
?>

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
			<header id="top" class="botSpacing">
				<img class="img-responsive" src="logo.png">
				<h1 class="green">Epiphanee</h1>
				<h2 class="greenbox">Everything starts with an idea</h2>
				<p>
					Throughout the course of your life, you will eventually have a "Eureka!" moment. 
					Alas, most of the time these brilliant ideas are cast aside because you may not have the skill or the time required to pursue it.
					Our goal is to not let these ideas go to waste: <i>imagine a place where one can go to seek or share innovative ideas without constraint.</i>
				</p>
				<h4 class="greenbox"><b>That place is here</b></h4>
				<h3 class="pinkbox">The purpose of this site is to allow people to share their ideas, their <del>conspiracy</del> theories, <i>their brilliance</i> with the world.</h3>
				<p>Be warned, once you submit an idea on this site, it belongs to everyone. So please, do not post anything which you eventually want to pursue.</p>
				<h5 class="pinkbox"><b>
					By using this site, you agree to our Website Disclaimer and possibly our Privacy Policy. We highly recommend you read
					our <a href="summary.php">Policy Summary</a> for a brief explanation of what you're agreeing to.
				</b></h5>
			</header>
			<form action="submit.php<?php echo $status ?>" method="post">
				<input type="text" name="title" maxlength="80" placeholder="Enter a name for your idea" required><br>
				<textarea name="cont" maxlength="65535" placeholder="Provide a thorough explanation of your idea" required></textarea><br>
				<div class="recaptcha">
					<!--<div class="g-recaptcha" data-sitekey="6LftFiQTAAAAAI4UlxtMBhrr2bXdox0JkjadRhPN"></div>-->
					<div class="g-recaptcha" data-sitekey="6LdizyMTAAAAABizu4cI62AIk7X5OGvpOai4mjJT"></div>
				</div>
				<input id="submitIdea" name="submitIdea" type="submit" value="Submit">
				<div id="modalCaptcha" class="modal fade" role="dialog">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Oops!</h4>
					  </div>
					  <div class="modal-body">
						<p>You didn't fill out the reCaptcha. Please fill it out to submit your idea :)</p>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>
				  </div>
				</div>
			</form>
			<section id="desc">
				<h2 class="pink">Ideas and theories and schemes! Oh my!</h2>
				<h4 class="pink">Click on a box to expand it</h4>
				<p class="bottomSpace"><small>If you want to copy something, select whatever you want then press Ctrl+C before lifting up the left mouse button</small></p>
				<h3 class="pink">Sort by:</h3>
				<div id="sorts">
					<button type="button" class="btn btn-pink sortRecent active">
						<span class="glyphicon glyphicon-calendar"></span>
						Most Recent
					 </button>
					 <button type="button" class="btn btn-pink sortLikes">
						<span class="glyphicon glyphicon-thumbs-up"></span>
						Most Upvotes
					 </button>
					 <button type="button" class="btn btn-pink sortDislikes">
						<span class="glyphicon glyphicon-thumbs-down"></span>
						Most Downvotes
					 </button>
				</div>
			</section>
			<section id="posts">
				<?php require_once "/home/epiph/public_html/php/disp_idea.php" ?>
				<!--php require_once "/php/disp_idea_recent.php" local-->
			</section>
		</main>
		<?php require_once "footer.php" ?>
	</body>
</html>