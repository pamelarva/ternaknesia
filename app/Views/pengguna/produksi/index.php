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
  <title>Ternaknesia</title>
</head>

<body>

  <!-- Start Header/Navigation -->
  <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

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

  <div class="untree_co-section before-footer-section">
    <div class="container">
      <div class="header-roww">
        <h2 class="table-title">Hasil Produksi Ternak</h2>
        <a href="<?= base_url('pengguna/produksi/create'); ?>"><button class="btn-add">+</button></a>
      </div>

      <div class="row mb-5">
        <form class="col-md-12" method="post">
          <div class="site-blocks-table">
            <table class="table">
              <thead>
                <tr>
                  <th class="product-no">No</th>
                  <th class="product-jenis">Jenis Ternak</th>
                  <th class="product-tgl">Tanggal Produksi</th>
                  <th class="product-produksi">Jenis Produksi</th>
                  <th class="product-jumlah">Jumlah Produksi</th>
                  <th class="product-thumbnail">Gambar</th>
                  <th class="product-aksi">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($produksi as $item): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td class="product-jenis">
                      <h3 class="h6 text-black"><?= $item['jenis_ternak']; ?></h3>
                    </td>
                    <td class="product-tgl"><?= $item['tanggal_produksi']; ?></td>
                    <td class="product-produksi"><?= $item['jenis_produksi']; ?></td>
                    <td class="product-jumlah"><?= $item['jumlah_produksi']; ?> kg</td>
                    <td class="product-thumbnail">
                      <?php if ($item['gambar_produksi']): ?>
                        <img src="<?= base_url('uploads/' . $item['gambar_produksi']); ?>" alt="Image" class="img-fluid">
                      <?php else: ?>
                        <img src="<?= base_url('images/no-image.png'); ?>" alt="No Image" class="img-fluid">
                      <?php endif; ?>
                    </td>
                    <td>
                      <a href="<?= base_url('pengguna/produksi/edit/' . $item['id_produksi']); ?>" class="btn-edit"><i class="fas fa-edit"></i></a>
                      <a href="<?= base_url('pengguna/produksi/delete/' . $item['id_produksi']); ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('js/tiny-slider.js'); ?>"></script>
  <script src="<?= base_url('js/custom.js'); ?>"></script>

</body>
</html>
