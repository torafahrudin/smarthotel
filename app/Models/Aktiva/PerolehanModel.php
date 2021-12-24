<?php

namespace App\Models\Aktiva;

use CodeIgniter\Model;

class PerolehanModel extends Model
{
    protected $table      = 'trans_perolehan_aktiva_tetap';
    protected $primaryKey = 'id_aktiva';
    protected $allowedFields = ['id_aktiva'];

    public function getData()
    {
        $builder = $this->db->table('trans_perolehan_aktiva_tetap');
        $builder->join('master_aktiva', 'master_aktiva.id_aktiva = trans_perolehan_aktiva_tetap.id_aktiva');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getDataDetail($id_detail_perolehan)
    {
        $builder = $this->db->table('trans_detail_perolehan');
        $builder->join('master_aktiva', 'master_aktiva.id_aktiva = trans_detail_perolehan.id_aktiva');
        $builder->where('trans_detail_perolehan.id_detail_perolehan', $id_detail_perolehan);
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getNamaAktiva($id_aktiva)
    {
        $builder = $this->db->table('master_aktiva');
        $builder->select('nama_aktiva');
        $builder->where('id_aktiva', $id_aktiva);
        $query   = $builder->get()->getResultArray();
        foreach ($query as $data) {
            $nama_aktiva = $data['nama_aktiva'];
        }
        return $nama_aktiva;
    }

    public function getListPerolehan()
    {
        $builder = $this->db->table('trans_perolehan_aktiva_tetap');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function code_perolehan_ID()
    {
        $builder = $this->db->table('trans_perolehan_aktiva_tetap');
        $builder->selectMax('id_trans_perolehan', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_perolehan = 'PRL-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_perolehan = $id_perolehan . $nomor;
        return $id_perolehan;
    }

    public function code_detail_perolehan_ID()
    {
        $builder = $this->db->table('trans_detail_perolehan');
        $builder->selectMax('id_detail_perolehan', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_detail_perolehan = 'DTL-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_detail_perolehan = $id_detail_perolehan . $nomor;
        return $id_detail_perolehan;
    }

    public function code_num_perolehan_ID()
    {
        $jml_data = '0001';
        $builder = $this->db->table('trans_perolehan_aktiva_tetap');
        $builder->select('RIGHT(trans_perolehan_aktiva_tetap.id_aktiva,4) as id_aktiva', FALSE);
        $builder->orderBy('id_aktiva', 'DESC');
        $builder->limit(1);
        $query = $builder->get()->getResult();
        if ($query == 0) {
            $jml_data = 1;
        } else {
            foreach ($query as $data) :
                $jml_data = ($data->id_aktiva) + 1;
            endforeach;
        }
        return $jml_data;
    }

    public function createPerolehanDetail($data_detail_perolehan)
    {
        $query = $this->db->table('trans_detail_perolehan')->insert($data_detail_perolehan);
        return $query;
    }
    public function createPerolehan($data_perolahan)
    {
        $query = $this->db->table('trans_perolehan_aktiva_tetap')->insert($data_perolahan);
        return $query;
    }
}
