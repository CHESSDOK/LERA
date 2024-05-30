<?php
include "db_connection.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $upload_id = $_POST['upload_id'];
    $grade = $conn->real_escape_string($_POST['grade']);

    $sql = "UPDATE uploads SET grade = '$grade' WHERE id = $upload_id";
    if ($conn->query($sql) === TRUE) {
        echo "Grade assigned successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: ../view_upload.php");
exit();
?>
