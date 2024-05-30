<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include "adminPHP/db_connection.php";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "INSERT INTO tasks (title, description) VALUES ('$title', '$description')";
    if ($conn->query($sql) === TRUE) {
        echo "Task posted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Post Task</title>
</head>
<body>
    <h1>Post a New Task</h1>
    <form action="task.php" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
        <br>
        <label for="description">Description</label>
        <textarea name="description" id="description" required></textarea>
        <br>
        <button type="submit">Post Task</button>
    </form>
</body>
</html>
