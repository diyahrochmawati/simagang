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
$user=$_GET['act'];
?>
<!DOCTYPE HTML>
<html>
<body>
<h3 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-file-archive fa-lg"></i> PROPOSAL</h3>
    <embed style="width: 100%; height: 700px;"  src="../user/dokumen/proposal/<?php echo $user;?>" type="application/pdf" width="100%" height="1180px"></embed>
</body>
</html>