<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomModel extends Model
{
    protected $table      = 'kamar';
    protected $primaryKey = 'id_kamar';
    protected $allowedFields = ['id_kamar', 'id_tipe_kamar', 'id_header_billing', 'id_sub_billing', 'id_fasilitas', 'jumlah', 'harga', 'room_image', 'status', 'keterangan'];

    public function rules()
    {
        return
            [
                'id_header_billing' =>
                [
                    'label'  => 'Jenis Kamar',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon dipilih',
                    ],
                ],
                'id_sub_billing' =>
                [
                    'label'  => 'Tipe Kamar',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon dipilih',
                    ],
                ],
                'kapasitas' =>
                [
                    'label'  => 'Kapasitas',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'jumlah' =>
                [
                    'label'  => 'Jumlah',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'harga'    =>
                [
                    'label'  => 'Harga',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'keterangan'    =>
                [
                    'label'  => 'Keterangan',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
            ];
    }

    public function getRoom()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getListRoom()
    {
        $builder = $this->db->table('kamar');
        $builder->select('kamar.*, header_billing.keterangan as ket1, sub_billing.keterangan as ket2');
        $builder->join('header_billing', 'header_billing.id_header_billing = kamar.id_header_billing', 'left');
        $builder->join('sub_billing', 'sub_billing.id_sub_billing = kamar.id_sub_billing', 'left');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getListFasilitas()
    {
        $builder = $this->db->table('m_fasilitas');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getDetailRoom($id_kamar)
    {
        $builder = $this->db->table('kamar');
        $builder->select('kamar.*, header_billing.keterangan as ket1, sub_billing.keterangan as ket2, kamar.keterangan as deskripsi');
        $builder->join('header_billing', 'header_billing.id_header_billing = kamar.id_header_billing', 'left');
        $builder->join('sub_billing', 'sub_billing.id_sub_billing = kamar.id_sub_billing', 'left');
        $builder->where('id_kamar', $id_kamar);
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getPriceRoom($id_kamar)
    {
        $builder = $this->db->table('kamar');
        $builder->select('harga');
        $builder->where('id_kamar', $id_kamar);
        $query   = $builder->get()->getResultArray();
        foreach ($query as $data) {
            $harga = $data['harga'];
        }
        return $harga;
    }

    public function getPriceFasilitas($id_fasilitas)
    {
        $builder = $this->db->table('m_fasilitas');
        $builder->select('harga');
        $builder->where('id_fasilitas', $id_fasilitas);
        $query   = $builder->get()->getResultArray();
        foreach ($query as $data) {
            $harga = $data['harga'];
        }
        return $harga;
    }

    public function getPriceJurnal($id_order)
    {
        $builder = $this->db->table('order_kamar');
        $builder->select('harga_kamar,harga_fasilitas');
        $builder->where('id_order', $id_order);
        $query   = $builder->get()->getResultArray();
        $total = 0;
        foreach ($query as $data) {
            $harga_kamar = $data['harga_kamar'];
            $harga_fasilitas = $data['harga_fasilitas'];
            $total += $harga_kamar + $harga_fasilitas;
        }
        return $total;
    }

    public function code_kamar_ID()
    {
        $builder = $this->db->table('kamar');
        $builder->selectMax('id_kamar', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_kamar = 'ROOM-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_kamar = $id_kamar . $nomor;
        return $id_kamar;
    }

    public function createRoom($data)
    {
        $query = $this->db->table('kamar')->insert($data);
        return $query;
    }

    public function updateRoom($data, $id)
    {
        $query = $this->db->table('kamar')->update($data, array('id_kamar' => $id));
        return $query;
    }

    public function deleteRoom($id)
    {
        $query = $this->db->table('kamar')->delete(array('id_kamar' => $id));
        return $query;
    }
}
