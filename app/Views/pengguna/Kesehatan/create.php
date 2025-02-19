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

  <title>Tambah Pemeriksaan</title>
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
      <h2>Tambah Pemeriksaan</h2>

      <!-- Flash Message -->
      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
          <?= session()->getFlashdata('error'); ?>
        </div>
      <?php endif; ?>

      <form method="POST" action="<?= base_url('pengguna/pemeriksaan/store'); ?>">
        <div class="form-group">
          <label for="ternak">Pilih Ternak</label>
          <select class="form-control" id="ternak" name="ternak_id" required>
            <option value="">Pilih Ternak</option>
            <?php foreach ($ternakData as $ternakItem): ?>
              <option value="<?= $ternakItem['id_ternak']; ?>"><?= $ternakItem['jenis_ternak']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="waktuPemeriksaan">Waktu Pemeriksaan</label>
          <input type="datetime-local" class="form-control" id="waktuPemeriksaan" name="waktu_pemeriksaan" required>
        </div>

        <div class="form-group">
          <label for="namaPemeriksa">Nama Pemeriksa</label>
          <input type="text" class="form-control" id="namaPemeriksa" name="nama_pemeriksa" placeholder="Masukkan nama pemeriksa" required>
        </div>

        <div class="form-group">
          <label for="gejala">Gejala</label>
          <input type="text" class="form-control" id="gejala" name="gejala" placeholder="Masukkan gejala" required>
        </div>

        <div class="form-group">
          <label for="kondisiFisik">Kondisi Fisik</label>
          <input type="text" class="form-control" id="kondisiFisik" name="kondisi_fisik" placeholder="Masukkan kondisi fisik" required>
        </div>

        <div class="form-group">
          <label for="diagnosa">Diagnosa</label>
          <input type="text" class="form-control" id="diagnosa" name="diagnosa" placeholder="Masukkan diagnosa" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tambah Pemeriksaan</button>
        <a href="<?= base_url('pengguna/kesehatan') ?>" class="btn btn-secondary mt-3">Kembali</a>
      </form>
    </div>
  </div>
</div>

<script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('js/custom.js'); ?>"></script>

</body>
</html>
