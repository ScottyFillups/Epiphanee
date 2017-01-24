<?php 
	require_once("db_conn.php");
	
	$sortType = $_REQUEST["sortType"];
	
	switch($sortType) {
		case "recent":
			$sql = "SELECT id, title, cont, likes, dislikes FROM ideadata ORDER BY id";
			break;
		case "likes":
			$sql = "SELECT id, title, cont, likes, dislikes FROM ideadata ORDER BY likes";
			break;
		case "dislikes":
			$sql = "SELECT id, title, cont, likes, dislikes FROM ideadata ORDER BY dislikes";
			break;
		default:
			$sql = "SELECT id, title, cont, likes, dislikes FROM ideadata ORDER BY id";
			break;
	}
	
	if ( $result = $conn->query($sql) ) {
		$idArr = array();
		$titleArr = array();
		$contArr = array();
		$likesArr = array();
		$dislikesArr = array();
		
		while ( $row = $result->fetch_assoc() ) {
			$idArr[] = $row["id"];
			$titleArr[] = $row["title"];
			$contArr[] = $row["cont"];
			$likesArr[] = $row["likes"];	
			$dislikesArr[] = $row["dislikes"];				
		}

		if (count($contArr) === 0) {
			echo "<p>Oh dear, there doesn't seem to be any ideas... Would you kindly submit one? ;)";
		}
		
		for ($i = count($contArr) - 1; $i >= 0 ; $i--) {
			$titleArr[$i] = htmlspecialchars($titleArr[$i]);
			$contArr[$i] = htmlspecialchars($contArr[$i]);
			
			echo "<article id='" . $idArr[$i] . "'>
					 <h4>" . $titleArr[$i] . "</h4>
					 <div class='content'>
						 <button type='button' class='btn btn-pink likes'>
							<span class='glyphicon glyphicon-thumbs-up'></span>
							<span class='badge'>" . $likesArr[$i] . "</span>
						 </button>
						 <button type='button' class='btn btn-pink dislikes'>
							<span class='glyphicon glyphicon-thumbs-down'></span>
							<span class='badge'>" . $dislikesArr[$i] . "</span>
						 </button>
						 <button type='button' class='btn btn-pink report'>
							<span class='glyphicon glyphicon-flag'></span>
						 </button>
						 <p>" . $contArr[$i] . "</p>
					 </div>
				 </article>";
		}
		
		$conn->close();
	} else {
		echo $conn->error;
		$conn->close();
	}
?>