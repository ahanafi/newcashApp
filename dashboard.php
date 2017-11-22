<?php
require_once 'function/init.php';
//echo password_hash("manager", PASSWORD_DEFAULT);

if (isset($_SESSION['admin']) || isset($_SESSION['operator'])) {

$user_login = isset($_SESSION['admin']) ? $_SESSION['admin'] : $_SESSION['operator'];

$admin = select('*', 'tb_user', "id = $user_login");
$data = mysqli_fetch_array($admin);

$page = (isset($_GET['page'])) ? $_GET['page'] : '';
$act = (isset($_GET['act'])) ? $_GET['act'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Admin</title>
</head>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.css">

<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript" src="assets/js/moment-with-locales.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(function(){
		var link = "dashboard.php?page=<?= $page.'&act=tambah'; ?>";
		var link_print = "<?= 'laporan/cetak_'.$page.'.php';  ?>";
		var btnAdd = "<a href='"+link+"' class='btn btn-sm btn-info' style='margin-left:15px;'>Tambah Data</a>";
		var btnPrint = "<a href='"+link_print+"' class='btn btn-sm btn-success' style='margin-left:5px;'>Print Laporan</a>";
		$("#data_length").append(btnAdd+" "+btnPrint);
	});
</script>
<body>
	<div id="content">
		<header>
			<img src="images/logo.png" alt="" class="img img-responsive">
			<h1 class="brands"><strong>WINGS</strong> FOOD</h1>
			<h3 class="brand-title">PT. KARUNIA ALAM SEGAR</h3>
			<h5 class="address-title">Jl. Raya Sukomulyo Km. 24, Manyar, Gresik 61151</h5>
		</header>
		<div class="container-fluid">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-left">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="?page=profil">Sejarah</a></li>
									<li><a href="?page=profil&act=organisasi">Organisasi</a></li>
									<li><a href="?page=profil&act=lokasi">Lokasi</a></li>
									<li><a href="?page=profil&act=visimisi">Visi &amp; Misi</a></li>
								</ul>
							</li>
							<?php if($data['level'] == "admin"): ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master Data <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="?page=data_truk">Data Truk</a></li>
									<li><a href="?page=data_sopir">Data Sopir</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registrasi <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="?page=registrasi">Truk</a></li>
								</ul>
							</li>
							<?php endif; ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="?page=laporan&act=data_truk">Data Truk</a></li>
									<li><a href="?page=laporan&act=data_sopir">Data Sopir</a></li>
									<li><a href="?page=laporan&act=registrasi">Registrasi</a></li>
								</ul>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<!-- <li><a href="#"><marquee behavior="" direction="">Selamat Datang...</marquee></a></li> -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle marquee" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>Selamat datang <?= $data['username']; ?></span></a>
								<ul class="dropdown-menu">								
									<li><a href="?page=user&act=edit">Edit Profil</a></li>
								</ul>
							</li>
							<li class="logout"><a href="logout.php" onclick="return confirm('Apakah Anda yakin akan keluar ?');">Logout</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
			<div class="panel panel-default panel-sm">
				<div class="panel-heading">
					<div class="panel-title">
						<?php
							$header = (isset($_GET['page'])) ? $_GET['page'] : 'Admin Dashboard';
							echo strtoupper(str_replace("_", " ", $header));
						?>
					</div>
				</div>
				<div class="panel-body">
					<?php include_once 'pages/routes.php'; ?>
				</div>
			</div>
		</div>
		<footer>
			Copyright &copy; PT. Karunia Alam Segar - <?php echo date('Y'); ?>
		</footer>
	</div>
</body>
</html>

<?php } else {
	redirect('index.php');
} ?>