<?php
$id = abs(escape($_GET['id']));
if (delete('tb_truk', $id)) {
	echo alert('Data truk berhasil dihapus!', '?page=data_truk');
} else {
	echo alert('Data truk gagal dihapus!', '?page=data_truk');
}

?>