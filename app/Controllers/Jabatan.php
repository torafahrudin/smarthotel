<?php

namespace App\Controllers;

use \App\Models\JabatanModel;
use \App\Models\DepartemenModel;

class Jabatan extends BaseController
{
    protected $jabatanModel;

    public function __construct()
    {
        $this->jabatanModel = new JabatanModel();
        $this->departemenModel = new DepartemenModel();
    }

    public function index()
    {
        $data = [
            'title'         => 'Data Jabatan',
            'jabatan'       => $this->jabatanModel->getJabatan(),
            'id_jabatan'       => $this->jabatanModel->code_jabatan_ID(),
            'departemen' => $this->departemenModel->getDepartemen(),
        ];
        return view('jabatan/view_data_jabatan', $data);
    }

    public function addJabatan()
    {
        $data = array(
            'id_jabatan' => $this->jabatanModel->code_jabatan_ID(),
            'id_departemen' => $this->request->getPost('id_departemen'),
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
            'golongan' => $this->request->getPost('golongan'),
            'gaji_pokok' => $this->request->getPost('gaji_pokok'),
        );
        $this->jabatanModel->createJabatan($data);
        session()->setFlashdata('success', 'Data Jabatan Berhasil Ditambahkan');

        return redirect()->to('/jabatan');
    }

    public function editJabatan()
    {
        $id = $this->request->getPost('id_jabatan');
        $data = array(
            'id_departemen' => $this->request->getPost('id_departemen'),
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
            'golongan' => $this->request->getPost('golongan'),
            'gaji_pokok' => $this->request->getPost('gaji_pokok'),
        );
        $this->jabatanModel->updateJabatan($data, $id);
        session()->setFlashdata('success', 'Data Jabatan Berhasil Diubah');

        return redirect()->to('/jabatan');
    }

    public function deleteJabatan()
    {
        $id = $this->request->getPost('id_jabatan');
        $this->jabatanModel->deleteJabatan($id);
        session()->setFlashdata('success', 'Data Jabatan Berhasil Dihapus');

        return redirect()->to('/jabatan');
    }
}
