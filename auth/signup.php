<?php
require "../db.php";

$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * from stu_login where email = '".$email."' ";
$query = mysqli_query($conn, $sql);
$userdata = array();

$count =mysqli_num_rows($query);
if($count >= 1){
	echo json_encode(array("status"=>"email_exist"));
}else{
	$insert = "INSERT into stu_login (username, fullname, email, password) values ('".$username."', '".$fullname."', '".$email."', '".$password."')";
	$result =mysqli_query($conn, $insert);
	if($result){
		$sql = "SELECT * from stu_login where email= '".$email."' ";
		$query = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($query);
		$userdata = $data;
		echo json_encode(array("status" => "success", "user_data" => $data));

	}
	
}


?>

