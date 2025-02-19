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
  <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
    <div class="container d-flex align-items-center">
      <div class="row">
        <div class="col-sm-2" style="text-align: center;">
          <a href="<?= base_url('pengguna/dashboard'); ?>">
            <img src="<?= base_url('images/left-arrow.png'); ?>" alt="Left Arrow" class="arrow-logo">
          </a>
        </div>
        <div class="col-sm-10" style="text-align: left;">
          <a class="navbar-brand ms-2" href="<?= base_url('home'); ?>">Ternaknesia<span>.</span></a>
        </div>
      </div>
    </div>
  </nav>          
  <!-- End Header/Navigation -->

  <!-- Start Diskusi-->
  <div class="chat-page">
    <div class="chat-container">
      <div class="chat-box">
        <div class="chat-messages">
          <!-- Loop pesan dari database -->
          <?php if (!empty($pesan)): ?>
            <?php foreach ($pesan as $item): ?>
              <div class="chat-message">
                <div class="username"><?= esc($item['username']); ?></div>
                <div class="message-container">
                  <img src="<?= base_url('images/person_1.jpg'); ?>" alt="Profile" class="message-img">
                  <div class="chat-bubble left">
                    <?= esc($item['isi_pesan']); ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p>Tidak ada pesan.</p>
          <?php endif; ?>
        </div>
        <form class="chat-input" method="post" action="<?= base_url('pengguna/diskusi/kirim'); ?>">
          <input type="text" name="isi_pesan" placeholder="Ketik pesan Anda..." required />
          <button type="submit">Kirim</button>
        </form>
      </div>
      <div class="profile-box">
        <img src="<?= base_url('images/person_5.png'); ?>" alt="Profile" class="profile-picture">
        <h2><?= session()->get('username'); ?></h2>
        <p>"Strive for progress, not perfection."</p>
      </div>
    </div>
  </div>
  <!-- End Diskusi -->
  
  <script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('js/tiny-slider.js'); ?>"></script>
  <script src="<?= base_url('js/custom.js'); ?>"></script>
</body>
</html>
