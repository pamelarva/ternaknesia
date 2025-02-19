<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TipsModel;

class TipsController extends BaseController
{
    protected $tipsModel;

    public function __construct()
    {
        $this->tipsModel = new TipsModel();
    }

    // Menampilkan daftar tips
    public function index()
    {
        $data['tips'] = $this->tipsModel->findAll();
        return view('admin/tips/index', $data);
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('admin/tips/create');
    }

    // Menyimpan data ke database
    public function store()
    {
        $this->tipsModel->save([
            'judul'       => $this->request->getPost('judul'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'link_video'  => $this->request->getPost('link_video'),
            'id_admin'    => session()->get('admin_id'), // Ambil ID admin dari session
        ]);

        return redirect()->to('/admin/konten')->with('success', 'Data berhasil ditambahkan');
    }

    // Menampilkan form edit berdasarkan ID
    public function edit($id)
    {
        $data['tips'] = $this->tipsModel->find($id);
        return view('admin/tips/edit', $data);
    }

    // Update data
    public function update($id)
    {
        $this->tipsModel->update($id, [
            'judul'       => $this->request->getPost('judul'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'link_video'  => $this->request->getPost('link_video'),
            'id_admin'    => session()->get('id_admin'),
        ]);

        return redirect()->to('/admin/konten')->with('success', 'Data berhasil diperbarui');
    }

    // Hapus data berdasarkan ID
    public function delete($id)
    {
        $this->tipsModel->delete($id);
        return redirect()->to('/admin/konten')->with('success', 'Data berhasil dihapus');
    }
}
