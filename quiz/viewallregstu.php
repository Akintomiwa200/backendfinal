<?php
require "../db.php";


$check = "SELECT * from stu_login ";
$checkStudent = mysqli_query($conn, $check);
$studentlist = array();

if ($checkStudent) {
	while($row=mysqli_fetch_assoc($checkStudent)){
		$studentlist[] =$row;
	}
	echo json_encode($studentlist);
}


