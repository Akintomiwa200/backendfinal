<?php
require "../db.php";

$ourcosid = $_POST['ourcosid'];

$check = "SELECT * from leaderboard where  cosId ='$ourcosid' order by point desc ";
$checkResult = mysqli_query($conn, $check);
$leaderboardList = array();

if ($checkResult) {
	while($row=mysqli_fetch_assoc($checkResult)){
		$leaderboardList[] =$row;
	}
	    echo json_encode(array("status" => "success", "data"=> $leaderboardList  ));

}

?>
