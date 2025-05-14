<?php 
require_once("../pegawai/connect.php");
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernamestaff'])) {
    header('location:../pegawai/login.php');
} else {
    $username=$_SESSION['usernamestaff'];    
}
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
</head>
<h5 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-exclamation-triangle"></i>&nbspPerlu Verifikasi Form Nilai</h5> 
<div style="padding-bottom: 10px;">
<form action="" method="post" > 
<strong><i style="color: #616161; font-style: normal;">Cari</i> </strong><input class="iniinput" type="text" name="tekscari" size="24" />
<select class="iniselect"  name="filter">
<option value="nama_ketua">Nama</option>
<option value="posisi">Posisi</option>
<option value="instansi">Instansi</option>
</select>
<input style="background-color: grey; " type="submit" name="cari" value="Cari" class="btn badge-info"/>
<input style="background-color: grey; " type="submit" name="semua" value="Tampilkan Semua" class="btn badge-info"/>
</form>
</div>
<table class="table table-striped table-bordered text-center">
    <thead class="thead-dark">
        <tr>
            <th>No<th>Nama<th>Posisi<th>Instansi<th>Jurusan<th>Tgl Magang<th>Laporan<th>Nilai<th>Verifikasi Nilai<th>Detail
        </tr>
    </thead>
    <tbody>
       <?php
        $data3="";
        if(isset($_POST["cari"])){
            $cari=$_POST["tekscari"];
            $filter=$_POST["filter"];
                if ($filter=="posisi"){
                $data3=mysqli_query($connection,"select * from pendaftaran where posisi like '%$cari%' and formnilai != '' and status='Menunggu ACC NIlai'");
                }elseif($filter=="instansi"){
                $data3=mysqli_query($connection,"select * from pendaftaran where instansi like '%$cari%' and and formnilai != '' and status='Menunggu ACC NIlai'");    
                }else{
                $data3=mysqli_query($connection,"select * from pendaftaran where nama_ketua like '%$cari%' and and formnilai != '' and status='Menunggu ACC NIlai'");   
                }       
            }else{
            $data3=mysqli_query($connection,"select * from pendaftaran where formnilai != '' and status='Menunggu ACC NIlai'");
        }
        $nomor=1;
        while($data4=mysqli_fetch_array($data3)){
            ?>
        <tr>
            <td>
                <?= $nomor; ?>
            </td>
            <td>
                <?= $data4['nama_ketua']; ?>
            </td>
            <td>
                <?= $data4['posisi']; ?>
            </td>
            <td>
                <?= $data4['instansi']; ?>
            </td>
            <td>
                <?= $data4['jurusan']; ?>
            </td>
            <td>
                <?= $data4['tgl_masuk']; ?>- <?= $data4['tgl_selesai']; ?>
            </td>
           <td><a class="btn badge-info" href="laporan.php?act=<?= $data4['laporan']; ?>">Lihat</a></td>
           <td><a class="btn badge-info"  href="../user/dokumen/nilai/<?=$data4['nilai']?>">Download</a></td>
            <td><a href="proses_verifikasinilai.php?user=<?php echo $data4['id_daftar']; ?>" 
            class=" btn btn-info badge-info" >Verifikasi</a></td>

            <td><a href="detail.php?user=<?php echo $data4['username']; ?>" id="btnkonfirmasi"
            class=" btn btn-info badge-info" data-toggle="modal" data-target="#konfirmasi">Detail</a></td>
        </tr>
        <?php
        $nomor++;
        } 
        ?>
    </tbody>
</table>

