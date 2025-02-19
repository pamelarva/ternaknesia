<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="<?= base_url('logo.png'); ?>">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="<?= base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="<?= base_url('css/tiny-slider.css'); ?>" rel="stylesheet">
		<link href="<?= base_url('css/style.css'); ?>" rel="stylesheet">
		<title>Ternaknesia</title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
            <div class="container">
            <a class="navbar-brand" href="<?= base_url('pengguna/dashboard') ?>">Ternaknesia<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="">
                    <a class="nav-link" href="<?= base_url('home.html') ?>">Beranda</a>
                </li>
                <li ><a class="nav-link" href="<?= base_url('pengguna/ternak') ?>">Ternak</a></li>
                <li class="nav-item active"><a class="nav-link" href="<?= base_url('pengguna/kesehatan') ?>">Kesehatan</a></li>
                <li><a class="nav-link" href="<?= base_url('pengguna/konsultasi') ?>">Konsultasi</a></li>
                <li><a class="nav-link" href="<?= base_url('pengguna/jadwal') ?>">Jadwal</a></li>
                <li><a class="nav-link" href="<?= base_url('pengguna/produksi') ?>">Produksi</a></li>
                <li><a class="nav-link" href="<?= base_url('pengguna/diskusi') ?>">Diskusi</a></li>
                </ul>

				<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<div class="navbar-nav align-items-center ms-auto">
							<div class="nav-item dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
									<img class="rounded-circle me-lg-2" src="<?= base_url('images/user.svg') ?>" alt="" style="width: 20px; height: 20px;">
								</a>
								<div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
									<a href="<?= base_url('pengguna/logout') ?>" class="dropdown-item">Log Out</a>
								</div>
							</div>
						</div>
				</ul>
            </div>
            </div>
        </nav>
		<!-- End Header/Navigation -->

		<div style="padding: 20px; border-radius: 15px; display: flex; justify-content: center;">
			<div style="width: 80%; display: flex; flex-direction: column; gap: 20px;">
				<!-- Pemeriksaan -->
				<a href="<?= base_url('pengguna/pemeriksaan'); ?>" style="text-decoration: none;">
					<div style="background-color: white; padding: 20px; border-radius: 15px; display: flex; align-items: center; gap: 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
						<div style="width: 50px; height: 50px; background-color: #E6F7FF; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
							<i class="fas fa-stethoscope" style="color: #007BFF; font-size: 24px;"></i>
						</div>
						<div>
							<h3 style="margin: 0; font-size: 18px; font-weight: bold;">Pemeriksaan</h3>
							<p style="margin: 5px 0 0; font-size: 14px; color: #555;">
								Memfasilitasi penjadwalan dan pencatatan hasil pemeriksaan kesehatan ternak, serta memberikan notifikasi untuk masalah kesehatan yang memerlukan tindakan.
							</p>
						</div>
					</div>
				</a>
				<!-- Vaksinasi -->
				<a href="<?= base_url('pengguna/vaksinasi'); ?>" style="text-decoration: none;">
					<div style="background-color: white; padding: 20px; border-radius: 15px; display: flex; align-items: center; gap: 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
						<div style="width: 50px; height: 50px; background-color: #FFF5E6; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
							<i class="fas fa-syringe" style="color: #FF9F00; font-size: 24px;"></i>
						</div>
						<div>
							<h3 style="margin: 0; font-size: 18px; font-weight: bold;">Vaksinasi</h3>
							<p style="margin: 5px 0 0; font-size: 14px; color: #555;">
								Mencatat jadwal dan riwayat vaksinasi, mengingatkan tentang vaksinasi yang akan datang, serta memastikan setiap ternak mendapatkan vaksin yang diperlukan.
							</p>
						</div>
					</div>
				</a>
				<!-- Pengobatan -->
				<a href="<?= base_url('pengguna/pengobatan'); ?>" style="text-decoration: none;">
					<div style="background-color: white; padding: 20px; border-radius: 15px; display: flex; align-items: center; gap: 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
						<div style="width: 50px; height: 50px; background-color: #FFE6E6; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
							<i class="fas fa-medkit" style="color: #FF4D4D; font-size: 24px;"></i>
						</div>
						<div>
							<h3 style="margin: 0; font-size: 18px; font-weight: bold;">Pengobatan</h3>
							<p style="margin: 5px 0 0; font-size: 14px; color: #555;">
								Mencatat riwayat pengobatan, memberikan rekomendasi berdasarkan hasil pemeriksaan, dan memantau perkembangan kesehatan setelah pengobatan.
							</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		
		<script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
		<script src="<?= base_url('js/tiny-slider.js'); ?>"></script>
		<script src="<?= base_url('js/custom.js'); ?>"></script>
	</body>

</html>
