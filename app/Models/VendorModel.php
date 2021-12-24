<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorModel extends Model
{
    protected $table      = 'master_vendor';
    protected $primaryKey = 'id_vendor';
    protected $allowedFields = ['id_vendor', 'nama_vendor', 'no_telp', 'email', 'alamat'];

    public function rules()
    {
        return
            [
                'nama_vendor' =>
                [
                    'label'  => 'Nama Vendor',
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
                'email' =>
                [
                    'label'  => 'Email',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
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


    public function getVendor()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id_vendor' => $id])->first();
    }

    public function getListVendor()
    {
        $builder = $this->db->table('master_vendor');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function code_Vendor_ID()
    {
        $builder = $this->db->table('master_vendor');
        $builder->selectMax('id_vendor', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_vendor = 'VND-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_vendor = $id_vendor . $nomor;
        return $id_vendor;
    }

    public function createVendor($data)
    {
        $query = $this->db->table('master_vendor')->insert($data);
        return $query;
    }

    public function updateVendor($data, $id)
    {
        $query = $this->db->table('master_vendor')->update($data, array('id_vendor' => $id));
        return $query;
    }

    public function deleteVendor($id)
    {
        $query = $this->db->table('master_vendor')->delete(array('id_vendor' => $id));
        return $query;
    }
}
