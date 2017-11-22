<?php
$sql_truk = select('*', 'tb_sopir');
?>
<div class="row">
	<div class="col-md-12">
		<table class="table table-responsive table-bordered table-striped" id="data">
			<thead>
				<tr class="info">
					<th class="ctr">No.</th>
					<th class="ctr">Nomor Id</th>
					<th>Nama Lengkap</th>
					<th class="ctr">Jenis Kelamin</th>
					<th>Alamat</th>
					<th class="ctr">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if (cekRow($sql_truk) > 0) {
						while ($tr = mysqli_fetch_object($sql_truk)) {
				?>
					<tr>
						<td class="ctr"><?= $no++; ?></td>
						<td class="ctr"><?= $tr->id; ?></td>
						<td class="ctr"><?= $tr->nama_lengkap; ?></td>
						<td class="ctr"><?= ($tr->jk == "L") ? "Laki-laki" : "Perempuan"; ?></td>
						<td><?= $tr->alamat; ?></td>
						<td class="ctr">
							<a href="?page=data_sopir&act=edit&id=<?= $tr->id; ?>" class="btn btn-sm btn-success">Edit</a>
							<a href="?page=data_sopir&act=hapus&id=<?= $tr->id; ?>" class="btn btn-sm btn-danger" onclick="return konfirmasi()">Hapus</a>
						</td>
					</tr>
				<?php
						}
					}

				?>
			</tbody>
		</table>
	</div>
</div>