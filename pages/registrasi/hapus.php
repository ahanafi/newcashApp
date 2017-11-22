<?php
$id = abs(escape($_GET['id']));
if (delete('tb_registrasi', $id)) {
	echo alert('Data registrasi berhasil dihapus!', '?page=registrasi');
} else {
	echo alert('Data registrasi gagal dihapus!', '?page=registrasi');
}

?>