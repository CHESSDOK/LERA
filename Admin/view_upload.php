<?php
include "adminPHP/db_connection.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT uploads.id, uploads.filename, uploads.uploaded_at, tasks.title, users.username, uploads.grade
        FROM uploads
        JOIN tasks ON uploads.task_id = tasks.id
        JOIN users ON uploads.user_id = users.id
        ORDER BY uploads.uploaded_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - View Uploads</title>
</head>
<body>
    <h1>Uploaded Files</h1>
    <table border="1">
        <tr>
            <th>Task</th>
            <th>Username</th>
            <th>Filename</th>
            <th>Uploaded At</th>
            <th>Grade</th>
            <th>Download</th>
            <th>Action</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['filename']; ?></td>
                <td><?php echo $row['uploaded_at']; ?></td>
                <td><?php echo $row['grade']; ?></td>
                <td><a href="uploads/<?php echo $row['filename']; ?>" download>Download</a></td>
                <td>
                    <form action="adminPHP/grade.php" method="post">
                        <input type="hidden" name="upload_id" value="<?php echo $row['id']; ?>">
                        <label for="grade">Grade:</label>
                        <input type="text" name="grade" id="grade" required>
                        <button type="submit">Submit</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
