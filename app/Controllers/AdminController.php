<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\TernakModel;
use App\Models\ProduksiModel;
use App\Models\PenggunaModel;
use App\Models\KonsultasiModel;
use App\Models\KesehatanModel;
use App\Models\PengobatanModel;
use App\Models\VaksinasiModel;
use App\Models\JadwalModel;
use CodeIgniter\Controller;

class AdminController extends Controller


{
    public function index()
{
    $userModel = new PenggunaModel();
    $ternakModel = new TernakModel();
    $produksiModel = new ProduksiModel();
    
    // Mengambil jumlah pengguna
    $data['userCount'] = $userModel->countAll();
    
    // Mengambil jumlah ternak
    $data['ternakCount'] = $ternakModel->countAll();
    
    // Mengambil jumlah produksi
    $data['produksiCount'] = $produksiModel->countAll();
    
    // Mengambil data untuk grafik jumlah ternak
    $data['chartData'] = $ternakModel->getTotalTernak();
    
    // Mengambil data untuk grafik jumlah konsultasi
    // Misalnya, asumsi ada model KonsultasiModel yang memiliki data untuk grafik ini
    $konsultasiModel = new KonsultasiModel();
    $data['consultationData'] = $konsultasiModel->getTotalKonsultasi();

    return view('admin/dashboard/dashboard', $data);
}

    

    public function login()
    {
        // Menampilkan halaman login
        return view('admin/login');
    }

    public function authenticate()
    {
        $session = session();
        $model = new AdminModel();

        // Validasi input
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if (!$email || !$password) {
            $session->setFlashdata('error', 'Email dan Password harus diisi!');
            return redirect()->to('/admin/login');
        }

        // Ambil data admin berdasarkan email
        $admin = $model->where('email', $email)->first();

        // Verifikasi password TANPA hash
        if ($admin && $password == $admin['password']) {  // Perubahan ada di sini
            // Set session data
            $session->set([
                'admin_id'   => $admin['id_admin'],
                'admin_name' => $admin['nama_admin'],
                'isLoggedIn' => true
            ]);
            return redirect()->to('/admin/dashboard');
        } else {
            $session->setFlashdata('error', 'Email atau Password salah!');
            return redirect()->to('/admin/login');
        }
    }

    // Pengguna

    public function pengguna()
    {
        $model = new PenggunaModel();
        $data['pengguna'] = $model->findAll();
        return view('admin/pengguna/index', $data);
    }

    public function delete_pengguna($nama) {
        $this->penggunaModel = new \App\Models\PenggunaModel();
        $user = $this->penggunaModel->where('nama', $nama)->first();
    
        if ($user) {
            $this->penggunaModel->delete($user['id_pengguna']);
            return redirect()->to('admin/pengguna')->with('success', 'Pengguna berhasil dihapus.');
        } else {
            return redirect()->to('admin/pengguna')->with('error', 'Pengguna tidak ditemukan.');
        }
    }

    // Ternak
    public function indexTernak()
    {
        $model = new TernakModel();
        $ternak = $model->findAll();
    
        // Mengelompokkan ternak berdasarkan jenis
        $jumlahTernak = [];
        foreach ($ternak as $item) {
            if (!isset($jumlahTernak[$item['jenis_ternak']])) {
                $jumlahTernak[$item['jenis_ternak']] = 0;
            }
            $jumlahTernak[$item['jenis_ternak']] += $item['jumlah'];
        }
    
        // Kirim data ke view
        return view('admin/ternak/index', [
            'ternak' => $ternak,
            'jumlahTernak' => $jumlahTernak
        ]);
    }

    public function deleteternak($id_ternak)
    {
        $ternakModel = new \App\Models\TernakModel();
        $ternak = $ternakModel->find($id_ternak);
        if ($ternak) {
            $ternakModel->delete($id_ternak);
            return redirect()->to(base_url('admin/ternak'))
                            ->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->to(base_url('admin/ternak'))
                            ->with('error', 'Data tidak ditemukan.');
        }
    }

