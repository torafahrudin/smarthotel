<?php

namespace App\Controllers\Report;

use App\Controllers\BaseController;
use App\Models\ReportModel;

class JurnalController extends BaseController
{

    public function __construct()
    {
        $this->report = new ReportModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Jurnal Umum',
            'menu'  => $this->menu->get_menu(),
            'page_title' => 'Jurnal Umum',
            'card_title' => 'Jurnal Umum (General Ledger)'
        ];

        return view('report/jurnal_umum', $data);
    }
    public function get_data()
    {
        $periode = $this->request->getGet('periode');

        if ($periode == 'All') {
            $data = $this->report->get_jurnal();
            $filter = "Semua Periode";
        } else {
            $data = $this->report->get_jurnal_periode($periode);
            $filter = bulan(substr($periode, 4, 2)) . ' ' . substr($periode, 0, 4);
        }

        $res['first'] = [
            'periode'   => $filter
        ];
        if (count($data) > 0) {
            foreach ($data as $row) {
                $res['data'][] = [
                    'tanggal' => shortdate_indo($row['tanggal']),
                    'akun'    => $row['kode_akun'] . '  ' . ucwords(strtolower($row['nama_akun'])),
                    'dc'     => $row['dc'],
                    'ref'     => $row['no_bukti'],
                    'debet'   => $row['debet'],
                    'kredit'  => $row['kredit']
                ];
            }
        } else {
            $res['data'] = [];
        }

        echo json_encode($res);
    }
}
