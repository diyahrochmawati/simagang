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
$status = mysqli_query($connection, "SELECT * FROM pendaftaran WHERE username='$username'");
$hasil = mysqli_fetch_array($status);
$id_daftar=$hasil['id_daftar'];
?> 
<center>
<div class="judul">LAPORAN MAGANG</div>
<?php

if(isset($_POST["submit"])) {
$target_dir = "dokumen/laporan/";
$temp = explode(".", $_FILES["fileToUpload"]["name"]);//untuk mengambil nama file gambarnya saja tanpa format gambarnya
$nama_baru=round(microtime(true)) . '.' . end($temp);
$target_file = $target_dir . $nama_baru;
$uploadOk = 1;
$imageFileType = strtolower (end($temp));
// Check if image file is a actual image or fake image
if (file_exists($target_file)) {
   echo "<div class='alert alert-danger position-relative'style='top:10px'>File sudah ada !! Rename dokumen anda (Namaketua_instansi.pdf)!</div>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "<div class='alert alert-danger position-relative'style='top:10px'>File terlalu besar maksimal 2MB !</div>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf") {
    echo "<div class='alert alert-danger position-relative'style='top:10px'>Format file harus .PDF !</div>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
        echo "<div class='alert alert-danger position-relative'style='top:10px'>Maaf file anda tidak ter upload. </div>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $nama_file=($_FILES["fileToUpload"]["name"]);
        if ($hasil['ket_revisi']==''){
            mysqli_query($connection,"update pendaftaran set laporan='$nama_baru', ket_revisi='Belum Koreksi' ,status='Verifikasi Laporan Admin' where username='$username'");
        } else {
            mysqli_query($connection,"update pendaftaran set laporan='$nama_file', ket_revisi='Peserta Sudah Revisi' ,status='Verifikasi Laporan Admin' where username='$username'");
            $tanggal= date('d-M-Y');
            mysqli_query($connection, "insert into riwayat_revisi (id_daftar,tanggal,oleh,ket) VALUES ('$id_daftar','$tanggal','Peserta','Peserta Upload Ulang Laporan')" );
        }
        
        if ($hasil['formnilai']!=''){
            echo "<script>alert('Upload Revisi Laporan Berhasil, Pantau Status Anda!');window.location.href='index.php?page=dokumenuser&hal=laporan';</script>";
         }else{
            echo "<script>alert('Silahkan Upload form nilai anda !');window.location.href='index.php?page=dokumenuser&hal=nilai';</script>";
         }
    } else {
            echo "<div class='alert alert-danger position-relative'style='top:10px'>Maaf, Tidak terupload</div>";
    }
}
}
?>
 
    
<?php
    if (($hasil['laporan']==null) || ($hasil['status']== "Silahkan Revisi Laporan")){
?>
    <form action="" method="post" enctype="multipart/form-data">
    Select file to upload (.pdf max 2mb):
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
    <div class='alert alert-danger position-relative'style='top:10px'><strong>Catatan Revisi : </strong></br> <?php echo $hasil['ket_revisi'] ?> </div>
<?php 
    } else {
?>
    Download <a href="dokumen/laporan/<?php echo $hasil['laporan'];?>">Disini</a>
    <embed style="width: 100%; height:700px;"  src="dokumen/laporan/<?php echo $hasil['laporan'];?>"></embed>
<?php 
    } 
?>
</center>