<h5 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-exclamation-triangle"></i>&nbspForm Nilai</h5> 
<div style="padding-bottom: 10px;">
<form action="" method="post" > 
<strong><i style="color: #616161; font-style: normal;">Cari</i> </strong><input class="iniinput" type="text" name="tekscari" size="24" />
<select class="iniselect"  name="filter">
<option value="nama_ketua">Nama</option>
<option value="posisi">Posisi</option>
<option value="instansi">Instansi</option>
</select>
<input style="background-color: grey; " type="submit" name="cari" value="Cari" class="btn badge-info"/>
<input style="background-color: grey; " type="submit" name="semua" value="Tampilkan Semua" class="btn badge-info"/>
</form>
</div>
<table class="table table-striped table-bordered text-center">
    <thead class="thead-dark">
        <tr>
            <th>No<th>Nama<th>Posisi<th>Instansi<th>Jurusan<th>Tgl Magang<th>Laporan<th>Nilai<th>Detail
        </tr>
    </thead>
    <tbody>
       <?php
        $data1="";
        if(isset($_POST["cari"])){
            $cari=$_POST["tekscari"];
            $filter=$_POST["filter"];
                if ($filter=="posisi"){
                $data1=mysqli_query($connection,"select * from pendaftaran where posisi like '%$cari%' and formnilai != '' and (status='Legalitas Laporan' or status='Magang Selesai')");
                }elseif($filter=="instansi"){
                $data1=mysqli_query($connection,"select * from pendaftaran where instansi like '%$cari%' and and formnilai != '' and (status='Legalitas Laporan' or status='Magang Selesai')");    
                }else{
                $data1=mysqli_query($connection,"select * from pendaftaran where nama_ketua like '%$cari%' and and formnilai != '' (status='Legalitas Laporan' or status='Magang Selesai')");   
                }       
            }else{
            $data1=mysqli_query($connection,"select * from pendaftaran where formnilai != '' and (status='Legalitas Laporan' or status='Magang Selesai')");
        }
        $nomor=1;
        while($data2=mysqli_fetch_array($data1)){
            ?>
        <tr>
            <td>
                <?= $nomor; ?>
            </td>
            <td>
                <?= $data2['nama_ketua']; ?>
            </td>
            <td>
                <?= $data2['posisi']; ?>
            </td>
            <td>
                <?= $data2['instansi']; ?>
            </td>
            <td>
                <?= $data2['jurusan']; ?>
            </td>
            <td>
                <?= $data2['tgl_masuk']; ?>- <?= $data2['tgl_selesai']; ?>
            </td>
           <td><a class="btn badge-info" href="laporan.php?act=<?= $data2['laporan']; ?>">Lihat</a></td>
           <td><a class="btn badge-info"href="../user/dokumen/nilai/<?=$data2['nilai']?>">Download</a></td>
            <td><a href="detail.php?user=<?php echo $data2['username']; ?>" id="btnkonfirmasi"
            class=" btn btn-info badge-info" data-toggle="modal" data-target="#konfirmasi">Detail</a></td>
        </tr>
        <?php
        $nomor++;
        } 
        ?>
    </tbody>
</table>

<div style="padding-top: 40px;" class="modal fade" id="konfirmasi" role="dialog" tabindex="-1" aria-labelledby="riwayat" aria-hidden="true">
    <div class="modal-dialog modal modal-dialog-centered" role="dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light">Detail Data </h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="change">
                <div class="modal-body" id="bodykonfirmasi">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="padding-top: 40px;" class="modal fade" id="verifikasi" role="dialog" tabindex="-1" aria-labelledby="riwayat" aria-hidden="true">
    <div class="modal-dialog modal modal-dialog-centered" role="dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light">Verifikasi Nilai</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="changeverifikasi">
                <div class="modal-body" id="bodyverifikasi">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
</html>
<script language="javascript">
    $(document).ready(function () {
        $('a#btnkonfirmasi').click(function () {
            var url = $(this).attr('href');
            $.ajax({
                url: url,
                success: function (data) {
                    $('#change').html(data);
                }
            });
        });
        $('a#btnverifikasi').click(function () {
            var url = $(this).attr('href');
            $.ajax({
                url: url,
                success: function (data) {
                    $('#changeverifikasi').html(data);
                }
            });
        });
    });
</script>