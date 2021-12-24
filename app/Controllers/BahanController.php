<?php

namespace App\Controllers;

use App\Models\BahanModel;

class BahanController extends BaseController
{
    public function __construct()
    {
		$this->bahan = new BahanModel();

		date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['bahan']   = $this->bahan->findAll();

        $data['menu']   = "Master Data";
        $data['sub']    = "Bahan";
        
        return view('master-data/bahan/index', $data);
    }

    public function update($id)
    {
        $data['bahan']   = $this->bahan->find($id);

        $data['menu']   = "Master Data";
        $data['sub']    = "Edit Bahan";
        
        return view('master-data/bahan/edit', $data);
    }

    public function save()
    {
        $cek_kode   = $this->bahan->orderBy('id_bahan', 'DESC')->first();

        if(empty($cek_kode)){
            $kode   = 'Bhn-01';
        } else {
            $get_code   = explode("-", $cek_kode['kode_bahan']);
            $kode       = 'Bhn-' . sprintf("%02d", ($get_code[1] + 1));
        }
        
        $this->bahan->insert([
            'kode_bahan'    => $kode,
            'nama_bahan'    => $this->request->getPost('nama'),
            'jenis_bahan'   => $this->request->getPost('jenis'),
            'satuan'        => $this->request->getPost('satuan'),
            'harga_bahan'   => $this->request->getPost('harga'),
            'stok'          => $this->request->getPost('stok'),
            'stok_awal'     => $this->request->getPost('stok'),
        ]);

        return redirect()->to(base_url('/bahan'));
    }

    public function edit()
    {
        $id             = $this->request->getPost('id');
        
        $this->bahan->update($id, [
            'nama_bahan'    => $this->request->getPost('nama'),
            'jenis_bahan'   => $this->request->getPost('jenis'),
            'satuan'        => $this->request->getPost('satuan'),
            'harga_bahan'   => $this->request->getPost('harga'),
        ]);
        
        return redirect()->to(base_url('/bahan'));
    }

    public function delete()
    {
        $id             = $this->request->getPost('id');

        $this->bahan->delete($id);

        return redirect()->to(base_url('/bahan'));
    }
}
