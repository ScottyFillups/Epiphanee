<?php
	require_once "db_conn.php";
	require_once "check_isBanned.php";
	
	$ip = $_SERVER["REMOTE_ADDR"];

	if ( isBanned($conn, $ip) ) {
		header("Location: /banned.html");
		die();
	}

	$title =  trim($_REQUEST["title"]);
	$cont = trim($_REQUEST["cont"]);

	if ( !($title || $cont) ) {
		echo "<h4 class='title'>Hello! Your submission didn't go through because:</h4>
			  <ul>
				  <li>You're a total hipster that uses safari and didn't fill out our form (you're probably vegan too)</li>
				  <li>You thought you were smart and typed in a bunch of spaces. Sorry fam, but I'm smarter <3</li>
				  <li><del>You're a legacy browser user, is anyone still out there using Windows 2000? :D</del></li>
			  </ul>
			  <p>Please try to fill out the form completely. Thanks! <333333</p>
			  <small>This page will redirect you back to the homepage in 15 seconds</small>";
		header('Refresh: 15;url=/');
		die();
	}

	$badWords = array("fuck", "shit", "asshole", "cunt", "fag", "fgt", "fuk", "fck", "fcuk", "assfuck", "assfucker", "fucker", "ass", "jizz", "fukking", "fcking", "fcuking", "shet",
					"motherfucker", "ass", "asscock", "asshead", "asslicker", "asslick", "assnigger", "nigger", "asssucker", "bastard", "betch", "bitchtits", "fuking",
					"bitches", "bitch", "brotherfucker", "bullshit", "bumblefuck", "buttfucka", "fucka", "buttfucker", "buttfucka", "cum", "cumming", "cumshot", "shitty", "shity", "fucking",
					"fagbag", "fagfucker", "faggit", "faggot", "faggotcock", "fagtard", "fatass", "fuckoff", "fuckstick", "fucktard", "fuckwad", "fuckwit", "fagit", "faget", "fagget", "dick",
					"dickfuck", "dickhead", "dickjuice", "dickmilk", "dik", "doochbag", "douchebag", "douche", "dickweed", "dyke", "dumbass", "dumass",
					"fuckboy", "fuckbag", "gayass", "gayfuck", "gaylord", "gaytard", "nigga", "niggers", "niglet", "paki", "piss", "prick", "pussy",
					"poontang", "poonany", "porchmonkey", "porch monkey", "poon", "queer", "queerbait", "queerhole", "queef", "renob", "rimjob", "ruski",
					"sandnigger", "sand nigger", "schlong", "shitass", "shitbag", "shitbagger", "shitbreath", "chinc", "carpetmuncher", "chink", "choad", "clitface",
					"clusterfuck", "cockass", "cockbite", "cockface", "skank", "skeet", "skullfuck", "slut", "slutbag", "sloot", "splooge", "twatlips", "twat",
					"twats", "twatwaffle", "vaj", "vajayjay", "va-j-j", "wank", "wankjob", "wetback", "whore", "whorebag", "whoreface");

	$title = " " . $title . " ";	//adds a space at the front for profanity filter
	$cont = " " . $cont . " ";

	for ($i = 0; $i < count($badWords); $i++) {
		$badWords[$i] = " " . $badWords[$i] . " ";		//Adds spaces on the sides of the array terms to ensure that it doesn't filter something like "sass"
		if ( stristr($title, $badWords[$i]) || stristr($cont, $badWords[$i]) ) {

			require_once("ban_user.php");
			$level = banUser($conn, $ip);
			if ($level < 3) {
				echo "<h3 class='title'>YOOO</h3>
					  <p>Hey, why did you try to post that? C'mon, please don't post that stuff here :l</p>
					  <p>We've logged your IP address in our database. If you do this <b>" . (3 - $level) . "</b> more time(s), we will ban you.</p>
					  <small>This page will redirect you back to the homepage in 15 seconds</small>";
				header('Refresh: 15;url=/');
				die();
			} else {
				header("Location: /banned.html");
				die();
			}
		}
	}

	$title = substr($title, 1, -1);
	$cont = substr($cont, 1, -1);

	$title = $conn->real_escape_string($title);
	$cont = $conn->real_escape_string($cont);
	$ip = $conn->real_escape_string($ip);

	$sql = "INSERT INTO ideadata (
				title,
				cont,
				ip
			) VALUES (
				'" . $title . "',
				'" . $cont . "',
				'" . $ip . "'
			)";

	if ( $conn->query($sql) ) {
		header("Location: /#posts");
		die();
	} else {
		echo $conn->error;
	}
	$conn->close();
?>
