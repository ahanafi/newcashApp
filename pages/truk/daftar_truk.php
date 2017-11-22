<?php
$sql_truk = select('*', 'tb_truk');
?>
<div class="row">
	<div class="col-md-12">
		<table class="table table-responsive table-bordered table-striped" id="data">
			<thead>
				<tr class="info">
					<th class="ctr">No.</th>
					<th class="ctr">Id</th>
					<th class="ctr">Nopol</th>
					<th class="ctr">Transporter</th>
					<th>Tipe</th>
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
						<td class="ctr"><?= $tr->nopol; ?></td>
						<td class="ctr"><?= $tr->transporter; ?></td>
						<td><?= $tr->type; ?></td>
						<td class="ctr">
							<a href="?page=data_truk&act=edit&id=<?= $tr->id; ?>" class="btn btn-sm btn-success">Edit</a>
							<a href="?page=data_truk&act=hapus&id=<?= $tr->id; ?>" class="btn btn-sm btn-danger" onclick="return konfirmasi()">Hapus</a>
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