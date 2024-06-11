<?php
require "../db.php"; 

// Decode the JSON data received from Flutter
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['answers'])) {
    $answers = $data['answers'];     

    $stmt = $conn->prepare("INSERT INTO answers (question_id, selected_answer, real_answer, category, cos_id, user_id) VALUES (?, ?, ?, ?, ?, ?)");

    foreach ($answers as $answer) {
        $stmt->bind_param("ssssss", $answer[0], $answer[1], $answer[2], $answer[3], $answer[4], $answer[5]);
        $stmt->execute();
    }

    $stmt->close();
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "fail", "message" => "Invalid data"]);
}
?>
