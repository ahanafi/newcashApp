<?php
$id = abs(escape($_GET['id']));
if (delete('tb_sopir', $id)) {
	echo alert('Data sopir berhasil dihapus!', '?page=data_sopir');
} else {
	echo alert('Data sopir gagal dihapus!', '?page=data_sopir');
}

?>