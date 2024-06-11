<?php
require "../db.php";


$check = "SELECT * from quiz_category ";
$checkResult = mysqli_query($conn, $check);
$categorylist = array();

if ($checkResult) {
	while($row=mysqli_fetch_assoc($checkResult)){
		$categorylist[] =$row;
	}
	echo json_encode($categorylist);
}


