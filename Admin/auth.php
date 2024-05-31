<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ADMlogin.php");
    exit();
}
?>