<?php session_start();
unset($_SESSION['usernameadmin']);
header('location:login.php');
?>