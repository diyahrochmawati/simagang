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
<h5 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-exclamation-triangle"></i>&nbspPerlu Legalitas Laporan</h5> 
<div style="padding-bottom: 10px;">
<form action="" method="post" > 
<strong><i style="color: #616161; font-style: normal;">Cari</i> </strong><input class="iniinput" type="text" name="tekscari" size="24" />
<select class="iniselect"  name="filter">
<option value="nama_ketua">Nama</option>
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
            <th>No<th>Nama<th>Status<th>Instansi<th>Laporan<th>Nilai<th>Detail<th>Aksi<th>Hapus
        </tr>
    </thead>
    <tbody>
              <?php
        $data="";
        if(isset($_POST["cari"])){
            $cari=$_POST["tekscari"];
            $filter=$_POST["filter"];
                if ($filter=="id_daftar"){
                $data=mysqli_query($connection,"select * from pendaftaran where id_daftar like '%$cari%' and status='Legalitas Laporan'");
                }elseif($filter=="instansi"){
                $data=mysqli_query($connection,"select * from pendaftaran where instansi like '%$cari%' and status='Legalitas Laporan'");    
                }else{
                $data=mysqli_query($connection,"select * from pendaftaran where nama_ketua like '%$cari%' and status='Legalitas Laporan'");   
                }       
            }else{
            $data=mysqli_query($connection,"select * from pendaftaran where status='Legalitas Laporan'");
        }
        $no=1;
        while($data2=mysqli_fetch_array($data)){
            ?>
        <tr>
            <td>
                <?= $no ?>
            </td>
            <td>
                <?= $data2['nama_ketua']; ?>
            </td>
            <td>
                <?= $data2['status']; ?>
            </td>
            <td>
                <?= $data2['instansi']; ?>
            </td>
            <td><a class="btn badge-info" href="laporan.php?act=<?= $data2['laporan']; ?>">Lihat</a></td>
             <td><a class="btn badge-info" href="../user/dokumen/nilai/<?= $data2['nilai']; ?>">Download</a></a></td>
             <td><a href="detail.php?user=<?php echo $data2['username']; ?>" id="btndetail"
            class=" btn btn-info badge-info" data-toggle="modal" data-target="#detail">Detail</a></td>
             
           <td><a href="proses_selesai.php?id_daftar=<?php echo $data2['id_daftar']; ?>" id="btnkonfirmasi"
            class=" btn btn-info badge-info" >Selesai</a></td>
            
            <td style="text-align: center;"><button class="btn badge-info" onclick="hapus(<?php echo"'$data2[id_daftar]'";  ?>)">Hapus</button></td>
          </tr>
        <?php
        $no++;
        } 
        ?>
    </tbody>
</table>

</br>
<h5 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-folder fa-lg"></i>&nbspData Pendaftaran</h5> 
<div style="padding-bottom: 10px;">
<form action="" method="post" > 
<strong><i style="color: #616161; font-style: normal;">Cari</i> </strong><input class="iniinput" type="text" name="tekscari2" size="24" />
<select class="iniselect"  name="filter2">
<option value="status">Status</option>
<option value="nama_ketua">Nama</option>

<option value="id_daftar">ID Daftar</option>
<option value="instansi">Instansi</option>
</select>
<input style="background-color: grey; " type="submit" name="cari2" value="Cari" class="btn badge-info"/>
<input style="background-color: grey; " type="submit" name="semua2" value="Tampilkan Semua" class="btn badge-info"/>
</form>
</div>
<table class="table table-striped table-bordered text-center">
    <thead class="thead-dark">
        <tr>
            <th>No<th>ID Daftar<th>Status<th>Nama<th>Instansi<th>Jurusan<th>Tgl Magang<th>Laporan<th>Detail<th>Hapus
        </tr>
    </thead>
    <tbody>
        <?php
        $data3="";
        if(isset($_POST["cari2"])){
            $cari2=$_POST["tekscari2"];
            $filter2=$_POST["filter2"];
                if ($filter2=="id_daftar"){
                $data3=mysqli_query($connection,"select * from pendaftaran where status='Magang Selesai' and id_daftar like '%$cari2%'");
                }elseif($filter2=="instansi"){
                $data3=mysqli_query($connection,"select * from pendaftaran where status='Magang Selesai' and instansi like '%$cari2%'");    
                }elseif($filter2=="nama"){
                $data3=mysqli_query($connection,"sselect * from pendaftaran where status='Magang Selesai' and nama_ketua like '%$cari2%'");    
                }else{
                $data3=mysqli_query($connection,"select * from pendaftaran where status='Magang Selesai' and status like '%$cari2%'");   
                }
            }else{    
        $data3=mysqli_query($connection,"select * from pendaftaran where status='Magang Selesai' ");
    }
        $nomor=1;
        while($data4=mysqli_fetch_array($data3)){
            ?>
        <tr>
            <td>
                <?= $nomor ?>
            </td>
            <td>
                <?= $data4['id_daftar']; ?>
            </td>
            <td>
                <?= $data4['status']; ?>
            </td>
            <td>
                <?= $data4['nama_ketua']; ?>
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
            <td><a href="detail.php?user=<?php echo $data4['username']; ?>" id="btndetail"
            class=" btn btn-info badge-info" data-toggle="modal" data-target="#detail">Detail</a></td>
            <td style="text-align: center;"><button class="btn badge-info" onclick="hapus(<?php echo"'$data4[id_daftar]'";  ?>)">Hapus</button></td>
            
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
                <h5 class="modal-title text-light">Konfirmasi Data <?= $data2['username']; ?></h5>
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
<div style="padding-top: 40px;" class="modal fade" id="detail" role="dialog" tabindex="-1" aria-labelledby="riwayat" aria-hidden="true">
    <div class="modal-dialog modal modal-dialog-centered" role="dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light">Detail Data <?= $data2['username']; ?></h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="changedetail">
                <div class="modal-body" id="bodydetail">
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
        $('a#btndetail').click(function () {
            var url = $(this).attr('href');
            $.ajax({
                url: url,
                success: function (data) {
                    $('#changedetail').html(data);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    function lihat(id_pendaftar){
        console.log(id_pendaftar);
        document.location="?page=proposal&id_pendaftar="+id_pendaftar;
    }
    function kirim(id_pendaftar){
        console.log(id_pendaftar);
        document.location="?page=upload_surat_konfirmasi&id_pendaftar="+id_pendaftar;
    }

function hapus(id_daftar){
    var jawab=confirm("Anda yakin menghapus id "+id_daftar+" ?");
    if(jawab==true){
        document.location="proses_hapusdaftar.php?id_daftar="+id_daftar;
    }
}
</script>