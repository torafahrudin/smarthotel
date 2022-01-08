<?php

namespace App\Models\Laporan;

use CodeIgniter\Model;

class LabaRugiModel extends Model
{
    protected $table      = 'jurnal';
    protected $primaryKey = 'id_jurnal';
    protected $allowedFields = ['id_jurnal', 'tanggal', 'id_akun', 'nominal', 'posisi', 'debet', 'kredit', 'reff', 'transaksi', 'id_transaksi'];

    public function getLabaRugi()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getJurnalPendapatan($month = '', $year = '')
    {
        $builder = $this->db->table('jurnal');
        $builder->select('*');
        $builder->selectSum('nominal');
        $builder->join('akun', 'akun.id_akun=jurnal.id_akun');
        $builder->where('month(tanggal)', $month);
        $builder->where('year(tanggal)', $year);
        $builder->where('akun.kategori', 'pendapatan');
        $builder->orderBy('id_jurnal', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getJurnalPendapatanBulanLalu($month = '', $year = '')
    {
        $builder = $this->db->table('jurnal');
        $builder->select('*');
        $builder->selectSum('nominal');
        $builder->join('akun', 'akun.id_akun=jurnal.id_akun');
        $builder->where('month(tanggal)', $month);
        $builder->where('year(tanggal)', $year);
        $builder->where('akun.kategori', 'pendapatan');
        $builder->groupBy('akun.nama_akun');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getJurnalBeban($month = '', $year = '')
    {
        $builder = $this->db->table('jurnal');
        $builder->select('*');
        $builder->join('akun', 'akun.id_akun=jurnal.id_akun');
        $builder->where('month(tanggal)', $month);
        $builder->where('year(tanggal)', $year);
        $builder->where('akun.kategori', 'beban');
        $builder->orderBy('id_jurnal', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getJurnalBebanBulanLalu($month = '', $year = '')
    {
        $builder = $this->db->table('jurnal');
        $builder->select('*');
        $builder->join('akun', 'akun.id_akun=jurnal.id_akun');
        $builder->where('month(tanggal)', $month);
        $builder->where('year(tanggal)', $year);
        $builder->where('akun.kategori', 'beban');
        $builder->orderBy('id_jurnal', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
