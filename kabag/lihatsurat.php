<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernamekabag'])) {
    header('location:../pegawai/login.php');
} else {
    $username=$_SESSION['usernamekabag'];    
}
    $user=$_GET['act'];
?>
<!DOCTYPE HTML>
<html>
<body>
<?php
    $username=$_GET['act'];
    if($username==null){
    echo "<script>alert('Peserta Belum Upload');history.go(-1);</script>";
    }
    else{
?>
<h3 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-file-archive fa-lg"></i> SURAT ACC</h3>
    <embed style="width: 100%; height: 700px;"  src="../user/dokumen/suratacc/<?php echo $user;?>" type="application/pdf" width="100%" height="1180px"></embed>
<?php } ?>
</body>
</html>