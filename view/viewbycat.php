<?php

require "../db.php";

	$cat = $_POST['cat'];
	$list = array();
	$result = $conn->query("SELECT * from quiz_category where category = '".$cat."' ");
	if($result){
		while($row = $result->fetch_assoc()){
			$list[] = $row;
		}
		echo json_encode($list);
	}

?>
