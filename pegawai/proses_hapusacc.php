<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernameadmin'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['usernameadmin'];    
}
require_once("connect.php");

$id_daftar=$_GET['id_daftar'];
mysqli_query($connection, "delete from pendaftaran where id_daftar='$id_daftar'");
header("location: index.php?page=accadmin");
?>