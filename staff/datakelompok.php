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
<!DOCTYPE html>
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
<h3 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-user-friends fa-lg"></i>&nbspData Kelompok</h3> 
<div style="padding-bottom: 10px;">
<form action="" method="post" > 
<strong><i style="color: #616161; font-style: normal;">Cari</i> </strong><input class="iniinput" type="text" name="tekscari" size="24" />
<select class="iniselect"  name="filter">
<option value="nama">Nama</option>
<option value="status">Status</option>
<option value="id_daftar">ID Daftar</option>
<option value="posisi">Posisi</option>

</select>
<input style="background-color: grey; " type="submit" name="cari" value="Cari" class="btn badge-info"/>
<input style="background-color: grey; " type="submit" name="semua" value="Tampilkan Semua" class="btn badge-info"/>
</form>
</div>
<table class="table table-striped table-bordered text-center" >
    <thead class="thead-dark">
        <tr>
            <th>No<th>ID Daftar<th>Status<th>Nama Ketua<th>E-mail<th>Jurusan<th>Instansi<th>Detail
        </tr>
    </thead>
    <tbody>
              <?php
        $data="";
        if(isset($_POST["cari"])){
            $cari=$_POST["tekscari"];
            $filter=$_POST["filter"];
                if ($filter=="id_daftar"){
                $data=mysqli_query($connection,"select * from pendaftaran where id_daftar like '%$cari%' and status != 'Belum Daftar'");
                }elseif($filter=="nama"){
                $data=mysqli_query($connection,"select * from pendaftaran where nama_ketua like '%$cari%' and status != 'Belum Daftar' ");    
                }elseif($filter=="status"){
                $data=mysqli_query($connection,"select * from pendaftaran where status like '%$cari%' and status != 'Belum Daftar' ");    
                }else{
                $data=mysqli_query($connection,"select * from pendaftaran where posisi like '%$cari%' and status != 'Belum Daftar' ");  
                }       
            }else{
            $data=mysqli_query($connection,"select * from pendaftaran where status != 'Belum Daftar' ");
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
                <?= $data2['status']; ?>
            </td>
            <td>
                <?= $data2['nama_ketua']; ?>
            </td>
            <td>
                <?= $data2['email']; ?>
            </td>
            <td>
                <?= $data2['jurusan']; ?>
            </td>
            <td>
                <?= $data2['instansi']; ?>
            </td>
            <td><a href="detail.php?user=<?php echo $data2['username']; ?>" id="btndetail"
            class=" btn btn-info badge-info" data-toggle="modal" data-target="#detail">Detail</a></td>
                        
        </tr>
        <?php
        $no++;
        } 
        ?>
    </tbody>
</table>
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
