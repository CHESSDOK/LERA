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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <title>Classroom Clone</title>
    <link rel="stylesheet" href="../css/act.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="../icons/lslogo.png" alt="Logo" />
    </div>
    <div class="burger-menu">
        <button id="burger-btn">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</header>
<div id="side-menu" class="side-menu">
    <button id="close-btn">&times;</button>
    <ul>
        <li><a href="#">Profile</a></li>
        <li><a href="home.php">Home</a></li>
        <li><a href="../index.html" id="logout">Logout</a></li>
    </ul>
</div>

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
    <thead>
        <tr>
            <th scope="col">Task ID</th>
            <th scope="col">Filename</th>
            <th scope="col">Uploaded At</th>
            <th scope="col">Grade</th>
            <th scope="col">Read</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result_uploads->fetch_assoc()): ?>
            <tr>
                <td data-label="Task"><?php echo $row['task_id']; ?></td>
                <td data-label="Filename"><?php echo $row['filename']; ?></td>
                <td data-label="Uploaded At"><?php echo $row['uploaded_at']; ?></td>
                <td data-label="Grade"><?php echo $row['grade']; ?></td>
                <td data-label="Read"><a href="../admin/adminPHP/read.php?read=<?php echo $row['id']; ?>" target="_blank" class="read-link">Read</a></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<script>
    // menu
    document.addEventListener("DOMContentLoaded", function () {
        const burgerBtn = document.getElementById("burger-btn");
        const sideMenu = document.getElementById("side-menu");
        const closeBtn = document.getElementById("close-btn");
        const logoutBtn = document.getElementById("logout");

        burgerBtn.addEventListener("click", function () {
            sideMenu.style.right = "0";
        });

        closeBtn.addEventListener("click", function () {
            sideMenu.style.right = "-250px";
        });

        logoutBtn.addEventListener("click", function () {
            // Add your logout functionality here
            console.log("Logout clicked");
        });
    });
</script>
</body>
</html>
