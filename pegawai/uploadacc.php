<?php 
require_once("connect.php");
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernameadmin'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['usernameadmin'];    
}
$user=$_GET['user'];
?>
<!DOCTYPE HTML>
<html>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-">
    <title>SIMAGANG</title>
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/simple-sidebar.css">
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/Chart.bundle.min.js"></script>
    <style>
    </style>
    <style>
        .judul{
            margin-left: 10px;
            font-family: Gill Sans MT Condensed;
            font-size: 40px;
            font-weight: bold;
        }
        .artikel {
            margin-left: 50px;
            margin-right: 120px;
        }
        p{
            font-family: calibri;
            text-align: justify;
            padding: 0px 10px 0px 10px;
            font-size: 17px;
        }
        img{
            width: 300px;
        }
        
    </style>
</head>
<body>
    <div><h3 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-envelope-open-text fa-lg"></i> SURAT ACC</h3> </div>
    <center>
<div class="judul">UPLOAD SURAT PENERIMAAN</div>
<?php

if(isset($_POST["submit"])) {
$target_dir = "../user/dokumen/suratacc/";
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
        echo "Surat ACC ". basename( $_FILES["fileToUpload"]["name"]). " terUpload";
        mysqli_query($connection,"update pendaftaran set surat_acc='$nama_baru', status='Menunggu ACC SDM' where username='$user'");
    } else {
            echo "<div class='alert alert-danger position-relative'style='top:10px'>Maaf, Tidak terupload</div>";
    }
}
}
?>
 
    
    <form action="" method="post" enctype="multipart/form-data">
    Select file to upload (.pdf max 2mb):
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">

</center>

   
</body>
</html>