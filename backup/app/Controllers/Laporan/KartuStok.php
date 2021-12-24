<?php

namespace App\Controllers\Laporan;

use App\Controllers\BaseController;
use \App\Models\Laporan\KartuStokModel;
use \App\Models\Aktiva\AktivaModel;


class KartuStok extends BaseController
{
    protected $kartustokModel;
    protected $aktivaModel;

    public function __construct()
    {
        $this->kartustokModel = new KartuStokModel();
        $this->aktivaModel = new AktivaModel();
    }

    public function index()
    {
        $data = [
            'title'             => 'Kartu Stok',
            'kartu_stok'        => $this->kartustokModel->getKartuStok(),
            'list_aktiva'       => $this->aktivaModel->getListAktivaLancar(),
            'date'              => '',
            'year'              => ''
        ];

        return view('laporan/view_data_kartu_stok', $data);
    }

    public function show_data_kartu_stok()
    {
        $start_date = date("Y-m-d", strtotime($this->request->getPost('start_date')));;
        $id_aktiva = $this->request->getPost('id_aktiva');;
        $time = strtotime($start_date);
        $month = date("m", $time);
        $year = date("Y", $time);
        $bulan = date("F", $time);

        $data = [
            'title'             => 'Kartu Stok',
            'list_aktiva'       => $this->aktivaModel->getListAktivaLancar(),
            'kartu_stok'        => $this->kartustokModel->getKartuStok($month, $year, $id_aktiva),
            'date'              => $bulan,
            'year'              => $year
        ];

        return view('laporan/view_data_kartu_stok', $data);
    }
}
