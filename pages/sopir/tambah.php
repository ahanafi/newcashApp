<?php
$sql_id = select("MAX(id) as id", 'tb_sopir');
$data_id = mysqli_fetch_object($sql_id);
$id = (int) $data_id->id+1;
?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form action="" method="post" class="form-group">
			<label for="id">No. Identitas</label>
			<input type="text" name="id" class="form-control" placeholder="Nomor Identitas">
			<br>

			<label for="nopol">Nama Lengkap</label>
			<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
			<br>

			<label for="jk">Jenis Kelamin</label>
			<select name="jk" class="form-control">
				<option value="">-- Pilih Jenis Kelamin --</option>
				<option value="L">Laki-laki</option>
				<option value="P">Perempuan</option>
			</select>
			<br>
			
			<label for="alamat">Alamat</label>
			<textarea name="alamat" rows="2" class="form-control" style="resize:none;"></textarea>
			<br>

			<input type="submit" class="btn btn-primary" name="submit" value="Simpan">
			<a href="?page=data_sopir" class="btn btn-default">Kembali</a>
		</form>
	</div>
</div>

<?php

if (isset($_POST['submit'])) {

	$id = escape($_POST['id']);
	$nama_lengkap = escape($_POST['nama_lengkap']);
	$jk = escape($_POST['jk']);
	$alamat = escape($_POST['alamat']);

	if (empty(trim($id)) || empty(trim($nama_lengkap)) || empty(trim($jk)) || empty(trim($alamat))) {
		echo alert('Form tidak boleh ada yang kosong!', '');
	} else {
		$insert = insert('tb_sopir', "id, nama_lengkap, jk, alamat", "$id, '$nama_lengkap', '$jk', '$alamat'");
		if ($insert) {
			echo alert('Tambah Data Sopir berhasil!', '?page=data_sopir');
		} else {
			echo alert('Tambah Data Sopir gagal!', '');
		}
	}
}

?>