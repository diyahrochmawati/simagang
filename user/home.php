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
$kotakmasuk = mysqli_query($connection, "SELECT surat_acc FROM pendaftaran WHERE username='$username'");
$jumlah = mysqli_num_rows($kotakmasuk);
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
            width: 350px;
        }
        
    </style>
</head>
<body>
   <div>
            <h3 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-home fa-lg"></i> HOME</h3> 
    <div class="navbar" style="margin-top: 50px; justify-content: center;">
    <table style="text-align: center; margin: 0px 0px 0px 0px;" >
    <tr>
    <td>
        <div class="circle-wrap">
            <div class="stats-circle blue-color">
                <i class="fas fa-check-circle  fa-lg"></i>
              </div>
        </div>
    </td>
    <td>
        <div class="circle-wrap">
            <div class="stats-circle green-color">
              <i class="fas fa-calendar-check fa-lg"></i> 
              </div>
        </div>
    </td>
    <td>
        <div class="circle-wrap">
            <div class="stats-circle gray-color">
              <i class="fas fa-map-pin fa-lg"></i> 
              </div>
        </div>
    </td>
    <td>
        <div class="circle-wrap">
            <div class="stats-circle purple-color">
              <i class="fas fa-envelope-open-text fa-lg"></i>
              </div>
        </div>
    </td>
    <td>
        <div class="circle-wrap">
            <div class="stats-circle red-color">
              <i class="fas fa-file-word fa-lg"></i>
              </div>
        </div>
    </td>
    </tr>
    <tr>
    <td>
        <strong>STATUS ANDA</strong>&nbsp;
    </td>
    <td>
        <strong>MASA MAGANG</strong>&nbsp;
    </td>
    <td>
        <strong>PENEMPATAN</strong>&nbsp;
    </td>
    <td>
        <strong>KOTAK MASUK</strong>&nbsp;
    </td>
    <td>
        <strong>LAPORAN</strong>&nbsp;
    </td>
    </tr>
    <tr>
    <td>
    <?php if ($hasil['id_daftar'] != null){
            if($hasil['status']=='Menunggu Konfirmasi Admin' || $hasil['status']=='Menunggu Konfirm SDM' || $hasil['status']=='Menunggu Konfirm KABAG SDM' || $hasil['status']=='Menunggu Konfirm BAGIAN' || $hasil['status']=='Magang Diterima' || $hasil['status']=='Menunggu ACC SDM'  || $hasil['status']=='Menunggu ACC KABAG SDM'  ){
                echo "Menunggu Konfirmasi";
            }else if ($hasil['status']=='ACC Magang'){
                echo "Magang Diterima";
            }else if ($hasil['status']=='Magang Ditolak'){
                echo "Tidak Diterima";
            }else if ($hasil['status']=='Verifikasi Laporan Admin' || $hasil['status']=='Verifikasi Laporan BAGIAN'){
                echo "Verifikasi Laporan";
            }else if ($hasil['status']=='Menunggu Nilai' || $hasil['status']=='Menunggu ACC Nilai'){
                echo "Menunggu Nilai";
            }else if ($hasil['status']=='Silahkan Revisi Laporan'){
                echo "Silahkan Revisi Laporan";
            }else if ($hasil['status']=='Legalitas Laporan'){
                echo "Legalitas Laporan";
            }else if ($hasil['status']=='Magang Selesai'){
                echo "Magang Selesai";
            }else 
                echo "Step 2";
                
    } else
        echo "Belum Daftar";
    ?> 
    </td>
    <td>
    <?php if ($hasil['id_daftar'] != null)
                echo $hasil['tgl_masuk']," sampai ",$hasil['tgl_selesai'];  
            else
                echo "Belum Daftar";
    ?>
    </td>
    <td>
    <?php if ($hasil['status']=='Belum Daftar' || $hasil['status']=='Menunggu Konfirmasi Admin' || $hasil['status']=='Menunggu Konfirm SDM' || $hasil['status']=='Menunggu Konfirm KABAG SDM' || $hasil['status']=='Menunggu Konfirm BAGIAN' || $hasil['status']=='Magang Diterima' || $hasil['status']=='Menunggu ACC SDM'  || $hasil['status']=='Menunggu ACC KABAG SDM')
                echo "Belum Ditempatkan";    
            else if ($hasil['status']=='Magang Ditolak')
                echo "Tidak Diterima";
            else
                echo $hasil['posisi'];
    ?> 
    </td>
    <td>
    <?php if($hasil['surat_acc'] != null && $hasil['nilai'] != null) {
                echo "Nilai Magang (1)"; 
            }else if ($hasil['surat_acc'] != null && $hasil['status']=='ACC Magang'){
                echo "Surat ACC (1)"; 
            }else {
                echo "Kosong";
            }
            ?>
    </td>
    <td>
    <?php if($hasil['status']=='Verifikasi Laporan Admin' || $hasil['status']=='Verifikasi Laporan BAGIAN' || $hasil['status']=='Menunggu Nilai'){
                echo "Proses Koreksi"; 
            }else if ($hasil['status']=='Silahkan Revisi Laporan'){
                echo "Upload Ulang Revisi"; 
            }else if ($hasil['status']=='Verifikasi ACC Nilai' || $hasil['status']=='Legalitas Laporan' || $hasil['status']=='Magang Selesai'){
                echo "Laporan Diterima"; 
            }
            else {
                echo "Belum Upload";
            }
            ?> 
    </td>
    </tr>
    <tr>
    <td colspan="5"><hr /></td>
    </tr>
    </table>
    
    </div>
        <div style="margin-top: 20px;"><img style="float: left;margin-top: 50px;"src="../img/daftar1.png"/>
            <div  class="judul" style="text-align: left;"><br />STEP 1 : Apakah Anda Sudah Daftar?</div>
            <p>Jika anda belum mendaftar maka klik tombol 'DAFTAR' di bawah ini dan Pantau Status Anda , yang perlu anda siapkan :
            </br>1. Scan KTP/Kartu Pelajar/Kartu Tanda Mahasiswa (.jpg max 2mb)
            </br>2. Scan Proposal Pengajuan (.pdf max 2mb)
            </br>Harap membaca dengan baik setiap petunjuk pendaftaran yang kami berikan. Untuk Lebih Detailnya lihat pada menu <a href="../index.php?page=petunjuk">Petunjuk </a>
            </br><a  href="?page=daftar" ><img  id="zooming" class="icon" src="../img/tomboldaftar.png"/></a>
            </p>
        </div>
        <div style="margin-top: 20px;"><img style="float: right;margin-top: 50px;"src="../img/acc.png"/>
             <div  class="judul" style="text-align: right;"><br />STEP 2 : Apakah Anda Berkelompok?</div>
            <p style="text-align: right;">Jika registrasi berhasil status anda berganti menjadi "Belum daftar"  maka segera lakukan penginputan <strong>semua anggota kelompok anda</strong>. Data Pendaftaran anda masih dapat di edit, jika anda ingin melakukan pengeditan maka buka menu profile dan klik tombol "Edit", data dapat di edit sebelum kami proses. Perlu anda siapkan :
            </br>1. Data diri dan data setiap anggota kelompok
            </br>2. Scan KTP/Kartu Pelajar/Kartu Tanda Mahasiswa (.jpg max 2mb) masing-masing peserta</br>
            </br>Klik tombol "INPUT DATA" ulangi langkah yang sama untuk masing-masing anggota. Status akan menjadi "Menunggu konfirmasi" dan data akan masuk pada kami. Tunggu hasil daftar anda dengan memantau status, jika status berubah "Magang Diterima" maka tunggu hingga ada kotak masuk surat penerimaan dari kami lihat pada menu "Dokumen saya" klik "Surat ACC". Namun,jika status menjadi "Ditolak" Mohon Maaf anda tidak diterima.
            </br><a href="?page=input" ><img id="zooming" class="icon" src="../img/input.png"/></a>
            </p>
            </div>
</div>
</body>
</html>