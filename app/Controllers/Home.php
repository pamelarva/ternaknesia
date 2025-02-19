<?php

namespace App\Controllers;

class Home extends BaseController {
    public function index() {
        // Data yang dikirimkan ke view, jika diperlukan
        $data = [
            'title' => 'Beranda',
            'message' => 'Selamat datang di project CodeIgniter 4!'
        ];

        // Memuat view dan mengirimkan data
        return view('index', $data);
    }
}
