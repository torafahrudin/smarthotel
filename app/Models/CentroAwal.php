<?php

namespace App\Models;

use CodeIgniter\Model;

class CentroAwal extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ref_center';
    protected $primaryKey       = 'id_ref';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_ref', 'nama', 'y', 'x'];
}
