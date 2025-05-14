<?php 
include "../pegawai/connect.php";
require_once '../pegawai/connect.php';
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernamekabag'])) {
    header('location:../pegawai/login.php');
} else {
    $username=$_SESSION['usernamekabag'];    
}
$id_daftar=$_GET['user'];
?>
<div class="modal-body">
    <form action="proses_confirm.php" method="post" class="form-group" id="formkonfirmasi">
        <label for="">ID Pendaftaran</label>
        <input type="text" class="form-control" name="id_daftar" value="<?= $id_daftar; ?>" readonly>
        <label for="">Status</label>
        <select class="custom-select" name="status" id="">
            <option selected>Select one</option>
            <option value="Menunggu pimpinan">Menunggu pimpinan</option>
            <option value="Ditolak">Ditolak</option>
        </select>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" form="formkonfirmasi" name="konfirmasi" class="btn bg-info text-light">Konfirmasi</button>
</div>