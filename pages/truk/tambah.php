<?php
$sql_id = select("MAX(id) as id", 'tb_truk');
$data_id = mysqli_fetch_object($sql_id);
$id = (int) $data_id->id+1;
$pilihan = array("Truk tronton","Peti kemas", "Truk Box", "Truk tangki" , "Trailer" , "Dump truk" , "Truk Gandeng" , "Truk engkel", "Losbak","Kontainer");
?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form action="" method="post" class="form-group">
			<label for="id">No. Identitas</label>
			<input type="text" name="id" class="form-control" readonly="on" value="<?= $id; ?>">
			<br>

			<label for="nopol">Nomor Polisi</label>
			<input type="text" name="nopol" class="form-control" placeholder="Nomor Polisi">
			<br>

			<label for="transporter">Transporter</label>
			<input type="text" name="transporter" class="form-control" placeholder="Transporter">
			<br>

			<label for="type">Tipe</label>
			<select name="type" class="form-control">
				<option value="">-- Pilih Tipe Truk --</option>
				<?php foreach ($pilihan as $pil) {
					echo "<option value='$pil'>$pil</option>";
				} ?>
			</select>
			<br>

			<input type="submit" class="btn btn-primary" name="submit" value="Simpan">
		</form>
	</div>
</div>

<?php

if (isset($_POST['submit'])) {

	$id = escape($_POST['id']);
	$nopol = escape($_POST['nopol']);
	$transporter = escape($_POST['transporter']);
	$type = escape($_POST['type']);

	if (empty(trim($id)) || empty(trim($nopol)) || empty(trim($type))) {
		echo alert('Form tidak boleh ada yang kosong!', '');
	} else {
		$insert = insert('tb_truk', "id, nopol, transporter, type", "$id, '$nopol', '$transporter', '$type'");
		if ($insert) {
			echo alert('Tambah Data Truk berhasil!', '?page=data_truk');
		} else {
			echo alert('Tambah Data Truk gagal!', '');
		}
	}
}

?>