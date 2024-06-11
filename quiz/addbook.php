
<?php

require "../db.php";

$title = $_POST['title'];
$category = $_POST['category'];
$book = $_FILES['book']['name'];
$bookPath = "../uploads/".$book;

$tmp_name = $_FILES['book']['tmp_name'];
move_uploaded_file($tmp_name, $bookPath);
$bookFileType = pathinfo($book,PATHINFO_EXTENSION);
	$insert = "INSERT into books (title, book,category) values ('".$title."', '".$book."','".$category."')";
	$result =mysqli_query($conn, $insert);
	if($bookFileType !="pdf"){
		echo json_encode(array("status"=>"File Not pdf"));
	}
	elseif($result){
		echo json_encode(array("status"=>"Book Added Successfully"));
	}else{
		echo json_encode(array("status"=>"Error"));
	}
	

?>