<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table      = 'master_jabatan';
    protected $primaryKey = 'id_jabatan';
    protected $allowedFields = ['id_jabatan', 'id_departemen','nama_jabatan'];

    public function getJabatan()
    {   $builder = $this->db->table('master_jabatan');
        $builder->select('master_jabatan.*, master_departemen.nama_departemen');
        $builder->join('master_departemen', 'master_departemen.id_departemen = master_jabatan.id_departemen');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getById($id_jabatan)
    {
        return $this->where(['id_jabatan' => $id_jabatan])->first();
    }

    public function getDataJabatan()
    {
        $builder = $this->db->table('master_pegawai');
        $builder->select('master_pegawai.*, users.id, users.email,users.fullname, auth_groups_users.*');
        $builder->join('users', 'users.id = master_pegawai.user_id', 'left');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
        // $builder->where('auth_groups_users.group_id !=', 1);
        // $builder->where('auth_groups_users.group_id !=', 2);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function code_jabatan_ID()
    {
        $builder = $this->db->table('master_jabatan');
        $builder->selectMax('id_jabatan', 'hsl');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->hsl;
        endforeach;
        $id_jabatan = 'JBT-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_jabatan = $id_jabatan . $nomor;
        return $id_jabatan;
    }

    public function createJabatan($data)
    {
        $query = $this->db->table('master_jabatan')->insert($data);
        return $query;
    }

    public function updateJabatan($data, $id)
    {
        $query = $this->db->table('master_jabatan')->update($data, array('id_jabatan' => $id));
        return $query;
    }

    public function deleteJabatan($id)
    {
        $query = $this->db->table('master_jabatan')->delete(array('id_jabatan' => $id));
        return $query;
    }
}
