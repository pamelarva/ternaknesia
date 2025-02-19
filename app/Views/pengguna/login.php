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
  <title>Ternaknesia - Pengguna Login</title>
</head>
<body>
    <div class="register-container">
        <h1>Masuk Pengguna</h1>
        <div class="img-logo">
            <img src="<?= base_url('logo.png') ?>" class="img-fluid" alt="Logo">
        </div>

        <!-- Menampilkan pesan error jika ada -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="/pengguna/authenticate" method="POST">
          <?= csrf_field() ?> 
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required class="form-control">
          </div>
          <button type="submit" class="submit-button btn btn-primary">Masuk</button>
          <p class="login-link">
            Belum punya akun? <a href="<?= base_url('pengguna/register') ?>">Daftar</a>
          </p>
        </form>
    </div>
</body>
</html>
