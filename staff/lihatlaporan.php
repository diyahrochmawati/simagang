<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernamestaff'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['usernamestaff'];    
}
    $user=$_GET['act'];
?>
<!DOCTYPE HTML>
<html>
<body>
<h3 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-file-archive fa-lg"></i> LAPORAN</h3>
    <embed style="width: 100%; height: 700px;"  src="../user/dokumen/laporan/<?php echo $user;?>" type="application/pdf" width="100%" height="1180px"></embed>
</body>
</html>