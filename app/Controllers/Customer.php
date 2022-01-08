<?php

namespace App\Controllers;

use \App\Models\CustomerModel;

class Customer extends BaseController
{
    protected $validation;
    protected $customerModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Customer',
            'customer'              => $this->customerModel->getCustomer(),
        ];
        return view('customer/view_data_customer', $data);
    }

    public function add()
    {
        $data = [
            'title'                 => 'Tambah Data Customer',
            'id_customer'           => $this->customerModel->code_customer_ID(),
            'validation'            => $this->validation->setRules($this->customerModel->rules())
        ];
        return view('customer/add_data_customer', $data);
    }

    public function create()
    {
        $data = [
            'title'                 => 'Tambah Data Customer',
            'id_customer'           => $this->customerModel->code_customer_ID(),
        ];
        $this->validation->setRules($this->customerModel->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = array(
                'id_customer' => $this->customerModel->code_customer_ID(),
                'nama_customer' => $this->request->getPost('nama_customer'),
                'nik' => $this->request->getPost('nik'),
                'no_telp' => $this->request->getPost('no_telp'),
                'email' => $this->request->getPost('email'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $this->customerModel->createCustomer($data);
            session()->setFlashdata('success', 'Data Customer Berhasil Ditambahkan');
            return redirect()->to('/customer');
        } else {
            $data['validation'] = $this->validation;
            return view('customer/add_data_customer', $data);
        }
    }

    public function edit($id_customer)
    {
        $data = [
            'title'                 => 'Edit Data Customer',
            'customer'              => $this->customerModel->where('id_customer', $id_customer)->first(),
            'validation'            => $this->validation->setRules($this->customerModel->rules())
        ];
        return view('customer/edit_data_customer', $data);
    }

    public function update()
    {
        $id_customer = $this->request->getPost('id_customer');
        $data = [
            'title'                 => 'Edit Data Customer',
            'customer'              => $this->customerModel->where('id_customer', $id_customer)->first()
        ];
        $this->validation->setRules($this->customerModel->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = array(
                'nama_customer' => $this->request->getPost('nama_customer'),
                'nik' => $this->request->getPost('nik'),
                'no_telp' => $this->request->getPost('no_telp'),
                'email' => $this->request->getPost('email'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $this->customerModel->updateCustomer($data, $id_customer);
            session()->setFlashdata('success', 'Data Customer Berhasil Diubah');
            return redirect()->to('/customer');
        } else {
            $data['validation'] = $this->validation;
            return view('customer/edit_data_customer', $data);
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id_customer');
        $this->customerModel->deleteCustomer($id);
        session()->setFlashdata('success', 'Data Customer Berhasil Dihapus');

        return redirect()->to('/customer');
    }
}
