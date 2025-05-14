<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernamestaff'])) {
    header('location:../pegawai/login.php');
} else {
    $username=$_SESSION['usernamestaff'];
}
    $user=$_GET['act'];
?>
<body>
<center>
    <embed style="width: 100%; height: 700px;"  src="../user/dokumen/laporan/<?php echo $user;?>"></embed>
</center>
</body>