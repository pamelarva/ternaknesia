<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ternaknesia</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= base_url('admin/img/favicon.ico') ?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('admin/lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') ?>" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('admin/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('admin/css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="admin/dashboard" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Ternaknesia</h3>
                    
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?= base_url('admin/img/profil.png') ?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Admin</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Beranda</a>
                    <a href="<?= base_url('admin/pengguna') ?>" class="nav-item nav-link "><i class="fa fa-keyboard me-2"></i>Pengguna</a>
                    <a href="<?= base_url('admin/konten') ?>" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Konten</a>
                    <a href="<?= base_url('admin/ternak') ?>" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Ternak</a>
                    <a href="<?= base_url('admin/kesehatan') ?>" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Kesehatan</a>
                    <a href="<?= base_url('admin/konsultasi') ?>" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Konsultasi</a>
                    <a href="<?= base_url('admin/jadwal') ?>" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Jadwal</a>
                    <a href="<?= base_url('admin/produksi') ?>" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Produksi</a>
                    <a href="<?= base_url('admin/chart') ?>" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Grafik</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="<?= base_url('admin/dashboard') ?>" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="<?= base_url('admin/img/profil.png') ?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Admin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="<?= base_url('admin/logout') ?>" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>


            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="d-flex justify-content-between mb-4">
                        <h6 class="mb-0">Tambah Ahli Konsultasi</h6>
                    </div>
                    <div class="table-responsive">
                        <!-- Form untuk menambah ahli konsultasi -->
                        <form action="<?= base_url('admin/konsultasi/store') ?>" method="POST">
                            <!-- CSRF Token -->
                            <?= csrf_field(); ?>

                            <!-- Nama Ahli -->
                            <div class="mb-3">
                                <label for="nama_ahli" class="form-label">Nama Ahli</label>
                                <input type="text" class="form-control" id="nama_ahli" name="nama_ahli" required>
                            </div>

                            <!-- Catatan -->
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea class="form-control" id="catatan" name="catatan" rows="3" required></textarea>
                            </div>

                            <!-- Nomor HP -->
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor HP</label>
                                <input type="tel" class="form-control" id="no_hp" name="no_hp" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <!-- Pendidikan -->
                            <div class="mb-3">
                                <label for="pendidikan" class="form-label">Pendidikan</label>
                                <input type="text" class="form-control" id="pendidikan" name="pendidikan" required>
                            </div>

                            <!-- Link GitHub -->
                            <div class="mb-3">
                                <label for="link_github" class="form-label">Link GitHub</label>
                                <input type="url" class="form-control" id="link_github" name="link_github">
                            </div>

                            <!-- Link Instagram -->
                            <div class="mb-3">
                                <label for="link_instagram" class="form-label">Link Instagram</label>
                                <input type="url" class="form-control" id="link_instagram" name="link_instagram">
                            </div>

                            <!-- Lokasi -->
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi">
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>



            <!-- Recent Sales End -->

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Ternaknesia</a> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('admin/lib/chart/chart.min.js') ?>"></script>
    <script src="<?= base_url('admin/lib/easing/easing.min.js') ?>"></script>
    <script src="<?= base_url('admin/lib/waypoints/waypoints.min.js') ?>"></script>
    <script src="<?= base_url('admin/lib/owlcarousel/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('admin/lib/tempusdominus/js/moment.min.js') ?>"></script>
    <script src="<?= base_url('admin/lib/tempusdominus/js/moment-timezone.min.js') ?>"></script>
    <script src="<?= base_url('admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') ?>"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('admin/js/main.js') ?>"></script>
    <script src="<?= base_url('admin/js/script.js') ?>"></script>
    <script>
        function confirmDelete(name) {
    if (confirm(`Apakah Anda yakin ingin menghapus pengguna "${name}"?`)) {
        // Jika user menekan OK, redirect ke URL delete
        window.location.href = '<?= base_url("admin/konsultasi/delete") ?>' + name;
    }
}

    </script>

</body>
</html>
