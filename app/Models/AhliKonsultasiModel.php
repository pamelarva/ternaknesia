<?php

namespace App\Models;

use CodeIgniter\Model;

class AhliKonsultasiModel extends Model
{
    // Nama tabel
    protected $table = 'ahli_konsultasi';

    // Primary key
    protected $primaryKey = 'id_ahlikonsultasi';

    // Kolom yang bisa diisi (allowed fields)
    protected $allowedFields = [
        'nama_ahli', 'no_hp', 'email', 'pendidikan', 'catatan',
        'link_github', 'link_instagram', 'lokasi', 'id_admin',
    ];


    // Validasi tambahan bisa ditambahkan jika diperlukan
    protected $validationRules = [
        'nama_ahli' => 'required|string|max_length[20]',
        'no_hp' => 'required|string|max_length[20]',
        'email' => 'required|valid_email|max_length[20]',
        'pendidikan' => 'required|string|max_length[50]',
        'catatan' => 'required|string',
        'link_github' => 'permit_empty|valid_url',
        'link_instagram' => 'permit_empty|valid_url',
        'lokasi' => 'permit_empty|string|max_length[255]',
    ];

    // Menentukan pesan kesalahan untuk validasi
    protected $validationMessages = [
        'nama_ahli' => ['required' => 'Nama Ahli Konsultasi harus diisi'],
        'no_hp' => ['required' => 'Nomor HP harus diisi'],
        'email' => ['required' => 'Email harus diisi'],
        'pendidikan' => ['required' => 'Pendidikan harus diisi'],
        'catatan' => ['required' => 'Catatan harus diisi'],
    ];
}
