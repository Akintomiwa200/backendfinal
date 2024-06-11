<?php
require "../db.php";

$userID = $_POST['userid'];
$cosID = $_POST['cos_id'];
$myusername = $_POST['myusername'];



$check = "SELECT * FROM answers WHERE user_id = '$userID' AND cos_id = '$cosID'";
$checkResult = mysqli_query($conn, $check);
$list = array();

if ($checkResult) {
    while ($row = mysqli_fetch_assoc($checkResult)) {
        $list[] = $row;
    }
}

if (!empty($list)) {
    $totalQuestions = count($list);
    $correctAnswers = 0;

    foreach ($list as $answer) {
        if ($answer['real_answer'] === $answer['selected_answer']) {
            $correctAnswers++;
        }
    }

    $percentage = ($correctAnswers / $totalQuestions) * 100;

    $point = $percentage * 1000;

    // Insert data into the leaderboard table
    $insertQuery = "INSERT INTO leaderboard (userID, cosId, percentage, point, username) VALUES ('$userID', '$cosID', '$percentage', '$point', '$myusername')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        echo json_encode(array("status" => "success", "data" => $list, "percentage" => $percentage, "point" => $point));
    } else {
        echo json_encode(array("status" => "fail", "message" => "Error inserting into leaderboard table"));
    }
} else {
    echo json_encode(array("status" => "fail", "message" => "No data to calculate percentage and point"));
}
?>
