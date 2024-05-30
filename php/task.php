<?php
include_once "db_connection.php"; 
include '../    auth.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$task_id = $_POST['task_id'];
$user_id = $_POST['user_id'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    $filename = basename($_FILES["file"]["name"]);
    $sql = "INSERT INTO uploads (task_id, filename, user_id) VALUES ('$task_id', '$filename', '$user_id')";
    if ($conn->query($sql) === TRUE) {
        echo "The file " . htmlspecialchars($filename) . " has been uploaded.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}

$conn->close();
?>
