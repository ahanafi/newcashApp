<?php
$sql_reg = select('*', 'tb_registrasi');
/*$data = array(
	array(
		'id'	=> 1,
		'nopol'	=> 'E 2232 KY',
		'nama_lengkap'	=> 'Ahmad Kandeg',
		'type'	=> 'Motor',
		'barang'	=> 'Laptop',
		'jam_masuk'	=> '08:00',
		'jam_keluar'=> '09:00'
	),
	array(
		'id'	=> 2,
		'nopol'	=> 'E 3458 XC',
		'nama_lengkap'	=> 'Ahmad Ripai',
		'type'	=> 'Mobil',
		'barang'	=> 'Komputer',
		'jam_masuk'	=> '10:00',
		'jam_keluar'=> '12:00'
	),
	array(
		'id'	=> 3,
		'nopol'	=> 'AB 322 WD',
		'nama_lengkap'	=> 'Chaniago',
		'type'	=> 'Kontainer',
		'barang'	=> 'Monitor',
		'jam_masuk'	=> '07:00',
		'jam_keluar'=> '09:00'
	),
);*/

?>

<div class="row">
	<div class="col-md-12">
		<table class="table table-responsive table-striped table-bordered" id="data">
			<thead>
				<tr class="info">
					<th class="ctr" rowspan="2">No.</th>
					<th class="ctr" rowspan="2">No. Id</th>
					<th class="ctr" rowspan="2">Nopol</th>
					<th rowspan="2" class="ctr">Nama Lengkap</th>
					<th class="ctr" rowspan="2">type</th>
					<th rowspan="2" class="ctr">Barang</th>
					<th colspan="2" class="ctr">Jam</th>
					<th class="ctr" rowspan="2">Aksi</th>
				</tr>
				<tr class="info">
					<th class="ctr">Keluar</th>
					<th class="ctr">Masuk</th>
				</tr>
			</thead>
			<tbody>
				<?php if(cekRow($sql_reg) > 0): ?>
					<?php while($d = mysqli_fetch_array($sql_reg)): ?>
					<tr>
						<td class="ctr"><?= $no++; ?></td>
						<td class="ctr"><?= $d['id']; ?></td>
						<td class="ctr"><?= $d['nopol']; ?></td>
						<td class="ctr"><?= $d['nama_lengkap']; ?></td>
						<td class="ctr"><?= $d['type']; ?></td>
						<td class="ctr"><?= $d['barang']; ?></td>
						<td class="ctr"><?= $d['jam_masuk']; ?></td>
						<td class="ctr"><?= $d['jam_keluar']; ?></td>
						<td class="ctr">
							<a href="?page=registrasi&act=edit&id=<?= $d['id']; ?>" class="btn btn-sm btn-success">Edit</a>
							<a href="?page=registrasi&act=hapus&id=<?= $d['id']; ?>" class="btn btn-sm btn-danger" onclick="return konfirmasi()">Hapus</a>
						</td>
					</tr>
					<?php endwhile; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>