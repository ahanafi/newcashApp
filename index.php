<?php
require_once 'function/init.php';

if (isset($_SESSION['admin']) || isset($_SESSION['operator'])) {
	redirect('dashboard.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Login</title>
</head>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
<body>
	<div id="content">
		<header>
			<img src="images/logo.png" alt="" class="img img-responsive">
			<h1 class="brands"><strong>WINGS</strong> FOOD</h1>
			<h3 class="brand-title">PT. KARUNIA ALAM SEGAR</h3>
			<h5 class="address-title">Jl. Raya Sukomulyo Km. 24, Manyar, Gresik 61151</h5>
		</header>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-success" id="box-login">
						<div class="panel-heading">
							<div class="panel-title">Halaman Login</div>
						</div>
						<div class="panel-body">
							<form action="" class="form-group" method="POST">
								<input type="text" name="username" class="form-control" placeholder="Username" required autocomplete="off" autofocus="on">
								<br>

								<input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
								<br>

								<input type="submit" name="login" class="btn btn-success" value="Login">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer style="position: fixed;bottom: 0;">
			Copyright &copy; PT. Karunia Alam Segar - <?php echo date('Y'); ?>
		</footer>
	</div>
</body>
</html>

<?php
if (isset($_POST['login'])) {
	$username = escape($_POST['username']);
	$password = escape($_POST['password']);

	$login = select('*', 'tb_user', "username = '$username' LIMIT 1");
	if (mysqli_num_rows($login) > 0) {
		$data = mysqli_fetch_object($login);

		if(password_verify($password, $data->password)){
			@$_SESSION[$data->level] = $data->id;

			redirect('dashboard.php');
		} else {
			echo alert('Login gagal,username / password salah. Silahkan coba lagi', '');
		}
	} else {
		echo alert('Login gagal,username / password salah. Silahkan coba lagi', '');
	}
}


?>