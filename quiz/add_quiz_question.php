<?php
require "../db.php";

$question = $_POST['question'];
$optiona = $_POST['optiona'];
$optionb = $_POST['optionb'];
$optionc = $_POST['optionc'];
$optiond = $_POST['optiond'];
$answer = $_POST['answer'];
$category = $_POST['category'];
if (is_array($question)) {

for ($i = 0; $i < count($question); $i++) {
    $question = mysqli_real_escape_string($conn, $questions[$i]);
    $optiona = mysqli_real_escape_string($conn, $optiona[$i]);
    $optionb = mysqli_real_escape_string($conn, $optionb[$i]);
    $optionc = mysqli_real_escape_string($conn, $optionc[$i]);
    $optiond = mysqli_real_escape_string($conn, $optiond[$i]);
    $answer = mysqli_real_escape_string($conn, $answer[$i]);
    $category = mysqli_real_escape_string($conn, $category[$i]);

    $insert = "INSERT INTO quiz_question (question, optiona, optionb, optionc, optiond, answer, category) VALUES ('$question', '$optiona', '$optionb', '$optionc', '$optiond', '$answer', '$category')";
    $result = mysqli_query($conn, $insert);

    if ($result) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "Error"));
    }
}
}
?>
