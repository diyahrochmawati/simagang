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
$ket_revisi=$_POST['ket_revisi'];
$tanggal= date('d-M-Y');
if ($status==''){
    echo "<script>alert('Periksa Pilihan Status anda!'); window.location='index.php?page=laporan';</script>";
}else{
            mysqli_query($connection, "UPDATE pendaftaran SET status = '$status', ket_revisi = '$ket_revisi'  WHERE id_daftar = $id_daftar" );
            if ($ket_revisi != ''){
                 mysqli_query($connection, "insert into riwayat_revisi (id_daftar,tanggal,oleh,ket) VALUES ('$id_daftar','$tanggal','Admin','$ket_revisi')" );
            }else {
                mysqli_query($connection, "insert into riwayat_revisi (id_daftar,tanggal,oleh,ket) VALUES ('$id_daftar','$tanggal','Admin','Laporan dikirim ke bagian')" );
            }
            header("location:index.php?page=laporan");

}





?>