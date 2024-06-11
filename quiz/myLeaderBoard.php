<?php
require "../db.php";

$userid = $_POST['userid'];
$cosid = $_POST['cosid'];

$check = "SELECT * from leaderboard where userID = '$userid' and cosId ='$cosid' ";
$checkResult = mysqli_query($conn, $check);
$leaderboardList = array();

if ($checkResult) {
	while($row=mysqli_fetch_assoc($checkResult)){
		$leaderboardList[] =$row;
	}
	    echo json_encode(array("status" => "success", "data"=> $leaderboardList  ));

}

?>
