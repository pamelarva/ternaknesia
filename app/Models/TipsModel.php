<?php

namespace App\Models;

use CodeIgniter\Model;

class TipsModel extends Model
{
    protected $table            = 'tips'; // Nama tabel di database
    protected $primaryKey       = 'id_tips'; // Primary key

    protected $useAutoIncrement = true;
    protected $allowedFields    = ['judul', 'deskripsi', 'link_video', 'id_admin'];
}
