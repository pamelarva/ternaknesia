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
                    <a href="<?= base_url('admin/konsultasi') ?>" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Konsultasi</a>
                    <a href="<?= base_url('admin/jadwal') ?>" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Jadwal</a>
                    <a href="<?= base_url('admin/produksi') ?>" class="nav-item nav-link "><i class="fa fa-table me-2"></i>Produksi</a>
                    <a href="<?= base_url('admin/chart') ?>" class="nav-item nav-link active"><i class="fa fa-chart-bar me-2"></i>Grafik</a>
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
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php elseif (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

           <!-- View: admin/chart/index.php -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <!-- Grafik Produksi (Line Chart) -->
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Produksi</h6>
                            <canvas id="line-chart"></canvas>
                        </div>
                    </div>

                    <!-- Grafik Produksi (Sales/Revenue) -->
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Produksi</h6>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>

                    <!-- Grafik Ternak (Bar Chart) -->
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Ternak</h6>
                            <canvas id="bar-chart"></canvas>
                        </div>
                    </div>

                    <!-- Grafik Ternak (Worldwide Sales) -->
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Ternak</h6>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>

                    <!-- Grafik Ternak (Pie Chart) -->
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Ternak</h6>
                            <canvas id="pie-chart"></canvas>
                        </div>
                    </div>

                    <!-- Grafik Produksi (Doughnut Chart) -->
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Produksi</h6>
                            <canvas id="doughnut-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // Data produksi untuk Line Chart
                const produksiData = <?= json_encode($produksi) ?>;

                // Chart for Line Chart
                const lineChart = document.getElementById('line-chart').getContext('2d');
                const chartLine = new Chart(lineChart, {
                    type: 'line',
                    data: {
                        labels: produksiData.map(item => item.tanggal_produksi), // Tanggal produksi
                        datasets: [{
                            label: 'Produksi',
                            data: produksiData.map(item => item.jumlah_produksi), // Jumlah produksi
                            borderColor: 'rgba(75, 192, 192, 1)',
                            fill: false,
                        }]
                    }
                });

                // Data untuk Sales/Revenue (misal berdasarkan jumlah produksi)
                const revenueData = produksiData.map(item => item.jumlah_produksi);

                // Chart for Sales/Revenue Chart (Bar Chart)
                const salesRevenueChart = document.getElementById('salse-revenue').getContext('2d');
                const chartBar = new Chart(salesRevenueChart, {
                    type: 'bar',
                    data: {
                        labels: produksiData.map(item => item.tanggal_produksi), // Tanggal produksi
                        datasets: [{
                            label: 'Jumlah Produksi',
                            data: revenueData, // Jumlah produksi
                            backgroundColor: 'rgba(255, 159, 64, 0.2)',
                            borderColor: 'rgba(255, 159, 64, 1)',
                            borderWidth: 1
                        }]
                    }
                });

                // Data untuk Ternak (Bar Chart)
                const ternakData = <?= json_encode($ternak) ?>;

                // Chart for Bar Chart (Ternak)
                const barChart = document.getElementById('bar-chart').getContext('2d');
                const chartBarTernak = new Chart(barChart, {
                    type: 'bar',
                    data: {
                        labels: ternakData.map(item => item.jenis_ternak), // ID ternak
                        datasets: [{
                            label: 'Ternak',
                            data: ternakData.map(item => item.jumlah_ternak), // Jumlah ternak
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    }
                });


                // Pie Chart for Ternak
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

                const barChartt = document.getElementById('worldwide-sales').getContext('2d');
                const chartBarr = new Chart(barChartt, {
                    type: 'bar',  // Tipe grafik bar
                    data: {
                        labels: ternakData.map(item => item.jenis_ternak), // Jenis ternak
                        datasets: [{
                            label: 'Jumlah Ternak',
                            data: ternakData.map(item => item.jumlah_ternak), // Jumlah ternak
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',  // Warna bar grafik
                            borderColor: 'rgba(54, 162, 235, 1)',  // Warna border bar
                            borderWidth: 1  // Lebar border
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true // Mulai skala dari 0
                            }
                        }
                    }
                });
                


                // Doughnut Chart for Produksi
                const doughnutChart = document.getElementById('doughnut-chart').getContext('2d');
                const chartDoughnut = new Chart(doughnutChart, {
                    type: 'doughnut',
                    data: {
                        labels: produksiData.map(item => item.tanggal_produksi), // Tanggal produksi
                        datasets: [{
                            data: revenueData, // Jumlah produksi
                            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
                        }]
                    }
                });
            </script>


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
    function confirmDelete(id_produksi) {
        if (confirm('Apakah Anda yakin ingin menghapus produksi ini?')) {
            window.location.href = '<?= base_url('admin/produksi/delete/') ?>' + id_produksi;
        }
    }
    </script>

</body>
</html>
