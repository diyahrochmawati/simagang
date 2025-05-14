<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['username'];
}
?>
<body>
<center>
<div class="judul">Surat Penerimaan</div>

<?php
    if ($hasil['surat_acc']==null){
?>
    </br><h4>Surat anda belum dikirim, tunggu hingga ada kotak masuk surat ACC</h4></br>
<?php 
    } else {
?>
    Download <a href="dokumen/suratacc/<?php echo $hasil['surat_acc'];?>">Disini</a>
    <embed style="width: 100%; height:700px;"  src="dokumen/suratacc/<?php echo $hasil['surat_acc'];?>"></embed>
<?php 
    } 
?>
</center>
</body>