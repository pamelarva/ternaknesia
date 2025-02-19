<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="logo.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link href="<?= base_url('css/tiny-slider.css') ?>" rel="stylesheet">
        <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
		<title>Ternaknesia</title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">Ternaknesia<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item active">
							<a class="nav-link" href="index.html">Beranda</a>
						</li>
						<li><a class="nav-link" href="#tentangkami">Tentang Kami</a></li>
						<li><a class="nav-link" href="#layanan">Layanan</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="/pengguna/register"><img src="images/user.svg"></a></li>
					</ul>
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->

		<!-- Start Header -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Solusi Terbaik <span clsas="d-block"> Peternakan</span></h1>
								<p class="mb-4">Di Ternaknesia, kami hadir untuk membantu para peternak Indonesia untuk berkembang lebih cepat dan lebih efisien. Kami menyediakan berbagai layanan dan informasi yang dibutuhkan untuk memajukan usaha peternakan, dari mulai pemilihan bibit unggul, manajemen pakan, hingga pemasaran hasil ternak.</p>
								<p><a href="/pengguna/register" class="btn btn-secondary me-2">Daftar Sekarang</a><a href="/pengguna/login" class="btn btn-white-outline">Masuk</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="images/sapi.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Header -->

		<!-- Start Tentang Kami -->
		<section id="tentangkami">
			<div class="we-help-section">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-2 mb-5 mb-lg-0">
							<div class="imgs-grid">
							</div>
						</div>
						<div class="col-lg-10 ps-lg-5">
							<h2 class="section-title mb-4">Tentang Kami</h2>
							<p>Ternaknesia adalah platform digital yang didedikasikan untuk memajukan dunia peternakan di Indonesia. Kami bertujuan untuk membantu peternak dalam mengelola usaha ternak mereka secara lebih efisien, transparan,
								dan terorganisir dengan dukungan teknologi terkini. Dengan berbagai fitur inovatif, Ternaknesia menyediakan solusi yang memudahkan peternak dalam mengelola hasil produksi, riwayat kesehatan ternak, hingga mendapatkan konsultasi langsung dari para ahli di bidangnya.</p>
							<p>Kami percaya bahwa dengan informasi yang tepat dan alat pengelolaan yang canggih, setiap peternak dapat meningkatkan produktivitas dan keberlanjutan usaha mereka. Ternaknesia tidak hanya sekadar platform, tapi juga komunitas bagi para peternak yang ingin belajar, berbagi, dan berkembang bersama.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Tentang Kami -->

		<!-- Start Layanan -->
		<section id="layanan">
		<div class="why-choose-section">
			<div class="container">

				<h2 class="section-title mb-4">Layanan</h2>
				<div class="row my-5">
					<div class="col-6 col-md-6 col-lg-3 mb-4">
						<div class="feature">
							<div class="icon">
								<img src="images/truck.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Manajemen Ternak</h3>
							<p>Atur jadwal pemberian pakan dengan tepat waktu dan efisien sesuai kebutuhan ternak.</p>
						</div>
					</div>

					<div class="col-6 col-md-6 col-lg-3 mb-4">
						<div class="feature">
							<div class="icon">
								<img src="images/bag.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Manajemen Pakan</h3>
							<p>Atur jadwal pemberian pakan dengan tepat waktu dan efisien sesuai kebutuhan ternak.</p>
						</div>
					</div>

					<div class="col-6 col-md-6 col-lg-3 mb-4">
						<div class="feature">
							<div class="icon">
								<img src="images/support.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Pemantauan Kesehatan Ternak</h3>
							<p>Catat pemeriksaan, vaksinasi, dan pengobatan ternak secara rutin dan terorganisir.</p>
						</div>
					</div>

					<div class="col-6 col-md-6 col-lg-3 mb-4">
						<div class="feature">
							<div class="icon">
								<img src="images/return.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Pencatatan Produksi</h3>
							<p>Pantau hasil produksi ternak harian dan lihat laporan untuk analisis yang lebih baik.</p>
						</div>
					</div>

					<div class="col-6 col-md-6 col-lg-3 mb-4">
						<div class="feature">
							<div class="icon">
								<img src="images/truck.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Tips Peternakan</h3>
							<p>Dapatkan video tips peternakan praktis untuk mengelola ternak dengan lebih baik.</p>
						</div>
					</div>

					<div class="col-6 col-md-6 col-lg-3 mb-4">
						<div class="feature">
							<div class="icon">
								<img src="images/bag.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Forum Komunitas Peternak</h3>
							<p>Bergabung dengan forum untuk berbagi pengalaman dan solusi dengan sesama peternak.</p>
						</div>
					</div>

					<div class="col-6 col-md-6 col-lg-3 mb-4">
						<div class="feature">
							<div class="icon">
								<img src="images/support.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Konsultasi dengan Ahli</h3>
							<p>Tanyakan langsung ke ahli peternakan untuk solusi praktis dalam pengelolaan ternak.</p>
						</div>
					</div>

					<div class="col-6 col-md-6 col-lg-3 mb-4">
						<div class="feature">
							<div class="icon">
								<img src="images/return.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Jadwal Kegiatan Peternakan</h3>
							<p>Kelola jadwal kegiatan peternakan seperti vaksinasi dan pemberian pakan dengan mudah.</p>
						</div>
					</div>

				</div>
			
			</div>
		</div>
		</section>
		<!-- End Layanan -->

		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Ternaknesia<span>.</span></a></div>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>
				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. &mdash; Created by <a href="https://ternaknesia.id">Ternaknesia.id</a></p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	


		<script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?= base_url('js/tiny-slider.js') ?>"></script>
        <script src="<?= base_url('js/custom.js') ?>"></script>

	</body>

</html>
