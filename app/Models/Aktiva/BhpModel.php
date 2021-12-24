<?php

namespace App\Models\Aktiva;

use CodeIgniter\Model;

class BhpModel extends Model
{
    protected $table      = 'master_aktiva_lancar';
    protected $primaryKey = 'id_aktiva';
    protected $allowedFields = ['id_aktiva', 'tanggal', 'nama_aktiva', 'no_akun', 'keterangan', 'status', 'harga_perolehan', 'masa_manfaat', 'penyusutan_pertahun', 'penyusutan_perbulan', 'id_trans_perolehan'];

    public function getBhp()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id_aktiva' => $id])->first();
    }

    public function getListBhp()
    {
        $builder = $this->db->table('master_aktiva_lancar');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getBhpOut()
    {
        $builder = $this->db->table('master_aktiva_lancar');
        $builder->where('status', 'Gudang');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function code_aktiva_ID()
    {
        $builder = $this->db->table('master_aktiva_lancar');
        $builder->selectMax('id_aktiva', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_aktiva = 'AKT-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 4, "0", STR_PAD_LEFT);
        $id_aktiva = $id_aktiva . $nomor;
        return $id_aktiva;
    }

    public function code_num_aktiva_ID()
    {
        $jml_data = '0001';
        $builder = $this->db->table('master_aktiva_lancar');
        $builder->select('RIGHT(master_aktiva_lancar.id_aktiva,4) as id_aktiva', FALSE);
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

    public function code_num_aktiva_lancar_ID()
    {
        $jml_data = '0001';
        $builder = $this->db->table('master_aktiva_lancar');
        $builder->select('RIGHT(master_aktiva_lancar.id_aktiva,4) as id_aktiva', FALSE);
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


    public function code_aktiva_lancar_ID()
    {
        $builder = $this->db->table('master_aktiva_lancar');
        $builder->selectMax('id_aktiva', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_aktiva = 'AKT-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_aktiva = $id_aktiva . $nomor;
        return $id_aktiva;
    }

    public function createBhp($data)
    {
        $query = $this->db->table('master_aktiva_lancar')->insertBatch($data);
        return $query;
    }

    public function createAktivaLancar($data)
    {
        $query = $this->db->table('master_aktiva_lancar')->insertBatch($data);
        return $query;
    }

    public function updateBhp($data, $id)
    {
        $query = $this->db->table('master_aktiva_lancar')->update($data, array('id_aktiva' => $id));
        return $query;
    }

    public function updateStatusBhp($data, $id)
    {
        $query = $this->db->table('master_aktiva_lancar')->update($data, array('id_aktiva' => $id));
        return $query;
    }

    public function updateStatusDetailBhp($data, $id)
    {
        $query = $this->db->table('detail_perpindahan')->update($data, array('id_aktiva' => $id));
        return $query;
    }
    public function updateStatusDataBhp($data, $id)
    {
        $query = $this->db->table('master_aktiva_lancar')->update($data, array('id_aktiva' => $id));
        return $query;
    }

    public function deleteBhp($id)
    {
        $query = $this->db->table('master_aktiva_lancar')->delete(array('id_aktiva' => $id));
        return $query;
    }
}
