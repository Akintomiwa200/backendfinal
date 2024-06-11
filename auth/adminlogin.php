<?php
require "../db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * from admin_login where email = '".$email."' && password = '".$password."'";
$query = mysqli_query($conn, $sql);
$userdata = array();

$count =mysqli_num_rows($query);
$data = mysqli_fetch_array($query);
if($count >= 1){
	$userdata = $data;
	echo json_encode(array("status"=>"login_successfull", "user_data" => $data));
}else{
	echo json_encode(array("status"=>"login fail", ));
	}

?>


