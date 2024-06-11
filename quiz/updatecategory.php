<?php

require "../db.php";

$id = $_POST['id'];
$category = $_POST['category'];

$sql = "UPDATE quiz_category SET category = '" . $category . "' WHERE id = '" . $id . "'";
$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo json_encode(array("status" => "fail", "message" => mysqli_error($conn)));
} else {
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected > 0) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "fail", "message" => "No rows were updated. ID not found."));
    }
}


?>