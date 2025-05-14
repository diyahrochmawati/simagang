<?php session_start();
unset($_SESSION['usernamekabag']);
header('location:../pegawai/login.php');
?>