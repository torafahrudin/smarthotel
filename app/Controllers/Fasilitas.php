<?php

namespace App\Controllers;

use \App\Models\FasilitasModel;
use \App\Models\HeaderBillingModel;

class Fasilitas extends BaseController
{
    protected $validation;
    protected $fasilitasModel;
    protected $hdModel;
 
    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->fasilitasModel = new FasilitasModel();
        $this->hdModel = new HeaderBillingModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Fasilitas',
            'fasilitas'          => $this->fasilitasModel->getFasilitas(),
        ];
        return view('fasilitas/view_data_fasilitas', $data);
    }

    public function add()
    {
        $data = [
            'title'                 => 'Tambah Data Fasilitas',
            'id_fasilitas'       => $this->fasilitasModel->code_fasilitas_ID(),
            'header'                => $this->hdModel->getHeaderBilling(),
        ];
        return view('fasilitas/add_data_fasilitas', $data);
    }

    public function create()
    {
        $data = [
            'title'                 => 'Tambah Data Fasilitas',
            'id_fasilitas'       => $this->fasilitasModel->code_fasilitas_ID(),
            'header'                => $this->hdModel->getHeaderBilling(),
        ];
        $this->validation->setRules($this->fasilitasModel->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = array(
                'id_fasilitas' => $this->fasilitasModel->code_fasilitas_ID(),
                'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
                'jenis' => $this->request->getPost('id_header_billing'),
                'qty' => $this->request->getPost('qty'),
                'kapasitas' => $this->request->getPost('kapasitas'),
                'harga' => $this->request->getPost('harga'),
                //'status' => $this->request->getPost('status'),
            );
            $this->fasilitasModel->createFasilitas($data);
            session()->setFlashdata('success', 'Data Fasilitas Berhasil Ditambahkan');
            return redirect()->to('/fasilitas');
        } else {
            $data['validation'] = $this->validation;
            return view('fasilitas/add_data_fasilitas', $data);
        }
    }

    public function edit($id_fasilitas)
    {
        $data = [
            'title'                 => 'Edit Data Fasilitas',
            'fasilitas'          => $this->fasilitasModel->where('id_fasilitas', $id_fasilitas)->first(),
            'header'                => $this->hdModel->getHeaderBilling(),
        ];
        return view('fasilitas/edit_data_fasilitas', $data);
    }

    public function update()
    {
        $id_fasilitas = $this->request->getPost('id_fasilitas');
        $data = [
            'title'                 => 'Edit Data Fasilitas',
            'fasilitas'          => $this->fasilitasModel->where('id_fasilitas', $id_fasilitas)->first(),
            'header'                => $this->hdModel->getHeaderBilling(),
        ];
        $this->validation->setRules($this->fasilitasModel->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = array(
                'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
                'jenis' => $this->request->getPost('id_header_billing'),
                'qty' => $this->request->getPost('qty'),
                'kapasitas' => $this->request->getPost('kapasitas'),
                'harga' => $this->request->getPost('harga'),
               // 'status' => $this->request->getPost('status'),
            );
            $this->fasilitasModel->updateFasilitas($data, $id_fasilitas);
            session()->setFlashdata('success', 'Data Fasilitas Berhasil Diubah');

            return redirect()->to('/fasilitas');
        } else {
            $data['validation'] = $this->validation;
            return view('fasilitas/edit_data_fasilitas', $data);
        }
    }

    public function detail($id_fasilitas = '')
    {
        $data = [
            'title'     => 'Data Fasilitas',
            'fasilitas'       => $this->fasilitasModel->getListFasilitas(),
        ];
        return view('fasilitas/detail_data_fasilitas', $data);
    }

    public function delete()
    {
        $id = $this->request->getPost('id_fasilitas');
        $this->fasilitasModel->deleteFasilitas($id);
        session()->setFlashdata('success', 'Data Fasilitas Berhasil Dihapus');

        return redirect()->to('/fasilitas');
    }
}
