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
$id_daftar=$_GET["user"];
if(isset($_POST["Upload"])) {
$target_dir = "../user/dokumen/nilai/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (file_exists($target_file)) {
   echo "<div class='alert alert-danger position-relative'style='top:10px'>File sudah ada !! Rename dokumen anda (Namaketua_instansi.doc .docx)!</div>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "<div class='alert alert-danger position-relative'style='top:10px'>File terlalu besar maksimal 2MB !</div>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "doc") 
if($imageFileType != "docx"){
    echo "<div class='alert alert-danger position-relative'style='top:10px'>Format file harus .DOC atau .DOCX !</div>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
        echo "<div class='alert alert-danger position-relative'style='top:10px'>Maaf file anda tidak ter upload. </div>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $nama_file=($_FILES["fileToUpload"]["name"]);
        echo "<div class='alert alert-success position-relative' style='top: 20px'>Upload File nilai Sukses!</div>";
        echo "Nilai ". basename( $_FILES["fileToUpload"]["name"]). " sudah terUpload";
        mysqli_query($connection,"update pendaftaran set nilai='$nama_file', status='Menunggu ACC NIlai' where id_daftar='$id_daftar'");
    } else {
        echo "<div class='alert alert-danger position-relative'style='top:10px'>Maaf, Tidak terupload</div>";
        header('location:index.php?page=penilaian');
    }
}
}
?>