<?php

namespace App\Models;

use CodeIgniter\Model;

class VaksinasiModel extends Model
{
    protected $table = 'vaksinasi'; // Nama tabel
    protected $primaryKey = 'id_vaksinasi'; // Primary key

    // Kolom yang diizinkan untuk diisi melalui insert atau update
    protected $allowedFields = [
        'nama_vaksin',
        'waktu_vaksinasi',
        'dosis',
        'nama_tenaga_medis',
        'id_ternak',
    ];

    // Tipe data yang otomatis di-cast sesuai jenis data di database
    protected $useTimestamps = false; // Jika ada created_at dan updated_at, ubah ke true
    protected $returnType = 'array';

    // Rules validasi (opsional, jika diperlukan)
    protected $validationRules = [
        'nama_vaksin'       => 'required|string|max_length[20]',
        'waktu_vaksinasi'   => 'required',
        'dosis'             => 'required|decimal',
        'nama_tenaga_medis' => 'required|string|max_length[50]',
        'id_ternak'         => 'required|integer|is_not_unique[ternak.id_ternak]', // Validasi foreign key
    ];

    protected $validationMessages = [
        'id_ternak' => [
            'is_not_unique' => 'Ternak tidak ditemukan.',
        ],
    ];

    protected $skipValidation = false; // Nonaktifkan jika ingin skip validasi
}
