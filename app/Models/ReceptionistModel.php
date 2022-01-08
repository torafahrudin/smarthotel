<?php

namespace App\Models;

use CodeIgniter\Model;

class ReceptionistModel extends Model
{
    protected $table      = 'receptionist';
    protected $primaryKey = 'id_receptionist';
    protected $allowedFields = ['id_receptionist', 'id_pegawai', 'nama_receptionist', 'no_telp', 'jenis_kelamin', 'alamat'];

    public function rules()
    {
        return
            [
                'nama_receptionist' =>
                [
                    'label'  => 'Nama Receptionist',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'no_telp' =>
                [
                    'label'  => 'No Telp',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'jenis_kelamin' =>
                [
                    'label'  => 'Jenis Kelamin',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon dipilih',
                    ],
                ],
                'alamat' =>
                [
                    'label'  => 'Alamat',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
            ];
    }

    public function getReceptionist()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getListReceptionist()
    {
        $builder = $this->db->table('receptionist');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function code_receptionist_ID()
    {
        $builder = $this->db->table('receptionist');
        $builder->selectMax('id_receptionist', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_receptionist = 'RCP-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_receptionist = $id_receptionist . $nomor;
        return $id_receptionist;
    }

    public function code_pegawai_ID()
    {
        $builder = $this->db->table('receptionist');
        $builder->selectMax('id_pegawai', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_pegawai = 'PGW-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_pegawai = $id_pegawai . $nomor;
        return $id_pegawai;
    }

    public function createReceptionist($data)
    {
        $query = $this->db->table('receptionist')->insert($data);
        return $query;
    }

    public function updateReceptionist($data, $id)
    {
        $query = $this->db->table('receptionist')->update($data, array('id_receptionist' => $id));
        return $query;
    }

    public function deleteReceptionist($id)
    {
        $query = $this->db->table('receptionist')->delete(array('id_receptionist' => $id));
        return $query;
    }
}
