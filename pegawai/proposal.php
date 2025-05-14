<?php if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernameadmin'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['usernameadmin'];    
}
?>
<html>
<body>
<center>
<?php
    $user=$_GET['act'];
?>
    <embed style="width: 100%; height: 700px;"  src="../user/dokumen/proposal/<?php echo $user;?>"></embed>
</center>
</body>
</html>