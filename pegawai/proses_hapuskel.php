<?php
require_once("connect.php");
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernameadmin'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['usernameadmin'];    
}
$id_daftar=$_GET['id_daftar'];
mysqli_query($connection, "delete from pendaftaran where id_daftar='$id_daftar'");
header("location: index.php?page=datakelompok");
?>