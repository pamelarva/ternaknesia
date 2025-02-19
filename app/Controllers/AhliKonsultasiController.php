<?php

namespace App\Controllers;

use App\Models\AhliKonsultasiModel;

class AhliKonsultasiController extends BaseController
{
    protected $ahliKonsultasiModel;

    public function __construct()
    {
        $this->ahliKonsultasiModel = new AhliKonsultasiModel();
    }

    // Menampilkan daftar ahli konsultasi
    public function index()
    {
        $data['ahli_konsultasi'] = $this->ahliKonsultasiModel->findAll(); // Ambil semua data ahli konsultasi
        return view('admin/ahlikonsultasi/index', $data);
    }

    // Menampilkan form untuk menambah ahli konsultasi
    public function create()
    {
        return view('admin/ahlikonsultasi/create');
    }

    // Menyimpan data ahli konsultasi baru
    public function store()
    {
        // Validasi input
        if (!$this->validate([
            'nama_ahli' => [
                'rules' => 'required|string|max_length[20]',
                'errors' => [
                    'required' => 'Nama ahli wajib diisi.',
                    'string' => 'Nama ahli harus berupa teks.',
                    'max_length' => 'Nama ahli tidak boleh lebih dari 20 karakter.',
                ]
            ],
            'no_hp' => [
                'rules' => 'required|string|max_length[20]',
                'errors' => [
                    'required' => 'Nomor HP wajib diisi.',
                    'string' => 'Nomor HP harus berupa teks.',
                    'max_length' => 'Nomor HP tidak boleh lebih dari 20 karakter.',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|max_length[20]',
                'errors' => [
                    'required' => 'Email wajib diisi.',
                    'valid_email' => 'Email tidak valid.',
                    'max_length' => 'Email tidak boleh lebih dari 20 karakter.',
                ]
            ],
            'pendidikan' => [
                'rules' => 'required|string|max_length[50]',
                'errors' => [
                    'required' => 'Pendidikan wajib diisi.',
                    'string' => 'Pendidikan harus berupa teks.',
                    'max_length' => 'Pendidikan tidak boleh lebih dari 50 karakter.',
                ]
            ],
            'catatan' => [
                'rules' => 'required|string',
                'errors' => [
                    'required' => 'Catatan wajib diisi.',
                    'string' => 'Catatan harus berupa teks.',
                ]
            ],
            'link_github' => [
                'rules' => 'permit_empty|valid_url',
                'errors' => [
                    'valid_url' => 'Link GitHub tidak valid.',
                ]
            ],
            'link_instagram' => [
                'rules' => 'permit_empty|valid_url',
                'errors' => [
                    'valid_url' => 'Link Instagram tidak valid.',
                ]
            ],
            'lokasi' => [
                'rules' => 'permit_empty|string|max_length[255]',
                'errors' => [
                    'string' => 'Lokasi harus berupa teks.',
                    'max_length' => 'Lokasi tidak boleh lebih dari 255 karakter.',
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil ID Admin yang login, misalnya melalui session
        $idAdmin = session()->get('admin_id'); // Sesuaikan dengan cara Anda mengambil ID Admin

        // Simpan data ke database
        $this->ahliKonsultasiModel->save([
            'nama_ahli' => $this->request->getPost('nama_ahli'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email' => $this->request->getPost('email'),
            'pendidikan' => $this->request->getPost('pendidikan'),
            'catatan' => $this->request->getPost('catatan'),
            'link_github' => $this->request->getPost('link_github'),
            'link_instagram' => $this->request->getPost('link_instagram'),
            'lokasi' => $this->request->getPost('lokasi'),
        'id_admin' => $idAdmin, // Menyimpan ID Admin yang login
    ]);

    return redirect()->to('/admin/konsultasi')->with('success', 'Ahli Konsultasi berhasil ditambahkan.');
}


    // Menampilkan form untuk mengedit ahli konsultasi
    public function edit($id)
    {
        $data['ahli_konsultasi'] = $this->ahliKonsultasiModel->find($id);
        if (!$data['ahli_konsultasi']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Ahli Konsultasi tidak ditemukan');
        }

        return view('admin/ahlikonsultasi/edit', $data);
    }

    // Menyimpan perubahan data ahli konsultasi
    public function update($id)
    {
        // Ambil data ahli konsultasi berdasarkan ID
        $ahliKonsultasi = $this->ahliKonsultasiModel->find($id);
    
        // Pastikan data ditemukan
        if (!$ahliKonsultasi) {
            return redirect()->to('/admin/konsultasi')->with('error', 'Ahli Konsultasi tidak ditemukan.');
        }
    
        // Validasi input
        if (!$this->validate([
            'nama_ahli' => 'required|string|max_length[20]',
            'no_hp' => 'required|string|max_length[20]',
            'email' => 'required|valid_email|max_length[20]',
            'pendidikan' => 'required|string|max_length[50]',
            'catatan' => 'required|string',
            'link_github' => 'permit_empty|valid_url',
            'link_instagram' => 'permit_empty|valid_url',
            'lokasi' => 'permit_empty|string|max_length[255]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Simpan data yang diperbarui
        $this->ahliKonsultasiModel->update($id, [
            'nama_ahli' => $this->request->getPost('nama_ahli'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email' => $this->request->getPost('email'),
            'pendidikan' => $this->request->getPost('pendidikan'),
            'catatan' => $this->request->getPost('catatan'),
            'link_github' => $this->request->getPost('link_github'),
            'link_instagram' => $this->request->getPost('link_instagram'),
            'lokasi' => $this->request->getPost('lokasi'),
        ]);
    
        return redirect()->to('/admin/konsultasi')->with('success', 'Ahli Konsultasi berhasil diperbarui.');
    }
    

    // Menghapus ahli konsultasi
    public function destroy($id)
    {
        // Hapus data ahli konsultasi
        $this->ahliKonsultasiModel->delete($id);

        return redirect()->to('/admin/konsultasi')->with('success', 'Ahli Konsultasi berhasil dihapus.');
    }
}
