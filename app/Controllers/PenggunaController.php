<?php

namespace App\Controllers;

use App\Models\PenggunaModel;
use App\Models\TernakModel;
use App\Models\TipsModel;
use App\Models\AhliKonsultasiModel;
use CodeIgniter\Controller;

class PenggunaController extends Controller
{
    public function login()
    {
        return view('pengguna/login');
    }

    public function authenticate()
    {
        $session = session();
        $model = new PenggunaModel();
    
        // Ambil data dari form
        $username = $this->request->getVar('username'); 
        $password = $this->request->getVar('password');
    
        // Cari pengguna berdasarkan username
        $pengguna = $model->where('username', $username)->first();
    
        // Verifikasi password
        if ($pengguna && password_verify($password, $pengguna['password'])) {
            // Jika username dan password cocok, set session
            $session->set('pengguna_id', $pengguna['id_pengguna']);
            $session->set('pengguna_name', $pengguna['nama']);
            $session->set('isLoggedIn', true); // Tambahkan isLoggedIn
            
            // Redirect ke halaman dashboard pengguna
            return redirect()->to('/pengguna/dashboard');
        } else {
            // Jika username atau password salah, beri pesan error
            $session->setFlashdata('error', 'Invalid username or password');
            return redirect()->to('/pengguna/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/pengguna/login');
    }

    public function register()
    {
        return view('pengguna/register');
    }

    public function store()
    {
        $session = session();
        $model = new PenggunaModel();

        $data = [
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('phone'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        if ($model->insert($data)) {
            $session->setFlashdata('success', 'Akun berhasil dibuat! Silakan login.');
            return redirect()->to('/pengguna/login');
        } else {
            $session->setFlashdata('error', 'Terjadi kesalahan, coba lagi.');
            return redirect()->to('/pengguna/register');
        }
    }

    public function dashboard()
    {
        $tipsModel = new TipsModel();
        $TernakModel = new TernakModel();
        $data['tips'] = $tipsModel->findAll();
        $ternakData = $TernakModel->select('jenis_ternak, COUNT(id_ternak) as jumlah_ternak')
        ->groupBy('jenis_ternak')
        ->findAll();
        $data['ternak'] = $ternakData; 

        // Proses URL video untuk mengonversi ke format embed
        foreach ($data['tips'] as &$tip) {
            // Menambahkan 'embedUrl' ke array
            $tip['embedUrl'] = $this->getEmbedUrl($tip['link_video']);
        }

        return view('pengguna/dashboard/dashboard', $data);
    }

    // Mengambil URL embed dari URL YouTube
    public function getEmbedUrl($url)
    {
        // Mengecek apakah URL mengandung embed
        if (strpos($url, 'embed') !== false) {
            return $url;
        } else {
            // Mengekstrak ID video dari URL
            if (strpos($url, 'youtu.be') !== false) {
                preg_match('/youtu\.be\/([^\?]+)/', $url, $matches);
                $videoId = $matches[1];
            } else {
                preg_match('/\?v=([^\&]+)/', $url, $matches);
                $videoId = $matches[1];
            }
            // Membuat URL embed dari ID video
            return 'https://www.youtube.com/embed/' . $videoId;
        }
    }


    // CRUD Ternak
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
        return view('pengguna/Ternak/index', [
            'ternak' => $ternak,
            'jumlahTernak' => $jumlahTernak
        ]);
    }
    

    public function createTernak()
    {
        return view('pengguna/ternak/create'); // Pastikan view ini ada
    }

    public function storeTernak()
    {
        $model = new TernakModel();

        $data = [
            'jenis_ternak' => $this->request->getVar('jenis_ternak'),
            'jumlah' => $this->request->getVar('jumlah'),
            'usia' => $this->request->getVar('usia'),
            'berat' => $this->request->getVar('berat'),
            'id_pengguna' => session()->get('pengguna_id')
        ];

        if ($model->insert($data)) {
            return redirect()->to('/pengguna/ternak')->with('success', 'Data ternak berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data ternak.');
        }
    }

    public function editTernak($id)
    {
        $model = new TernakModel();
        $data['ternak'] = $model->find($id);

        if (!$data['ternak']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ternak tidak ditemukan');
        }

        return view('pengguna/ternak/edit', $data); // Pastikan view ini ada
    }

    public function updateTernak($id)
    {
        $model = new TernakModel();

        $data = [
            'jenis_ternak' => $this->request->getVar('jenis_ternak'),
            'jumlah' => $this->request->getVar('jumlah'),
            'usia' => $this->request->getVar('usia'),
            'berat' => $this->request->getVar('berat')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/pengguna/ternak')->with('success', 'Data ternak berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data ternak.');
        }
    }

    public function deleteTernak($id)
    {
        $model = new TernakModel();

        if ($model->delete($id)) {
            return redirect()->to('/pengguna/ternak')->with('success', 'Data ternak berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data ternak.');
        }
    }

    // Konsultasi
    public function indexkonsultasi()
    {
        $AhliKonsultasiModel = new AhliKonsultasiModel();
        $data['ahli_konsultasi'] = $AhliKonsultasiModel->findAll(); // Ambil semua data ahli konsultasi
        return view('pengguna/konsultasi/index', $data);
    }


}
