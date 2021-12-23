<?php

namespace App\Controllers;

use \App\Models\CoaModel;

class Coa extends BaseController
{
    protected $coaModel;

    public function __construct()
    {
        $this->coaModel = new CoaModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'Data COA',
            'coa'       => $this->coaModel->getCoa(),
        ];
        return view('coa/view_data_coa', $data);
    }

    public function add()
    {
        $data = array(
            'id_akun' => $this->request->getPost('id_akun'),
            'nama_akun' => $this->request->getPost('nama_akun'),
            'kategori' => $this->request->getPost('kategori'),
            'saldo_normal' => $this->request->getPost('saldo_normal'),
        );
        $this->coaModel->createCoa($data);
        session()->setFlashdata('success', 'Data COA Berhasil Ditambahkan');

        return redirect()->to('/coa');
    }

    public function edit()
    {
        $id = $this->request->getPost('id_akun');
        $data = array(
            'nama_akun' => $this->request->getPost('nama_akun'),
            'kategori' => $this->request->getPost('kategori'),
            'saldo_normal' => $this->request->getPost('saldo_normal'),
        );
        $this->coaModel->updateCoa($data, $id);
        session()->setFlashdata('success', 'Data COA Berhasil Diubah');

        return redirect()->to('/coa');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_akun');
        $this->coaModel->deleteCoa($id);
        session()->setFlashdata('success', 'Data COA Berhasil Dihapus');

        return redirect()->to('/coa');
    }
}
