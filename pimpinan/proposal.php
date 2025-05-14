<?php 
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
<body>
<center>
<?php
    $username=$_GET['act'];
?>
    <embed style="width: 100%; height: 700px;"  src="../user/dokumen/proposal/<?php echo $username;?>"></embed>
</center>
</body>