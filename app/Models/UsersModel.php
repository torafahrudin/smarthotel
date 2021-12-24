<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'email', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
    ];

    public function getUsers()
    {
        $builder = $this->db->table('users');
        $builder->select('users.id, users.email, users.username,users.user_image,users.fullname,users.active,auth_groups_users.group_id,auth_groups.description,pegawai.id_pegawai');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id', 'left');
        $builder->join('pegawai', 'pegawai.user_id = users.id', 'left');
        $builder->orderBy('users.id', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function updateAkses($data, $id)
    {
        $query = $this->db->table('pegawai')->update($data, array('id_pegawai' => $id));
        return $query;
    }

    public function updateActive($data, $id)
    {
        $query = $this->db->table('users')->update($data, array('id' => $id));
        return $query;
    }
}
