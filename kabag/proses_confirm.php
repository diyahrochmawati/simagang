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
$id_daftar=$_POST['id_daftar'];
$status=$_POST['status'];
echo $id_daftar;

if ($status==''){
    echo "<script>alert('Periksa Pilihan Status anda!'); window.location='index.php?page=home';</script>";
}else{
    mysqli_query($connection, "UPDATE pendaftaran SET status = '$status'  WHERE id_daftar = $id_daftar" );
    header("location:index.php?page=home");
}
?>