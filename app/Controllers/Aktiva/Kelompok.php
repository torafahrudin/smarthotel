<?php

namespace App\Controllers\Aktiva;

use App\Controllers\BaseController;
use \App\Models\Aktiva\KelompokModel;

class Kelompok extends BaseController
{
    protected $validation;
    protected $kelompokModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->kelompokModel = new KelompokModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Kelompok Aktiva',
            'kelompok'              => $this->kelompokModel->getKelompok(),
        ];
        return view('aktiva/kelompok/view_data_kelompok', $data);
    }

    public function add()
    {
        $data = array(
            'id_kelompok'   => $this->kelompokModel->code_kelompok_ID(),
            'nama_kelompok' => $this->request->getPost('nama_kelompok'),
            'masa_manfaat'  => $this->request->getPost('masa_manfaat'),
            'garis_lurus'   => $this->request->getPost('garis_lurus'),
            'saldo_menurun' => $this->request->getPost('saldo_menurun'),
        );
        $this->kelompokModel->createKelompok($data);
        session()->setFlashdata('success', 'Data Kelompok Berhasil Ditambahkan');

        return redirect()->to('aktiva/kelompok');
    }

    public function edit()
    {
        $id = $this->request->getPost('id_kelompok');
        $data = array(
            'nama_kelompok' => $this->request->getPost('nama_kelompok'),
            'masa_manfaat'  => $this->request->getPost('masa_manfaat'),
            'garis_lurus'   => $this->request->getPost('garis_lurus'),
            'saldo_menurun' => $this->request->getPost('saldo_menurun'),
        );
        $this->kelompokModel->updateKelompok($data, $id);
        session()->setFlashdata('success', 'Data Kelompok Berhasil Diubah');

        return redirect()->to('aktiva/kelompok');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_kelompok');
        $this->kelompokModel->deleteKelompok($id);
        session()->setFlashdata('success', 'Data Kelompok Berhasil Dihapus');

        return redirect()->to('aktiva/kelompok');
    }
}
