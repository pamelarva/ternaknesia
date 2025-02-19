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
  <link href="<?= base_url('css/style.css'); ?>" rel="stylesheet">

  <title>Edit Produksi</title>
</head>

<body>

  <!-- Start Header/Navigation -->
  <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
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
          <li><a class="nav-link" href="<?= base_url('pengguna/jadwal'); ?>">Jadwal</a></li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('pengguna/produksi'); ?>">Produksi</a>
          </li>
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

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h2>Edit Produksi</h2>

        <!-- Show validation errors -->
        <?php if (session()->getFlashdata('errors')): ?>
          <div class="alert alert-danger">
            <ul>
              <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <form method="POST" action="<?= base_url('pengguna/produksi/update/' . $produksi['id_produksi']); ?>" enctype="multipart/form-data">
          <div class="form-group">
            <label for="jenis_ternak">Jenis Ternak</label>
            <select class="form-control" id="jenis_ternak" name="jenis_ternak" required>
              <option value="">Pilih Jenis Ternak</option>
              <?php foreach ($ternaks as $ternak): ?>
                <option value="<?= $ternak['id_ternak']; ?>" <?= $ternak['jenis_ternak'] == $ternak['id_ternak'] ? 'selected' : ''; ?>><?= $ternak['jenis_ternak']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="tanggal_produksi">Tanggal Produksi</label>
            <input type="date" class="form-control" id="tanggal_produksi" name="tanggal_produksi" value="<?= $produksi['tanggal_produksi']; ?>" required>
          </div>
          <div class="form-group">
            <label for="jenis_produksi">Jenis Produksi</label>
            <select class="form-control" id="jenis_produksi" name="jenis_produksi" required>
              <option value="Susu" <?= $produksi['jenis_produksi'] == 'Susu' ? 'selected' : ''; ?>>Susu</option>
              <option value="Telur" <?= $produksi['jenis_produksi'] == 'Telur' ? 'selected' : ''; ?>>Telur</option>
            </select>
          </div>
          <div class="form-group">
            <label for="jumlah_produksi">Jumlah Produksi</label>
            <input type="text" class="form-control" id="jumlah_produksi" name="jumlah_produksi" value="<?= $produksi['jumlah_produksi']; ?>" required>
          </div>
          <div class="form-group">
            <label for="gambar_produksi">Gambar Produksi</label>
            <input type="file" class="form-control" id="gambar_produksi" name="gambar_produksi">
            <?php if (!empty($produksi['gambar_produksi'])): ?>
              <p class="mt-2">Gambar saat ini: <img src="<?= base_url('uploads/' . $produksi['gambar_produksi']); ?>" alt="Gambar Produksi" width="100"></p>
            <?php endif; ?>
          </div>
          <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
          <a href="<?= base_url('produksi'); ?>" class="btn btn-secondary mt-3">Kembali</a>
        </form>
      </div>
    </div>
  </div>

  <script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('js/custom.js'); ?>"></script>

</body>

</html>
