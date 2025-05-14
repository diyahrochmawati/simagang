<?php
require_once '../pegawai/connect.php';
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernamekabag'])) {
    header('location:../pegawai/login.php');
} else {
    $username=$_SESSION['usernamekabag'];    
}
$id_daftar=$_GET['user'];
mysqli_query($connection, "UPDATE pendaftaran SET status = 'ACC Magang'  WHERE id_daftar = $id_daftar" );
header("location:index.php?page=accadmin");

?>