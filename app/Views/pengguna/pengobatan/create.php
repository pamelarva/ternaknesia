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

  <title>Tambah Pengobatan</title>
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
                <li class="">
                    <a class="nav-link" href="<?= base_url('pengguna/dashboard') ?>">Beranda</a>
                </li>
                <li><a class="nav-link" href="<?= base_url('pengguna/ternak') ?>">Ternak</a></li>
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

<div class="container mt-5">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <h2>Tambah Pengobatan</h2>

      <!-- Flash Message -->
      <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
          <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
              <li><?= esc($error); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form method="POST" action="<?= base_url('pengguna/pengobatan/store'); ?>">
        <?= csrf_field(); ?>

        <div class="form-group">
          <label for="nama_obat">Nama Obat</label>
          <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?= old('nama_obat'); ?>" required>
          <?php if (isset(session()->getFlashdata('errors')['nama_obat'])): ?>
            <small class="text-danger"><?= session()->getFlashdata('errors')['nama_obat']; ?></small>
          <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="waktu_pengobatan">Waktu Pengobatan</label>
            <input 
                type="datetime-local" 
                class="form-control" 
                id="waktu_pengobatan" 
                name="waktu_pengobatan" 
                value="<?= old('waktu_pengobatan') ? date('Y-m-d\TH:i', strtotime(old('waktu_pengobatan'))) : ''; ?>" 
                required>
            <?php if (isset(session()->getFlashdata('errors')['waktu_pengobatan'])): ?>
                <small class="text-danger"><?= session()->getFlashdata('errors')['waktu_pengobatan']; ?></small>
            <?php endif; ?>
        </div>
        
        <div class="form-group">
            <label for="durasi_pengobatan">Durasi Pengobatan (dalam hari)</label>
            <input 
                type="number" 
                step="1" 
                class="form-control <?= isset(session()->getFlashdata('errors')['durasi_pengobatan']) ? 'is-invalid' : ''; ?>" 
                id="durasi_pengobatan" 
                name="durasi_pengobatan" 
                value="<?= old('durasi_pengobatan'); ?>" 
                required
                placeholder="Masukkan durasi pengobatan"
            >
            <?php if (isset(session()->getFlashdata('errors')['durasi_pengobatan'])): ?>
                <div class="invalid-feedback">
                    <?= session()->getFlashdata('errors')['durasi_pengobatan']; ?>
                </div>
            <?php endif; ?>
        </div>


        <div class="form-group">
          <label for="dosis">Dosis (dalam ml)</label>
          <input type="text" class="form-control" id="dosis" name="dosis" value="<?= old('dosis'); ?>" required>
          <?php if (isset(session()->getFlashdata('errors')['dosis'])): ?>
            <small class="text-danger"><?= session()->getFlashdata('errors')['dosis']; ?></small>
          <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="id_pemeriksaan">ID Pemeriksaan</label>
            <select class="form-control" id="id_pemeriksaan" name="id_pemeriksaan" required>
                <option value="">-- Pilih Pemeriksaan --</option>
                <?php foreach ($pemeriksaan as $item): ?>
                <option value="<?= $item['id_pemeriksaan']; ?>" <?= old('id_pemeriksaan') == $item['id_pemeriksaan'] ? 'selected' : ''; ?>>
                    <?= $item['id_pemeriksaan'] . ' - ' . $item['diagnosa']; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <?php if (isset(session()->getFlashdata('errors')['id_pemeriksaan'])): ?>
                <small class="text-danger"><?= session()->getFlashdata('errors')['id_pemeriksaan']; ?></small>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tambah Pengobatan</button>
        <a href="<?= base_url('pengguna/kesehatan') ?>" class="btn btn-secondary mt-3">Kembali</a>
      </form>
    </div>
  </div>
</div>

<script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('js/custom.js'); ?>"></script>

</body>
</html>
