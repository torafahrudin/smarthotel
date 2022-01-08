<?php

namespace App\Controllers;

use \App\Models\OrderRoomModel;
use \App\Models\CustomerModel;
use \App\Models\RoomModel;
use \App\Models\Laporan\JurnalModel;
use Config\App as ConfigApp;

class Order extends BaseController
{
    protected $orderRoomModel;
    protected $customerModel;
    protected $roomModel;
    protected $jurnalModel;
    protected $QR;
    protected $link;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->orderRoomModel = new OrderRoomModel();
        $this->customerModel = new CustomerModel();
        $this->roomModel = new RoomModel();
        $this->jurnalModel = new JurnalModel();
        $this->QR = new QR();
        $this->link = new ConfigApp();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Order',
            'list'                  => $this->orderRoomModel->getDataAll(),
        ];
        // dd($data);
        return view('order/view_data_order', $data);
    }

    public function all()
    {
        $data = [
            'title'                 => 'Data Booking',
            'list'                  => $this->orderRoomModel->getDataBooking(),
            'data_list'             => $this->orderRoomModel->getDataAll(),
        ];
        return view('order/view_data_order', $data);
    }

    public function booking()
    {
        $data = [
            'title'                 => 'Data Booking',
            'list'                  => $this->orderRoomModel->getDataBooking(),
            'data_list'             => $this->orderRoomModel->getDataAll(),
        ];

        return view('order/view_data_booking', $data);
    }

    public function checkin()
    {
        $data = [
            'title'                 => 'Data Checkin',
            'list'                  => $this->orderRoomModel->getDataCheckin(),
        ];
        return view('order/view_data_checkin', $data);
    }

    public function addBooking()
    {
        $data = [
            'title'                     => 'Tambah Data Checkin',
            'id_booking'                => $this->orderRoomModel->code_booking_ID(),
            'customer'                  => $this->customerModel->getCustomer(),
            'kamar'                     => $this->roomModel->getListRoom(),
            'fasilitas'                 => $this->roomModel->getListFasilitas(),
        ];

        $this->validation->setRules(['id_customer' => 'required']);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        $id_order = $this->orderRoomModel->code_order_ID();

        if ($isDataValid) {
            $tgl            = date('Y-m-d');
            $tanggal_awal   = $this->request->getPost('tanggal_in');
            $tanggal_akhir  = $this->request->getPost('tanggal_out');
            $cust           = substr($this->request->getPost('id_customer'), 4);
            $booking        = $this->orderRoomModel->code_booking_ID();
            $id_kamar       = $this->request->getPost('id_kamar');
            $id_fasilitas   = $this->request->getPost('id_fasilitas');
            $jumlah_kamar   = $this->request->getPost('kamar');

            if ($id_kamar != '') {
                $header         = $this->orderRoomModel->getHeader($id_kamar);
                $sub            = $this->orderRoomModel->getSub($id_kamar);
                $id_booking     = $booking . '-' . $header . $sub . '-' . $cust;
                $diff       = abs(strtotime($tanggal_akhir) - strtotime($tanggal_awal));
                $years      = floor($diff / (365 * 60 * 60 * 24));
                $months     = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                $days       = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                $price_kamar      = $this->roomModel->getPriceRoom($id_kamar);
                $total_kamar      = $price_kamar * $days;
                $total_price_kamar = $total_kamar * $jumlah_kamar;
                if ($id_fasilitas != '') {
                    $price_fasilitas          = $this->roomModel->getPriceFasilitas($id_fasilitas);
                    $total_price_fasilitas    = $price_fasilitas * $days;

                    $data = array(
                        'id_order' => $this->orderRoomModel->code_order_ID(),
                        'id_customer' => $this->request->getPost('id_customer'),
                        'id_kamar' => $id_kamar,
                        'id_fasilitas' => $id_fasilitas,
                        'id_booking' => $id_booking,
                        'tanggal' => $tgl,
                        'kamar' => $this->request->getPost('kamar'),
                        'dewasa' => $this->request->getPost('dewasa'),
                        'anak' => $this->request->getPost('anak'),
                        'checkin' => $tanggal_awal,
                        'checkout' => $tanggal_akhir,
                        'harga_kamar' => $total_price_kamar,
                        'harga_fasilitas' => $total_price_fasilitas,
                        'status_order' => 'Booking'
                    );

                    $dataBooking = array(
                        'id_booking' => $id_booking,
                        'tanggal_checkin' => $tanggal_awal,
                        'tanggal_checkout' => $tanggal_akhir,
                        'kamar' => $this->request->getPost('kamar'),
                        'dewasa' => $this->request->getPost('dewasa'),
                        'dewasa' => $this->request->getPost('dewasa'),
                        'anak' => $this->request->getPost('anak'),
                        'status' => 'Booking'
                    );
                } else {

                    $data = array(
                        'id_order' => $this->orderRoomModel->code_order_ID(),
                        'id_customer' => $this->request->getPost('id_customer'),
                        'id_kamar' => $id_kamar,
                        'id_booking' => $id_booking,
                        'tanggal' => $tgl,
                        'kamar' => $this->request->getPost('kamar'),
                        'dewasa' => $this->request->getPost('dewasa'),
                        'anak' => $this->request->getPost('anak'),
                        'checkin' => $tanggal_awal,
                        'checkout' => $tanggal_akhir,
                        'harga_kamar' => $total_price_kamar,
                        'status_order' => 'Booking'
                    );
                    $dataBooking = array(
                        'id_booking' => $id_booking,
                        'tanggal_checkin' => $tanggal_awal,
                        'tanggal_checkout' => $tanggal_akhir,
                        'kamar' => $this->request->getPost('kamar'),
                        'dewasa' => $this->request->getPost('dewasa'),
                        'dewasa' => $this->request->getPost('dewasa'),
                        'anak' => $this->request->getPost('anak'),
                        'status' => 'Booking'
                    );
                }

                $uri = $this->link->baseURL;
                $urlCheckin = $uri . 'order/updateCheckinViaQrCode/' . $id_order;

                $this->orderRoomModel->createOrder($data);
                $this->orderRoomModel->createOrderBooking($dataBooking);
                $this->QR->add_data($id_order, $urlCheckin);
                session()->setFlashdata('success', 'Data Order Berhasil Ditambahkan');
                return redirect()->to('/order/booking');
            } else {
                $header         = $this->orderRoomModel->getHeaderFasilitas($id_fasilitas);
                $sub            = $this->orderRoomModel->getSubFasilitas($id_fasilitas);
                $id_booking     = $booking . '-' . $header . $sub . '-' . $cust;

                $diff           = abs(strtotime($tanggal_akhir) - strtotime($tanggal_awal));
                $years          = floor($diff / (365 * 60 * 60 * 24));
                $months         = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                $days           = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                $price          = $this->roomModel->getPriceFasilitas($id_fasilitas);
                $daysnew        =  $days + 1;
                $total_price    = $price * $daysnew;

                $data = array(
                    'id_order' => $this->orderRoomModel->code_order_ID(),
                    'id_customer' => $this->request->getPost('id_customer'),
                    'id_fasilitas' => $id_fasilitas,
                    'id_booking' => $id_booking,
                    'tanggal' => $tgl,
                    'checkin' => $tanggal_awal,
                    'checkout' => $tanggal_akhir,
                    'harga_fasilitas' => $total_price,
                    'status_order' => 'Booking'
                );

                $dataBooking = array(
                    'id_booking' => $id_booking,
                    'tanggal_checkin' => $tanggal_awal,
                    'tanggal_checkout' => $tanggal_akhir,
                    'status' => 'Booking'
                );

                // dd($total_price, $price, $days);
                $uri = $this->link->baseURL;
                $urlCheckin = $uri . 'order/updateCheckinViaQrCode/' . $id_order;

                $this->orderRoomModel->createOrder($data);
                $this->orderRoomModel->createOrderBooking($dataBooking);
                $this->QR->add_data($id_order, $urlCheckin);
                session()->setFlashdata('success', 'Data Order Berhasil Ditambahkan');
                return redirect()->to('/order/booking');
            }
        }

        return view('order/add_data_booking', $data);
    }

    public function addCheckin()
    {
        $data = [
            'title'                     => 'Tambah Data Checkin',
            'id_order'                  => $this->orderRoomModel->code_order_ID(),
            'customer'                  => $this->customerModel->getCustomer(),
            'kamar'                     => $this->roomModel->getListRoom(),
        ];

        $this->validation->setRules(['id_customer' => 'required']);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        $harga = $this->roomModel->getPriceRoom($this->request->getPost('id_kamar'));

        if ($isDataValid) {
            $tgl = date('Y-m-d');
            $tanggal_awal   = $this->request->getPost('tanggal_in');
            $tanggal_akhir  = $this->request->getPost('tanggal_out');
            $data = array(
                'id_order' => $this->orderRoomModel->code_order_ID(),
                'id_customer' => $this->request->getPost('id_customer'),
                'id_kamar' => $this->request->getPost('id_kamar'),
                'tanggal' => $tgl,
                'dewasa' => $this->request->getPost('dewasa'),
                'anak' => $this->request->getPost('anak'),
                'checkin' => $tanggal_awal,
                'checkout' => $tanggal_akhir,
                'status_order' => 'Checkin'
            );

            // $this->orderRoomModel->createOrder($data);
            // session()->setFlashdata('success', 'Data Order Berhasil Ditambahkan');
            // return redirect()->to('/order/checkin');
        }

        return view('order/add_data_checkin', $data);
    }

    public function updateCheckin()
    {
        $id = $this->request->getPost('id_order');
        $id_kamar = $this->request->getPost('id_kamar');
        $checkin = $this->request->getPost('checkin');
        $checkout = $this->request->getPost('checkout');
        $id_jurnalD = $this->jurnalModel->code_jurnal_IDD();
        $id_jurnalK = $this->jurnalModel->code_jurnal_IDK();
        $total_price = $this->roomModel->getPriceJurnal($id);
        $date = date('Y-m-d');
        $data = array(
            'status_order' => 'Checkin'
        );
        $jurnal = [
            [
                'id_jurnal' => $id_jurnalD,
                'tanggal' => $date,
                'id_akun' => 113,
                'nominal' => $total_price,
                'posisi' => 'd',
                'debet' => $total_price,
                'kredit' => 0,
                'reff' => $id,
                'transaksi' => 'Checkin'
            ],
            [
                'id_jurnal' => $id_jurnalK,
                'tanggal' => $date,
                'id_akun' => 412,
                'nominal' => $total_price,
                'posisi' => 'k',
                'debet' => 0,
                'kredit' => $total_price,
                'reff' => $id,
                'transaksi' => 'Checkin'
            ],
        ];

        // dd($id_kamar, $id, $price, $checkin, $checkout, $days, $total_price, $jurnal);
        $this->orderRoomModel->updateOrderCheckin($data, $id);
        $this->jurnalModel->createOrderJurnal($jurnal);

        session()->setFlashdata('success', 'Data Customer Berhasil Checkin');

        return redirect()->to('/order');
    }

    public function updateCheckinViaQrCode($id_order)
    {
        $data = array(
            'status_order' => 'Checkin'
        );
        $this->orderRoomModel->updateOrderCheckinViaQrCode($data, $id_order);
        session()->setFlashdata('success', 'Data Customer Berhasil Checkin');

        return redirect()->to('/order');
    }

    public function detail($id_order)
    {
        $data = [
            'title'                     => 'Detail Data Booking',
            'order'                     => $this->orderRoomModel->getDataDetail($id_order),
        ];
        // dd($data);

        return view('order/view_data_detail_order', $data);
    }
}
