<?php

namespace App\Controllers;

use \App\Models\VendorModel;

class Vendor extends BaseController
{
    protected $validation;
    protected $vendorModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->vendorModel = new VendorModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Vendor',
            'vendor'              => $this->vendorModel->getVendor(),
        ];
        return view('supplier/view_data_vendor', $data);
    }

    public function add()
    {
        $data = [
            'title'                 => 'Tambah Data Vendor',
            'id_vendor'             => $this->vendorModel->code_vendor_ID(),
            'validation'            => $this->validation->setRules($this->vendorModel->rules())
        ];
        return view('supplier/add_data_vendor', $data);
    }

    public function create()
    {
        $data = [
            'title'                 => 'Tambah Data Vendor',
            'id_vendor'             => $this->vendorModel->code_vendor_ID(),
        ];
        $this->validation->setRules($this->vendorModel->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = array(
                'id_vendor' => $this->vendorModel->code_vendor_ID(),
                'nama_vendor' => $this->request->getPost('nama_vendor'),
                'no_telp' => $this->request->getPost('no_telp'),
                'email' => $this->request->getPost('email'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $this->vendorModel->createVendor($data);
            session()->setFlashdata('success', 'Data Vendor Berhasil Ditambahkan');
            return redirect()->to('/vendor');
        } else {
            $data['validation'] = $this->validation;
            return view('supplier/add_data_vendor', $data);
        }
    }

    public function edit($id_vendor)
    {
        $data = [
            'title'                 => 'Edit Data Vendor',
            'vendor'                => $this->vendorModel->where('id_vendor', $id_vendor)->first(),
            'validation'            => $this->validation->setRules($this->vendorModel->rules())
        ];

        return view('supplier/edit_data_vendor', $data);
    }

    public function update($id_vendor)
    {
        $data = [
            'title'                 => 'Edit Data Vendor',
            'vendor'              => $this->vendorModel->where('id_vendor', $id_vendor)->first()
        ];

        $this->validation->setRules($this->vendorModel->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = array(
                'nama_vendor' => $this->request->getPost('nama_vendor'),
                'no_telp' => $this->request->getPost('no_telp'),
                'email' => $this->request->getPost('email'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $this->vendorModel->updateVendor($data, $id_vendor);
            session()->setFlashdata('success', 'Data Vendor Berhasil Diubah');

            return redirect()->to('/vendor');
        } else {
            $data['validation'] = $this->validation;
            return view('supplier/edit_data_vendor', $data);
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id_vendor');
        $this->vendorModel->deleteVendor($id);
        session()->setFlashdata('success', 'Data Vendor Berhasil Dihapus');

        return redirect()->to('/vendor');
    }
}
