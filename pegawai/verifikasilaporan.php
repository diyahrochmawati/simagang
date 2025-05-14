<?php 
include "connect.php";
require_once 'connect.php';
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernameadmin'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['usernameadmin'];   
}
$id_daftar=$_GET['id_daftar'];
?>

<div class="modal-body">
    <form action="prosesverifikasilaporan.php" method="post" class="form-group" id="formverifikasi" name="verifikasi" >
        <label for="">ID Pendaftaran</label>
        <input type="text" class="form-control" name="id_daftar" value="<?= $id_daftar; ?>" readonly>
        <label for="">Status</label>
        <select class="custom-select" name="status" id="">
            <option disabled="yes" selected>Select one</option>
            <option value="Verifikasi Laporan Bagian">Kirim ke Bagian</option>
            <option value="Silahkan Revisi Laporan">Silahkan Revisi Laporan</option> 
        </select>
        <label for="">Keterangan Revisi</label><br/>
        <textarea name="ket_revisi" rows="5" cols="40" class="form-control"></textarea>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" form="formverifikasi" name="verifikasi" class="btn bg-info text-light">Verifikasi</button>
</div>

