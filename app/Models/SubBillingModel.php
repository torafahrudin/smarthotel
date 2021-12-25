<?php

namespace App\Models;

use CodeIgniter\Model;

class SubBillingModel extends Model
{
    protected $table      = 'sub_billing';
    protected $primaryKey = 'id_sub_billing';
    protected $allowedFields = ['id_sub_billing', 'keterangan'];

    public function getSubBilling()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id_sub_billing' => $id])->first();
    }

    public function getListSubBilling()
    {
        $builder = $this->db->table('sub_billing');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function createSubBilling($data)
    {
        $query = $this->db->table('sub_billing')->insert($data);
        return $query;
    }

    public function updateSubBilling($data, $id)
    {
        $query = $this->db->table('sub_billing')->update($data, array('id_sub_billing' => $id));
        return $query;
    }

    public function deleteSubBilling($id)
    {
        $query = $this->db->table('sub_billing')->delete(array('id_sub_billing' => $id));
        return $query;
    }
}
