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

  <title>Tambah Jadwal Pakan Ternak</title>
</head>

<body>

  <!-- Start Header/Navigation -->
  <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Ternaknesia navigation bar">
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

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h2>Tambah Jadwal Pakan Ternak</h2>

        <!-- Tampilkan pesan error jika ada -->
        <?php if (session()->getFlashdata('errors')): ?>
          <div class="alert alert-danger">
            <ul>
              <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <form method="POST" action="<?= base_url('pengguna/jadwal/store'); ?>">
          <div class="form-group">
            <label for="jenis_ternak">Jenis Ternak</label>
            <select class="form-control" id="jenis_ternak" name="jenis_ternak" required>
              <option value="">Pilih Jenis Ternak</option>
              <?php foreach ($ternak as $ternak_item): ?>
                <option value="<?= $ternak_item['id_ternak']; ?>" <?= old('jenis_ternak') == $ternak_item['id_ternak'] ? 'selected' : ''; ?>><?= $ternak_item['jenis_ternak']; ?></option>
              <?php endforeach; ?>
            </select>
            <?php if (isset($validation) && $validation->hasError('jenis_ternak')): ?>
              <div class="invalid-feedback"><?= $validation->getError('jenis_ternak'); ?></div>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="jenis_pakan">Jenis Pakan</label>
            <input type="text" class="form-control <?= isset($validation) && $validation->hasError('jenis_pakan') ? 'is-invalid' : ''; ?>" id="jenis_pakan" name="jenis_pakan" placeholder="Masukkan jenis pakan" value="<?= old('jenis_pakan'); ?>" required>
            <?php if (isset($validation) && $validation->hasError('jenis_pakan')): ?>
              <div class="invalid-feedback"><?= $validation->getError('jenis_pakan'); ?></div>
            <?php endif; ?>
          </div>

          <div class="form-group">
        <label for="waktu_pemberian1">Waktu Pemberian 1</label>
        <!-- Input tipe time untuk waktu pemberian 1 -->
        <input type="time" class="form-control" id="waktu_pemberian1" name="waktu_pemberian1" required>
        </div>

        <div class="form-group">
        <label for="waktu_pemberian2">Waktu Pemberian 2</label>
        <!-- Input tipe time untuk waktu pemberian 2 -->
        <input type="time" class="form-control" id="waktu_pemberian2" name="waktu_pemberian2">
        </div>

        <div class="form-group">
        <label for="waktu_pemberian3">Waktu Pemberian 3</label>
        <!-- Input tipe time untuk waktu pemberian 3 -->
        <input type="time" class="form-control" id="waktu_pemberian3" name="waktu_pemberian3">
        </div>


          <div class="form-group">
            <label for="banyaknya_pakan">Banyaknya Pakan (kg)</label>
            <input type="number" class="form-control <?= isset($validation) && $validation->hasError('banyaknya_pakan') ? 'is-invalid' : ''; ?>" id="banyaknya_pakan" name="banyaknya_pakan" placeholder="Masukkan jumlah pakan" value="<?= old('banyaknya_pakan'); ?>" required>
            <?php if (isset($validation) && $validation->hasError('banyaknya_pakan')): ?>
              <div class="invalid-feedback"><?= $validation->getError('banyaknya_pakan'); ?></div>
            <?php endif; ?>
          </div>

          <button type="submit" class="btn btn-primary mt-3">Tambah Jadwal</button>
          <a href="<?= base_url('jadwal'); ?>" class="btn btn-secondary mt-3">Kembali</a>
        </form>
      </div>
    </div>
  </div>

  <script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('js/custom.js'); ?>"></script>

</body>
</html>
