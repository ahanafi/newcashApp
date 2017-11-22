<?php
require_once '../function/init.php';
require_once '../plugins/dompdf/autoload.inc.php';

$tanggal = (isset($_GET['tanggal'])) ? $_GET['tanggal'] : '';
if($tanggal != '') :
	$tanggal = str_replace("-", "/", $tanggal);
	$sql_truk = select('*', 'tb_registrasi', "tanggal = '$tanggal'");
	$harian = "Harian";
else:
	$tanggal = '';
	$harian = $tanggal;
	$sql_truk = select('*', 'tb_registrasi');
endif;

use Dompdf\Dompdf;
use Dompdf\Options;

$html = "<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<title>Laporan Registrasi $harian </title>
</head>
<style>
	body{
		font-family: Arial, Sans-serif, Helvetica;		
	}
	header{
		font-size: 16px;
		text-align: center;
		margin:0 auto 30px auto !important;
	}
	header img{
		width: 20%;
		text-align: center !important;
		display:block;
	}
	.brands{
		margin:0px;
		font-size: 18px;
	}
	.brand-title{
		margin:0px !important;
		font-weight: bold;
	}
	.address-title{
		margin-top: 0px !important;
		font-size: 14px;
		font-weight: normal;
	}
	.ctr{
		text-align: center;
	}
	.table{
		border:1px solid red;
		font-size: 13px;
		border-color: #dedede;
		width: 100%;
		border-collapse: collapse;
	}
	.table thead{
		background-color: #2196f3;
		border-color: #2196f3;
		color: #fff;
	}
	.table tbody tr td{
		border-collapse: collapse;
	}
	tbody tr:nth-child(even){
		background: #F6F5FA;
	}
	.on, .date{		
		margin-top:10px;
		float: right;
		font-size: 13px;
		font-style: italic;
	}
	h3{
		margin:0px;
		font-size:17px;
		text-align:center;
	}
	.real-content{
		margin-top:90px;
	}
</style>
<body>
	<div id='main-content'>
		<header>
			<img src='../images/logo.png' alt='' class='img img-responsive'>
			<h1 class='brands'><strong>WINGS</strong> FOOD</h1>
			<h3 class='brand-title'>PT. KARUNIA ALAM SEGAR</h3>
			<h5 class='address-title'>Jl. Raya Sukomulyo Km. 24, Manyar, Gresik 61151</h5>
		</header>
		<br>
		<br>
		<div class='real-content'>
			<hr>
				<h3>Laporan Registrasi $harian</h3>
			<br>".
			$tanggal."
			<table class='table' border='' cellspacing='0' cellpadding='10'>
				<thead>
					<tr class='info'>
						<th class='ctr' rowspan='2'>No.</th>
						<th class='ctr' rowspan='2'>Nomor ID</th>
						<th class='ctr' rowspan='2'>Nopol</th>
						<th rowspan='2'>Nama Lengkap</th>
						<th class='ctr' rowspan='2'>Type</th>
						<th class='ctr' rowspan='2'>Barang</th>
						<th colspan='2' class='ctr'>Jam</th>
					</tr>
					<tr>
						<td class='ctr'>Masuk</td>
						<td class='ctr'>Keluar</td>
					</tr>
				</thead>
				<tbody>";
					if (cekRow($sql_truk) > 0) :
						while ($tr = mysqli_fetch_object($sql_truk)) :

$html .=				"<tr>
							<td class='ctr'>".$no++."</td>
							<td class='ctr'>".$tr->id."</td>
							<td class='ctr'>".$tr->nopol."</td>
							<td>".$tr->nama_lengkap."</td>
							<td class='ctr'>".$tr->type."</td>
							<td class='ctr'>".$tr->barang."</td>
							<td class='ctr'>".$tr->jam_masuk."</td>
							<td class='ctr'>".$tr->jam_keluar."</td>
						</tr>";
						endwhile;
					endif;

$date = date('Y/m/d');
$html .=		"</tbody>
			</table>
		</div>
		<div class='date'>$date</div>
	</div>
</body>
</html>";

//options
$options = new Options();
$options->set('enable_html5_parser', true);
$options->set('chroot', 'path-to-test-html-files');

//echo $html;
$pdf = new Dompdf($options);

$pdf->loadHtml($html);

$pdf->setPaper('Legal', 'Potrait');
$pdf->render();
$pdf->stream("Laporan Data Registrasi ".$harian, array('Attachment'=>0));
//*/

?>