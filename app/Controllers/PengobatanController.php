<?php

namespace App\Controllers;

use App\Models\PengobatanModel;
use App\Models\KesehatanModel;
use CodeIgniter\Controller;

class PengobatanController extends Controller
{
    // Menyimpan instance model
    protected $pengobatanModel;
    protected $kesehatanModel;

    public function __construct()
    {
        $this->pengobatanModel = new PengobatanModel();
        $this->kesehatanModel = new KesehatanModel();
    }

    // Menampilkan semua data pengobatan
    public function index()
    {
        $data['pengobatan'] = $this->pengobatanModel->getAllPengobatan();
        $data['success'] = session()->getFlashdata('success'); // Menambahkan flashdata untuk pesan sukses

        return view('pengguna/pengobatan/index', $data);
    }

    // Menampilkan form untuk menambah pengobatan baru
    public function create()
    {
        $data['pemeriksaan'] = $this->kesehatanModel->findAll();
        return view('pengguna/pengobatan/create', $data);
    }

    // Menyimpan data pengobatan baru
    public function store()
    {
        // Validasi input
        if (!$this->validate([
            'nama_obat'        => 'required|max_length[20]',
            'waktu_pengobatan' => 'required',
            'durasi_pengobatan' => 'required',
            'dosis'            => 'required|max_length[20]',
            'id_pemeriksaan'   => 'required|integer'
        ])) {
            return redirect()->to('pengguna/pengobatan/create')->withInput();
        }

        // Menyimpan data
        $this->pengobatanModel->addPengobatan([
            'nama_obat'        => $this->request->getPost('nama_obat'),
            'waktu_pengobatan' => $this->request->getPost('waktu_pengobatan'),
            'durasi_pengobatan' => $this->request->getPost('durasi_pengobatan'),
            'dosis'            => $this->request->getPost('dosis'),
            'id_pemeriksaan'   => $this->request->getPost('id_pemeriksaan')
        ]);

        // Menambahkan pesan sukses
        session()->setFlashdata('success', 'Data pengobatan berhasil ditambahkan.');

        // Redirect ke halaman pengobatan setelah data disimpan
        return redirect()->to('pengguna/pengobatan');
    }

    // Menampilkan form untuk mengedit pengobatan berdasarkan id
    public function edit($id)
    {
        $data['pengobatan'] = $this->pengobatanModel->getPengobatanById($id);
        $data['pemeriksaan'] = $this->kesehatanModel->findAll();

        if (!$data['pengobatan']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengobatan tidak ditemukan');
        }

        return view('pengguna/pengobatan/edit', $data);
    }

    // Memperbarui data pengobatan berdasarkan id
    public function update($id)
    {
        // Validasi input
        if (!$this->validate([
            'nama_obat'        => 'required|max_length[20]',
            'waktu_pengobatan' => 'required',
            'durasi_pengobatan' => 'required',
            'dosis'            => 'required|max_length[20]',
            'id_pemeriksaan'   => 'required|integer'
        ])) {
            return redirect()->to("pengguna/pengobatan/edit/$id")->withInput();
        }

        // Update data pengobatan
        $this->pengobatanModel->updatePengobatan($id, [
            'nama_obat'        => $this->request->getPost('nama_obat'),
            'waktu_pengobatan' => $this->request->getPost('waktu_pengobatan'),
            'durasi_pengobatan' => $this->request->getPost('durasi_pengobatan'),
            'dosis'            => $this->request->getPost('dosis'),
            'id_pemeriksaan'   => $this->request->getPost('id_pemeriksaan')
        ]);

        // Menambahkan pesan sukses
        session()->setFlashdata('success', 'Data pengobatan berhasil diperbarui.');

        // Redirect ke halaman pengobatan setelah data diperbarui
        return redirect()->to('pengguna/pengobatan');
    }

    // Menghapus pengobatan berdasarkan id
    public function delete($id)
    {
        $this->pengobatanModel->deletePengobatan($id);

        // Menambahkan pesan sukses
        session()->setFlashdata('success', 'Data pengobatan berhasil dihapus.');

        return redirect()->to('pengguna/pengobatan');
    }
}
