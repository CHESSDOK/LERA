<?php
include "db_connection.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['read'])) {
    $fileId = $_GET['read'];
    $sql = "SELECT filename FROM uploads WHERE id = $fileId";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $file = $result->fetch_assoc();
        $filePath = "../../php/uploads/" . $file['filename']; // Make sure the file path is correct

        if (file_exists($filePath)) {
            header('Content-Type: application/pdf');
            readfile($filePath);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "File not found.";
    }
}
?>
