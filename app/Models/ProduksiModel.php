<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduksiModel extends Model
{
    // Nama tabel yang digunakan
    protected $table = 'produksi';

    // Primary key dari tabel
    protected $primaryKey = 'id_produksi';

    // Menentukan apakah id_produksi menggunakan auto increment
    protected $useAutoIncrement = true;

    // Menentukan field yang dapat diisi oleh pengguna
    protected $allowedFields = [
        'id_ternak',
        'tanggal_produksi',
        'jenis_produksi',
        'jumlah_produksi',
        'gambar_produksi'
    ];

    // Menambahkan timestamp untuk pencatatan waktu pembuatan dan pembaruan data
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validasi untuk data input
    protected $validationRules = [
        'id_ternak'        => 'required|integer',  // id_ternak wajib diisi dan harus angka
        'tanggal_produksi' => 'required|valid_date[Y-m-d]',  // Tanggal produksi valid
        'jenis_produksi'   => 'required|in_list[Susu,Telur]',  // Jenis produksi hanya susu atau telur
        'jumlah_produksi'  => 'required|decimal',  // Jumlah produksi harus angka desimal
    ];

    // Pesan error untuk validasi
    protected $validationMessages = [
        'id_ternak' => [
            'required' => 'ID ternak harus diisi.',
            'integer'  => 'ID ternak harus berupa angka.'
        ],
        'tanggal_produksi' => [
            'required' => 'Tanggal produksi harus diisi.',
            'valid_date' => 'Tanggal produksi harus dalam format yang valid (Y-m-d).'
        ],
        'jenis_produksi' => [
            'required' => 'Jenis produksi harus diisi.',
            'in_list'  => 'Jenis produksi harus "Susu" atau "Telur".'
        ],
        'jumlah_produksi' => [
            'required' => 'Jumlah produksi harus diisi.',
            'decimal'  => 'Jumlah produksi harus berupa angka desimal.'
        ]
    ];

    public function getAllProduksiWithTernak()
{
    return $this->select('produksi.*, ternak.jenis_ternak')
                ->join('ternak', 'ternak.id_ternak = produksi.id_ternak', 'left') // Join tabel ternak
                ->findAll();
}


    // Fungsi untuk mengambil semua data produksi
    public function getAllProduksi()
    {
        return $this->findAll();
    }

    // Fungsi untuk mengambil produksi berdasarkan id
    public function getProduksiById($id)
    {
        return $this->find($id);
    }

    // Fungsi untuk menambahkan data produksi baru
    public function addProduksi($data)
    {
        return $this->save($data);
    }

    // Fungsi untuk memperbarui data produksi
    public function updateProduksi($id, $data)
    {
        return $this->update($id, $data);
    }

    // Fungsi untuk menghapus data produksi
    public function deleteProduksi($id)
    {
        return $this->delete($id);
    }
}
