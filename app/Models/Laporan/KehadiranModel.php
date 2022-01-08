<?php

namespace App\Models\Laporan;

use CodeIgniter\Model;

class KehadiranModel extends Model
{
    protected $table      = 'kehadiran';
    protected $primaryKey = 'id_kehadiran';
    protected $allowedFields = ['id_kehadiran', 'id_pegawai', 'tanggal', 'jumlah_kehadiran'];

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getLaporanKehadiran($month = '', $year = '')
    {
        $builder = $this->db->table('kehadiran');
        $builder->select('*');
        $builder->join('pegawai', 'pegawai.id_pegawai=pegawai.id_pegawai');
        $builder->where('month(tanggal)', $month);
        $builder->where('year(tanggal)', $year);
        $builder->groupBy('kehadiran.id_pegawai');
        $builder->orderBy('kehadiran.id_pegawai', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
