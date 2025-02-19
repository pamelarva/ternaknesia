<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use CodeIgniter\HTTP\ResponseInterface;

class JadwalController extends BaseController
{
    protected $jadwalModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
    }

    // Menampilkan semua jadwal pakan
    public function index()
    {
        $data['jadwal'] = $this->jadwalModel->getAllJadwal();
        return view('pengguna/jadwal/index', $data);
    }

    // Menampilkan form tambah jadwal
    public function create()
    {
        // Ambil data jenis ternak dari model
        $ternakModel = new \App\Models\TernakModel();
        $data['ternak'] = $ternakModel->findAll();  // Atau sesuaikan dengan query untuk mengambil data ternak
    
        // Kirim data ternak ke view
        return view('pengguna/jadwal/create', $data);
    }
    

    // Menyimpan jadwal pakan baru
    public function store()
    {
        // Ambil data dari form
        $id_ternak = $this->request->getPost('jenis_ternak'); // Ambil id_ternak yang dipilih dari dropdown
        
        // Ambil jenis_ternak dari tabel ternak berdasarkan id_ternak
        $ternakModel = new \App\Models\TernakModel(); // Pastikan Anda memiliki model TernakModel
        $ternak = $ternakModel->find($id_ternak); // Cari data ternak berdasarkan id_ternak
    
        // Jika id_ternak tidak valid atau tidak ditemukan
        if (!$ternak) {
            return redirect()->back()->with('errors', ['Jenis ternak tidak valid.'])->withInput();
        }
    
        // Data untuk disimpan
        $data = [
            'id_ternak'        => $id_ternak,            // Ambil id_ternak yang dipilih
            'jenis_ternak'     => $ternak['jenis_ternak'], // Ambil jenis_ternak dari tabel ternak
            'jenis_pakan'      => $this->request->getPost('jenis_pakan'),
            'waktu_pemberian1' => $this->request->getPost('waktu_pemberian1'),
            'waktu_pemberian2' => $this->request->getPost('waktu_pemberian2'),
            'waktu_pemberian3' => $this->request->getPost('waktu_pemberian3'),
            'banyaknya_pakan'  => $this->request->getPost('banyaknya_pakan')
        ];
    
        // Simpan data
        $jadwalModel = new \App\Models\JadwalModel();
        if (!$jadwalModel->save($data)) {
            return redirect()->back()->with('errors', $jadwalModel->errors())->withInput();
        }
    
        // Redirect ke halaman jadwal dengan pesan sukses
        return redirect()->to('pengguna/jadwal')->with('success', 'Jadwal pakan berhasil ditambahkan.');
    }
    
    

    // Menampilkan form edit jadwal
    public function edit($id)
    {
        $data['jadwal'] = $this->jadwalModel->getJadwalById($id);

        if (!$data['jadwal']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Jadwal dengan ID $id tidak ditemukan.");
        }

        return view('pengguna/jadwal/edit', $data);
    }

    // Memperbarui jadwal pakan
    public function update($id)
    {
        $data = [
            'id_pakan'         => $id,
            'jenis_ternak'     => $this->request->getPost('jenis_ternak'),
            'jenis_pakan'      => $this->request->getPost('jenis_pakan'),
            'waktu_pemberian1' => $this->request->getPost('waktu_pemberian1'),
            'waktu_pemberian2' => $this->request->getPost('waktu_pemberian2'),
            'waktu_pemberian3' => $this->request->getPost('waktu_pemberian3'),
            'banyaknya_pakan'  => $this->request->getPost('banyaknya_pakan')
        ];

        if (!$this->jadwalModel->save($data)) {
            return redirect()->back()->with('errors', $this->jadwalModel->errors())->withInput();
        }

        return redirect()->to('pengguna/jadwal')->with('success', 'Jadwal pakan berhasil diperbarui.');
    }

    // Menghapus jadwal pakan
    public function delete($id)
    {
        if (!$this->jadwalModel->deleteJadwal($id)) {
            return redirect()->to('pengguna/jadwal')->with('error', 'Gagal menghapus jadwal.');
        }

        return redirect()->to('pengguna/jadwal')->with('success', 'Jadwal pakan berhasil dihapus.');
    }
}
