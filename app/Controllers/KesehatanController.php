<?php

namespace App\Controllers;

use App\Models\KesehatanModel;
use App\Models\TernakModel;

class KesehatanController extends BaseController
{
    // Menampilkan semua data kesehatan
    public function index()
    {
        return view('pengguna/Kesehatan/index'); // Menampilkan ke view index
    }
    
    public function indexkesehatan()
    {
        $kesehatanModel = new KesehatanModel();
        $data['kesehatan'] = $kesehatanModel->findAll(); // Mengambil semua data kesehatan dari model
        return view('pengguna/Kesehatan/indekesehatan', $data); // Menampilkan ke view index
    }

    // Menampilkan form untuk menambah data kesehatan
    public function create()
    {
        // Membuat instance model TernakModel
        $ternakModel = new TernakModel();

        // Mengambil semua data ternak dari tabel ternak
        $ternakData = $ternakModel->findAll();

        // Mengirim data ternak ke view
        return view('pengguna/Kesehatan/create', [
            'ternakData' => $ternakData
        ]);
    }
    // Menyimpan data yang diinputkan ke database
    public function store()
    {
        $kesehatanModel = new KesehatanModel();

        // Mendapatkan data dari input form
        $data = [
            'nama_pemeriksa'    => $this->request->getPost('nama_pemeriksa'),
            'gejala'            => $this->request->getPost('gejala'),
            'waktu_pemeriksaan' => $this->request->getPost('waktu_pemeriksaan'),
            'kondisi_fisik'     => $this->request->getPost('kondisi_fisik'),
            'diagnosa'          => $this->request->getPost('diagnosa'),
            'id_ternak'         => $this->request->getPost('ternak_id'),
        ];

        // Menyimpan data menggunakan model
        if ($kesehatanModel->save($data)) {
            return redirect()->to('pengguna/pemeriksaan')->with('success', 'Data pemeriksaan kesehatan berhasil ditambahkan');
        } else {
            return redirect()->back()->withInput()->with('errors', $kesehatanModel->errors());
        }
    }

    // Menampilkan form untuk mengedit data kesehatan
    public function edit($id)
    {
        // Membuat instance model
        $kesehatanModel = new KesehatanModel();
        $ternakModel = new TernakModel();
        
        // Menemukan pemeriksaan berdasarkan id
        $data['kesehatan'] = $kesehatanModel->find($id);

        // Jika pemeriksaan tidak ditemukan, tampilkan error
        if (!$data['kesehatan']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pemeriksaan kesehatan tidak ditemukan');
        }

        // Ambil data ternak untuk dropdown
        $data['ternaks'] = $ternakModel->findAll();

        // Menampilkan halaman edit dan membawa data ternak
        return view('pengguna/Kesehatan/edit', $data);
    }


    // Memperbarui data kesehatan yang ada
    public function update($id)
    {
        $kesehatanModel = new KesehatanModel();
        
        // Validasi input
        $this->validate([
            'ternak_id' => 'required',
            'waktu_pemeriksaan' => 'required',
            'nama_pemeriksa' => 'required',
            'gejala' => 'required',
            'kondisi_fisik' => 'required',
            'diagnosa' => 'required',
        ]);
    
        // Ambil data yang diinputkan
        $data = [
            'id_ternak' => $this->request->getPost('ternak_id'),
            'waktu_pemeriksaan' => $this->request->getPost('waktu_pemeriksaan'),
            'nama_pemeriksa' => $this->request->getPost('nama_pemeriksa'),
            'gejala' => $this->request->getPost('gejala'),
            'kondisi_fisik' => $this->request->getPost('kondisi_fisik'),
            'diagnosa' => $this->request->getPost('diagnosa'),
        ];
    
        // Update data pemeriksaan
        if ($kesehatanModel->update($id, $data)) {
            return redirect()->to('pengguna/pemeriksaan')->with('success', 'Data pemeriksaan berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data');
        }
    }
    

    // Menghapus data kesehatan
    public function delete($id)
    {
        $kesehatanModel = new KesehatanModel();
        if ($kesehatanModel->delete($id)) {
            return redirect()->to('pengguna/pemeriksaan')->with('success', 'Data pemeriksaan kesehatan berhasil dihapus');
        } else {
            return redirect()->to('pengguna/pemeriksaan')->with('error', 'Terjadi kesalahan saat menghapus data');
        }
    }
}
