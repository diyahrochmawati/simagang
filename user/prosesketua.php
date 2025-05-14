<?php
require_once("connect.php");
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['username'];
}
$cekuser = mysqli_query($connection, "SELECT * FROM pendaftaran WHERE username = '$username'");
$hasil = mysqli_fetch_array($cekuser);
$id_daftar=$hasil['id_daftar'];
$no_ktp=$hasil['no_ktp'];
$nama=$hasil['nama_ketua'];
$tempat=$hasil['tempat_lahir'];
$tanggal=$hasil['tanggal_lahir'];
$kelamin=$hasil['kelamin'];
$alamat=$hasil['alamat'];
$email=$hasil['email'];
$notlp=$hasil['no_tlp'];
$jurusan=$hasil['jurusan'];
$uploadktp=$hasil['kartu_identitas'];

mysqli_query($connection, "insert into peserta (id_daftar,no_ktpa,namaa,tempat_lahira,tanggal_lahira,kelamina,alamata,emaila,no_tlpa,jurusana,uploadktp)
 VALUES ('$id_daftar','$no_ktp','$nama','$tempat','$tanggal','$kelamin','$alamat','$email','$notlp','$jurusan','$uploadktp')");
header("location: index.php?page=home");
?>