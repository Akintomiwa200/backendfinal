<?php

require "../db.php";

$id = $_POST['id'];
// $result = $conn->query("SELECT * from quiz_category where id = '".$id."' ");


$del = "DELETE  from  quiz_category where id ='".$id."' ";
$delete = mysqli_query($conn, $del);
if ($delete) {
	echo json_encode(array("status"=>"Deleted"));
}else {
	echo json_encode(array("status" => "fail", "message" => mysqli_error($conn)));
}



?> 