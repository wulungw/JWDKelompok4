<?php
include 'koneksi.php';
$tgl = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aplikasi Rental Sepeda</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="images/Logo.svg" type="image/x-icon">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Icon -->
	<script src="https://kit.fontawesome.com/5a5faefc78.js" crossorigin="anonymous"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-white bg-navy elevation-4">
			<!-- Brand Logo -->
			<a href="index.php?p=beranda" class="brand-link">
				<img src="images/Logo.svg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">Rental Sepeda</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item">
							<a href="index.php?p=beranda" class="nav-link">
								<i class="nav-icon fas fa-home"></i>
								<p>
									Beranda
								</p>
							</a>
						</li>

						<li class="nav-header">Entry Data dan Transaksi</li>
						<li class="nav-item">
							<a href="index.php?p=anggota" class="nav-link">
								<i class="nav-icon fas fa-users"></i>
								<p>
									Data Anggota
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="index.php?p=sepeda" class="nav-link">
								<i class="nav-icon fas fa-bicycle"></i>
								<p>
									Data Jenis Sepeda
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="index.php?p=transaksi-peminjaman" class="nav-link">
								<i class="nav-icon fas fa-shopping-cart"></i>
								<p>
									Transaksi Peminjaman
								</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- content wrapper -->
		<div class="content-wrapper">
			<div class="container pt-3">
				<?php
				$pages_dir = 'pages';
				if (!empty($_GET['p'])) {
					$pages = scandir($pages_dir, 0);
					unset($pages[0], $pages[1]);
					$p = $_GET['p'];
					if (in_array($p . '.php', $pages)) {
						include($pages_dir . '/' . $p . '.php');
					} else {
						echo 'Halaman Tidak Ditemukan';
					}
				} else {
					include($pages_dir . '/beranda.php');
				}
				?>
			</div>
		</div>

		<footer class="main-footer">
			<strong>Aplikasi Rental Sepeda (GoCycle)</strong>
		</footer>
	</div>

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.js"></script>
</body>

</html>