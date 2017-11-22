<?php
$sql_id = select('MAX(id) as ID', 'tb_registrasi');
$data = mysqli_fetch_object($sql_id);
$id = (int) $data->ID+1;

$pilihan = array("Truk tronton","Peti kemas", "Truk Box", "Truk tangki" , "Trailer" , "Dump truk" , "Truk Gandeng" , "Truk engkel", "Losbak","Kontainer");
?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form action="" method="post" class="form-group">
			<label for="id">No. Identitas</label>
			<input type="text" name="id" class="form-control" placeholder="Nomor Identitas" readonly="on" value="<?= $id; ?>">
			<br>

			<label for="nopol">Nomor Polisi</label>
			<input type="text" name="nopol" class="form-control" placeholder="Nomor Polisi">
			<br>

			<label for="nama_lengkap">Nama Lengkap</label>
			<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
			<br>

			<label for="type">Tipe</label>
			<select name="type" class="form-control">
				<option value="">-- Pilih Tipe Truk --</option>
				<?php foreach ($pilihan as $pil) {
					echo "<option value='$pil'>$pil</option>";
				} ?>
			</select>
			<br>
			
			<label for="barang">Barang</label>
			<input type="text" name="barang" class="form-control" placeholder="Barang">
			<br>

			<div class="row">
				<div class="col-md-6">
					<label for="jam_masuk">Jam Masuk</label>
					<div class="input-group date" id="time-picker1">
						<input type="text" name="jam_masuk" class="form-control" placeholder="MM:ss">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" name="select-time1"><i class="glyphicon glyphicon-time"></i></button>
						</span>
					</div>
				</div>
				<div class="col-md-6">
					<label for="jam_keluar">Jam Keluar</label>
					<div class="input-group time" id="time-picker2">
						<input type="text" name="jam_keluar" class="form-control" placeholder="MM:ss" disabled>
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" name="select-time2"><i class="glyphicon glyphicon-time"></i></button>
						</span>
					</div>
				</div>
			</div>
			<br>

			<input type="submit" class="btn btn-primary" name="submit" value="Simpan">
			<a href="?page=registrasi" class="btn btn-default">Kembali</a>
		</form>
	</div>
</div>

<?php

if (isset($_POST['submit'])) {

	$id = escape($_POST['id']);
	$nopol = escape($_POST['nopol']);
	$nama_lengkap = escape($_POST['nama_lengkap']);
	$type = escape($_POST['type']);
	$barang = escape($_POST['barang']);
	$jam_masuk = escape($_POST['jam_masuk']);
	//$jam_keluar = escape($_POST['jam_keluar']);
	$tanggal = date('Y-m-d');

	if (empty(trim($id)) || empty(trim($nama_lengkap)) || empty(trim($type)) || empty(trim($nopol)) || empty(trim($barang)) || empty(trim($jam_masuk))) {
		echo alert('Form tidak boleh ada yang kosong!', '');
	} else {
		$insert = insert('tb_registrasi', "id, nopol, nama_lengkap, type, barang, jam_masuk, tanggal", "'$id', '$nopol', '$nama_lengkap', '$type', '$barang', '$jam_masuk', '$tanggal'");
		if ($insert) {
			echo alert('Tambah Registrasi Truk berhasil!', '?page=registrasi');
		} else {
			echo alert('Tambah Registrasi Truk gagal!', '');
		}
	}
}

?>