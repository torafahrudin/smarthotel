<?php

namespace App\Models;

use CodeIgniter\Model;

class BahanModel extends Model
{
    protected $table = 'bahan';
    protected $primaryKey = 'id_bahan';
    protected $allowedFields = [
        'kode_bahan', 'nama_bahan', 'jenis_bahan', 'satuan', 'harga_bahan', 'stok', 'stok_awal'
    ];
    
}
