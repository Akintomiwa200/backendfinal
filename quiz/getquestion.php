<?php
require "../db.php";

$categoryid = $_POST['cos_id'];


$check = "SELECT * from quiz_question where category = '".$categoryid."' ";
$checkQuestion = mysqli_query($conn, $check);
$questionlist = array();

if ($checkQuestion) {
    $questionlist = array();
    while($row = mysqli_fetch_assoc($checkQuestion)){
        $questionlist[] = $row;
    }
    echo json_encode(array("status" => "success", "questions" => $questionlist));
} else {
    echo json_encode(array("status" => "fail"));
}



