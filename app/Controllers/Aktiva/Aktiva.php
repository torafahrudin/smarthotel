<?php

namespace App\Controllers\Aktiva;

use App\Controllers\BaseController;
use \App\Models\Aktiva\AktivaModel;
use \App\Models\CoaModel;

class Aktiva extends BaseController
{
    protected $validation;
    protected $aktivaModel;
    protected $coaModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->aktivaModel = new AktivaModel();
        $this->coaModel = new CoaModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Aktiva',
            'aktiva'                => $this->aktivaModel->getAktiva(),
            'id_aktiva'             => $this->aktivaModel->code_aktiva_ID(),
            'list_akun'             => $this->coaModel->getCoa(),
        ];
        // dd($data);
        return view('aktiva/view_data_aktiva', $data);
    }

    public function add()
    {
        $data = [
            'title'                 => 'Tambah Data Aktiva Tetap',
            'id_aktiva'             => $this->aktivaModel->code_aktiva_ID(),
            'list_akun'             => $this->coaModel->getCoa(),
        ];
        $this->validation->setRules(['nama_aktiva' => 'required']);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        $kategori = $this->coaModel->getKategori($this->request->getPost('id_akun'));

        if ($isDataValid) {
            $data = array(
                'id_aktiva' => $this->aktivaModel->code_aktiva_ID(),
                'nama_aktiva' => $this->request->getPost('nama_aktiva'),
                'id_akun' => $this->request->getPost('id_akun'),
                'kategori' => $kategori,
            );
            $this->aktivaModel->createAktiva($data);
            session()->setFlashdata('success', 'Data Aktiva Berhasil Ditambahkan');
            return redirect()->to('/aktiva/aktiva');
        }

        return view('aktiva/add_data_aktiva', $data);
    }

    public function edit()
    {
        $id = $this->request->getPost('id_aktiva');
        $data = [
            'title'                 => 'Edit Data Aktiva Tetap',
            'aktiva'                => $this->aktivaModel->getAktiva(),
            'id_aktiva'             => $this->aktivaModel->code_aktiva_ID(),
            'list_akun'             => $this->coaModel->getCoa(),
        ];

        $this->validation->setRules(['nama_aktiva' => 'required']);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        $kategori = $this->coaModel->getKategori($this->request->getPost('id_akun'));

        if ($isDataValid) {
        $data = array(
            'nama_aktiva' => $this->request->getPost('nama_aktiva'),
            'id_akun' => $this->request->getPost('id_akun'),
            'kategori' => $kategori,
        );
        $this->aktivaModel->updateAktiva($data, $id);
        session()->setFlashdata('success', 'Data Aktiva Berhasil Diubah');
            return redirect()->to('/aktiva/aktiva');
        }
        
        return redirect()->to('/coa');

    }

    public function delete()
    {
        $id = $this->request->getPost('id_aktiva');
        $this->aktivaModel->deleteAktiva($id);

        session()->setFlashdata('success', 'Data Aktiva Berhasil Dihapus');

        return redirect()->to('/aktiva/aktiva');
    }
}
