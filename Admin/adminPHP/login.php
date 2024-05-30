<?php
    session_start();

    $error='';

    if(isset($_POST['login']))
    {
        if(empty($_POST['username']) || empty($_POST['pass'])){
    $error="Username or Password is Invalid";
    }
    else
    {

    include "db_connection.php";
    $username=$_POST['username'];
    $pass=$_POST['pass'];

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE password='$pass' AND username='$username'");
    $rows = mysqli_num_rows($query);

    if($rows==1){
    $_SESSION['username']= $username;
    $_SESSION['pass']= $pass;
    header('Location: ../home.php');
    }

    else {
        echo "<script>alert('Invalid username and password, try again.')</script>";
    }
    mysqli_close($conn);
    }
    }
?>