<?php

namespace App\Controllers;

use \App\Models\HeaderBillingModel;
use \App\Models\SubBillingModel;

class HeaderBilling extends BaseController
{
    protected $validation;
    protected $hdModel;
    protected $sbModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->hdModel = new HeaderBillingModel();
        $this->sbModel = new SubBillingModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Header Billing dan Sub Billing',
            'header'                => $this->hdModel->getHeaderBilling(),
            'sub'                   => $this->sbModel->getSubBilling(),
        ];
        return view('header/view_data_header_billing', $data);
    }

    public function add()
    {
        $data = array(
            'id_header_billing' => $this->request->getPost('id_header_billing'),
            'keterangan' => $this->request->getPost('keterangan'),
        );
        $this->hdModel->createHeaderBilling($data);
        session()->setFlashdata('success', 'Data Header Billing Berhasil Ditambahkan');

        return redirect()->to('/headerbilling');
    }

    public function edit()
    {
        $id = $this->request->getPost('id_header_billing');
        $data = array(
            'id_header_billing' => $this->request->getPost('id_header_billing'),
            'keterangan' => $this->request->getPost('keterangan'),
        );
        $this->hdModel->updateHeaderBilling($data, $id);
        session()->setFlashdata('success', 'Data Header Billing Berhasil Diubah');

        return redirect()->to('/headerbilling');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_header_billing');
        $this->hdModel->deleteHeaderBilling($id);
        session()->setFlashdata('success', 'Data Header Billing Berhasil Dihapus');

        return redirect()->to('/headerbilling');
    }

    public function addSub()
    {
        $data = array(
            'id_sub_billing' => $this->request->getPost('id_sub_billing'),
            'keterangan' => $this->request->getPost('keterangan'),
        );
        $this->sbModel->createSubBilling($data);
        session()->setFlashdata('success', 'Data Sub Billing Berhasil Ditambahkan');

        return redirect()->to('/headerbilling');
    }

    public function editSub()
    {
        $id = $this->request->getPost('id_sub_billing');
        $data = array(
            'keterangan' => $this->request->getPost('keterangan'),
        );
        $this->sbModel->updateSubBilling($data, $id);
        session()->setFlashdata('success', 'Data Sub Billing Berhasil Diubah');

        return redirect()->to('/headerbilling');
    }

    public function deleteSub()
    {
        $id = $this->request->getPost('id_sub_billing');
        $this->sbModel->deleteSubBilling($id);
        session()->setFlashdata('success', 'Data Sub Billing Berhasil Dihapus');

        return redirect()->to('/headerbilling');
    }
}
