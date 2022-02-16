<?php

namespace App\Controllers\Report;

use App\Controllers\BaseController;
use App\Models\ReportModel;

class BukuBesarController extends BaseController
{
    public function __construct()
    {
        $this->report = new ReportModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Buku Besar',
            'menu'  => $this->menu->get_menu(),
            'page_title' => 'Buku Besar',
            'card_title' => 'Buku Besar'
        ];

        return view('report/buku_besar', $data);
    }
    public function get_data()
    {
        $periode = $this->request->getGet('periode');
        $akun = $this->request->getGet('akun');

        $data = $this->report->get_bb($periode, $akun);
        $filter = bulan(substr($periode, 4, 2)) . ' ' . substr($periode, 0, 4);



        $res = [
            'status' => true,
            'title' => 'Buku Besar ' . $data['akun']['nama'],
            'periode' => $filter,
            'values' => $data
        ];

        echo json_encode($res);
    }
}
