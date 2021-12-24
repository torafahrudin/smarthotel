<?php

namespace App\Controllers;

use \App\Models\UsersModel;
use \App\Models\PegawaiModel;

class Users extends BaseController
{
    protected $usersModel;
    protected $pegawaiModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->pegawaiModel = new PegawaiModel();
    }

    public function index()
    {
        $data = [
            'title'         => 'Data User Akses',
            'users'         => $this->usersModel->getUsers(),
            'list_pegawai'  => $this->pegawaiModel->getPegawaiAkses(),
        ];
        // dd($data);
        return view('users/view_data_users', $data);
    }

    public function akses()
    {
        $id = $this->request->getPost('id_pegawai');
        $data = array(
            'user_id' => $this->request->getPost('user_id'),
        );
        $this->usersModel->updateAkses($data, $id);
        session()->setFlashdata('success', 'Data Akses Berhasil Diubah');

        return redirect()->to('/users');
    }

    public function nonactive()
    {
        $id = $this->request->getPost('user_id');
        $data = array(
            'active' => 0,
        );
        $this->usersModel->updateActive($data, $id);
        session()->setFlashdata('success', 'Data Aktivasi Berhasil Diubah');

        return redirect()->to('/users');
    }

    public function active()
    {
        $id = $this->request->getPost('user_id');
        $data = array(
            'active' => 1,
        );
        $this->usersModel->updateActive($data, $id);
        session()->setFlashdata('success', 'Data Aktivasi Berhasil Diubah');

        return redirect()->to('/users');
    }
}
