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
$username=$_SESSION['username'];
$status = mysqli_query($connection, "SELECT * FROM pendaftaran WHERE username='$username'");
$hasil = mysqli_fetch_array($status);
$id=$hasil['id_daftar'];
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-">
    <title>SIMAGANG</title>
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/simple-sidebar.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/script.js"></script>
    <script src="js/Chart.bundle.min.js"></script>
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
   <div>
            <h3 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-user fa-lg"></i> PROFILE</h3> 
            <div style="margin-top: 20px; justify-content: center;" class="container">
            <?php
            if($hasil['id_daftar']==null){
                echo "<script>alert('Anda belum daftar! Silahkan klik button DAFTAR');history.go(-1);</script>";
                echo "Anda belum mendaftar";
            }
            ?>
            <div style="font-size: 25px; font-family: arial; margin-left: 25px;">
            <strong>
            <?php echo $hasil['nama_ketua']?></br>
            </strong>
            </div>
            <div style="font-size: 20px; margin-left: 25px; font-family: calibri;">
            <table style="width: 65%; ">
                <tr style=" border-bottom: 1px solid silver; padding-top: 20px; ">
                    <td style="background-color: #E2E2E2; width: 15%; padding-left: 30px;"><strong>ID PENDAFTARAN</strong></td>
                    <td style="width: 0.5%;"></td>
                    <td style="width: 35%;"><?php echo $hasil['id_daftar']?></td>
                </tr>
               <tr style=" border-bottom: 1px solid silver; ">
                    <td style="background-color: #E2E2E2; width: 15%; padding-left: 30px;"><strong>NOMOR KTP</strong></td>
                    <td style="width: 0.5%;"></td>
                    <td style="width: 35%;"><?php echo $hasil['no_ktp']?></td>
                </tr>
                <tr style=" border-bottom: 1px solid silver; ">
                    <td style="background-color: #E2E2E2; width: 15%; padding-left: 30px;"><strong>TTL</strong></td>
                    <td style="width: 0.5%;"></td>
                    <td style="width: 35%;"><?php echo $hasil['tempat_lahir'],", ",$hasil['tanggal_lahir']?></td>
                </tr>
                <tr style=" border-bottom: 1px solid silver; ">
                    <td style="background-color: #E2E2E2; width: 15%; padding-left: 30px;"><strong>JENIS KELAMIN</strong></td>
                    <td style="width: 0.5%;"></td>
                    <td style="width: 35%;"><?php echo $hasil['kelamin']?></td>
                </tr>
                <tr style=" border-bottom: 1px solid silver; ">
                    <td style="background-color: #E2E2E2; width: 15%; padding-left: 30px;"><strong>ALAMAT</strong></td>
                    <td style="width: 0.5%;"></td>
                    <td style="width: 35%;"><?php echo $hasil['alamat']?></td>
                </tr>
                <tr style=" border-bottom: 1px solid silver; ">
                    <td style="background-color: #E2E2E2; width: 15%; padding-left: 30px;"><strong>EMAIL</strong></td>
                    <td style="width: 0.5%;"></td>
                    <td style="width: 35%;"><?php echo $hasil['email']?></td>
                </tr>
                <tr style=" border-bottom: 1px solid silver; ">
                    <td style="background-color: #E2E2E2; width: 15%; padding-left: 30px;"><strong>NOMOR TELEPON</strong></td>
                    <td style="width: 0.5%;"></td>
                    <td style="width: 35%;"><?php echo $hasil['no_tlp']?></td>
                </tr>
                <tr style=" border-bottom: 1px solid silver; ">
                    <td style="background-color: #E2E2E2; width: 15%; padding-left: 30px;"><strong>INSTANSI</strong></td>
                    <td style="width: 0.5%;"></td>
                    <td style="width: 35%;"><?php echo $hasil['instansi']?></td>
                </tr>
                <tr style=" border-bottom: 1px solid silver; ">
                    <td style="background-color:#E2E2E2; width: 15%; padding-left: 30px;"><strong>MASA MAGANG</strong></td>
                    <td style="width: 0.5%;"></td>
                    <td style="width: 35%;"><?php echo $hasil['tgl_masuk']," - ",$hasil['tgl_selesai']?></td>
                </tr>
                <tr style=" border-bottom: 1px solid silver; ">
                    <td style="background-color: #E2E2E2; width: 15%; padding-left: 30px;"><strong>POSISI</strong></td>
                    <td style="width: 0.5%;"></td>
                    <td style="width: 35%;"><?php echo $hasil['posisi']?></td>
                </tr>
            </table>
            </div>
            <div style="margin-top: 20px; margin-left: 920px;"><a href="?page=editdaftar&id=<?php echo $hasil['id_daftar']; ?>" class=" btn btn-info badge-info" >Edit Data</a></div>
            <div style="font-size: 20px; margin-left: 25px; font-family: calibri; margin-top: 50px;">
            <strong><h3>Daftar Anggota Kelompok</h3></strong>
                <table border="1" width="1000px" cellpadding="10px">
                <tr style="background-color: #E2E2E2;"><th>No<th>Nama<th>Nomor KTP<th>TTL<th width="5000px">Alamat<th>Email<th>Telepon<th>Kartu Identitas<th>Hapus</tr>
                <?php
                $data=mysqli_query($connection,"select * from peserta where id_daftar='$id'");
                $no=1;
                while($data2=mysqli_fetch_array($data)){
            ?>
                    <tr>
                    <td><?= $no ?>
                    <td><?= $data2['namaa'];?>
                    <td><?= $data2['no_ktpa'];?>
                    <td><?= $data2['tempat_lahira'],"-" ,$data2['tanggal_lahira'];?>
                    <td><?= $data2['alamata'];?>
                    <td><?= $data2['emaila'];?>
                    <td><?= $data2['no_tlpa'];?>
                    <td><a href="lihat.php?user=<?php echo $data2['uploadktp']; ?>" id="btnlihatbukti"
                    class=" btn btn-info badge-info" data-toggle="modal" data-target="#lihatbukti">Lihat</a></td>
                    <td style="text-align: center;"><button class="btn badge-info" onclick="hapus(<?php echo"'$data2[id_peserta]'";  ?>,<?php echo"'$hasil[status]'";  ?>)">Hapus</button></td>
                    </tr>
                    <?php
                    $no++;
                }
                ?>
            </table>

            </div>
            </div>           
</div>
</body>
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
function hapus(id_peserta,status){
    if(status=='Belum Daftar' || status=='Menunggu Konfirmasi Admin' ){
        var jawab=confirm("Anda yakin menghapus ?");
        if(jawab==true ){
            document.location="proses_hapuspeserta.php?id_peserta="+id_peserta;
            }
        }else
        alert ('Maaf Sudah Tidak Dapat dihapus');
}
</script>