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
  <title>Ternaknesia - Admin Login</title>
</head>
<body>
    <div class="register-container">
        <h1>Masuk Admin</h1>
        <div class="img-logo">
            <img src="<?= base_url('logo.png') ?>" class="img-fluid" alt="Logo">
        </div>
        <form action="/admin/authenticate" method="POST">
          <?= csrf_field() ?>  <!-- CSRF Token -->
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required class="form-control">
          </div>
          <button type="submit" class="submit-button btn btn-primary">Masuk</button>
        </form>
    </div>
</body>
</html>
