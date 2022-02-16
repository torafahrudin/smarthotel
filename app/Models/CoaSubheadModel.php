<?php

namespace App\Models;

use CodeIgniter\Model;

class CoaSubheadModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'coa_subheads';
    protected $primaryKey       = 'kode';

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode', 'nama', 'head_id'];
}
