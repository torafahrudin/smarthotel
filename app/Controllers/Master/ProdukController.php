<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class ProdukController extends BaseController
{

    public function __construct()
    {
        $this->produk = new ProdukModel();
    }
    public function set_number($number)
    {
        $num = intval(preg_replace("/[^0-9]/", "", $number));

        return $num;
    }

    public function index()
    {
        $data = [
            'title' => 'Data Produk',
            'menu'  => $this->menu->get_menu()
        ];

        return view('master/produk', $data);
    }
    public function get_data()
    {
        $data = $this->produk->findAll();
        $i = 1;
        if (count($data) > 0) {
            foreach ($data as $rowData) {
                $res['data'][] = [
                    'no' => $i,
                    'kode' => $rowData['kode'],
                    'nama' => $rowData['nama'],
                    'harga_satuan' => $rowData['harga_satuan'],
                    'gambar' => $rowData['gambar'],
                    'estimasi_delivery' => $rowData['estimasi_delivery'],
                    'path_gambar' => $rowData['path_gambar'],
                    'tag' => $rowData['tag'],
                    'deskripsi' => $rowData['deskripsi']
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

        $res = $this->produk->where('kode', $kode)->findAll();

        echo json_encode($res);
    }

    public function store()
    {
        $kode = $this->produk->trans_id();
        $nama = $this->request->getPost('nama');
        $harga_satuan = $this->set_number($this->request->getPost('harga_satuan'));

        $input = [
            'kode' => $kode,
            'nama' => $nama,
            'harga_satuan' => $harga_satuan
        ];

        $this->produk->insert($input);

        $res = [
            'status' => true,
            'message' => 'Data berhasil disimpan dengan Kode ' . $kode . ' !'
        ];

        echo json_encode($res);
    }
    public function update()
    {
        $kode = $this->request->getPost('kode');
        $nama = $this->request->getPost('nama');
        $harga_satuan = $this->set_number($this->request->getPost('harga_satuan'));

        $input = [
            'nama' => $nama,
            'harga_satuan' => $harga_satuan
        ];

        $this->produk->update($kode, $input);

        $res = [
            'status' => true,
            'message' => 'Data dengan Kode ' . $kode . ' berhasil diubah!'
        ];

        echo json_encode($res);
    }

    public function destroy()
    {
        $id = $this->request->getGet('kode');

        $this->produk->where('kode', $id)->delete();

        $res = [
            'status'        => true,
            'icon'          => 'success',
            'title'         => 'Berhasil',
            'message'       => 'Data dengan Kode ' . $id . " berhasil di hapus!"
        ];
        echo json_encode($res);
    }
}
