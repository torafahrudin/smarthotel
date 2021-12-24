<?php

namespace App\Controllers;

use \App\Models\ServiceChargeModel;
use \App\Models\PegawaiModel;

class Service_charge extends BaseController
{
    protected $scModel;
    protected $pegawaiModel;

    public function __construct()
    {
        $this->scModel = new ServiceChargeModel();
        $this->pegawaiModel = new PegawaiModel();
    }

    public function index()
    {
        $data = [
            'title'             => 'Setting Service Charge',
            'sc'                => $this->scModel->getNilaiSc(),
            'pajak'             => $this->scModel->getNilaiPajak(),
            'service_charge'    => $this->scModel->getServiceCharge()
        ];
        // dd($data);
        return view('service_charge/view_data_service_charge', $data);
    }

    public function edit()
    {
        $data_sc = array(
            'nilai' => $this->request->getPost('sc'),
        );
        $data_pajak = array(
            'nilai' => $this->request->getPost('pajak'),
        );
        // dd($data_sc, $data_pajak);
        $this->scModel->updateNilaiSc($data_sc);
        $this->scModel->updateNilaiPajak($data_pajak);
        session()->setFlashdata('success', 'Data COA Berhasil Diubah');

        return redirect()->to('/service_charge');
    }

    function user()
    {
        $authenticate = service('authentication');
        $authenticate->check();
        return $authenticate->user();
    }

    public function pegawai()
    {
        $id = $this->user()->id;
        $id_pegawai = $this->pegawaiModel->getIdPegawai($id);

        $data = [
            'title'             => 'Data Service Charge',
            'list_akses'        => $this->pegawaiModel->getAksesMenu($id),
            'service_charge'    => $this->scModel->getByIdPegawai($id_pegawai)
        ];
        return view('pegawai/view_data_service_charge', $data);
    }

    public function print($id_pegawai, $id)
    {
        $id_user = $this->user()->id;
        $data = [
            'title'                 => 'Print Slip Gaji',
            'list_akses'            => $this->pegawaiModel->getAksesMenu($id_user),
            'list_profile'          => $this->pegawaiModel->getList($id_pegawai),
            'list_gaji'             => $this->scModel->getListGaji($id)
        ];
        // dd($data);
        return view('pegawai/print_preview_slip', $data);
    }
}
