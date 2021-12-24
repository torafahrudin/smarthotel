<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table      = 'master_pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $allowedFields = ['id_pegawai', 'id_jabatan', 'nip', 'nama_pegawai', 'no_telp', 'email', 'alamat'];

    public function rules()
    {
        return
            [
                'nip' =>
                [
                    'label'  => 'NIP',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'nama_pegawai' =>
                [
                    'label'  => 'Nama Pegawai',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'id_jabatan' =>
                [
                    'label'  => 'Jabatan',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon dipilih',
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
                'email' =>
                [
                    'label'  => 'Email',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'nama_bank' =>
                [
                    'label'  => 'nama_bank',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'rekening_bank' =>
                [
                    'label'  => 'Rekening Bank',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'alamat'    =>
                [
                    'label'  => 'Alamat',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
            ];
    }


    public function getPegawai()
    {
        return $this->findAll();
    }

    public function getIdPegawai($user_id)
    {
        $builder = $this->db->table('master_pegawai');
        $builder->where('user_id', $user_id);
        $query = $builder->get();
        return $query->getRow()->id_pegawai;
    }

    public function getList($id_pegawai)
    {
        $builder = $this->db->table('master_pegawai');
        $builder->where('id_pegawai', $id_pegawai);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getById($id_pegawai)
    {
        return $this->where(['id_pegawai' => $id_pegawai])->first();
    }

    public function getDataPegawai()
    {
        $builder = $this->db->table('master_pegawai');
        $builder->select('master_pegawai.*, users.id, users.email,users.fullname, auth_groups_users.*, master_jabatan.nama_jabatan, master_jabatan.golongan');
        $builder->join('users', 'users.id = master_pegawai.user_id', 'left');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
        $builder->join('master_jabatan', 'master_jabatan.id_jabatan = master_pegawai.id_jabatan', 'left');
        // $builder->where('auth_groups_users.group_id !=', 1);
        // $builder->where('auth_groups_users.group_id !=', 2);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getListPegawai()
    {
        $builder = $this->db->table('master_pegawai');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getListPegawaiPenggajian()
    {
        $builder = $this->db->table('master_pegawai');
        $builder->join('master_jabatan', 'master_jabatan.id_jabatan = master_pegawai.id_jabatan', 'left');
        $builder->join('master_ptkp', 'master_ptkp.id_ptkp = master_pegawai.id_ptkp', 'left');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function code_pegawai_ID()
    {
        $builder = $this->db->table('master_pegawai');
        $builder->selectMax('id_pegawai', 'hsl');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->hsl;
        endforeach;
        $id_pegawai = 'PGW-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_pegawai = $id_pegawai . $nomor;
        return $id_pegawai;
    }

    public function getPegawaiAkses()
    {
        $builder = $this->db->table('master_pegawai');
        $builder->select('*');
        $builder->where('master_pegawai.user_id', null);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getAksesMenu($id)
    {
        $builder = $this->db->table('master_pegawai');
        $builder->select('*');
        $builder->where('master_pegawai.user_id', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getPegawaiServiceCharge()
    {
        $builder = $this->db->table('master_pegawai');
        $builder->select('master_pegawai.*, users.id, users.email,users.fullname, auth_groups_users.*');
        $builder->join('users', 'users.id = master_pegawai.user_id', 'left');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
        $builder->where('auth_groups_users.group_id !=', 1);
        $builder->where('auth_groups_users.group_id !=', 2);
        // $builder->where('auth_groups_users.group_id', 3);
        $query = $builder->get();
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function createPegawai($data)
    {
        $query = $this->db->table('master_pegawai')->insert($data);
        return $query;
    }

    public function updatePegawai($data, $id)
    {
        $query = $this->db->table('master_pegawai')->update($data, array('id_pegawai' => $id));
        return $query;
    }

    public function deletePegawai($id)
    {
        $query = $this->db->table('master_pegawai')->delete(array('id_pegawai' => $id));
        return $query;
    }
}
