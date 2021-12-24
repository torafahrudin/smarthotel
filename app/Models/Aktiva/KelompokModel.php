<?php

namespace App\Models\Aktiva;

use CodeIgniter\Model;

class KelompokModel extends Model
{
    protected $table      = 'master_kelompok';
    protected $primaryKey = 'id_kelompok';
    protected $allowedFields = ['id_kelompok', 'nama_kelompok', 'masa_manfaat', 'garis_lurus', 'saldo_menurun'];

    public function rules()
    {
        return
            [
                'nama_kelompok' =>
                [
                    'label'  => 'Nama Kelompok',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'masa_manfaat' =>
                [
                    'label'  => 'Masa Manfaat',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'garis_lurus' =>
                [
                    'label'  => 'Garis Lurus',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],

            ];
    }


    public function getKelompok()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getListKelompok()
    {
        $builder = $this->db->table('master_kelompok');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getAktivaManfaat($id_kelompok)
    {
        $builder = $this->db->table('master_kelompok');
        $builder->select('masa_manfaat');
        $builder->where('id_kelompok', $id_kelompok);
        $query   = $builder->get()->getResultArray();
        foreach ($query as $data) {
            $masa_manfaat = $data['masa_manfaat'];
        }
        return $masa_manfaat;
    }

    public function getAktivaNilai($id_kelompok)
    {
        $builder = $this->db->table('master_kelompok');
        $builder->select('garis_lurus');
        $builder->where('id_kelompok', $id_kelompok);
        $query   = $builder->get()->getResultArray();
        foreach ($query as $data) {
            $garis_lurus = $data['garis_lurus'];
        }
        return $garis_lurus;
    }

    public function code_kelompok_ID()
    {
        $builder = $this->db->table('master_kelompok');
        $builder->selectMax('id_kelompok', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_kelompok = 'KOM-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 4, "0", STR_PAD_LEFT);
        $id_kelompok = $id_kelompok . $nomor;
        return $id_kelompok;
    }

    public function createKelompok($data)
    {
        $query = $this->db->table('master_kelompok')->insert($data);
        return $query;
    }

    public function updateKelompok($data, $id)
    {
        $query = $this->db->table('master_kelompok')->update($data, array('id_kelompok' => $id));
        return $query;
    }

    public function deleteKelompok($id)
    {
        $query = $this->db->table('master_kelompok')->delete(array('id_kelompok' => $id));
        return $query;
    }
}
