<?php

namespace App\Models\Laporan;

use CodeIgniter\Model;

class KartuAssetModel extends Model
{
    protected $table      = 'jurnal';
    protected $primaryKey = 'id_jurnal';
    protected $allowedFields = ['id_jurnal', 'tanggal', 'id_akun', 'nominal', 'posisi', 'debet', 'kredit', 'reff', 'transaksi', 'id_transaksi'];

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function createPerolehanTahunPertama($data)
    {
        $query = $this->db->table('kartu_aset')->insertBatch($data);
        return $query;
    }

    public function createPerolehanTahunSelanjutnya($data)
    {
        $query = $this->db->table('kartu_aset')->insertBatch($data);
        return $query;
    }

    public function createPerolehanTahunTerakhir($data)
    {
        $query = $this->db->table('kartu_aset')->insertBatch($data);
        return $query;
    }

    public function GetDataKartuAset($id_aktiva)
    {
        $builder = $this->db->table('aktiva_tetap');
        $builder->select('tahun, c.penyusutan_pertahun, c.id_aktiva, a.nama_aktiva, a.harga_perolehan, pemeliharaan, reparasi, peny_pemeliharaan_reparasi');
        $builder->from('aktiva_tetap a');
        $builder->join('perolehan_aktiva b', 'b.id_trans_perolehan = a.id_trans_perolehan');
        $builder->join('kartu_aset c', 'c.id_aktiva = a.id_aktiva');
        $builder->orderBy('tahun', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function GetDataKartuAsetPerbulan($id_aktiva = '')
    {
        $builder = $this->db->table('aktiva_tetap');
        // $bulan_awal = $builder->get('kartu_aset_perbulan')->row()->bulan;
        // $last_month = date('Y-m-d');
        $builder->select('bulan, c.penyusutan_perbulan, c.id_aktiva, a.nama_aktiva, a.harga_perolehan, c.pemeliharaan, c.reparasi, c.peny_pemeliharaan_reparasi, c.nilai_buku_pemeliharaan_reparasi');
        $builder->from('aktiva_tetap a');
        $builder->join('perolehan_aktiva b', 'b.id_trans_perolehan = a.id_trans_perolehan');
        $builder->join('kartu_aset_perbulan c', 'c.id_aktiva = a.id_aktiva');
        $builder->orderBy('bulan', 'ASC');
        // $builder->where('id_aktiva', $id_aktiva);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
