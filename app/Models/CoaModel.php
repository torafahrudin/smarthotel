<?php

namespace App\Models;

use CodeIgniter\Model;

class CoaModel extends Model
{
    protected $table      = 'master_akun';
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
        $builder = $this->db->table('master_akun');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getListAkunTetap()
    {
        $builder = $this->db->table('master_aktiva');
        $builder->where('kategori', 'Aktiva Tetap');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getListAkunLancar()
    {
        $builder = $this->db->table('master_aktiva');
        $builder->where('kategori', 'Aktiva Lancar');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getKategori($id_akun)
    {
        $builder = $this->db->table('master_akun');
        $builder->select('kategori');
        $builder->where('id_akun', $id_akun);
        $query   = $builder->get()->getResultArray();
        foreach ($query as $data) {
            $kategori = $data['kategori'];
        }
        return $kategori;
    }


    public function createCoa($data)
    {
        $query = $this->db->table('master_akun')->insert($data);
        return $query;
    }

    public function updateCoa($data, $id)
    {
        $query = $this->db->table('master_akun')->update($data, array('id_akun' => $id));
        return $query;
    }

    public function deleteCoa($id)
    {
        $query = $this->db->table('master_akun')->delete(array('id_akun' => $id));
        return $query;
    }
}
