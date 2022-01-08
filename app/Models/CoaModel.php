<?php

namespace App\Models;

use CodeIgniter\Model;

class CoaModel extends Model
{
    protected $table      = 'akun';
    protected $primaryKey = 'id_akun';
    protected $allowedFields = ['id_akun', 'nama_akun', 'kategori', 'saldo_normal', 'sa'];

    public function getCoa()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getListAkun()
    {
        $builder = $this->db->table('akun');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getListAkunTetap()
    {
        $builder = $this->db->table('aktiva');
        $builder->where('id_akun', '121');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getListAkunLancar()
    {
        $builder = $this->db->table('aktiva');
        $builder->where('id_akun', '112');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function createCoa($data)
    {
        $query = $this->db->table('akun')->insert($data);
        return $query;
    }

    public function updateCoa($data, $id)
    {
        $query = $this->db->table('akun')->update($data, array('id_akun' => $id));
        return $query;
    }

    public function deleteCoa($id)
    {
        $query = $this->db->table('akun')->delete(array('id_akun' => $id));
        return $query;
    }
}
