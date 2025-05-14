<? if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernameadmin'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['usernameadmin'];    
}
?>
<body>
<center>
<?php
    $username=$_GET['act'];
    if($username==null){
    echo "<script>alert('Peserta Belum Upload');history.go(-1);</script>";
    }
    
    else{
?>
    <embed style="width: 100%; height: 700px;"  src="../user/dokumen/formnilai/<?php echo $username;?>"></embed>
</center>
<?php } ?>
</body>