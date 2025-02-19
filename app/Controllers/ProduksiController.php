<?php

namespace App\Controllers;

use App\Models\ProduksiModel;
use App\Models\TernakModel;
use CodeIgniter\Controller;

class ProduksiController extends Controller
{
    // Instance dari model Produksi
    protected $produksiModel;

    public function __construct()
    {
        // Memuat model Produksi
        $this->produksiModel = new ProduksiModel();
    }

    // Menampilkan semua data produksi
    public function index()
    {
        // Ambil semua data produksi beserta jenis ternaknya
        $data['produksi'] = $this->produksiModel->getAllProduksiWithTernak();
    
        return view('pengguna/produksi/index', $data);  // Pastikan view 'produksi/index' ada
    }
    

    // Menampilkan form untuk menambahkan produksi
    public function create()
    {
        // Ambil data jenis ternak dari tabel ternak
        $ternakModel = new TernakModel();
        $ternaks = $ternakModel->findAll();  // Menarik semua data ternak

        // Kirim data ternak ke view
        return view('pengguna/produksi/create', ['ternaks' => $ternaks]);
    }

    // Menyimpan data produksi yang baru
    public function store()
    {
        $validation = $this->validate([
            'jenis_ternak'        => 'required|integer',
            'tanggal_produksi' => 'required|valid_date[Y-m-d]',
            'jenis_produksi'   => 'required|in_list[Susu,Telur]',
            'jumlah_produksi'  => 'required|decimal',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Mengambil file gambar (jika ada)
        $gambarFile = $this->request->getFile('gambar_produksi');
        $gambarName = null;

        if ($gambarFile && $gambarFile->isValid() && !$gambarFile->hasMoved()) {
            $gambarName = $gambarFile->getRandomName(); // Membuat nama file acak
            $gambarFile->move(ROOTPATH . 'public/uploads', $gambarName); // Memindahkan file ke folder 'public/uploads'
        }

        $data = [
            'id_ternak' => $this->request->getPost('jenis_ternak'),
            'tanggal_produksi' => $this->request->getPost('tanggal_produksi'),
            'jenis_produksi'   => $this->request->getPost('jenis_produksi'),
            'jumlah_produksi'  => $this->request->getPost('jumlah_produksi'),
            'gambar_produksi'  => $gambarName, // Menyimpan nama file (jika ada)
        ];

        $this->produksiModel->addProduksi($data);

        return redirect()->to('pengguna/produksi')->with('success', 'Data produksi berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data produksi
    public function edit($id)
    {
        // Pastikan model ternak telah dimuat
        $ternakModel = new TernakModel();
    
        // Ambil semua data jenis ternak untuk dropdown
        $ternaks = $ternakModel->findAll();
    
        // Ambil data produksi berdasarkan ID
        $produksi = $this->produksiModel->getProduksiById($id);
    
        // Jika data tidak ditemukan, kembalikan dengan error
        if (!$produksi) {
            return redirect()->to('pengguna/produksi')->with('error', 'Data produksi tidak ditemukan.');
        }
    
        // Kirim data ke view
        $data = [
            'produksi' => $produksi,
            'ternaks' => $ternaks, // Data untuk dropdown jenis ternak
        ];
    
        return view('pengguna/produksi/edit', $data); // Pastikan view 'produksi/edit' ada
    }
    

    // Memperbarui data produksi
    public function update($id)
    {
        // Mengambil data produksi berdasarkan ID
        $produksi = $this->produksiModel->find($id);
    
        if (!$produksi) {
            return redirect()->to('pengguna/produksi')->with('error', 'Data produksi tidak ditemukan.');
        }
    
        // Validasi input
        $validation = $this->validate([
            'jenis_ternak'        => 'required|integer',
            'tanggal_produksi' => 'required|valid_date[Y-m-d]',
            'jenis_produksi'   => 'required|in_list[Susu,Telur]',
            'jumlah_produksi'  => 'required|decimal',
        ]);
    
        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Mengambil file gambar baru (jika ada)
        $gambarFile = $this->request->getFile('gambar_produksi');
        $gambarName = $produksi['gambar_produksi']; // Gunakan nama gambar lama sebagai default
    
        if ($gambarFile && $gambarFile->isValid() && !$gambarFile->hasMoved()) {
            $gambarName = $gambarFile->getRandomName(); // Membuat nama file acak
            $gambarFile->move(ROOTPATH . 'public/uploads', $gambarName); // Memindahkan file ke folder 'public/uploads'
    
            // Hapus gambar lama jika ada
            if ($produksi['gambar_produksi'] && file_exists(ROOTPATH . 'public/uploads/' . $produksi['gambar_produksi'])) {
                unlink(ROOTPATH . 'public/uploads/' . $produksi['gambar_produksi']);
            }
        }
    
        // Update data
        $data = [
            'id_produksi'               => $id, // ID produksi yang akan diupdate
            'id_ternak'        => $this->request->getPost('jenis_ternak'),
            'tanggal_produksi' => $this->request->getPost('tanggal_produksi'),
            'jenis_produksi'   => $this->request->getPost('jenis_produksi'),
            'jumlah_produksi'  => $this->request->getPost('jumlah_produksi'),
            'gambar_produksi'  => $gambarName,
        ];
    
        $this->produksiModel->save($data); // Menggunakan metode save untuk update data
    
        return redirect()->to('pengguna/produksi')->with('success', 'Data produksi berhasil diperbarui.');
    }
    

    // Menghapus data produksi
    public function delete($id)
    {
        // Menghapus data dari database
        if ($this->produksiModel->deleteProduksi($id)) {
            return redirect()->to('pengguna/produksi')->with('success', 'Produksi berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus produksi.');
        }
    }
}
