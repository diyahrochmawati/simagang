<?php
require_once '../pegawai/connect.php';
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernamestaff'])) {
    header('location:../pegawai/login.php');
} else {
    $username=$_SESSION['usernamestaff'];    
}
$id_daftar=$_GET['user'];

mysqli_query($connection, "UPDATE pendaftaran SET status = 'Menunggu ACC KABAG SDM'  WHERE id_daftar = $id_daftar" );
header("location:index.php?page=accadmin");

?>