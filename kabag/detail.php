<?php 
require_once '../pegawai/connect.php';
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernamekabag'])) {
    header('location:../pegawai/login.php');
} else {
    $username=$_SESSION['usernamekabag'];    
}
$user=$_GET["user"];
$cekuser = mysqli_query($connection, "SELECT * FROM pendaftaran WHERE username = '$user'");
$jumlah = mysqli_num_rows($cekuser);
$hasil = mysqli_fetch_array($cekuser);
?>

<div class="modal-body">
	<table> 
		<tr>
			<th>ID Daftar</th>
			<th> :  </th>
			<td><?php echo $hasil['id_daftar']; ?></td>
		</tr>
        <tr>
			<th>Posisi</th>
			<th> :  </th>
			<td><?php echo $hasil['posisi']; ?></td>
		</tr>
		<tr>
			<th>Status</th>
			<th> :  </th>
			<td><?php echo $hasil['status']; ?></td>
		</tr>
		<tr>
			<th>Jumlah Peserta</th>
			<th> :  </th>
			<td><?php echo $hasil['jml_peserta']; ?></td>
		</tr>
		<tr>
			<th>No Identitas</th>
			<th> :  </th>
			<td><?php echo $hasil['no_ktp']; ?></td>
		</tr>
		<tr>
			<th>Nama Ketua</th>
			<th> :  </th>
			<td><?php echo $hasil['nama_ketua']?></td>
		</tr>
		<tr>
			<th>TTL</th>
			<th> :  </th>
			<td><?php echo $hasil['tempat_lahir'], ",  ", $hasil['tanggal_lahir']; ?></td>
		</tr>
		<tr>
			<th>Jenis Kelamin</th>
			<th> :  </th>
			<td><?php echo $hasil['kelamin']; ?></td>
		</tr>
		<tr>
			<th>Alamat</th>
			<th> :  </th>
			<td><?php echo $hasil['alamat']; ?></td>
		</tr>
		<tr>
			<th>E-mail
			<th> :  </th>
			<td><?php echo $hasil['email']; ?></td>
		</tr>
		<tr>
			<th>No hp</th>
			<th> :  </th>
			<td><?php echo $hasil['no_tlp']; ?></td>
		</tr>
		<tr>
			<th>Jenjang</th>
			<th> :  </th>
			<td><?php echo $hasil['jenjang']; ?></td>
		</tr>
		<tr>
			<th>Instansi</th>
			<th> :  </th>
			<td><?php echo $hasil['instansi']; ?></td>
		</tr>
		<tr>
			<th>Jurusan</th>
			<th> :  </th>
			<td><?php echo $hasil['jurusan']; ?></td>
		</tr>
		<tr>
			<th>Tanggal Magang</th>
			<th> :  </th>
			<td><?php echo $hasil['tgl_masuk'], " - ", $hasil['tgl_selesai']; ?></td>
		</tr>
	</table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>