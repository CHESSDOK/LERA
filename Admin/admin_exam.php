<?php
include "auth.php";
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

    <title>Making Exam</title>

    <link rel="stylesheet" href="adminCSS/ae.css">

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
<div class="form-box">

    <form class="form" action="adminPHP/process_exam.php" method="post">

        <span class="title">EXAM MAKER</span>

        <span class="subtitle">Make questions to challenge the users</span>

        <div class="form-container">

            <input type="text" class="input" name="name" placeholder="Enter Exam Title" required>

            <input type="number" class="input" name="total" placeholder="Enter total number of questions" required>

            <input type="number" class="input" name="corr" placeholder="Enter points for each question" required>

            <input type="number" class="input" name="wrong" placeholder="Enter deduction for wrong answer" required>

            <input type="text" class="input" name="tag" placeholder="Enter a tag for your exam" required>

        </div>

        <button type="submit" name="gen" id="myBtn">GENERATE</button>

    </form>

</div>

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

