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
<body>
<center>

    <embed style="width: 100%; height: 700px;"  src="../user/dokumen/suratacc/<?php echo $user;?>"></embed>
</center>
</body>