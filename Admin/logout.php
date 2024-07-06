<?php
session_start();
session_destroy();
header("Location: ADMlogin.php");
exit();
?>