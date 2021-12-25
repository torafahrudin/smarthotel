<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table      = 'customer';
    protected $primaryKey = 'id_customer';
    protected $allowedFields = ['id_customer', 'nama_customer', 'nik', 'no_telp', 'email', 'alamat'];

    public function rules()
    {
        return
            [
                'nik' =>
                [
                    'label'  => 'NIK',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'nama_customer' =>
                [
                    'label'  => 'Nama Customer',
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

    public function getCustomer()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id_customer' => $id])->first();
    }

    public function getListCustomer()
    {
        $builder = $this->db->table('customer');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function code_customer_ID()
    {
        $builder = $this->db->table('customer');
        $builder->selectMax('id_customer', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_customer = 'CST-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_customer = $id_customer . $nomor;
        return $id_customer;
    }

    public function createCustomer($data)
    {
        $query = $this->db->table('customer')->insert($data);
        return $query;
    }

    public function updateCustomer($data, $id)
    {
        $query = $this->db->table('customer')->update($data, array('id_customer' => $id));
        return $query;
    }

    public function deleteCustomer($id)
    {
        $query = $this->db->table('customer')->delete(array('id_customer' => $id));
        return $query;
    }
}
