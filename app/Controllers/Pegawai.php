<?php

namespace App\Controllers;

use \App\Models\PegawaiModel;
use \App\Models\JabatanModel;
use \App\Models\PtkpModel;
use \App\Models\UsersModel;

class Pegawai extends BaseController
{
    protected $validation;
    protected $pegawaiModel;
    protected $jabatanModel;
    protected $ptkpModel;
    protected $usersModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->pegawaiModel = new PegawaiModel();
        $this->jabatanModel = new JabatanModel();
        $this->ptkpModel = new PtkpModel();
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title'         => 'Data Pegawai',
            'pegawai'       => $this->pegawaiModel->getDataPegawai(),
            'id_pegawai'    => $this->pegawaiModel->code_pegawai_ID()
        ];
        return view('pegawai/view_data_pegawai', $data);
    }

    public function add()
    {
        $data = [
            'title'         => 'Data Pegawai',
            'pegawai'       => $this->pegawaiModel->getDataPegawai(),
            'id_pegawai'    => $this->pegawaiModel->code_pegawai_ID(),
            'jabatan'       => $this->jabatanModel->getJabatan(),
            'ptkp'          => $this->ptkpModel->getPtkp()
        ];
        return view('pegawai/add_data_pegawai', $data);
    }

    public function addPegawai()
    {
        $data = [
            'title'         => 'Data Pegawai',
            'pegawai'       => $this->pegawaiModel->getDataPegawai(),
            'id_pegawai'    => $this->pegawaiModel->code_pegawai_ID(),
            'jabatan'       => $this->jabatanModel->getJabatan(),
            'ptkp'          => $this->ptkpModel->getPtkp()
        ];

        $this->validation->setRules($this->pegawaiModel->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = array(
                'id_pegawai' => $this->pegawaiModel->code_pegawai_ID(),
                'id_jabatan' => $this->request->getPost('id_jabatan'),
                'id_ptkp' => $this->request->getPost('id_ptkp'),
                'nip' => $this->request->getPost('nip'),
                'nama_pegawai' => $this->request->getPost('nama_pegawai'),
                'no_telp' => $this->request->getPost('no_telp'),
                'email' => $this->request->getPost('email'),
                'nama_bank' => $this->request->getPost('nama_bank'),
                'rekening_bank' => $this->request->getPost('rekening_bank'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $this->pegawaiModel->createPegawai($data);
            session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
            return redirect()->to('/pegawai');
        } else {
            $data['validation'] = $this->validation;
            return view('pegawai/add_data_pegawai', $data);
        }
    }

    public function editPegawai()
    {
        $id = $this->request->getPost('id_pegawai');
        $data = array(
            'nip' => $this->request->getPost('nip'),
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'id_jabatan' => $this->request->getPost('id_jabatan'),
            'id_ptkp' => $this->request->getPost('id_ptkp'),
            'no_telp' => $this->request->getPost('no_telp'),
            'email' => $this->request->getPost('email'),
            'nama_bank' => $this->request->getPost('nama_bank'),
            'rekening_bank' => $this->request->getPost('rekening_bank'),
            'alamat' => $this->request->getPost('alamat'),
        );
        $this->pegawaiModel->updatePegawai($data, $id);
        session()->setFlashdata('success', 'Data Pegawai Berhasil Diubah');

        return redirect()->to('/pegawai');
    }

    public function deletePegawai()
    {
        $id = $this->request->getPost('id_pegawai');
        $this->pegawaiModel->deletePegawai($id);
        session()->setFlashdata('success', 'Data Pegawai Berhasil Dihapus');

        return redirect()->to('/pegawai');
    }
}
