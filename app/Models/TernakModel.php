<?php

namespace App\Models;

use CodeIgniter\Model;

class TernakModel extends Model
{
    protected $table = 'ternak';
    protected $primaryKey = 'id_ternak';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['jenis_ternak', 'jumlah', 'usia', 'berat', 'id_pengguna'];

    /**
     * Ambil semua data ternak berdasarkan pengguna tertentu.
     *
     * @param int $id_pengguna
     * @return array
     */
    public function getTernakByPengguna($id_pengguna)
    {
        return $this->where('id_pengguna', $id_pengguna)->findAll();
    }

    /**
     * Ambil detail data ternak berdasarkan ID ternak.
     *
     * @param int $id_ternak
     * @return array|null
     */
    public function getTernakById($id_ternak)
    {
        return $this->find($id_ternak);
    }

    public function getAllTernak()
    {
        return $this->findAll(); // Mengambil semua data ternak dari tabel
    }

    public function getTotalTernak()
    {
        // Mengambil total jumlah ternak
        return $this->db->table('ternak')
            ->select('COUNT(id_ternak) as total')
            ->get()
            ->getRowArray(); // Mengambil hasil dalam bentuk array
    }
    
    
}
