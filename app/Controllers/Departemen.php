<?php

namespace App\Controllers;

use \App\Models\DepartemenModel;

class Departemen extends BaseController
{
    protected $validation;
    protected $departemenModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->departemenModel = new DepartemenModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Departemen',
            'departemen'            => $this->departemenModel->getDepartemen(),
        ];
        return view('departemen/view_data_departemen', $data);
    }

    public function add()
    {
        $data = [
            'title'                 => 'Tambah Data Departemen',
            'id_departemen'           => $this->departemenModel->code_departemen_ID(),
        ];
        $this->validation->setRules(['nama_departemen' => 'required']);
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = array(
                'id_departemen' => $this->departemenModel->code_departemen_ID(),
                'nama_departemen' => $this->request->getPost('nama_departemen'),
                'keterangan' => $this->request->getPost('keterangan'),
                // 'no_telp' => $this->request->getPost('no_telp'),
                // 'email' => $this->request->getPost('email'),
                // 'alamat' => $this->request->getPost('alamat'),
            );
            $this->departemenModel->createDepartemen($data);
            session()->setFlashdata('success', 'Data Departemen Berhasil Ditambahkan');
            return redirect()->to('/departemen');
        }

        return view('departemen/add_data_departemen', $data);
    }

    public function edit($id_departemen)
    {
        $data = [
            'title'                 => 'Edit Data Departemen',
            'departemen'              => $this->departemenModel->where('id_departemen', $id_departemen)->first()
        ];
        $this->validation->setRules(['nama_departemen' => 'required']);
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = array(
                'nama_departemen' => $this->request->getPost('nama_departemen'),
                'keterangan' => $this->request->getPost('keterangan'),
                // 'no_telp' => $this->request->getPost('no_telp'),
                // 'email' => $this->request->getPost('email'),
                // 'alamat' => $this->request->getPost('alamat'),
            );
            $this->departemenModel->updateDepartemen($data, $id_departemen);
            session()->setFlashdata('success', 'Data Departemen Berhasil Diubah');

            return redirect()->to('/departemen');
        }
        // dd($data);

        return view('departemen/edit_data_departemen', $data);
    }

    public function delete()
    {
        $id = $this->request->getPost('id_departemen');
        $this->departemenModel->deleteDepartemen($id);
        session()->setFlashdata('success', 'Data Departemen Berhasil Dihapus');

        return redirect()->to('/departemen');
    }
}
