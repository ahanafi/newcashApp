<?php
$id = abs(escape($_GET['id']));
$sopir = select('*', 'tb_sopir', "id = $id");
$sp = mysqli_fetch_object($sopir);
?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form action="" method="post" class="form-group">
			<label for="id">No. Identitas</label>
			<input type="text" name="id" class="form-control" readonly="on" value="<?= $id; ?>">
			<br>

			<label for="nopol">Nama Lengkap</label>
			<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="<?= $sp->nama_lengkap; ?>">
			<br>

			<label for="jk">Jenis Kelamin</label>
			<select name="jk" class="form-control">
				<option value="">-- Pilih Jenis Kelamin --</option>
				<?php if($sp->jk == "L") : ?>
					<option value="L" selected>Laki-laki</option>
					<option value="P">Perempuan</option>
				<?php else : ?>
					<option value="L">Laki-laki</option>
					<option value="P" selected>Perempuan</option>
				<?php endif; ?>
			</select>
			<br>
			
			<label for="alamat">Alamat</label>
			<textarea name="alamat" rows="2" class="form-control" style="resize:none;"><?= $sp->alamat; ?></textarea>
			<br>

			<input type="submit" class="btn btn-primary" name="submit" value="Simpan">
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
		$insert = update('tb_sopir', "nama_lengkap = '$nama_lengkap', jk = '$jk', alamat = '$alamat'", $id);
		if ($insert) {
			echo alert('Edit Data Sopir berhasil!', '?page=data_sopir');
		} else {
			echo alert('Edit Data Sopir gagal!', '');
		}
	}
}

?>