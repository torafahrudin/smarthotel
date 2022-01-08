<?php

namespace App\Models\Laporan;

use CodeIgniter\Model;

class PenggajianModel extends Model
{
    protected $table      = 'penggajian';
    protected $primaryKey = 'id_penggajian';
    protected $allowedFields = ['id_penggajian', 'id_pegawai', 'tanggal', 'jumlah', 'status'];

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getLaporanPenggajian($month = '', $year = '')
    {
        $builder = $this->db->table('penggajian');
        $builder->select('*');
        $builder->join('pegawai', 'pegawai.id_pegawai=pegawai.id_pegawai');
        $builder->where('month(tanggal)', $month);
        $builder->where('year(tanggal)', $year);
        $builder->groupBy('penggajian.id_pegawai');
        $builder->orderBy('penggajian.id_pegawai', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
