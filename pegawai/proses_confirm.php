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
$id_daftar=$_POST['id_daftar'];
$status=$_POST['status'];

if ($status==''){
    echo "<script>alert('Periksa Pilihan Status anda!'); window.location='index.php?page=home';</script>";
}else{
    mysqli_query($connection, "UPDATE pendaftaran SET status = '$status'  WHERE id_daftar = $id_daftar" );
    header("location:index.php?page=home");
}

?>