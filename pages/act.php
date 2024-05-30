<?php
include "../auth.php";
include '../php/db_connection.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_tasks = "SELECT * FROM tasks ORDER BY created_at DESC";
$result_tasks = $conn->query($sql_tasks);

$sql_uploads = "SELECT * FROM uploads WHERE user_id = " . $_SESSION['user_id'] . " ORDER BY uploaded_at DESC";
$result_uploads = $conn->query($sql_uploads);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Classroom Clone</title>
    <link rel="stylesheet" href="../css/act.css">
</head>
<body>
    <h1>Tasks</h1>
    <?php while($row = $result_tasks->fetch_assoc()): ?>
        <div>
            <h2><?php echo $row['title']; ?></h2>
            <p><?php echo $row['description']; ?></p>
            <form action="../php/task.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="task_id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <label for="file">Upload File:</label>
                <input type="file" name="file" id="file" required>
                <br>
                <button type="submit">Upload</button>
            </form>
        </div>
    <?php endwhile; ?>

    <h1>Your Uploads and Grades</h1>
    <table border="1">
        <tr>
            <th>Task ID</th>
            <th>Filename</th>
            <th>Uploaded At</th>
            <th>Grade</th>
            <th>Download</th>
        </tr>
        <?php while($row = $result_uploads->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['task_id']; ?></td>
                <td><?php echo $row['filename']; ?></td>
                <td><?php echo $row['uploaded_at']; ?></td>
                <td><?php echo $row['grade']; ?></td>
                <td><a href="uploads/<?php echo $row['filename']; ?>" download>Download
                </a></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>