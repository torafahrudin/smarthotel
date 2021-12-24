<?php

namespace App\Models;

use CodeIgniter\Model;

class KehadiranModel extends Model
{
    protected $table      = 'trans_detail_kehadiran';
    protected $primaryKey = 'no_id';
    protected $allowedFields = ['nama', 'tgl', 'jam_masuk','jam_pulang','scan_masuk','scan_pulang','terlambat','pulang_cepat','absent'];

    public function getAll()
    {
        $builder = $this->db->table('trans_detail_kehadiran');
        $builder->orderBy('no_id', 'ASC');
        $query = $builder->get(); 
        return $query->getResultArray();
        
    }

    public function getKehadiran()
    {
        
        $this->db->count_all_results('trans_detail_kehadiran');
        $this->db->groupBy('nama');
        $this->db->from('trans_detail_kehadiran');
        $this->db->count_all_results();
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getjmlhadir()
    {
        $builder = $this->db->table('kehadiran');
        $builder->select('jumlah_kehadiran');
        $builder->join('pegawai', 'pegawai.id_pegawai = kehadiran.id_pegawai');
        $query = $builder->get();
        return $query->getRow()->jumlah_kehadiran;
    }

    public function getListKehadiran()
    {
        $builder = $this->db->table('kehadiran');
        $builder->select('*');
        $builder->join('pegawai', 'pegawai.id_pegawai = kehadiran.id_pegawai', 'left');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function createKehadiran($data)
    {
        $query = $this->db->table('kehadiran')->insert($data);
        return $query;
    }

    public function updateKehadiran($data, $id)
    {
        $query = $this->db->table('kehadiran')->update($data, array('id' => $id));
        return $query;
    }

    public function deleteKehadiran($id)
    {
        $query = $this->db->table('kehadiran')->delete(array('id' => $id));
        return $query;
    }
}
