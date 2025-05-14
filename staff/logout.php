<?php session_start();
unset($_SESSION['usernamestaff']);
header('location:../pegawai/login.php');
?>