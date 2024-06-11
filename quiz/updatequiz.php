<?php

require "../db.php";

$id = $_POST['id'];
$question = $_POST['question'];
$optiona = $_POST['optiona'];
$optionb = $_POST['optionb'];
$optionc = $_POST['optionc'];
$optiond = $_POST['optiond'];
$answer = $_POST['answer'];
$category = $_POST['category'];

$sql = "UPDATE quiz_question SET category = '" . $category . "', optiona = '" . $optiona . "',optionb = '" . $optionb . "',optionc = '" . $optionc . "',optiond = '" . $optiond . "', question = '" . $question . "',answer = '" . $answer . "'  WHERE id = '" . $id . "'";
$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo json_encode(array("status" => "fail", "message" => mysqli_error($conn)));
} else {
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected > 0) {
        echo json_encode(array("status" => "update successfully"));
    } else {
        echo json_encode(array("status" => "fail", "message" => "No rows were updated. ID not found."));
    }
}


?>