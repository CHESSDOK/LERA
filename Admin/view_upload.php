<?php
include "auth.php";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="adminCSS/view.css">
    <title>Admin - View Uploads</title>
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
          <li><a href="ADMlogin.php" id="logout">Logout</a></li>
        </ul>
    </div>

    <h1>Uploaded Files</h1>
    <table>
    <thead>
        <tr>
            <th scope="col">Task</th>
            <th scope="col">Username</th>
            <th scope="col">Filename</th>
            <th scope="col">Uploaded At</th>
            <th scope="col">Grade</th>
            <th scope="col">Download</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody> 
        <?php 
            while($row = $result->fetch_assoc()){
                echo "
            <tr>
                <td data-label='Task'>" . $row['title'] . "</td>
                <td data-label='Username'>" . $row['username'] . "</td>
                <td data-label='Filename'>" . $row['filename'] . "</td>
                <td data-label='Uploaded At'>" . $row['uploaded_at'] . "</td>
                <td data-label='Grade'>" . $row['grade'] . "</td>
                <td data-label='Download'><a href='adminPHP/read.php?read=" . $row['id'] . "' target='_blank' class='read-link'>Read</a></td>
                <td data-label='Action'>
                    <form action='adminPHP/grade.php' method='post'>
                        <input type='hidden' name='upload_id' value=" . $row['id'] . ">
                        <label for='grade'>Grade:</label>
                        <input type='text' name='grade' id='grade' required>
                        <button type='submit'>Submit</button>
                    </form>
                </td>
            </tr>
            "; 
        }
        ?>
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
