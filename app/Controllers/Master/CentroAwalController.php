<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\CentroAwal;

class CentroAwalController extends BaseController
{

    public function __construct()
    {
        $this->centro = new CentroAwal();
    }


    public function index()
    {
        $data = [
            'title' => 'Data Centroid Awal',
            'menu'  => $this->menu->get_menu()
        ];

        return view('master/centro_awal', $data);
    }
    public function get_data()
    {
        $data = $this->centro->findAll();
        $i = 1;
        if (count($data) > 0) {
            foreach ($data as $rowData) {
                $res['data'][] = [
                    'no' => $i,
                    'id' => $rowData['id_ref'],
                    'nama' => $rowData['nama'],
                    'x' => $rowData['x'],
                    'y' => $rowData['y'],
                ];
                $i++;
            }
        } else {
            $res['data'] = [];
        }

        echo json_encode($res);
    }

    public function show()
    {
        $kode = $this->request->getGet('kode');

        $res = $this->centro->where('id_ref', $kode)->findAll();

        echo json_encode($res);
    }

    public function update()
    {
        $kode = $this->request->getPost('kode');
        $nama = $this->request->getPost('nama');
        $x = $this->request->getPost('nilai_x');
        $y = $this->request->getPost('nilai_y');


        $input = [
            'nama' => $nama,
            'x' => $x,
            'y' => $y
        ];

        $this->centro->update($kode, $input);

        $res = [
            'status' => true,
            'message' => 'Data dengan ID ' . $kode . ' berhasil diubah!'
        ];

        echo json_encode($res);
    }
}
