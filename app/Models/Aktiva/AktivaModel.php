<?php

namespace App\Models\Aktiva;

use CodeIgniter\Model;

class AktivaModel extends Model
{
    protected $table      = 'master_aktiva';
    protected $primaryKey = 'id_aktiva';
    protected $allowedFields = ['id_aktiva', 'nama_aktiva', 'id_akun', 'keterangan', 'status', 'harga_perolehan', 'masa_manfaat', 'penyusutan_pertahun', 'penyusutan_perbulan', 'id_trans_perolehan'];

    public function getAktiva()
    {
        $builder = $this->db->table('master_aktiva');
        $builder->join('master_akun', 'master_akun.id_akun = master_aktiva.id_akun');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getById($id)
    {
        return $this->where(['id_aktiva' => $id])->first();
    }

    public function getListAktivaLancar()
    {
        $builder = $this->db->table('master_aktiva');
        $builder->where('master_aktiva.kategori', 'Aktiva Lancar');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function code_aktiva_ID()
    {
        $builder = $this->db->table('master_aktiva');
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

    public function createAktiva($data)
    {
        $query = $this->db->table('master_aktiva')->insert($data);
        return $query;
    }

    public function updateAktiva($data, $id)
    {
        $query = $this->db->table('master_aktiva')->update($data, array('id_aktiva' => $id));
        return $query;
    }

    public function deleteAktiva($id)
    {
        $query = $this->db->table('master_aktiva')->delete(array('id_aktiva' => $id));
        return $query;
    }
}
