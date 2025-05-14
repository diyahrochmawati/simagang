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
<h3 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-user fa-lg"></i>&nbspData Peserta</h3> 
<div style="padding-bottom: 10px;">
<form action="" method="post" > 
<strong><i style="color: #616161; font-style: normal;">Cari</i> </strong><input class="iniinput" type="text" name="tekscari" size="24" />
<select class="iniselect"  name="filter">
<option value="nama">Nama</option>
<option value="id_daftar">ID Daftar</option>
<option value="alamat">Alamat</option>

</select>
<input style="background-color: grey; " type="submit" name="cari" value="Cari" class="btn badge-info"/>
<input style="background-color: grey; " type="submit" name="semua" value="Tampilkan Semua" class="btn badge-info"/>
</form>
</div>
<table class="table table-striped table-bordered text-center" >
    <thead class="thead-dark">
        <tr>
            <th>No<th>ID Daftar<th>Nama<th>Kelamin<th>Alamat<th>E-mail<th>No hp<th>Jurusan<th>Identitas
        </tr>
    </thead>
    <tbody>
              <?php
        $data="";
        if(isset($_POST["cari"])){
            $cari=$_POST["tekscari"];
            $filter=$_POST["filter"];
                if ($filter=="id_daftar"){
                $data=mysqli_query($connection,"select * from peserta where id_daftar like '%$cari%'");
                }elseif($filter=="nama"){
                $data=mysqli_query($connection,"select * from peserta where namaa like '%$cari%'");    
                }else{
                $data=mysqli_query($connection,"select * from peserta where alamata like '%$cari%'");  
                }       
            }else{
            $data=mysqli_query($connection,"select * from peserta");
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
                <?= $data2['namaa']; ?>
            </td>
            <td>
                <?= $data2['kelamina']; ?>
            </td>
            <td>
                <?= $data2['alamata']; ?>
            </td>
            <td>
                <?= $data2['emaila']; ?>
            </td>
            <td>
                <?= $data2['no_tlpa']; ?>
            </td>
            <td>
                <?= $data2['jurusana']; ?>
            </td>
            <td><a href="lihat.php?user=<?php echo $data2['uploadktp']; ?>" id="btnlihatbukti"
            class=" btn btn-info badge-info" data-toggle="modal" data-target="#lihatbukti">Lihat</a></td>
        </tr>
        <?php
        $no++;
        } 
        ?>
    </tbody>
</table>
</html>
<div class="modal fade" id="lihatbukti" role="dialog" tabindex="-1" aria-labelledby="lihatbukti" aria-hidden="true">
    <div style="padding-top: 40px;" class="modal-dialog modal-dialog-centered" role="dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light">Kartu Identitas</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="changebukti">
                <div class="modal-body" id="bodylihat">
                    <h1></h1>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script language="javascript">
    $(document).ready(function () {
        $('a#btnlihatbukti').click(function () {
            var url = $(this).attr('href');
            $.ajax({
                url: url,
                success: function (data) {
                    $('#changebukti').html(data);
                }
            });
        });

    });
</script>
<script type="text/javascript">
function hapus(id_peserta){
    var jawab=confirm("Anda yakin menghapus ?");
    if(jawab==true){
        document.location="proses_hapuspeserta.php?id_peserta="+id_peserta;
    }
}
</script>
