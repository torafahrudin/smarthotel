<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartemenModel extends Model
{
    protected $table      = 'master_departemen';
    protected $primaryKey = 'id_departemen';
    protected $allowedFields = ['id_departemen', 'nama_departemen', 'keterangan'];

    public function getDepartemen()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id_departemen' => $id])->first();
    }

    public function getListDepartemen()
    {
        $builder = $this->db->table('master_departemen');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function code_departemen_ID()
    {
        $builder = $this->db->table('master_departemen');
        $builder->selectMax('id_departemen', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_departemen = 'DPT-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_departemen = $id_departemen . $nomor;
        return $id_departemen;
    }

    public function createDepartemen($data)
    {
        $query = $this->db->table('master_departemen')->insert($data);
        return $query;
    }

    public function updateDepartemen($data, $id)
    {
        $query = $this->db->table('master_departemen')->update($data, array('id_departemen' => $id));
        return $query;
    }

    public function deleteDepartemen($id)
    {
        $query = $this->db->table('master_departemen')->delete(array('id_departemen' => $id));
        return $query;
    }
}
