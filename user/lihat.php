<?php 
require_once 'connect.php';
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['username'];    
}
$user=$_GET["user"];
?>

<div class="modal-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                
                <div class="row p-3 mb-3">
                    <div class="col">
                        <img src="../user/dokumen/ktp/<?= $user; ?>" class=" img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>