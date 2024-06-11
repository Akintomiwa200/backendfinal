<?php

require "../db.php";

$id = $_POST['id'];
$category = $_POST['category'];
$book = $_FILES['book']['name'];
$bookPath = "../uploads/" . $book;
$bookFileType = pathinfo($book, PATHINFO_EXTENSION);

$tmp_name = $_FILES['book']['tmp_name'];
move_uploaded_file($tmp_name, $bookPath);

$sql = "UPDATE books SET category = '" . $category . "', book = '" . $book . "' WHERE id = '" . $id . "'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo json_encode(array("status" => "Update Successfully"));
} else {
    echo json_encode(array("status" => "fail", "message" => mysqli_error($conn)));
}
?>
