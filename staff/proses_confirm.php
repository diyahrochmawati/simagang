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
$id_daftar=$_POST['id_daftar'];
$status=$_POST['status'];
$posisi=$_POST['posisi'];

if ($posisi=='' || $status==''){
    echo "<script>alert('Periksa Pilihan Status atau Posisi anda!'); window.location='index.php?page=home';</script>";
}else{
    mysqli_query($connection, "UPDATE pendaftaran SET status = '$status', posisi = '$posisi'  WHERE id_daftar = $id_daftar" );
    header("location:index.php?page=home");
}

?>