<?php

namespace App\Models;

use CodeIgniter\Model;

class HeaderBillingModel extends Model
{
    protected $table      = 'header_billing';
    protected $primaryKey = 'id_header_billing';
    protected $allowedFields = ['id_header_billing', 'keterangan'];

    public function getHeaderBilling()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id_header_billing' => $id])->first();
    }

    public function getListHeaderBilling()
    {
        $builder = $this->db->table('header_billing');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function createHeaderBilling($data)
    {
        $query = $this->db->table('header_billing')->insert($data);
        return $query;
    }

    public function updateHeaderBilling($data, $id)
    {
        $query = $this->db->table('header_billing')->update($data, array('id_header_billing' => $id));
        return $query;
    }

    public function deleteHeaderBilling($id)
    {
        $query = $this->db->table('header_billing')->delete(array('id_header_billing' => $id));
        return $query;
    }
}
