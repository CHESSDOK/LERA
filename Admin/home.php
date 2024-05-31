<?php
include "auth.php";

include_once "../php/db_connection.php";

$user_id = $_SESSION['user_id'];

if(isset($_POST['Aname'])){
    $Appname=$_POST['Appname'];

    $sql= "UPDATE `aname` SET `Appname`='$Appname' WHERE 1";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:home.php');
    }else{
        die(mysql_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">  
    <title>User Dashboard</title>
    <style>
        body {
            margin: -2%;
            padding: none;
            font-family: Arial, sans-serif;
            background-color: white;
        }
        .input-field {
            position: relative;
            border-bottom: 2px solid rgb(0, 0, 0);
            width: 300px;
            margin: 15px 0;
        }
        
        .input-field label {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            font-family: "Roboto", sans-serif;
            color: #fff;
            font-size: 16px;
            pointer-events: none;
            transition: 0.15s ease;
        }
        
        .input-field input {
            width: 100%;
            height: 40px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 16px;
            color: #fff;
        }
        
        .input-field input:focus ~ label,
        .input-field input:valid ~ label {
            font-size: 0.8rem;
            top: 10px;
            transform: translateY(-120%);
        }
        .action {
            margin-top: 0px;
            padding: 12px 16px;
            border-radius: 8px;
            border: none;
            background-color: royalblue;
            color: white;
            cursor: pointer;
            align-self: end;
        }
        @media screen and (max-width: 600px) {
            body {
            margin: -12.5%;
        }
    </style>
</head>
<body>
    <div class="header-DB">
        <div class="image-container">
            <div class="overlay"></div>
            <img src="../icons/a.jpg" alt="bg" class="image1">
        </div>
        <div class="header-text">
            <form action="home.php" method = "post">
            <div class="input-field">
                <input name="Appname" type="text" />
                <label>Enter app name</label>
            </div>
            <button class="action" name="Aname">Verify</button>
            </form>
        </div>
    </div>

    <div class="content-container">
        <!-- Original content -->
        <div id="content1" class="content">
            <div class="rowcp">
                <div class="row">
                    <a href="upload.php" class="col">
                        <img src="../icons/R1.png" alt="i1"> <br>
                        <p>Upload Files</p>
                    </a>
                    <a href="flash.html" class="col">
                        <img src="../icons/R2.png" alt="i1"> <br>
                        <p>Flashcards</p>
                    </a>
                    <a href="videos.php" class="col">
                        <img src="../icons/R3.png" alt="i1"> <br>
                        <p>Videos</p><br/>
                    </a>
                </div>
                <div class="row">
                    <a href="admin_exam.php" class="col">
                        <img src="../icons/Q2.png" alt="i1"> <br>
                        <p>Exam</p>
                    </a>
                    <a href="view_upload.php" class="col">
                        <img src="../icons/Q3.png" alt="i1"> <br>
                        <p>Answers</p>
                    </a>
                    <a href="task.php" class="col">
                        <img src="../icons/Q4.png" alt="i1"> <br>
                        <p>Activities</p>
                    </a>
                </div>
            </div>
       </div>
</body>
</html>
