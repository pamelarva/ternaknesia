<?php

namespace App\Models;

use CodeIgniter\Model;

class KesehatanModel extends Model
{
    protected $table      = 'kesehatan';
    protected $primaryKey = 'id_pemeriksaan';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nama_pemeriksa', 'gejala', 'waktu_pemeriksaan', 'kondisi_fisik', 'diagnosa', 'id_ternak'];

    protected $validationRules = [
        'nama_pemeriksa'    => 'required|max_length[50]',
        'gejala'            => 'required',
        'waktu_pemeriksaan' => 'required',
        'kondisi_fisik'     => 'required',
        'diagnosa'          => 'required|max_length[50]',
        'id_ternak'         => 'required|integer',
    ];

    protected $validationMessages = [
        'nama_pemeriksa' => [
            'required' => 'Nama pemeriksa harus diisi.',
            'max_length' => 'Nama pemeriksa maksimal 50 karakter.',
        ],
        'gejala' => [
            'required' => 'Gejala harus diisi.',
        ],
        'waktu_pemeriksaan' => [
            'required' => 'Waktu pemeriksaan harus diisi.',
        ],
        'kondisi_fisik' => [
            'required' => 'Kondisi fisik harus diisi.',
        ],
        'diagnosa' => [
            'required' => 'Diagnosa harus diisi.',
            'max_length' => 'Diagnosa maksimal 50 karakter.',
        ],
        'id_ternak' => [
            'required' => 'ID ternak harus diisi.',
            'integer' => 'ID ternak harus berupa angka.',
        ],
    ];

    // Optional: You can create custom methods if needed, such as for fetching records
    public function getKesehatanById($id)
    {
        return $this->asArray()
                    ->where(['id_pemeriksaan' => $id])
                    ->first();
    }

    public function getAllKesehatan()
    {
        return $this->findAll();
    }
}
