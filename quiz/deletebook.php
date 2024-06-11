<?php

require "../db.php";

$id = $_POST['id'];
$result = $conn->query("SELECT * from books where id = '".$id."' ");
$data = mysqli_fetch_array($result);
if ($data['book']) {
	unlink('../uploads/'.$data['book']);
	// echo json_encode(array("msg"=>"success"));
}
$correct =$conn->query("DELETE from books where id ='".$id."' ");
if($correct){
		echo json_encode(array("msg"=>"deleted"));

}



?> 