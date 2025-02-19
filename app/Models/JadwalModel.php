<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal_pakan';  // Nama tabel di database
    protected $primaryKey = 'id_pakan'; // Primary key
    protected $useAutoIncrement = true; // Auto increment untuk id_pakan

    // Field yang boleh diisi
    protected $allowedFields = [
        'id_ternak',             // Menambahkan id_ternak ke allowedFields
        'jenis_ternak',          // Meski tidak digunakan untuk penyimpanan, bisa ditambahkan untuk validasi
        'jenis_pakan',
        'waktu_pemberian1',
        'waktu_pemberian2',
        'waktu_pemberian3',
        'banyaknya_pakan'
    ];

    // Validasi untuk data input
// Update validation rules in your model
    protected $validationRules = [
        'jenis_pakan'        => 'required|max_length[20]',
        'waktu_pemberian1'   => 'required|regex_match[/^([01]?[0-9]|2[0-3]):([0-5]?[0-9])$/]', // HH:MM format
        'waktu_pemberian2'   => 'regex_match[/^([01]?[0-9]|2[0-3]):([0-5]?[0-9])$/]', // HH:MM format
        'waktu_pemberian3'   => 'regex_match[/^([01]?[0-9]|2[0-3]):([0-5]?[0-9])$/]', // HH:MM format
        'banyaknya_pakan'    => 'required|decimal'
    ];


    // Pesan error validasi
    protected $validationMessages = [
        'id_ternak' => [
            'required' => 'ID ternak harus diisi.',
            'integer'  => 'ID ternak harus berupa angka.'
        ],
        'jenis_ternak' => [
            'required' => 'Jenis ternak harus diisi.',
            'max_length' => 'Jenis ternak tidak boleh lebih dari 50 karakter.'
        ],
        'jenis_pakan' => [
            'required' => 'Jenis pakan harus diisi.',
            'max_length' => 'Jenis pakan tidak boleh lebih dari 20 karakter.'
        ],
        'waktu_pemberian1' => [
            'required' => 'Waktu pemberian pertama harus diisi.',
            'valid_time' => 'Format waktu pemberian pertama tidak valid.'
        ],
        'waktu_pemberian2' => [
            'valid_time' => 'Format waktu pemberian kedua tidak valid.'
        ],
        'waktu_pemberian3' => [
            'valid_time' => 'Format waktu pemberian ketiga tidak valid.'
        ],
        'banyaknya_pakan' => [
            'required' => 'Jumlah pakan harus diisi.',
            'decimal' => 'Jumlah pakan harus berupa angka desimal.'
        ]
    ];

    // Fungsi untuk mengambil semua data jadwal
    public function getAllJadwal()
    {
        return $this->findAll();
    }

    // Fungsi untuk mengambil jadwal berdasarkan id
    public function getJadwalById($id)
    {
        return $this->find($id);
    }

    // Fungsi untuk menambahkan jadwal baru
    public function addJadwal($data)
    {
        return $this->save($data);
    }

    // Fungsi untuk memperbarui jadwal
    public function updateJadwal($id, $data)
    {
        return $this->update($id, $data);
    }

    // Fungsi untuk menghapus jadwal
    public function deleteJadwal($id)
    {
        return $this->delete($id);
    }
}
