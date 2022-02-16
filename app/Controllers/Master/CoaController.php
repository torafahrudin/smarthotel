<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\CoaSubheadModel;
use App\Models\CoaModel;

class CoaController extends BaseController
{

    public function __construct()
    {
        $this->coa = new CoaModel();
        $this->scoa = new CoaSubheadModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Chart of Account',
            'menu' => $this->menu->get_menu()
        ];
        return view('master/coa', $data);
    }

    public function get_subcoa()
    {
        $data = $this->scoa->findAll();
        echo json_encode($data);
    }

    public function get_data()
    {
        $data = $this->coa->get_data();
        $i = 1;
        if (count($data) > 0) {
            foreach ($data as $rowData) {
                $res['data'][] = [
                    'no' => $i,
                    'kode' => $rowData['kode'],
                    'nama' => $rowData['nama'],
                    'dc' => $rowData['dc'],
                    'posted' => $rowData['posted'],
                    'lock' => $rowData['lock'],
                    'kategori' => $rowData['kategori'],
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
        $data = $this->coa->where('kode', $kode)->findAll();
        echo json_encode($data);
    }
    public function store()
    {
        $nama = $this->request->getPost('nama');
        $sub_id = $this->request->getPost('sub_id');
        $dc = $this->request->getPost('dc');
        $posted = $this->request->getPost('posted');
        $kode = $this->coa->trans_id($sub_id);
        $input = [
            'kode'  => $kode,
            'nama' => $nama,
            'dc' => $dc,
            'posted' => $posted,
            'sub_id' => $sub_id,
            'lock'  => 0
        ];

        $this->coa->insert($input);
        $res = [
            'status'        => true,
            'icon'          => 'success',
            'title'         => 'Berhasil',
            'message'       => 'Berhasil menyimpan data dengan kode ' . $kode
        ];

        echo json_encode($res);
    }
    public function update()
    {
        $kode = $this->request->getPost('kode');
        $nama = $this->request->getPost('nama');
        $sub_id = $this->request->getPost('sub_id');
        $dc = $this->request->getPost('dc');
        $posted = $this->request->getPost('posted');

        $input = [
            'nama' => $nama,
            'dc' => $dc,
            'posted' => $posted,
            'lock'  => 0
        ];

        $this->coa->update($kode, $input);
        $res = [
            'status'        => true,
            'icon'          => 'success',
            'title'         => 'Berhasil',
            'message'       => 'Data dengan kode ' . $kode . ' berhasil diubah'
        ];

        echo json_encode($res);
    }
    public function destroy()
    {
        $id = $this->request->getGet('kode');

        $this->coa->where('kode', $id)->delete();

        $res = [
            'status'        => true,
            'icon'          => 'success',
            'title'         => 'Berhasil',
            'message'       => 'Data dengan Kode ' . $id . " berhasil di hapus"
        ];
        echo json_encode($res);
    }
}
