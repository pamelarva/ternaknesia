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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link href="<?= base_url('css/tiny-slider.css') ?>" rel="stylesheet">
  <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
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
          <li >
            <a class="nav-link" href="<?= base_url('pengguna/dashboard') ?>">Beranda</a>
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

  <div class="container mt-3">
    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
  </div>

  <div class="untree_co-section before-footer-section">
    <div class="container">
      <!-- Pie Chart Section -->
      <div class="row mb-4">
        <div class="col-12 d-flex justify-content-center">
          <canvas id="ternakPieChart" style="max-width: 300px; max-height: 300px; width: 100%; height: auto;"></canvas>
        </div>
      </div>
      <!-- Header and Add Button -->
      <div class="row mb-3">
        <div class="col-10 text-left">
          <h2>Ternak</h2>
        </div>
        <div class="col-12 text-right" style="position: relative;">
          <button style="border-radius: 50%; width: 40px; height: 40px; position: absolute; top: -20px; right: 0; display: flex; justify-content: center; align-items: center; background-color: #FF9F00; border: none;">
           <a href="ternak/create"> <i class="fas fa-plus" style="color: white;"></i></a>
          </button>
        </div>
      </div>
      <!-- Table Section -->
      <div class="row mb-5">
        <form class="col-md-12" method="post">
          <div class="site-blocks-table">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Ternak</th>
                  <th>Jumlah</th>
                  <th>Usia (Tahun)</th>
                  <th>Berat (Kg)</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($ternak)) : ?>
                    <?php $no = 1; foreach ($ternak as $item) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['jenis_ternak'] ?></td>
                            <td><?= $item['jumlah'] ?></td>
                            <td><?= $item['usia'] ?></td>
                            <td><?= $item['berat'] ?></td>
                            <td>
                                <!-- Edit Button -->
                                <a href="<?= base_url('pengguna/ternak/edit/' . $item['id_ternak']) ?>" class="btn btn-primary btn-sm" title="Edit">
                                    <i class="fas fa-edit" style="color: blue;"></i>
                                </a>
                                
                                <!-- Delete Button -->
                                <a href="<?= base_url('pengguna/ternak/delete/' . $item['id_ternak']) ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash" style="color: red;"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-center">Data tidak tersedia</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Script -->
  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('ternakPieChart').getContext('2d');

    // Data ternak yang diterima dari controller
    const data = {
      labels: <?= json_encode(array_keys($jumlahTernak)) ?>,  // Jenis ternak
      datasets: [{
        label: 'Jumlah Ternak',
        data: <?= json_encode(array_values($jumlahTernak)) ?>,  // Jumlah ternak
        backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545', '#6f42c1'], // Ubah warna sesuai kebutuhan
        hoverOffset: 4
      }]
    };

    // Konfigurasi pie chart
    const config = {
      type: 'pie',
      data: data,
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          tooltip: {
            callbacks: {
              label: function (context) {
                return `${context.label}: ${context.raw} ekor`;
              }
            }
          }
        }
      }
    };

    // Render pie chart
    new Chart(ctx, config);
  });
</script>


  <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('js/tiny-slider.js') ?>"></script>
  <script src="<?= base_url('js/custom.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
