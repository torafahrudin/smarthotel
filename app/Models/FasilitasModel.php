<?php

namespace App\Models;

use CodeIgniter\Model;
 
class fasilitasModel extends Model
{
    protected $table      = 'm_fasilitas';
    protected $primaryKey = 'id_fasilitas';
    protected $allowedFields = ['id_fasilitas', 'id_header_billing','id_sub_billing','nama_fasilitas', 'qty', 'kapasitas', 'harga', 'status'];

    public function rules()
    {
        return
            [
                'id_sub_billing' => 
                [
                    'label'  => 'Nama Fasilitas',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'id_header_billing' => 
                [
                    'label'  => 'Jenis Fasilitas',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'qty' =>
                [
                    'label'  => 'Qty',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
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
                'harga' =>
                [
                    'label'  => 'Harga',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ], 
                ],
                // 'status' =>
                // [
                //     'label'  => 'Status',
                //     'rules'  => 'required',
                //     'errors' => [
                //         'required' => ' {field} mohon dipilih',
                //     ],
                // ],
            ];
    }

    public function getFasilitas()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getListFasilitas()
    {
        $builder = $this->db->table('m_fasilitas');
        $builder->select('header_billing.*, header_billing.keterangan as ket1, sub_billing.keterangan as ket2');
        $builder->join('sub_billing', 'sub_billing.id_sub_billing = sub_billing.id_sub_billing', 'left');
        $builder->join('header_billing', 'header_billing.id_header_billing = header_billing.id_header_billing', 'left');
        $query   = $builder->get();
        return $query->getResultArray(); 
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

    public function code_fasilitas_ID()
    {
        $builder = $this->db->table('m_fasilitas');
        $builder->selectMax('id_fasilitas', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_fasilitas = 'FSL-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_fasilitas = $id_fasilitas . $nomor;
        return $id_fasilitas;
    }

    public function createFasilitas($data) 
    {
        $query = $this->db->table('m_fasilitas')->insert($data);
        return $query;
    }

    public function updateFasilitas($data, $id)
    {
        $query = $this->db->table('m_fasilitas')->update($data, array('id_fasilitas' => $id));
        return $query;
    }

    public function deleteFasilitas($id)
    {
        $query = $this->db->table('m_fasilitas')->delete(array('id_fasilitas' => $id));
        return $query;
    }
}
