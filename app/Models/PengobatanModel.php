<?php

namespace App\Models;

use CodeIgniter\Model;

class PengobatanModel extends Model
{
    protected $table      = 'pengobatan';       // Nama tabel
    protected $primaryKey = 'id_pengobatan';    // Primary key
    protected $useAutoIncrement = true;         // Gunakan auto increment untuk id_pengobatan

    // Field yang bisa diisi
    protected $allowedFields = ['nama_obat', 'waktu_pengobatan', 'durasi_pengobatan', 'dosis', 'id_pemeriksaan'];

    // Validasi untuk data
    protected $validationRules    = [
        'nama_obat'        => 'required|max_length[20]',
        'waktu_pengobatan' => 'required',
        'durasi_pengobatan' => 'required|integer',
        'dosis'            => 'required|max_length[20]',
        'id_pemeriksaan'   => 'required|integer'
    ];
    
    // Pesan error validasi
    protected $validationMessages = [
        'nama_obat' => [
            'required' => 'Nama obat harus diisi.',
            'max_length' => 'Nama obat tidak boleh lebih dari 20 karakter.'
        ],
        'waktu_pengobatan' => [
            'required' => 'Waktu pengobatan harus diisi.',
        ],
        'durasi_pengobatan' => [
            'required' => 'Durasi pengobatan harus diisi.',
            'integer'  => 'Durasi pengobatan harus berupa angka.'
        ],
        'dosis' => [
            'required' => 'Dosis harus diisi.',
            'max_length' => 'Dosis tidak boleh lebih dari 20 karakter.'
        ],
        'id_pemeriksaan' => [
            'required' => 'ID pemeriksaan harus diisi.',
            'integer' => 'ID pemeriksaan harus berupa angka.'
        ]
    ];

    // Fungsi untuk mengambil semua data pengobatan
    public function getAllPengobatan()
    {
        return $this->findAll();
    }

    // Fungsi untuk mengambil pengobatan berdasarkan id
    public function getPengobatanById($id)
    {
        return $this->find($id);
    }

    // Fungsi untuk menambah pengobatan baru
    public function addPengobatan($data)
    {
        return $this->save($data);
    }

    // Fungsi untuk memperbarui data pengobatan
    public function updatePengobatan($id, $data)
    {
        return $this->update($id, $data);
    }

    // Fungsi untuk menghapus data pengobatan
    public function deletePengobatan($id)
    {
        return $this->delete($id);
    }
}
