<?php

namespace App\Models;

use CodeIgniter\Model;

class DiskusiModel extends Model
{
    protected $table = 'forum'; // Nama tabel dalam database
    protected $primaryKey = 'id_pesan'; // Primary key tabel

    // Kolom yang dapat diisi
    protected $allowedFields = [
        'isi_pesan',
        'waktu_terkirim',
        'id_pengguna'
    ];

    // Mengaktifkan penggunaan timestamps otomatis
    protected $useTimestamps = false;

    /**
     * Fungsi untuk mendapatkan semua pesan diskusi dengan data pengguna.
     */
    public function getAllPesan()
    {
        return $this->db->table('forum')
                        ->join('pengguna', 'pengguna.id_pengguna = forum.id_pengguna') // Menyesuaikan join dengan id_pengguna
                        ->select('forum.isi_pesan, forum.waktu_terkirim, pengguna.username,') // Menggunakan kolom dari tabel pengguna
                        ->orderBy('forum.waktu_terkirim', 'ASC') // Mengurutkan berdasarkan waktu terkirim
                        ->get()
                        ->getResultArray();
    }
    


    /**
     * Fungsi untuk menambahkan pesan baru ke diskusi.
     */
    public function tambahPesan($data)
    {
        return $this->insert($data);
    }
}
