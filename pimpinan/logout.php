<?php session_start();
unset($_SESSION['usernamepimpinan']);
header('location:../pegawai/login.php');
?>