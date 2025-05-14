<?php 
require_once("../pegawai/connect.php");
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernamekabag'])) {
    header('location:../pegawai/login.php');
} else {
    $username=$_SESSION['usernamekabag'];    
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-">
    <title>SIMAGANG</title>
    <link rel="stylesheet" href="../../fontawesome/css/all.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/simple-sidebar.css">
    <script src="../../js/jquery-3.3.1.js"></script>
    <script src="../../js/script.js"></script>
    <script src="../../js/Chart.bundle.min.js"></script>
</head>
<h3><strong><center></br>Arsip Surat ACC</center></strong> </h3>
<div style="padding-bottom: 10px; margin-top: 20px;">
<form action="" method="post" > 
<strong><i style="color: #616161; font-style: normal;">Cari</i> </strong><input class="iniinput" type="text" name="tekscari" size="24" />
<select class="iniselect"  name="filter">
<option value="nama">Nama</option>
<option value="id_daftar">ID Daftar</option>
<option value="instansi">Instansi</option>

</select>
<input style="background-color: grey; " type="submit" name="cari" value="Cari" class="btn badge-info"/>
<input style="background-color: grey; " type="submit" name="semua" value="Tampilkan Semua" class="btn badge-info"/>
</form>
</div>
<table class="table table-striped table-bordered text-center">
    <thead class="thead-dark">
       <tr>
            <th>No<th>ID Daftar<th>Nama Ketua<th>Jumlah Peserta<th>Instansi<th>Jurusan<th>Download Surat<th>Lihat Surat
        </tr>
    </thead>
    <tbody>
      <?php
        $data="";
        if(isset($_POST["cari"])){
            $cari=$_POST["tekscari"];
            $filter=$_POST["filter"];
                if ($filter=="id_daftar"){
                $data=mysqli_query($connection,"select * from pendaftaran where surat_acc != '' and id_daftar like '%$cari%'");
                }elseif($filter=="nama"){
                $data=mysqli_query($connection,"select * from pendaftaran where surat_acc != '' and nama_ketua like '%$cari%'");    
                }else{
                $data=mysqli_query($connection,"select * from pendaftaran where surat_acc != '' and instansi like '%$cari%'");  
                }       
            }else{
            $data=mysqli_query($connection,"select * from pendaftaran where surat_acc != ''");
        }
        $no=1;
        while($data2=mysqli_fetch_array($data)){
            ?>
        <tr>
            <td>
                <?= $no ?>
            </td>
            <td>
                <?= $data2['id_daftar']; ?>
            </td>
            <td>
            	<?=$data2['nama_ketua']; ?>
            </td>
            <td>
                <?= $data2['jml_peserta']; ?>
            </td>
            <td>
                <?= $data2['instansi']; ?>
            </td>
            <td>
                <?= $data2['jurusan']; ?>
            </td>
            <td>
            	 <a class="btn badge-info" href="../user/dokumen/suratacc/<?php echo $data2['surat_acc'];?>">Download</a></td>
            <td><a class="btn badge-info" href="?page=lihatsurat&act=<?= $data2['surat_acc']; ?>">Lihat</a></td>
          </tr>
        <?php
        $no++;
        } 
        ?>
    </tbody>
</table>     
</html>