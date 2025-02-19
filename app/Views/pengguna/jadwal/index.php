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
      <a class="navbar-brand" href="<?= base_url('home'); ?>">Ternaknesia<span>.</span></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsFurni">
      <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
          <li><a class="nav-link" href="<?= base_url('pengguna/dashboard'); ?>">Beranda</a></li>
          <li><a class="nav-link" href="<?= base_url('pengguna/ternak'); ?>">Ternak</a></li>
          <li><a class="nav-link" href="<?= base_url('pengguna/kesehatan'); ?>">Kesehatan</a></li>
          <li><a class="nav-link" href="<?= base_url('pengguna/konsultasi'); ?>">Konsultasi</a></li>
          <li class="nav-item active"><a class="nav-link" href="<?= base_url('pengguna/jadwal'); ?>">Jadwal</a></li>
          <li><a class="nav-link" href="<?= base_url('pengguna/produksi'); ?>">Produksi</a></li>
          <li><a class="nav-link" href="<?= base_url('pengguna/diskusi'); ?>">Diskusi</a></li>
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

  <div class="feeding-schedule-section">
    <div class="header-row">
      <h2 class="section-title">Jadwal Pakan Ternak</h2>
      <a href="/pengguna/jadwal/create"><button class="btn-pls">+</button></a>
    </div>
  
    <!-- Card untuk setiap jenis ternak -->
    <?php foreach ($jadwal as $item): ?>
      <div class="feeding-card">
        <button class="card-header" onclick="toggleCard(this)">
          <span><?= $item['jenis_ternak']; ?></span>
          <span class="arrow">&#9660;</span>
        </button>
        <div class="card-content">
          <ul>
            <li>Jenis pakan: <?= $item['jenis_pakan']; ?></li>
            <!-- Menampilkan waktu pemberian -->
            <?php 
              $waktuPemberian = [
                $item['waktu_pemberian1'],
                $item['waktu_pemberian2'],
                $item['waktu_pemberian3']
              ];
              foreach ($waktuPemberian as $waktu): 
                if (!empty($waktu)): ?>
                  <li>Waktu pemberian: <?= $waktu; ?></li>
                <?php endif; 
              endforeach; 
            ?>
            <li>Banyaknya pakan per pemberian: <?= $item['banyaknya_pakan']; ?> kg</li>
          </ul>
        </div>
      </div>
    <?php endforeach; ?>
  
  </div>

  <script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('js/tiny-slider.js'); ?>"></script>
  <script src="<?= base_url('js/custom.js'); ?>"></script>
  <script src="<?= base_url('js/jadwal.js'); ?>"></script>

</body>

</html>
