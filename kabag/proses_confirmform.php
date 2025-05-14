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
$id_daftar=$_GET['id_daftar'];

// var_dump($status);
// die;
mysqli_query($connection, "UPDATE pendaftaran SET status = 'Menunggu Nilai'  WHERE id_daftar = $id_daftar" );
 //see the result
header("location:index.php?page=nilai");

?>