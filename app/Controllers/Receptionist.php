<?php

namespace App\Controllers;

use \App\Models\ReceptionistModel;

class Receptionist extends BaseController
{
    protected $validation;
    protected $receptionistModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->receptionistModel = new ReceptionistModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Receptionist',
            'receptionist'          => $this->receptionistModel->getReceptionist(),
        ];
        return view('receptionist/view_data_receptionist', $data);
    }

    public function add()
    {
        $data = [
            'title'                 => 'Tambah Data Receptionist',
            'id_receptionist'       => $this->receptionistModel->code_receptionist_ID(),
            'id_pegawai'            => $this->receptionistModel->code_pegawai_ID(),
            'validation'            => $this->validation->setRules($this->receptionistModel->rules())
        ];
        return view('receptionist/add_data_receptionist', $data);
    }

    public function create()
    {
        $data = [
            'title'                 => 'Tambah Data Receptionist',
            'id_receptionist'       => $this->receptionistModel->code_receptionist_ID(),
            'id_pegawai'            => $this->receptionistModel->code_pegawai_ID(),
        ];
        $this->validation->setRules($this->receptionistModel->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = array(
                'id_receptionist' => $this->receptionistModel->code_receptionist_ID(),
                'id_pegawai' => $this->receptionistModel->code_pegawai_ID(),
                'nama_receptionist' => $this->request->getPost('nama_receptionist'),
                'no_telp' => $this->request->getPost('no_telp'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $this->receptionistModel->createReceptionist($data);
            session()->setFlashdata('success', 'Data Receptionist Berhasil Ditambahkan');
            return redirect()->to('/receptionist');
        } else {
            $data['validation'] = $this->validation;
            return view('receptionist/add_data_receptionist', $data);
        }
    }

    public function edit($id_receptionist)
    {
        $data = [
            'title'                 => 'Edit Data Receptionist',
            'receptionist'          => $this->receptionistModel->where('id_receptionist', $id_receptionist)->first(),
            'validation'            => $this->validation->setRules($this->receptionistModel->rules())
        ];
        return view('receptionist/edit_data_receptionist', $data);
    }

    public function update()
    {
        $id_receptionist = $this->request->getPost('id_receptionist');
        $data = [
            'title'                 => 'Edit Data Receptionist',
            'receptionist'          => $this->receptionistModel->where('id_receptionist', $id_receptionist)->first()
        ];
        $this->validation->setRules($this->receptionistModel->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = array(
                'id_pegawai' => $this->request->getPost('id_pegawai'),
                'nama_receptionist' => $this->request->getPost('nama_receptionist'),
                'no_telp' => $this->request->getPost('no_telp'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $this->receptionistModel->updateReceptionist($data, $id_receptionist);
            session()->setFlashdata('success', 'Data Receptionist Berhasil Diubah');

            return redirect()->to('/receptionist');
        } else {
            $data['validation'] = $this->validation;
            return view('receptionist/edit_data_receptionist', $data);
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id_receptionist');
        $this->receptionistModel->deleteReceptionist($id);
        session()->setFlashdata('success', 'Data Receptionist Berhasil Dihapus');

        return redirect()->to('/receptionist');
    }
}
