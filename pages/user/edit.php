<?php
$user = isset($_SESSION['admin']) ? $_SESSION['admin'] : $_SESSION['operator'];
$sql_user = select('*', 'tb_user', "id = $user");
$usr = mysqli_fetch_object($sql_user);
?>

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form action="" method="post" class="form-group">
			<label for="nama_lengkap">Nama Lengkap</label>
			<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="<?= $usr->nama_lengkap; ?>">
			<br>

			<label for="jk">Jenis Kelamin</label>
			<select name="jk" class="form-control">
				<option value="">-- Pilih Jenis Kelamin --</option>
				<?php if($usr->jk == "L") : ?>
					<option value="L" selected>Laki-laki</option>
					<option value="P">Perempuan</option>
				<?php else : ?>
					<option value="L">Laki-laki</option>
					<option value="P" selected>Perempuan</option>
				<?php endif; ?>
			</select>
			<br>
			
			<label for="alamat">Alamat</label>
			<textarea name="alamat" rows="2" class="form-control" style="resize:none;"><?= $usr->alamat; ?></textarea>
			<br>

			<label for="username">Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username" value="<?= $usr->username; ?>">
			<br>

			<label for="password">Password</label>
			<div class="input-group">
				<input type="password" name="password" class="form-control" placeholder="Password">
				<span class="input-group-btn">
					<button class="btn btn-default" data-change="true" type="button" name="show-pass"><i class="glyphicon glyphicon-eye-close"></i></button>
				</span>
			</div>
			<p style="margin-top: 10px;">
				<em>Silahkan isi kolom <strong>password</strong>, jika <u>ingin mengganti password</u> atau <strong>kosongkan</strong> jika <u>tidak ingin menggati password</u></em>
			</p>
			<br>

			<input type="submit" name="edit" class="btn btn-primary" value="Simpan">
			<input type="reset" name="reset" class="btn btn-default" value="Batal">
		</form>
	</div>
</div>

<?php
if (isset($_POST['edit'])) {
	$nama_lengkap = escape($_POST['nama_lengkap']);
	$jk = escape($_POST['jk']);
	$alamat = escape($_POST['alamat']);
	$username = escape($_POST['username']);
	$password =escape($_POST['password']);

	if (empty(trim($nama_lengkap)) || empty(trim($jk)) || empty(trim($alamat)) || empty(trim($username))) {
		echo alert('Form tidak boleh ada yang kosong!', '');
	} else {
		if (!empty(trim($password))) {
			$pass_hash = password_hash($password, PASSWORD_DEFAULT);
			$update = update('tb_user', "nama_lengkap = '$nama_lengkap', jk = '$jk', alamat = '$alamat', username = '$username', password = '$pass_hash'", $usr->id);
		} else {
			$update = update('tb_user', "nama_lengkap = '$nama_lengkap', jk = '$jk', alamat = '$alamat', username = '$username'", $usr->id);
		}
		if ($update) {
			echo alert('Data profil user berhasil diubah!', '');
		} else {
			echo alert('Data profil user gagal diubah!', '');
		}
	}

}


?>