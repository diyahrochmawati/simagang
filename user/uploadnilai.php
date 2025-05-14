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

?> 
<center>
<div class="judul">NILAI MAGANG</div>
<?php

if(isset($_POST["submit"])) {
$target_dir = "dokumen/formnilai/";
$temp = explode(".", $_FILES["fileToUpload"]["name"]);//untuk mengambil nama file gambarnya saja tanpa format gambarnya
$hasil = mysqli_fetch_array($status);
$nama_baru=round(microtime(true)) . '.' . end($temp);
$target_file = $target_dir . $nama_baru;
$uploadOk = 1;
$imageFileType = strtolower (end($temp));
// Check if image file is a actual image or fake image
if (file_exists($target_file)) {
   echo "<div class='alert alert-danger position-relative'style='top:10px'>File sudah ada !! Rename dokumen anda (Namaketua_instansi.doc/.docx)!</div>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "<div class='alert alert-danger position-relative'style='top:10px'>File terlalu besar maksimal 5MB !</div>";
    $uploadOk = 0;
}
// Allow certain file formats 
if($imageFileType != "docx"){
    echo "<div class='alert alert-danger position-relative'style='top:10px'>Format file harus .DOCX !</div>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
        echo "<div class='alert alert-danger position-relative'style='top:10px'>Maaf file anda tidak ter upload. </div>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $nama_file=($_FILES["fileToUpload"]["name"]);
        echo "Format Nilai ". basename( $_FILES["fileToUpload"]["name"]). " terUpload";
        mysqli_query($connection,"update pendaftaran set formnilai='$nama_baru' where username='$username'");
    } else {
            echo "<div class='alert alert-danger position-relative'style='top:10px'>Maaf, Tidak terupload</div>";
    }
}
}
?>
 
    
<?php
    if ($hasil['formnilai']==null){
?>
    <center>SILAHKAN UPLOAD FORM NILAI ANDA, AGAR LAPORAN ANDA DAPAT KAMI TERIMA</br></br></center>
    <form action="" method="post" enctype="multipart/form-data">
    Select file to upload (.docx):
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
<?php 
    }elseif ($hasil['nilai']==null) {
?>
    Nilai anda belum dikirim, tunggu hingga ada kotak masuk Nilai

<?php  
    }else {
?>
    Download <a href="dokumen/nilai/<?php echo $hasil['nilai'];?>">Disini</a>
    <embed style="width: 100%; height:700px;"  src="dokumen/nilai/<?php echo $hasil['nilai'];?>"></embed>
<?php 
    } 
?>
</center>

