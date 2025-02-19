<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="../logo.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" /> 

  <!-- Bootstrap CSS -->
  <link href="<?= base_url('/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="<?= base_url('/css/style.css'); ?>" rel="stylesheet">

  <title>Edit Produksi Ternak</title>
</head>

<body>

  <!-- Start Header/Navigation -->
  <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('home.html') ?>">Ternaknesia<span>.</span></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsFurni">
        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
          <li >
            <a class="nav-link" href="<?= base_url('home.html') ?>">Beranda</a>
          </li>
          <li class="nav-item active"><a class="nav-link" href="<?= base_url('pengguna/ternak') ?>">Ternak</a></li>
          <li><a class="nav-link" href="<?= base_url('pengguna/kesehatan') ?>">Kesehatan</a></li>
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

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h2>Edit Produksi Ternak</h2>

       <!-- Menampilkan flash message -->
      <?php if(session()->getFlashdata('success')): ?>
          <div class="alert alert-success">
              <?= session()->getFlashdata('success'); ?>
          </div>
      <?php elseif(session()->getFlashdata('error')): ?>
          <div class="alert alert-danger">
              <?= session()->getFlashdata('error'); ?>
          </div>
      <?php endif; ?>


        <!-- Form Edit Produksi -->
        <form method="POST" action="<?= base_url('pengguna/ternak/update/' . $ternak['id_ternak']); ?>" enctype="multipart/form-data">
          <!-- Input Jenis Ternak -->
          <div class="form-group">
            <label for="jenis_ternak">Jenis Ternak</label>
            <input type="text" class="form-control" id="jenis_ternak" name="jenis_ternak" value="<?= $ternak['jenis_ternak']; ?>" placeholder="Masukkan jenis ternak" required>
          </div>

          <!-- Input Jumlah Produksi -->
          <div class="form-group">
            <label for="jumlah">Jumlah Produksi</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $ternak['jumlah']; ?>" placeholder="Masukkan jumlah produksi" required>
          </div>

          <!-- Input Usia Ternak -->
          <div class="form-group">
            <label for="usia">Usia Ternak</label>
            <input type="number" class="form-control" id="usia" name="usia" value="<?= $ternak['usia']; ?>" placeholder="Masukkan usia ternak" required>
          </div>

          <!-- Input Berat Ternak -->
          <div class="form-group">
            <label for="berat">Berat Ternak</label>
            <input type="number" class="form-control" id="berat" name="berat" value="<?= $ternak['berat']; ?>" placeholder="Masukkan berat ternak" required>
          </div>

          <!-- Button Submit -->
          <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
          <a href="<?= base_url('/produksi'); ?>" class="btn btn-secondary mt-3">Kembali</a>
        </form>
      </div>
    </div>
  </div>

  <script src="<?= base_url('/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('/js/custom.js'); ?>"></script>

</body>
</html>
