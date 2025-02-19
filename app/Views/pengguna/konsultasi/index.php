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
		<link href="<?= base_url('css/ernastyle.css'); ?>" rel="stylesheet">
		<title>Ternaknesia</title>
	</head>

	<body>
		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="<?= base_url('home.html'); ?>">Ternaknesia<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="">
                        <a class="nav-link" href="<?= base_url('pengguna/dashboard') ?>">Beranda</a>
                    </li>
                    <li ><a class="nav-link" href="<?= base_url('pengguna/ternak') ?>">Ternak</a></li>
                    <li class="nav-item "><a class="nav-link" href="<?= base_url('pengguna/kesehatan') ?>">Kesehatan</a></li>
                    <li class="nav-item active"><a class="nav-link " href="<?= base_url('pengguna/konsultasi') ?>">Konsultasi</a></li>
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

		<!-- Start List -->
        <?php foreach ($ahli_konsultasi as $ahli): ?>
        <div class="card">
            <div class="card-content">
              <div class="card-image">
                <img src="<?= base_url('images/ahlikonsultasi.png'); ?>" alt="Foto" />
              </div>
              <div class="card-details">
                <h3><?= esc($ahli['nama_ahli']); ?></h3>
                <p style="margin-bottom: 2px;"><?= esc($ahli['catatan']); ?></p>
                <p style="margin-bottom: 2px;">Pendidikan: <?= esc($ahli['pendidikan']); ?></p>
                <div class="links-container">
                    <a href="https://wa.me/<?= esc($ahli['no_hp']); ?>" target="_blank" class="link-item">
                      <img src="<?= base_url('images/whatsapp.png'); ?>" alt="WhatsApp Logo" class="link-icon" />
                      <?= esc($ahli['no_hp']); ?>
                    </a>
                    <a href="mailto:<?= esc($ahli['email']); ?>" target="_blank" class="link-item">
                      <img src="<?= base_url('images/linkedin.png'); ?>" alt="LinkedIn Logo" class="link-icon" />
                      <?= esc($ahli['email']); ?>
                    </a>
                    <a href="https://maps.google.com/?q=<?= $ahli['lokasi'] ?>" target="_blank" class="link-item">
                      <img src="<?= base_url('images/location.png'); ?>" alt="Address Logo" class="link-icon" />
                      <?= $ahli['lokasi'] ?>
                    </a>
                  </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!-- End List -->
		
		<script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
		<script src="<?= base_url('js/tiny-slider.js'); ?>"></script>
		<script src="<?= base_url('js/custom.js'); ?>"></script>
	</body>

</html>
