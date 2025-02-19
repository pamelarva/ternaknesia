<?php

namespace App\Controllers;

use App\Models\DiskusiModel;
use CodeIgniter\Controller;

class DiskusiController extends Controller
{
    protected $diskusiModel;

    public function __construct()
    {
        $this->diskusiModel = new DiskusiModel();
    }

    /**
     * Menampilkan semua pesan diskusi.
     */
    public function index()
    {
        $data['pesan'] = $this->diskusiModel->getAllPesan();

        return view('pengguna/diskusi/index', $data); // Pastikan ada view diskusi/index
    }

    /**
     * Menambahkan pesan baru ke diskusi.
     */
    public function create()
    {
        $validation = \Config\Services::validation();

        // Validasi input
        $validation->setRules([
            'isi_pesan' => 'required|max_length[255]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('errors', $validation->getErrors());
        }

        // Ambil data input
        $data = [
            'isi_pesan' => $this->request->getPost('isi_pesan'),
            'waktu_terkirim' => date('Y-m-d H:i:s'), // Waktu sekarang
            'id_pengguna' => session()->get('pengguna_id'), // ID pengguna dari session
        ];

        // Simpan pesan
        $this->diskusiModel->tambahPesan($data);

        return redirect()->to('pengguna/diskusi')->with('success', 'Pesan berhasil dikirim.');
    }
}
