<?php
require "../db.php";


$check = "SELECT * from books ";
$checkBook = mysqli_query($conn, $check);
$booklist = array();

if ($checkBook) {
	while($row=mysqli_fetch_assoc($checkBook)){
		$booklist[] =$row;
	}
	echo json_encode($booklist);
}


