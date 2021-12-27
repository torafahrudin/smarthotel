<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomTipeModel extends Model
{
    protected $table      = 'tipe_kamar';
    protected $primaryKey = 'id_tipe_kamar';
    protected $allowedFields = ['id_tipe_kamar', 'nama_tipe_kamar'];

    public function getRoomTipe()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getListRoomTipe()
    {
        $builder = $this->db->table('tipe_kamar');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function createRoomTipe($data)
    {
        $query = $this->db->table('tipe_kamar')->insert($data);
        return $query;
    }

    public function updateRoomTipe($data, $id)
    {
        $query = $this->db->table('tipe_kamar')->update($data, array('id_tipe_kamar' => $id));
        return $query;
    }

    public function deleteRoomTipe($id)
    {
        $query = $this->db->table('tipe_kamar')->delete(array('id_tipe_kamar' => $id));
        return $query;
    }
}
