<?php 
require_once("../pegawai/connect.php");

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernamepimpinan'])) {
    header('location:../pegawai/login.php');
} else {
    $username=$_SESSION['usernamepimpinan'];
    $posisipimpinan=$_SESSION['posisipimpinan'];     
}
?>

<?php
if(isset($_POST["Upload"])) {
$id_daftar=$_POST["id_daftar"];
$target_dir = "../user/dokumen/nilai/";
$temp = explode(".", $_FILES["fileToUpload"]["name"]);//untuk mengambil nama file gambarnya saja tanpa format gambarnya
$nama_baru=round(microtime(true)) . '.' . end($temp);
$target_file = $target_dir . $nama_baru;
$uploadOk = 1;
$imageFileType = strtolower (end($temp));
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
        mysqli_query($connection,"update pendaftaran set nilai='$nama_baru', status='Menunggu ACC Nilai' where id_daftar='$id_daftar'");
    } else {
        echo "<div class='alert alert-danger position-relative'style='top:10px'>Maaf, Tidak terupload</div>";
        header('location:index.php?page=penilaian');
    }
}
}

$reg="";
if (isset($_POST['pendaftaran'])) {
    if (registrasi($_POST)) {
        $reg='sukses';
    } else {
        $reg='gagal';
    }
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
<h5 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-exclamation-triangle"></i>&nbspPenilaian</h5> 
<div style="padding-bottom: 10px;">
<form action="" method="post" > 
<strong><i style="color: #616161; font-style: normal;">Cari</i> </strong><input class="iniinput" type="text" name="tekscari" size="24" />
<select class="iniselect"  name="filter">
<option value="nama_ketua">Nama</option>
<option value="status">Status</option>
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
            <th>No<th>Nama<th>Status<th>Instansi<th>Jurusan<th>Download Form Penilaian<th>Upload Nilai (.docx)<th>Detail
        </tr>
    </thead>
    <tbody>
              <?php
        $data3="";
        if(isset($_POST["cari2"])){
            $cari2=$_POST["tekscari2"];
            $filter2=$_POST["filter2"];
                if ($filter2=="id_daftar"){
                $data3=mysqli_query($connection,"select * from pendaftaran where (status='Menunggu Nilai' and nilai='') nama_ketua like '%$cari2%'");
                }elseif($filter2=="instansi"){
                $data3=mysqli_query($connection,"select * from pendaftaran where (status='Menunggu Nilai' and nilai='') status like '%$cari2%'");
                }elseif($filter2=="nama"){
                $data3=mysqli_query($connection,"select * from pendaftaran where (status='Menunggu Nilai' and nilai='') id_daftar like '%$cari2%'");
                }else{
                $data3=mysqli_query($connection,"select * from pendaftaran where  (status='Menunggu Nilai' and nilai='') instansi like '%$cari2%'");
                }
            }else{    
        $data3=mysqli_query($connection,"SELECT * FROM pendaftaran WHERE status = 'Menunggu Nilai' and nilai=''");
    }
        $no=1;
        while($data2=mysqli_fetch_array($data3)){
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
            <td>
                <?= $data2['jurusan']; ?>
            </td>
            <td><a class="btn badge-info" href="../user/dokumen/formnilai/<?=$data2['formnilai']?>">Download</a></td>
            <td>
                <div>                
                    <form action="" method="post" enctype="multipart/form-data" >     
                    <input type="hidden" name="id_daftar" value="<?php echo $data2['id_daftar']; ?>" />
                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" /><br /> 
                    <input style="margin-top: -30px;" type="submit" name="Upload" value="Upload" class="btn bg-2 text-light border-0 pr-4 pl-7 pt-2 pb-2"/>
                    </form>
                </div>
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

</br>
<h5 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-folder fa-lg"></i>&nbspReport Penilaian</h5> 
<div style="padding-bottom: 10px;">
<form action="" method="post" > 
<strong><i style="color: #616161; font-style: normal;">Cari</i> </strong><input class="iniinput" type="text" name="tekscari2" size="24" />
<select class="iniselect"  name="filter2">
<option value="nama_ketua">Nama</option>
<option value="status">Status</option>
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
            <th>No<th>ID Daftar<th>Status<th>Nama<th>Instansi<th>Jurusan<th>Tgl Magang<th>Nilai<th>Detail
        </tr>
    </thead>
    <tbody>
        <?php
        $data3="";
        if(isset($_POST["cari2"])){
            $cari2=$_POST["tekscari2"];
            $filter2=$_POST["filter2"];
                if ($filter2=="id_daftar"){
                $data3=mysqli_query($connection,"select * from pendaftaran where (status='Menunggu ACC Nilai' and nilai!='') and id_daftar like '%$cari2%'");
                }elseif($filter2=="instansi"){
                $data3=mysqli_query($connection,"select * from pendaftaran where (status='Menunggu ACC Nilai' and nilai!='') and instansi like '%$cari2%'");    
                }elseif($filter2=="nama"){
                $data3=mysqli_query($connection,"sselect * from pendaftaran where (status='Menunggu ACC Nilai' and nilai!='') and nama_ketua like '%$cari2%'");    
                }else{
                $data3=mysqli_query($connection,"select * from pendaftaran where (status='Menunggu ACC Nilai' and nilai!='') and status like '%$cari2%'");   
                }
            }else{    
        $data3=mysqli_query($connection,"SELECT * FROM pendaftaran WHERE STATUS='Menunggu ACC Nilai' and nilai!=''");
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
            <td><a class="btn badge-info" href="../user/dokumen/nilai/<?= $data4['nilai']; ?>">Download</a></td>
            <td><a href="detail.php?user=<?php echo $data4['username']; ?>" id="btndetail"
            class=" btn btn-info badge-info" data-toggle="modal" data-target="#detail">Detail</a></td>
            
          </tr>
        <?php
        $nomor++;
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