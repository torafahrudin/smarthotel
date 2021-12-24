<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceChargeModel extends Model
{
    protected $table      = 'master_service_charge';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama', 'nilai'];

    public function getServiceCharge()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getByIdPegawai($id_pegawai)
    {
        $builder = $this->db->table('pegawai_service_charge');
        $builder->where('id_pegawai', $id_pegawai);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getListGaji($id)
    {
        $builder = $this->db->table('pegawai_service_charge');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getNilaiSc()
    {
        return $this->where(['id' => 1])->first();
    }

    public function getNilaiPajak()
    {
        return $this->where(['id' => 2])->first();
    }

    public function updateNilaiSc($data_sc)
    {
        $query = $this->db->table('master_service_charge')->update($data_sc, array('id' => 1));
        return $query;
    }

    public function updateNilaiPajak($data_pajak)
    {
        $query = $this->db->table('master_service_charge')->update($data_pajak, array('id' => 2));
        return $query;
    }
}
