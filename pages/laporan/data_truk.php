<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="jumbotron" style="text-align: center;">
			<h1 style="font-size:24px;font-weight: bold;">Cetak Laporan <?php echo ucwords(strtolower(str_replace("_", " ", $_GET['act']))); ?></h1>
			<p style="font-size: 16px;">
				Silahkan klik tombol di bawah ini untuk mencetak laporan.
			</p>
			<a href="laporan/cetak_data_truk.php" class="btn btn-info" target="_blank">
				Print <i class="glyphicon glyphicon-print"></i>
			</a>
		</div>
	</div>
</div>