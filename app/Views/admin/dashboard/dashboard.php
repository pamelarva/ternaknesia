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
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="<?= base_url('admin/dashboard') ?>" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Ternaknesia</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Beranda</a>
                    <a href="<?= base_url('admin/pengguna') ?>" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Pengguna</a>
                    <a href="<?= base_url('admin/konten') ?>" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Konten</a>
                    <a href="<?= base_url('admin/ternak') ?>" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Ternak</a>
                    <a href="<?= base_url('kesehatan.html') ?>" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Kesehatan</a>
                    <a href="<?= base_url('konsultasi.html') ?>" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Konsultasi</a>
                    <a href="<?= base_url('jadwal.html') ?>" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Jadwal</a>
                    <a href="<?= base_url('produksi.html') ?>" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Produksi</a>
                    <a href="<?= base_url('chart.html') ?>" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Grafik</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="<?= base_url('index.html') ?>" class="navbar-brand d-flex d-lg-none me-4">
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
                            <a href="<?= base_url('masuk.html') ?>" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Pengguna -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Pengguna</p>
                                <h6 class="mb-0"><?= $userCount ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik Jumlah Ternak Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Jumlah Ternak</h6>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>

                    <!-- Grafik Jumlah Konsultasi Start -->
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Jumlah Konsultasi</h6>
                            </div>
                            <canvas id="consultation-chart"></canvas>
                        </div>
                    </div>
                    <!-- Grafik Jumlah Konsultasi End -->

                </div>
            </div>
            <!-- Grafik Jumlah Ternak End -->
        </div>
        <!-- Content End -->
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
    <script src="<?= base_url('admin/js/scripts.js') ?>"></script>

    <script>
        // Grafik Jumlah Ternak
        var ctx = document.getElementById('worldwide-sales').getContext('2d');
        
        // Pastikan chartData sudah dikirimkan dari controller
        var chartData = <?= json_encode($chartData) ?>;
        
        // Menggunakan total ternak dari data
        var totalTernak = chartData.total;

        var myChart = new Chart(ctx, {
            type: 'bar', // Anda bisa memilih tipe grafik sesuai keinginan (misalnya, bar chart)
            data: {
                labels: ['Jumlah Ternak'], // Label untuk grafik
                datasets: [{
                    label: 'Jumlah Ternak',
                    data: [totalTernak], // Data total jumlah ternak
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna latar belakang bar
                    borderColor: 'rgba(75, 192, 192, 1)', // Warna border bar
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Grafik Jumlah Konsultasi
        var consultationChart = document.getElementById('consultation-chart').getContext('2d');
        var consultationData = <?= json_encode($consultationData) ?>; // Data konsultasi

        var consultationGraph = new Chart(consultationChart, {
            type: 'line',
            data: {
                labels: consultationData.labels, // Label untuk grafik konsultasi
                datasets: [{
                    label: 'Jumlah Konsultasi',
                    data: consultationData.data, // Data jumlah konsultasi
                    borderColor: '#FF5733', // Warna garis grafik
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
