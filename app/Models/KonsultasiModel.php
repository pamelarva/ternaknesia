<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsultasiModel extends Model
{
    // Nama tabel
    protected $table = 'ahli_konsultasi';

    // Primary key
    protected $primaryKey = 'id_ahlikonsultasi';

    // Field yang bisa diisi (fillable)
    protected $allowedFields = [
        'id_ahlikonsultasi', 
        'nama_ahli', 
        'no_hp', 
        'email', 
        'pendidikan', 
        'catatan', 
        'id_admin'
    ];

    // Untuk menangani timestamp (bila ada kolom created_at dan updated_at)
    protected $useTimestamps = false; // Jika tidak menggunakan timestamp otomatis

    // Method untuk mengambil total konsultasi berdasarkan hari
    public function getTotalKonsultasi()
    {
        // Mengambil total jumlah konsultasi
        $builder = $this->builder();
        $builder->select('COUNT(id_ahlikonsultasi) as total');
    
        $query = $builder->get();
        $result = $query->getRowArray(); // Ambil hasil sebagai satu baris
    
        // Mengembalikan total konsultasi
        return $result['total']; // Total jumlah konsultasi
    }
    
}
