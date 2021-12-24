<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'master_kategori_pegawai';
    protected $primaryKey = 'kode_kategori';
    protected $allowedFields = ['kode_kategori', 'nama_kategori'];

    public function getkategori()
    {
        return $this->findAll();
    }


    public function getById($kode_kategori)
    {
        return $this->where(['kode_kategori' => $kode_kategori])->first();
    }

    public function getDatakategori()
    {
        $builder = $this->db->table('pegawai');
        $builder->select('pegawai.*, users.id, users.email,users.fullname, auth_groups_users.*');
        $builder->join('users', 'users.id = pegawai.user_id', 'left');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
        // $builder->where('auth_groups_users.group_id !=', 1);
        // $builder->where('auth_groups_users.group_id !=', 2);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function code_kategori_ID()
    {
        $builder = $this->db->table('master_kategori_pegawai');
        $builder->selectMax('kode_kategori', 'hsl');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->hsl;
        endforeach;
        $kode_kategori = 'KTG-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $kode_kategori = $kode_kategori . $nomor;
        return $kode_kategori;
    }

  
   

    public function createkategori($data)
    {
        $query = $this->db->table('master_kategori_pegawai')->insert($data);
        return $query;
    }

    public function updatekategori($data, $id)
    {
        $query = $this->db->table('master_kategori_pegawai')->update($data, array('kode_kategori' => $id));
        return $query;
    }

    public function deletekategori($id)
    {
        $query = $this->db->table('master_kategori_pegawai')->delete(array('kode_kategori' => $id));
        return $query;
    }
}
