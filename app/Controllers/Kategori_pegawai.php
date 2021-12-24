<?php

namespace App\Controllers;

use \App\Models\KategoriModel;


class Kategori_pegawai extends BaseController
{
    protected $KategoriModel;
    

    public function __construct()
    {
        $this->KategoriModel = new KategoriModel();
        
    }

    public function index()
    {
        $data = [
            'title'         => 'Data kategori',
            'kategori_pegawai'       => $this->KategoriModel->getkategori(),
            'kode_kategori'       => $this->KategoriModel->code_kategori_ID(),
        ];
        return view('pegawai/view_data_kategori', $data);
    }

    public function addkategori()
    {
        $data = array(
            'kode_kategori' => $this->KategoriModel->code_kategori_ID(),
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            
        );
        $this->KategoriModel->createkategori($data);
        session()->setFlashdata('success', 'Data kategori Berhasil Ditambahkan');

        return redirect()->to('/kategori_pegawai');
    }

    public function editkategori()
    {
        $id = $this->request->getPost('kode_kategori');
        $data = array(
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            
        );
        $this->KategoriModel->updatekategori($data, $id);
        session()->setFlashdata('success', 'Data kategori Berhasil Diubah');

        return redirect()->to('/kategori_pegawai');
    }

    public function deletekategori()
    {
        $id = $this->request->getPost('kode_kategori');
        $this->KategoriModel->deletekategori($id);
        session()->setFlashdata('success', 'Data kategori Berhasil Dihapus');

        return redirect()->to('/kategori_pegawai');
    }
}