    // kesehatan
    public function kesehatan()
    {
        $pengobatanModel = new PengobatanModel();
        $kesehatanModel = new KesehatanModel();
        $vaksinasiModel = new VaksinasiModel();
        $data['kesehatan'] = $kesehatanModel->findAll();
        $data['pengobatan'] = $pengobatanModel->getAllPengobatan();
        $data['vaksinasi'] = $vaksinasiModel
            ->select('vaksinasi.*, ternak.jenis_ternak') // Menggabungkan data ternak
            ->join('ternak', 'ternak.id_ternak = vaksinasi.id_ternak', 'left')
            ->findAll();
        return view('admin/kesehatan/index', $data);
    }

    public function deleteKesehatan($id)
    {
        $kesehatanModel = new KesehatanModel();
        if ($kesehatanModel->delete($id)) {
            return redirect()->to('admin/kesehatan')->with('success', 'Data pemeriksaan kesehatan berhasil dihapus');
        } else {
            return redirect()->to('admin/kesehatan')->with('error', 'Terjadi kesalahan saat menghapus data');
        }
    }

    // Vaksinasi
    public function deletevaksinasi($id)
    {
        $vaksinasiModel = new VaksinasiModel();
        $vaksinasi = $vaksinasiModel->find($id);

        if (!$vaksinasi) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data vaksinasi tidak ditemukan');
        }

        $vaksinasiModel->delete($id);
        return redirect()->to('admin/kesehatan')->with('success', 'Data vaksinasi berhasil dihapus!');
    }

    // pengobatan
    public function deletepengobatan($id)
    {
        $pengobatanModel = new PengobatanModel();
        $pengobatanModel->deletePengobatan($id);

        // Menambahkan pesan sukses
        session()->setFlashdata('success', 'Data pengobatan berhasil dihapus.');

        return redirect()->to('admin/kesehatan');
    }


    // jadwal pakan
    public function indexjadwal()
    {
        $JadwalModel = new JadwalModel();
        $data['jadwal'] = $JadwalModel->getAllJadwal();
        return view('admin/jadwal/index', $data);
    }

    public function deletejadwal($id_ternak)
    {
        $JadwalModel = new JadwalModel();
        
        // Menghapus jadwal pakan berdasarkan id_ternak
        $JadwalModel->delete($id_ternak);
        
        // Redirect ke halaman jadwal setelah penghapusan
        return redirect()->to(base_url('admin/jadwal'));
    }

    // Produksi
    public function indexproduksi()
    {
        $ProduksiModel = new ProduksiModel();
        $data['produksi'] = $ProduksiModel->getAllProduksiWithTernak();
    
        return view('admin/produksi/index', $data);  // Pastikan view 'produksi/index' ada
    }
    
    public function deleteproduksi($id)
    {
        $ProduksiModel = new ProduksiModel();
        if ($ProduksiModel->deleteProduksi($id)) {
            return redirect()->to('admin/produksi')->with('success', 'Produksi berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus produksi.');
        }
    }

    public function chart()
    {
        // Ambil data produksi dari model ProduksiModel
        $ProduksiModel = new ProduksiModel();
        $data['produksi'] = $ProduksiModel->getAllProduksi();  // Sesuaikan dengan query untuk mengambil data produksi

        // Ambil data ternak dari model TernakModel
        $TernakModel = new TernakModel();
        // Menghitung jumlah ternak per ID ternak
        $ternakData = $TernakModel->select('jenis_ternak, COUNT(id_ternak) as jumlah_ternak')
                                  ->groupBy('jenis_ternak')
                                  ->findAll();
        $data['ternak'] = $ternakData;  // Data ternak yang sudah dihitung jumlahnya  // Sesuaikan dengan query untuk mengambil data ternak

        // Mengirimkan data ke view untuk ditampilkan dalam grafik
        return view('admin/chart/index', $data);
    }

    public function logout()
    {
        // Menghapus sesi
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}
