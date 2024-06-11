<?php

require "../db.php";
	$list = array();
	$result = $conn->query("SELECT * from quiz_category");
	if($result){
		while($row = $result->fetch_assoc()){
			$list[] = $row;
		}
		echo json_encode($list);
	}

?>


