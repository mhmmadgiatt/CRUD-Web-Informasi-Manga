<?php

namespace App\Models;

use CodeIgniter\Model;

class KomikModel extends Model
{
    protected $table = 'komik';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'judul', 'gambar', 'penulis', 'genre', 'tanggal_rilis', 'deskripsi'
    ];
}