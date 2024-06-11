<?php
require "../db.php";

$category = $_POST['category'];

$check = "SELECT * from quiz_category where category = '$category' ";
$checkResult = mysqli_query($conn, $check);

if (mysqli_num_rows($checkResult) >= 1) {
    echo json_encode(array("status" => "category_exist"));
} else {
    $insert = "INSERT into quiz_category (category) values ('$category')";
    $result = mysqli_query($conn, $insert);

    if ($result) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "Error"));
    }
}
?>
