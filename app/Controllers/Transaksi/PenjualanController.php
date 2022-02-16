<?php

namespace App\Controllers\Transaksi;

use App\Controllers\BaseController;
use App\Models\PenjualanModel;

class PenjualanController extends BaseController
{

    public function __construct()
    {
        $this->transaksi = new PenjualanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Penjualan',
            'menu' => $this->menu->get_menu()
        ];

        return view('transaksi/penjualan', $data);
    }

    public function get_data()
    {
        $data = $this->transaksi->orderBy('tanggal', 'DESC')->findAll();
        $i = 1;
        if (count($data) > 0) {
            foreach ($data as $rowData) {
                $res['data'][] = [
                    'no' => $i,
                    'kode' => $rowData['kode_penjualan'],
                    'no_bill' => $rowData['no_bill'],
                    'periode' => $rowData['periode'],
                    'tanggal' => $rowData['tanggal'],
                    'keterangan' => $rowData['keterangan'],
                    'status' => $rowData['status'],
                    'total' => $rowData['total'],
                ];
                $i++;
            }
        } else {
            $res['data'] = [];
        }

        echo json_encode($res);
    }
}
