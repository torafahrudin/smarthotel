<?php

namespace App\Controllers\Aktiva;

use App\Controllers\BaseController;
use \App\Models\Aktiva\PerolehanModel;
use \App\Models\Aktiva\AktivaTetapModel;
use \App\Models\Aktiva\KelompokModel;
use \App\Models\CoaModel;
use \App\Models\VendorModel;
// use \App\Models\Laporan\KartuAssetModel;
// use \App\Models\Laporan\JurnalModel;

class Perolehan extends BaseController
{
    protected $perolehanModel;
    protected $aktivaTetapModel;
    protected $coaModel;
    protected $vendorModel;
    protected $kelompokModel;
    // protected $kartuAssetModel;
    // protected $jurnalModel;
    protected $session;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->perolehanModel = new PerolehanModel();
        $this->aktivaTetapModel = new AktivaTetapModel();
        $this->coaModel = new CoaModel();
        $this->vendorModel = new VendorModel();
        $this->kelompokModel = new KelompokModel();
        // $this->kartuAssetModel = new KartuAssetModel();
        // $this->jurnalModel = new JurnalModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Perolehan',
            'perolehan'             => $this->perolehanModel->getData(),
        ];
        return view('aktiva/perolehan/view_data_perolehan', $data);
    }

    public function add()
    {
        $data = [
            'title'                       => 'Tambah Data Perolehan',
            'vendor'                      => $this->vendorModel->getVendor(),
            'perolehan'                   => $this->perolehanModel->getData(),
            'id_detail_perolehan'         => $this->perolehanModel->code_detail_perolehan_ID(),
        ];
        $this->validation->setRules(['tanggal' => 'required']);
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data_session = array(
                'id_detail_perolehan'                   => $this->perolehanModel->code_detail_perolehan_ID(),
                'id_vendor'                             => $this->request->getPost('id_vendor'),
                'tanggal_perolehan'                     => $this->request->getPost('tanggal'),
            );
            $this->session->set($data_session);
            return redirect()->to('/aktiva/perolehan/add_detail');
        }
        return view('aktiva/perolehan/add_data_perolehan', $data);
    }

    public function add_detail()
    {
        $id_detail_perolehan = $this->session->get("id_detail_perolehan");
        $id_vendor = $this->session->get("id_vendor");
        $tanggal_perolehan = $this->session->get("tanggal_perolehan");

        $data = [
            'title'                       => 'Tambah Data Perolehan',
            'list_akun_tetap'             => $this->coaModel->getListAkunTetap(),
            'vendor'                      => $this->vendorModel->getVendor(),
            'perolehan'                   => $this->perolehanModel->getDataDetail($id_detail_perolehan),
            'list_kelompok'               => $this->kelompokModel->getListKelompok(),
        ];
        $this->validation->setRules(['jumlah' => 'required']);
        $isDataValid            = $this->validation->withRequest($this->request)->run();
        $jumlah                 = $this->request->getPost('jumlah');
        $originalDate           = $tanggal_perolehan;
        $newDate                = date("Y-m-d", strtotime($originalDate));
        // $id_jurnalD             = $this->jurnalModel->code_jurnal_IDD();
        // $id_jurnalK             = $this->jurnalModel->code_jurnal_IDK();


        if ($isDataValid) {
            $nama_aktiva = $this->perolehanModel->getNamaAktiva($this->request->getPost('id_aktiva'));
            $autoname_aktiva = strtok($nama_aktiva, " ");

            $total_perolehan        = $this->request->getPost('harga_perolehan') * $jumlah;
            $id_kelompok            = $this->request->getPost('id_kelompok');
            $masa_manfaat           = $this->kelompokModel->getAktivaManfaat($id_kelompok);
            $nilai_sisa_perbulan    = $masa_manfaat * 12;
            $estimasi_nilai_residu  = $this->request->getPost('harga_perolehan') * (10 / 100);
            $penyusutan_perbulan    = $this->request->getPost('harga_perolehan')  / $nilai_sisa_perbulan;
            $first                  = 1;
            $final                  = date('Y-m-d', strtotime($newDate . ' +' . $first . 'months'));

            $data_detail_perolehan = array(
                'id_detail_perolehan'   => $id_detail_perolehan,
                'id_trans_perolehan'    => $this->perolehanModel->code_perolehan_ID(),
                'tanggal'               => $newDate,
                'id_aktiva'             => $this->request->getPost('id_aktiva'),
                'jumlah'                => $jumlah,
                'harga_perolehan'       => $this->request->getPost('harga_perolehan'),
            );

            for ($i = 0; $i <= ((int)$jumlah - 1); $i++) {
                $code_perolehan = $this->perolehanModel->code_perolehan_ID();
                $code_aktiva = $this->aktivaTetapModel->code_num_aktiva_ID();
                $aktiva_num = str_pad($code_aktiva + $i, 5, 0, STR_PAD_LEFT);

                // insert perolehan
                $data_perolehan = array(
                    'id_trans_perolehan'    => $code_perolehan,
                    'tanggal'               => $newDate,
                    'id_aktiva'             => $this->request->getPost('id_aktiva'),
                    'id_vendor'             => $id_vendor,
                    'nama_aktiva'           => $nama_aktiva,
                    'keterangan'            => '',
                    'jumlah'                => $jumlah,
                    'harga_perolehan'       => $this->request->getPost('harga_perolehan'),
                    'masa_manfaat'          => $masa_manfaat,
                    'estimasi_nilai_residu' => $estimasi_nilai_residu,
                );

                //insert aktiva
                $data_aktiva[] = array(
                    'id_aktiva'             => $autoname_aktiva . '-' . $aktiva_num,
                    'tanggal'               => $newDate,
                    'keterangan'            => '',
                    'nama_aktiva'           => $nama_aktiva,
                    'status'                => 'Aktif Beroperasi',
                    'harga_perolehan'       => $this->request->getPost('harga_perolehan'),
                    'masa_manfaat'          => $masa_manfaat,
                    'penyusutan'            => $penyusutan_perbulan,
                    'id_trans_perolehan'    => $code_perolehan
                );

                //insert kartu asset perbulan
                $bulan_pertama[] = array(
                    'bulan'                         => $newDate,
                    'id_aktiva'                     => $autoname_aktiva . '-' . $aktiva_num,
                    'penyusutan'                    => $penyusutan_perbulan,
                );

                for ($a = 0; $a <= (int)$nilai_sisa_perbulan - 2; $a++) {
                    $final_second = date('Y-m-d', strtotime($final . ' +' . $a . 'months'));
                    $bulan_selanjutnya[] = array(
                        'bulan'                     => $final_second,
                        'id_aktiva'                 => $autoname_aktiva . '-' . $aktiva_num,
                        'penyusutan'                => $penyusutan_perbulan,
                    );
                }
            }

            //insert jurnal
            $jurnal = [
                [
                    'id_jurnal'     => $id_jurnalD,
                    'tanggal'       => $newDate,
                    'id_akun'       => 121,
                    'nominal'       => $total_perolehan,
                    'posisi'        => 'd',
                    'debet'         => $total_perolehan,
                    'kredit'        => 0,
                    'reff'          => $code_perolehan,
                    'transaksi'     => 'Perolehan Aktiva'
                ],
                [
                    'id_jurnal'     => $id_jurnalK,
                    'tanggal'       => $newDate,
                    'id_akun'       => 111,
                    'nominal'       => $total_perolehan,
                    'posisi'        => 'k',
                    'debet'         => 0,
                    'kredit'        => $total_perolehan,
                    'reff'          => $code_perolehan,
                    'transaksi'     => 'Perolehan Aktiva'
                ],
            ];
            // dd($data_detail_perolehan, $data_perolehan, $data_aktiva, $bulan_pertama, $bulan_selanjutnya, $jurnal);
            $this->perolehanModel->createPerolehanDetail($data_detail_perolehan);
            $this->perolehanModel->createPerolehan($data_perolehan);
            $this->aktivaTetapModel->createAktivaTetap($data_aktiva);
            // $this->kartuAssetModel->createPenyusutanBulanPertama($bulan_pertama);
            // $this->kartuAssetModel->createPenyusutanBulanSelanjutnya($bulan_selanjutnya);
            // $this->jurnalModel->createOrderJurnal($jurnal);
            session()->setFlashdata('success', 'Data Perolehan Berhasil Ditambahkan');
            return redirect()->to('/aktiva/perolehan/add_detail');
        }

        return view('aktiva/perolehan/add_data_detail_perolehan', $data);
    }

    public function selesai()
    {
        unset($_SESSION['id_detail_perolehan']);
        unset($_SESSION['id_vendor']);
        unset($_SESSION['tanggal_perolehan']);
        session()->setFlashdata('success', 'Data Perolehan Berhasil Disimpan');
        return redirect()->to('/aktiva/perolehan');
    }
}
