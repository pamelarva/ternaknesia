<?php

namespace App\Controllers;

use App\Models\VaksinasiModel;
use App\Models\TernakModel; // Untuk mendapatkan data ternak

class VaksinasiController extends BaseController
{
    protected $vaksinasiModel;
    protected $ternakModel;

    public function __construct()
    {
        $this->vaksinasiModel = new VaksinasiModel();
        $this->ternakModel = new TernakModel();
    }

    // Menampilkan semua data vaksinasi
    public function index()
    {
        $data['vaksinasi'] = $this->vaksinasiModel
            ->select('vaksinasi.*, ternak.jenis_ternak') // Menggabungkan data ternak
            ->join('ternak', 'ternak.id_ternak = vaksinasi.id_ternak', 'left')
            ->findAll();

        return view('pengguna/vaksinasi/index', $data);
    }

    // Menampilkan form tambah vaksinasi
    public function create()
    {
        $data['ternak'] = $this->ternakModel->findAll(); // Mengambil data ternak
        return view('pengguna/vaksinasi/create', $data);
    }

    // Menyimpan data vaksinasi baru
    public function store()
    {
        if (!$this->validate([
            'nama_vaksin' => 'required|max_length[20]',
            'waktu_vaksinasi' => 'required',
            'dosis' => 'required|decimal',
            'nama_tenaga_medis' => 'required|max_length[50]',
            'id_ternak' => 'required|is_not_unique[ternak.id_ternak]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->vaksinasiModel->save([
            'nama_vaksin'       => $this->request->getPost('nama_vaksin'),
            'waktu_vaksinasi'   => $this->request->getPost('waktu_vaksinasi'),
            'dosis'             => $this->request->getPost('dosis'),
            'nama_tenaga_medis' => $this->request->getPost('nama_tenaga_medis'),
            'id_ternak'         => $this->request->getPost('id_ternak'),
        ]);

        return redirect()->to('/pengguna/vaksinasi')->with('success', 'Data vaksinasi berhasil ditambahkan!');
    }

    // Menampilkan form edit vaksinasi
    public function edit($id)
    {
        $data['vaksinasi'] = $this->vaksinasiModel->find($id);
        $data['ternak'] = $this->ternakModel->findAll();

        if (!$data['vaksinasi']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data vaksinasi tidak ditemukan');
        }

        return view('pengguna/vaksinasi/edit', $data);
    }

    // Mengupdate data vaksinasi
    public function update($id)
    {
        if (!$this->validate([
            'nama_vaksin' => 'required|max_length[20]',
            'waktu_vaksinasi' => 'required',
            'dosis' => 'required|decimal',
            'nama_tenaga_medis' => 'required|max_length[50]',
            'id_ternak' => 'required|is_not_unique[ternak.id_ternak]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->vaksinasiModel->update($id, [
            'nama_vaksin'       => $this->request->getPost('nama_vaksin'),
            'waktu_vaksinasi'   => $this->request->getPost('waktu_vaksinasi'),
            'dosis'             => $this->request->getPost('dosis'),
            'nama_tenaga_medis' => $this->request->getPost('nama_tenaga_medis'),
            'id_ternak'         => $this->request->getPost('id_ternak'),
        ]);

        return redirect()->to('/pengguna/vaksinasi')->with('success', 'Data vaksinasi berhasil diubah!');
    }

    // Menghapus data vaksinasi
    public function delete($id)
    {
        $vaksinasi = $this->vaksinasiModel->find($id);

        if (!$vaksinasi) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data vaksinasi tidak ditemukan');
        }

        $this->vaksinasiModel->delete($id);
        return redirect()->to('/pengguna/vaksinasi')->with('success', 'Data vaksinasi berhasil dihapus!');
    }
}
