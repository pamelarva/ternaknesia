<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// login pengguna
$routes->get('/pengguna/login', 'PenggunaController::login');
$routes->post('/pengguna/authenticate', 'PenggunaController::authenticate');
$routes->get('/pengguna/logout', 'PenggunaController::logout');
$routes->get('/pengguna/register', 'PenggunaController::register');
$routes->post('/pengguna/store', 'PenggunaController::store');


// Rute yang hanya bisa diakses oleh pengguna yang terautentikasi
$routes->group('pengguna', ['filter' => 'auth'], function($routes) {
    $routes->get('logout', 'PenggunaController::logout');
    // Dashboard pengguna
    $routes->get('dashboard', 'PenggunaController::dashboard');
    $routes->get('konsultasi', 'PenggunaController::indexkonsultasi');
    // Rute untuk ternak
    $routes->get('ternak', 'PenggunaController::indexTernak');
    $routes->get('ternak/create', 'PenggunaController::createTernak');
    $routes->post('ternak/store', 'PenggunaController::storeTernak');
    $routes->get('ternak/edit/(:num)', 'PenggunaController::editTernak/$1');
    $routes->post('ternak/update/(:num)', 'PenggunaController::updateTernak/$1');
    $routes->get('ternak/delete/(:num)', 'PenggunaController::deleteTernak/$1');

    // Kesehatan
    $routes->get('kesehatan', 'KesehatanController::index');
    $routes->get('pemeriksaan', 'KesehatanController::indexkesehatan');
    $routes->get('pemeriksaan/create', 'KesehatanController::create');
    $routes->post('pemeriksaan/store', 'KesehatanController::store');
    $routes->get('pemeriksaan/edit/(:num)', 'KesehatanController::edit/$1');
    $routes->post('pemeriksaan/update/(:num)', 'KesehatanController::update/$1');
    $routes->get('pemeriksaan/delete/(:num)', 'KesehatanController::delete/$1');

    // Vaksinasi
    $routes->get('vaksinasi', 'VaksinasiController::index');
    $routes->get('vaksinasi/create', 'VaksinasiController::create');
    $routes->post('vaksinasi/store', 'VaksinasiController::store');
    $routes->get('vaksinasi/edit/(:num)', 'VaksinasiController::edit/$1');
    $routes->post('vaksinasi/update/(:num)', 'VaksinasiController::update/$1');
    $routes->get('vaksinasi/delete/(:num)', 'VaksinasiController::delete/$1');

    // Pengobatan
    $routes->get('pengobatan', 'PengobatanController::index');         // Menampilkan daftar pengobatan
    $routes->get('pengobatan/create', 'PengobatanController::create'); // Menampilkan form tambah pengobatan
    $routes->post('pengobatan/store', 'PengobatanController::store');       // Menyimpan data pengobatan
    $routes->get('pengobatan/edit/(:segment)', 'PengobatanController::edit/$1'); // Menampilkan form edit pengobatan
    $routes->post('pengobatan/update/(:segment)', 'PengobatanController::update/$1'); // Memperbarui data pengobatan
    $routes->get('pengobatan/delete/(:segment)', 'PengobatanController::delete/$1'); // Menghapus data pengobatan

    // Jadwal
    $routes->get('jadwal', 'JadwalController::index');               // Menampilkan semua jadwal pakan
    $routes->get('jadwal/create', 'JadwalController::create');         // Menampilkan form tambah jadwal
    $routes->post('jadwal/store', 'JadwalController::store');                // Menyimpan jadwal pakan baru
    $routes->get('jadwal/edit/(:num)', 'JadwalController::edit/$1');   // Menampilkan form edit jadwal berdasarkan ID
    $routes->post('jadwal/update/(:num)', 'JadwalController::update/$1');  // Memperbarui jadwal pakan berdasarkan ID
    $routes->get('jadwal/delete/(:num)', 'JadwalController::delete/$1');  // Menghapus jadwal pakan berdasarkan ID

    // Produksi
    $routes->get('produksi', 'ProduksiController::index');               // Menampilkan semua data produksi
    $routes->get('produksi/create', 'ProduksiController::create');         // Menampilkan form tambah produksi
    $routes->post('produksi/store', 'ProduksiController::store');                // Menyimpan data produksi baru
    $routes->get('produksi/edit/(:num)', 'ProduksiController::edit/$1');   // Menampilkan form edit produksi berdasarkan ID
    $routes->post('produksi/update/(:num)', 'ProduksiController::update/$1');  // Memperbarui data produksi berdasarkan ID
    $routes->get('produksi/delete/(:num)', 'ProduksiController::delete/$1');  // Menghapus data produksi berdasarkan ID

    $routes->get('diskusi', 'DiskusiController::index'); // Menampilkan halaman diskusi
    $routes->post('diskusi/kirim', 'DiskusiController::create'); // Mengirim pesan baru

    ; // Menampilkan halaman konsultasi
    
});

$routes->get('/admin/login', 'AdminController::login');
$routes->post('/admin/authenticate', 'AdminController::authenticate');
$routes->get('/admin/logout', 'AdminController::logout');
 // Contoh redirect setelah login

$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'AdminController::index');
    $routes->get('pengguna', 'AdminController::pengguna');
    $routes->get('delete_pengguna/(:any)', 'AdminController::delete_pengguna/$1');

    // Tips
    $routes->get('konten', 'TipsController::index'); // Menampilkan semua data
    $routes->get('tips/create', 'TipsController::create'); // Form tambah data
    $routes->post('tips/store', 'TipsController::store'); // Simpan data
    $routes->get('tips/edit/(:num)', 'TipsController::edit/$1'); // Form edit
    $routes->post('tips/update/(:num)', 'TipsController::update/$1'); // Update data
    $routes->get('tips/delete/(:num)', 'TipsController::delete/$1'); // Hapus data

    // Ternak
    $routes->get('ternak', 'AdminController::indexTernak');
    $routes->get('ternak/delete/(:num)', 'TernakController::deleteternak/$1');

    // kesehatan
    $routes->get('kesehatan', 'AdminController::kesehatan');

    // vaksinasi
    $routes->delete('vaksinasi/delete/(:num)', 'AdminController::deletevaksinasi/$1');
    $routes->delete('pengobatan/delete/(:num)', 'AdminController::deletepengobatan/$1');
    $routes->delete('pemeriksaan/delete/(:num)', 'AdminController::deleteKesehatan/$1');

    // ahli konsultasi 
    $routes->get('konsultasi', 'AhliKonsultasiController::index');
    $routes->get('konsultasi/create', 'AhliKonsultasiController::create');
    $routes->post('konsultasi/store', 'AhliKonsultasiController::store');
    $routes->get('konsultasi/edit/(:segment)', 'AhliKonsultasiController::edit/$1');
    $routes->put('konsultasi/update/(:segment)', 'AhliKonsultasiController::update/$1');
    $routes->get('konsultasi/(:segment)/delete', 'AhliKonsultasiController::delete/$1');

    // jadwal pakan
    $routes->get('jadwal', 'AdminController::indexjadwal');
    $routes->get('jadwal/delete/(:num)', 'AdminController::deletejadwal/$1');

    // Produksi
    $routes->get('produksi', 'AdminController::indexproduksi');
    $routes->get('produksi/delete/(:num)', 'AdminController::deleteproduksi/$1');

    $routes->get('chart', 'AdminController::chart');
}); 

