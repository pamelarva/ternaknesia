<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="<?= base_url('logo.png') ?>">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <!-- Bootstrap CSS -->
  <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="<?= base_url('css/tiny-slider.css') ?>" rel="stylesheet">
  <link href="<?= base_url('css/pamelastyle.css') ?>" rel="stylesheet">
  <title>Ternaknesia</title>
</head>
<body>
    <div class="register-container">
        <h1>Buat Akun</h1>
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="img-logo">
            <img src="<?= base_url('logo.png') ?>" class="img-fluid">
        </div>
        <form action="<?= base_url('pengguna/store') ?>" method="POST">
          <?= csrf_field() ?> <!-- CSRF Token -->
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required class="form-control">
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required class="form-control">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required class="form-control">
          </div>
          <div class="form-group">
            <label for="phone">Nomor Telepon</label>
            <input type="tel" id="phone" name="phone" required class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required class="form-control">
          </div>
          <button type="submit" class="submit-button btn btn-primary">Daftar</button>
          <p class="login-link">
            Sudah punya akun? <a href="<?= base_url('pengguna/login') ?>">Masuk</a>
          </p>
        </form>
    </div>
</body>
</html>
