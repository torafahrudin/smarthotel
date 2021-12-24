<?php

namespace App\Controllers\Laporan;

use App\Controllers\BaseController;
use \App\Models\Laporan\KartuAssetModel;
use \App\Models\Aktiva\AktivaTetapModel;
use \App\Models\Aktiva\PenyusutanModel;


class KartuAsset extends BaseController
{
    protected $kartuAssetModel;
    protected $aktivaTetapModel;
    protected $penyusutanModel;

    public function __construct()
    {
        $this->kartuAssetModel = new KartuAssetModel();
        $this->aktivaTetapModel = new AktivaTetapModel();
        $this->penyusutanModel = new PenyusutanModel();
    }

    public function index()
    {
        $id_aktiva = '';
        $data = [
            'title'                         => 'Kartu Asset',
            'isi_tabel'                     => $this->kartuAssetModel->getKartuAsset($id_aktiva),
            'listAktiva'                    => $this->aktivaTetapModel->getAktivaTetap(),
            'masa_manfaat'                  => '',
            'nilai_buku_awal'               => 0,
            'nilai_buku_reparasi'           => '0',
            'tanggal_reparasi'              => '',
            'nominal_reparasi'              => '0',
            'nilai_buku_pemeliharaan'       => '0',
            'tanggal_pemeliharaan'          => '',
            'nominal_pemeliharaan'          => '0',
            'aktiva'                        =>  $this->aktivaTetapModel->getById($id_aktiva),
        ];
        return view('laporan/view_data_kartu_asset', $data);
    }

    public function show_data_kartu_asset()
    {
        $id_aktiva = $this->request->getPost('id_aktiva');
        $data = [
            'title'                          => 'Kartu Asset',
            'isi_tabel'                      => $this->kartuAssetModel->getKartuAsset($id_aktiva),
            'listAktiva'                     => $this->aktivaTetapModel->getAktivaTetap(),
            'masa_manfaat'                   => '',
            'nilai_buku_awal'                => $this->aktivaTetapModel->getAktivaHarga($id_aktiva),
            'aktiva'                         => $this->aktivaTetapModel->getById($id_aktiva),
            'nilai_buku_reparasi'            => '0',
            'nilai_buku_reparasi'            => '0',
            'tanggal_reparasi'               => '',
            'nominal_reparasi'               => '0',
            'nilai_buku_pemeliharaan'        => '0',
            'tanggal_pemeliharaan'           => '',
            'nominal_pemeliharaan'           => '0',
        ];
        // dd($data);
        return view('laporan/view_data_kartu_asset', $data);
    }
}
