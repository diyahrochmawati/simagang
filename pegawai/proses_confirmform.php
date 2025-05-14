<?php
require_once 'connect.php';
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernameadmin'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['usernameadmin'];    
}
$id_daftar=$_GET['id_daftar'];

// var_dump($status);
// die;
mysqli_query($connection, "UPDATE pendaftaran SET status = 'Verifikasi Laporan BAGIAN'  WHERE id_daftar = $id_daftar" );
 //see the result
header("location:index.php?page=laporan");

?>