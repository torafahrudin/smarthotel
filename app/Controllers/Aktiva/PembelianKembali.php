<?php

namespace App\Controllers\Aktiva;

use App\Controllers\BaseController;
use \App\Models\Aktiva\PembelianKembaliModel;
use \App\Models\Aktiva\EoqModel;
use \App\Models\CoaModel;
use \App\Models\VendorModel;
use \App\Models\Laporan\JurnalModel;

class PembelianKembali extends BaseController
{
    protected $pembelianKembaliModel;
    protected $aktivaTetapModel;
    protected $eoqModel;
    protected $coaModel;
    protected $session;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->pembelianKembaliModel = new PembelianKembaliModel();
        $this->aktivaTetapModel = new AktivaTetapModel();
        $this->eoqModel = new EoqModel();
        $this->coaModel = new CoaModel();
        $this->vendorModel = new VendorModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Pembelian Kembali',
            'pembelian'             => $this->pembelianKembaliModel->getData(),
            'eoq_rop'               => $this->eoqModel->getEoqRop(),
        ];

        $data_session = array(
            'id_detail_perolehan'   => $this->pembelianKembaliModel->code_detail_pembelian_kembali_ID(),
        );
        $this->session->set($data_session);
        return view('aktiva/pembelian_kembali/view_data_pembelian_kembali', $data);
    }

    public function add()
    {
        $data = [
            'title'                        => 'Tambah Data Pembelian Kembali',
            'list_akun_lancar'             => $this->coaModel->getListAkunLancar(),
            'vendor'                       => $this->vendorModel->getVendor(),
            'detail'                       => $this->pembelianKembaliModel->getDataDetail($this->session->get("id_detail_perolehan")),
        ];
        $this->validation->setRules(['jumlah' => 'required']);
        $isDataValid            = $this->validation->withRequest($this->request)->run();
        $originalDate           = $this->request->getPost('tanggal');
        $newDate                = date("Y-m-d", strtotime($originalDate));

        if ($isDataValid) {
            $nama_aktiva            = $this->pembelianKembaliModel->getNamaAktiva($this->request->getPost('id_aktiva'));
            $id_detail_perolehan    = $this->session->get("id_detail_perolehan");
            $jumlah                 = $this->request->getPost('jumlah');
            $ongkir                 = $this->request->getPost('ongkir');
            $harga_perolehan        = $this->request->getPost('harga_perolehan');
            $total_perolehan        = $harga_perolehan * $jumlah;
            $total                  = 2 * (int)$jumlah * ($jumlah * 1000) / $harga_perolehan;
            $eoq                    = sqrt($total);

            $data_detail_perolehan = array(
                'id_detail_perolehan'   => $id_detail_perolehan,
                'id_trans_perolehan'    => $this->pembelianKembaliModel->code_perolehan_ID(),
                'tanggal'               => $newDate,
                'id_aktiva'             => $this->request->getPost('id_aktiva'),
                'jumlah'                => $jumlah,
                'harga_perolehan'       => $harga_perolehan,
            );

            $data_eoq = array(
                'id_aktiva'             => $this->request->getPost('id_aktiva'),
                'tanggal'               => $newDate,
                'total_barang'          => $jumlah,
                'ongkir'                => $ongkir,
                'harga_unit'            => $harga_perolehan,
                'total'                 => $total,
                'eoq'                   => $eoq
            );

            for ($i = 0; $i <= ((int)$jumlah - 1); $i++) {
                $code_perolehan = $this->pembelianKembaliModel->code_perolehan_ID();
                $code_aktiva = $this->aktivaTetapModel->code_num_aktiva_lancar_ID();
                $aktiva_num = str_pad($code_aktiva + $i, 5, 0, STR_PAD_LEFT);

                // insert perolehan lancar
                $data_perolehan = array(
                    'id_trans_perolehan'    => $code_perolehan,
                    'tanggal'               => $newDate,
                    'id_aktiva'             => $this->request->getPost('id_aktiva'),
                    'id_vendor'             => $this->request->getPost('id_vendor'),
                    'nama_aktiva'           => $nama_aktiva,
                    'keterangan'            => $this->request->getPost('keterangan'),
                    'jumlah'                => $jumlah,
                    'harga_perolehan'       => $harga_perolehan,
                );

                //insert aktiva
                $data_aktiva[] = array(
                    'id_aktiva'             => 'BHP-' . $aktiva_num,
                    'tanggal'               => $newDate,
                    'keterangan'            => $this->request->getPost('keterangan'),
                    'nama_aktiva'           => $nama_aktiva,
                    'status'                => 'Gudang',
                    'harga_perolehan'       => $harga_perolehan,
                    'id_trans_perolehan'    => $code_perolehan
                );
            }

            // $jurnal = [
            //     [
            //         'id_jurnal'     => $id_jurnalD,
            //         'tanggal'       => $newDate,
            //         'id_akun'       => 112,
            //         'nominal'       => $total_perolehan,
            //         'posisi'        => 'd',
            //         'debet'         => $total_perolehan,
            //         'kredit'        => 0,
            //         'reff'          => $code_perolehan,
            //         'transaksi'     => 'Perolehan Aktiva'
            //     ],
            //     [
            //         'id_jurnal'     => $id_jurnalK,
            //         'tanggal'       => $newDate,
            //         'id_akun'       => 111,
            //         'nominal'       => $total_perolehan,
            //         'posisi'        => 'k',
            //         'debet'         => 0,
            //         'kredit'        => $total_perolehan,
            //         'reff'          => $code_perolehan,
            //         'transaksi'     => 'Perolehan Aktiva'
            //     ],
            // ];

            $kartu = array(
                'id_stok'                   => $id_stok,
                'id_aktiva'                 => $this->request->getPost('id_aktiva'),
                'tanggal'                   => $newDate,
                // 'pembelian_unit'       => $newDate,
                // 'pembelian_harga'       => $newDate,
                // 'pembelian_total'       => $newDate,
                // 'pemakaian_unit'       => $newDate,
                // 'pemakaian_harga'       => $newDate,
                // 'pemakaian_total'       => $newDate,
                'unit_akhir'                => $jumlah,
                'harga_akhir'               => $harga_perolehan,
                'total_akhir'               => $total_perolehan,
            );

            // dd($data_detail_perolehan, $data_eoq, $data_perolehan, $data_aktiva, $jurnal);
            $this->pembelianKembaliModel->createPembelianKembaliDetail($data_detail_perolehan);
            $this->pembelianKembaliModel->createPembelianKembali($data_perolehan);
            $this->aktivaTetapModel->createAktivaLancar($data_aktiva);
            $this->eoqModel->createOrderEoq($data_eoq);
            $this->jurnalModel->createOrderJurnal($jurnal);
            $this->kartuStokModel->createKartuStok($kartu);
            session()->setFlashdata('success', 'Data Pembelian Berhasil Ditambahkan');
            return redirect()->to('/aktiva/pembeliankembali/add');
        }

        return view('aktiva/pembelian_kembali/add_data_pembelian_kembali', $data);
    }

    public function selesai()
    {
        unset($_SESSION['id_detail_perolehan']);
        session()->setFlashdata('success', 'Data Berhasil Disimpan');
        return redirect()->to('/aktiva/pembeliankembali');
    }

    public function fetch_eoq()
    {

        $id_aktiva      = $this->request->getPost('id_aktiva');
        $start_date     = date("Y-m-d", strtotime($this->request->getPost('tanggal')));;
        $time           = strtotime($start_date);
        $month          = date("m", $time);
        $year           = date("Y", $time);
        $tahun_lalu     = $year - 1;

        $data = $this->eoqModel->getEoqCalculate($id_aktiva, $tahun_lalu);

        echo json_encode($data);
    }


    public function addNilai()
    {
        $data = [
            'title'                        => 'Input Data Perhitungan',
            'list_akun_lancar'             => $this->coaModel->getListAkunLancar(),
            'list_eoq'                     => []
        ];

        $this->validation->setRules(['id_aktiva' => 'required']);
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $id_aktiva = $this->request->getPost('id_aktiva');

            $data = [
                'title'                        => 'Input Data Perhitungan',
                'list_eoq'             => $this->eoqModel->getEoqData($id_aktiva),
                'list_akun_lancar'             => $this->coaModel->getListAkunLancar(),
            ];
            $data_session_aktiva = array(
                'id_detail_perolehan'   => $id_aktiva,
            );
            $this->session->set($data_session_aktiva);
            return view('aktiva/pembelian_kembali/add_data_nilai', $data);
        }

        return view('aktiva/pembelian_kembali/add_data_nilai', $data);
    }

    public function rop()
    {
        $id_aktiva    = $this->session->get("id_detail_perolehan");
        $safety_point = $this->request->getPost('safety') / 100;
        $lead_time = $this->request->getPost('lead');
        $quantity = $this->request->getPost('eoq');
        $nilai_rop = (int) ($safety_point + ($lead_time * $quantity));
        $data = array(
            'bhp' => $id_aktiva,
            'eoq' => $quantity,
            'rop' => $nilai_rop
        );
        $this->eoqModel->createEoqRop($data);
        session()->setFlashdata('success', 'Data ROP Berhasil Ditambahkan');
        return redirect()->to('/aktiva/pembeliankembali');
    }

    //_______________________Dihide karena perubahan perhitungan EOQ_____________________//


    // public function addNilai()
    // {
    //     $data = [
    //         'title'                        => 'Input Data Perhitungan',
    //         'list_akun_lancar'             => $this->coaModel->getListAkunLancar(),
    //     ];

    //     $this->validation->setRules(['bulan' => 'required']);
    //     $isDataValid = $this->validation->withRequest($this->request)->run();
    //     $isDataValid = $this->validation->withRequest($this->request)->run();

    //     if ($isDataValid) {
    //         $tanggal =  $this->request->getPost('bulan');
    //         $unit = $this->request->getPost('unit');
    //         $harga = $this->request->getPost('harga');

    //         $nilai_eoq = 0;
    //         $nilai_rop = 0;
    //         for ($i = 0; $i < sizeof($unit); $i++) {
    //             $ongkir = $unit[$i] * 1000;
    //             $total = 2 * (int)$unit[$i] * ($unit[$i] * 1000) / $harga[$i];
    //             $eoq = sqrt($total);
    //             $nilai_eoq += $eoq;
    //             $dataInput[] = array(
    //                 'id_aktiva' =>  $this->request->getPost('id_aktiva'),
    //                 'tanggal' => $tanggal[$i],
    //                 'total_barang' => $unit[$i],
    //                 'ongkir' => $ongkir,
    //                 'harga_unit' => $harga[$i],
    //                 'total' => $total,
    //                 'eoq' => $eoq
    //             );
    //         }

    //         $safety_point = $this->request->getPost('safety') / 100;
    //         $lead_time = $this->request->getPost('lead');
    //         $quantity = $nilai_eoq;
    //         $nilai_rop = (int) ($safety_point + ($lead_time * $quantity));
    //         $dataHitung = array(
    //             'bhp' => $this->request->getPost('id_aktiva'),
    //             'eoq' => $nilai_eoq,
    //             'rop' => $nilai_rop
    //         );

    //         $this->eoqModel->createEoq($dataInput);
    //         $this->eoqModel->createEoqRop($dataHitung);
    //         session()->setFlashdata('success', 'Data Perhitungan Berhasil Ditambahkan');
    //         return redirect()->to('/aktiva/pembeliankembali');
    //     }

    //     return view('aktiva/pembelian_kembali/add_data_nilai', $data);
    // }
}
