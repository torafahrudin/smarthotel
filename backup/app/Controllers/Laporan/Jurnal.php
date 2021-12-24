<?php

namespace App\Controllers\Laporan;

use App\Controllers\BaseController;
use \App\Models\Laporan\JurnalModel;


class Jurnal extends BaseController
{
    protected $jurnalModel;

    public function __construct()
    {
        $this->jurnalModel = new JurnalModel();
    }

    public function index()
    {
        $data = [
            'title'             => 'Jurnal Umum',
            'data_jurnals'      => $this->jurnalModel->getJurnal(),
            'date'              => '',
            'year'              => ''
        ];

        return view('laporan/view_data_jurnal_umum', $data);
    }

    public function show_data_jurnal()
    {
        $start_date = date("Y-m-d", strtotime($this->request->getPost('start_date')));;
        $time = strtotime($start_date);
        $month = date("m", $time);
        $year = date("Y", $time);
        $bulan = date("F", $time);

        $data = [
            'title'             => 'Jurnal Umum',
            'data_jurnals'      => $this->jurnalModel->getJurnal($month, $year),
            'date'              => $bulan,
            'year'              => $year
        ];

        return view('laporan/view_data_jurnal_umum', $data);
    }
}
