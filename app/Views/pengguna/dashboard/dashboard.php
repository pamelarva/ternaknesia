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
  <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
  <link href="<?= base_url('css/ernastyle.css') ?>" rel="stylesheet">
  <title>Ternaknesia</title>
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
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('prngguna/dashboard') ?>">Beranda</a>
          </li>
          <li><a class="nav-link" href="<?= base_url('pengguna/ternak') ?>">Ternak</a></li>
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

  <!-- Start Navigation & Diagram -->
  <div class="container text-center">
    <div class="row navigation">
      <div class="col-7">
        <div class="row">
          <div class="col">
            <p>
              <a href="<?= base_url('pengguna/ternak') ?>" class="btn btn-secondary me-2" style="color: white;">
                <img src="<?= base_url('images/ternak.png') ?>" alt="Icon" class="link-icon" />
                Ternak
              </a>
            </p>
          </div>
          <div class="col">
            <p>
              <a href="<?= base_url('pengguna/kesehatan') ?>" class="btn btn-secondary me-2" style="color: white;">
                <img src="<?= base_url('images/kesehatan.png') ?>" alt="Icon" class="link-icon" />
                Kesehatan
              </a>
            </p>
          </div>
          <div class="col">
            <p>
              <a href="<?= base_url('pengguna/konsultasi') ?>" class="btn btn-secondary me-2" style="color: white;">
                <img src="<?= base_url('images/konsultasi.png') ?>" alt="Icon" class="link-icon" />
                Konsultasi
              </a>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p>
              <a href="<?= base_url('pengguna/jadwal') ?>" class="btn btn-secondary me-2" style="color: white;">
                <img src="<?= base_url('images/jadwal.png') ?>" alt="Icon" class="link-icon" />
                Jadwal
              </a>
            </p>
          </div>
          <div class="col">
            <p>
              <a href="<?= base_url('pengguna/produksi') ?>" class="btn btn-secondary me-2" style="color: white;">
                <img src="<?= base_url('images/produksi.png') ?>" alt="Icon" class="link-icon" />
                Produksi
              </a>
            </p>
          </div>
          <div class="col">
            <p>
              <a href="<?= base_url('pengguna/diskusi') ?>" class="btn btn-secondary me-2" style="color: white;">
                <img src="<?= base_url('images/diskusi.png') ?>" alt="Icon" class="link-icon" />
                Diskusi
              </a>
            </p>
          </div>
        </div>
      </div>
      <div class="col-5">
      <div class="bg-light rounded h-100 p-4">
              <canvas id="pie-chart" style="max-width: 300px; max-height: 300px; width: 100%;"></canvas>
        </div>
        
      </div>
    </div>
  </div>
  <!-- End Navigation & Diagram -->

  <div class="blog-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6">
                <h3 class="section-title">Tonton Sekarang</h3>
            </div>
            <div class="col-md-6 text-start text-md-end">
                <a href="#" class="more">View All</a>
            </div>
        </div>

        <div class="row">
            <?php foreach ($tips as $tip): ?>
                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                    <div class="post-entry">
                        <a href="<?= $tip['link_video']; ?>" class="post-thumbnail">
                            <!-- Menampilkan video menggunakan iframe -->
                            <iframe width="100%" height="200" src="<?= $tip['embedUrl']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </a>
                        <div class="post-content-entry">
                            <h3><a href="<?= $tip['link_video']; ?>"><?= $tip['judul']; ?></a></h3>
                            <div class="meta">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ternakData = <?= json_encode($ternak) ?>;

  const pieChart = document.getElementById('pie-chart').getContext('2d');
                const chartPie = new Chart(pieChart, {
                    type: 'pie',
                    data: {
                        labels: ternakData.map(item => item.jenis_ternak), // Jenis ternak
                        datasets: [{
                            data: ternakData.map(item => item.jumlah_ternak), // Jumlah ternak
                            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'], // Warna untuk pie chart
                        }]
                    }
                });
</script>


	

  <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('js/tiny-slider.js') ?>"></script>
  <script src="<?= base_url('js/custom.js') ?>"></script>
</body>
</html>
