<?php
require_once '../pegawai/connect.php';
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernamepimpinan'])) {
    header('location:../pegawai/login.php');
} else {
    $username=$_SESSION['usernamepimpinan'];
    $posisipimpinan=$_SESSION['posisipimpinan'];     
}
$id_daftar=$_POST['id_daftar'];
$status=$_POST['status'];
$ket_revisi=$_POST['ket_revisi'];
$tanggal= date('d-M-Y');

if ($status==''){
    echo "<script>alert('Periksa Pilihan Status anda!'); window.location='index.php?page=verifikasi';</script>";
}else{
    mysqli_query($connection, "UPDATE pendaftaran SET status = '$status', ket_revisi = '$ket_revisi'  WHERE id_daftar = $id_daftar" );
            if ($ket_revisi != ''){
                 mysqli_query($connection, "insert into riwayat_revisi (id_daftar,tanggal,oleh,ket) VALUES ('$id_daftar','$tanggal','Bagian','$ket_revisi')" );
            }else {
                mysqli_query($connection, "insert into riwayat_revisi (id_daftar,tanggal,oleh,ket) VALUES ('$id_daftar','$tanggal','Bagian','Laporan Diterima')" );
            }
            
        if ($status=='Silahkan Revisi Laporan')
            header("location:index.php?page=verifikasi");  
        else
            header("location:index.php?page=penilaian");

}





?>