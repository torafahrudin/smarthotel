<?php

namespace App\Models\Aktiva;

use CodeIgniter\Model;

class EoqModel extends Model
{
    protected $table      = 'trans_eoq';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'tanggal', 'total_barang', 'ongkir', 'harga_unit', 'hitung', 'nilai_eoq'];

    public function getEoq()
    {
        return $this->findAll();
    }

    public function getEoqData($id_aktiva)
    {
        $builder = $this->db->table('trans_eoq');
        $builder->select('sum(total_barang) as total_barang, sum(harga_unit)/sum(total_barang) as total_harga, avg(ongkir) as total_ongkir, Month(tanggal) as month, Year(tanggal) as year, master_aktiva.nama_aktiva as nama_aktiva');
        $builder->join('master_aktiva', 'master_aktiva.id_aktiva = trans_eoq.id_aktiva');
        $builder->groupBy('month(tanggal)');
        $builder->where('trans_eoq.id_aktiva', $id_aktiva);
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getEoqCalculate($id_aktiva, $year)
    {
        $builder = $this->db->table('trans_eoq');
        $builder->select('sum(total_barang) as total_barang, sum(harga_unit)/sum(total_barang) as total_harga, avg(ongkir) as total_ongkir, Month(tanggal) as month');
        $builder->where('year(tanggal)', $year);
        $builder->groupBy('month(tanggal)');
        $builder->where('id_aktiva', $id_aktiva);
        $query   = $builder->get()->getResultArray();

        $eoq = 0;
        foreach ($query as $data) {
            $eoq           += round(sqrt(2 * $data['total_barang'] * $data['total_ongkir'] / $data['total_harga']));
        }

        return $eoq;
    }

    public function getEoqNewCalculate($id_aktiva)
    {
        $builder = $this->db->table('trans_eoq_rop');
        $builder->where('bhp', $id_aktiva);
        $builder->orderBy('id', 'desc');
        $builder->limit(1);
        $query   = $builder->get()->getResultArray();
        $eoq = 0;
        foreach ($query as $data) {
            $eoq   = $data['eoq'];
        }
        return $eoq;
    }

    public function getEoqRop()
    {
        $builder = $this->db->table('trans_eoq_rop');
        $builder->join('master_aktiva', 'master_aktiva.id_aktiva = trans_eoq_rop.bhp');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function createEoq($data)
    {
        $query = $this->db->table('trans_eoq')->insertBatch($data);
        return $query;
    }

    public function createOrderEoq($data)
    {
        $query = $this->db->table('trans_eoq')->insert($data);
        return $query;
    }

    public function createEoqRop($data)
    {
        $query = $this->db->table('trans_eoq_rop')->insert($data);
        return $query;
    }
}
