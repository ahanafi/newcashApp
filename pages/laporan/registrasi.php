<div class="row">
	<div class="col-md-6">
		<div class="jumbotron" style="text-align: center;">
			<h1 style="font-size:24px;font-weight: bold;">Cetak Laporan Semua <?php echo ucwords(strtolower(str_replace("_", " ", $_GET['act']))); ?></h1>
			<p style="font-size: 16px;">
				<em>Silahkan klik tombol di bawah ini untuk mencetak laporan.</em>
			</p>
			<a href="laporan/cetak_registrasi.php?data=all" class="btn btn-info" target="_blank">
				Print <i class="glyphicon glyphicon-print"></i>
			</a>
		</div>
	</div>
	<div class="col-md-6">
		<div class="jumbotron" style="text-align: center;">
			<h1 style="font-size:24px;font-weight: bold;">Cetak Laporan <?php echo ucwords(strtolower(str_replace("_", " ", $_GET['act']))); ?> Harian</h1>
			<p style="font-size: 16px;">
				<em>Silahkan pilih <strong>tanggal</strong>, kemudian klik <strong>Print</strong> untuk mencetak laporan.</em>
			</p>
			<form action="laporan/cetak_registrasi.php" method="get" class="form-group" style="margin-bottom: 0px;" target="_blank">
				<div class="row">
					<div class="col-md-9">
						<div class="input-group">
							<input type="text" name="tanggal" class="form-control" placeholder="YYYY-MM-DD">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button" name="select-date"><i class="glyphicon glyphicon-calendar"></i></button>
							</span>
						</div>
					</div> <!--  end of class col-md-8 -->
					<div class="col-md-3">
						<button type="submit" class="btn btn-info btn-block">
							Print <i class="glyphicon glyphicon-print"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>