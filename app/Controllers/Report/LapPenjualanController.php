<?php

namespace App\Controllers\Report;

use App\Controllers\BaseController;
use App\Models\ReportModel;

class LapPenjualanController extends BaseController
{
    public function __construct()
    {
        $this->report = new ReportModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan Penjualan',
            'menu'  => $this->menu->get_menu(),
            'page_title' => 'Laporan Penjualan',
            'card_title' => 'Laporan Penjualan'
        ];

        return view('report/lap_penjualan', $data);
    }
    public function get_data()
    {
        $periode = $this->request->getGet('periode');

        if ($periode == 'All') {
            $data = $this->report->get_sales_report_all();
            $filter = "Semua Periode";
        } else {
            $data = $this->report->get_sales_report_period($periode);
            $filter = bulan(substr($periode, 4, 2)) . ' ' . substr($periode, 0, 4);
        }

        $res['first'] = [
            'periode'   => $filter
        ];

        $res['values'] = $data;


        echo json_encode($res);
    }
}
