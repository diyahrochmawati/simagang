<?php 
include "../pegawai/connect.php";
require_once '../pegawai/connect.php';
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernamepimpinan'])) {
    header('location:../pegawai/login.php');
} else {
    $username=$_SESSION['usernamepimpinan'];
    $posisipimpinan=$_SESSION['posisipimpinan'];    
}
$id_daftar=$_GET['user'];
?>
<div class="modal-body">
    <form action="proses_confirm.php" method="post" class="form-group" id="formkonfirmasi">
        <label for="">ID Pendaftaran</label>
        <input type="text" class="form-control" name="id_daftar" value="<?= $id_daftar; ?>" readonly>
        <label for="">Status</label>
        <select class="custom-select" name="status" id="">
            <option disabled selected>Select one</option>
            <option value="Magang Diterima">Magang Diterima</option>
            <option value="Magang Ditolak">Magang Ditolak</option>
        </select>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" form="formkonfirmasi" name="konfirmasi" class="btn bg-info text-light">Konfirmasi</button>
</div>