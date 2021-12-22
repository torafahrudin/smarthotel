<?php

namespace App\Models;

use CodeIgniter\Model;

class CoaModel extends Model
{
    protected $table = 'master_coa';

    public function getAll(){
        $dbResult = $this->db->query("SELECT * FROM master_coa");
        return $dbResult->getResult();
    }

    
}