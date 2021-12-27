<?php

namespace App\Controllers;

use \App\Models\OrderRoomModel;
use \App\Models\CustomerModel;
use \App\Models\RoomModel;
// use \App\Models\Laporan\JurnalModel;

class Order extends BaseController
{
    protected $orderRoomModel;
    protected $customerModel;
    protected $roomModel;
    // protected $jurnalModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->orderRoomModel = new OrderRoomModel();
        $this->customerModel = new CustomerModel();
        $this->roomModel = new RoomModel();
        // $this->jurnalModel = new JurnalModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Order',
            'list'                  => $this->orderRoomModel->getDataAll(),
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
            'id_booking'                  => $this->orderRoomModel->code_booking_ID(),
            'customer'                  => $this->customerModel->getCustomer(),
            'kamar'                     => $this->roomModel->getListRoom(),
        ];

        $this->validation->setRules(['id_customer' => 'required']);
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $tgl            = date('Y-m-d');
            $tanggal_awal   = substr($this->request->getPost('tanggal_in_out'), 0, -22);
            $tanggal_akhir  = substr($this->request->getPost('tanggal_in_out'), -19);
            $cust           = substr($this->request->getPost('id_customer'), 4);
            $booking        = $this->orderRoomModel->code_booking_ID();
            $id_kamar       = $this->request->getPost('id_kamar');
            $header         = $this->orderRoomModel->getHeader($id_kamar);
            $sub            = $this->orderRoomModel->getSub($id_kamar);
            $id_booking     = $booking . '-' . $header . $sub . '-' . $cust;
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
            $this->orderRoomModel->createOrder($data);
            $this->orderRoomModel->createOrderBooking($dataBooking);
            session()->setFlashdata('success', 'Data Order Berhasil Ditambahkan');
            return redirect()->to('/order/booking');
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
            $tanggal_awal = substr($this->request->getPost('tanggal_in_out'), 0, -22);
            $tanggal_akhir = substr($this->request->getPost('tanggal_in_out'), -19);
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
        // $id_jurnalD = $this->jurnalModel->code_jurnal_IDD();
        // $id_jurnalK = $this->jurnalModel->code_jurnal_IDK();
        $diff = abs(strtotime($checkout) - strtotime($checkin));
        $years   = floor($diff / (365 * 60 * 60 * 24));
        $months  = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days    = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        $price = $this->roomModel->getPriceRoom($id_kamar);
        $total_price = $price * $days;
        $date = date('Y-m-d');
        $data = array(
            'status_order' => 'Checkin'
        );
        // $jurnal = [
        //     [
        //         'id_jurnal' => $id_jurnalD,
        //         'tanggal' => $date,
        //         'id_akun' => 111,
        //         'nominal' => $total_price,
        //         'posisi' => 'd',
        //         'debet' => $total_price,
        //         'kredit' => 0,
        //         'reff' => $id,
        //         'transaksi' => 'Checkin'
        //     ],
        //     [
        //         'id_jurnal' => $id_jurnalK,
        //         'tanggal' => $date,
        //         'id_akun' => 412,
        //         'nominal' => $total_price,
        //         'posisi' => 'k',
        //         'debet' => 0,
        //         'kredit' => $total_price,
        //         'reff' => $id,
        //         'transaksi' => 'Checkin'
        //     ],
        // ];

        // dd($id_kamar, $id, $price, $checkin, $checkout, $days, $total_price, $jurnal);
        $this->orderRoomModel->updateOrderCheckin($data, $id);
        // $this->jurnalModel->createOrderJurnal($jurnal);

        session()->setFlashdata('success', 'Data Customer Berhasil Checkin');

        return redirect()->to('/order/booking');
    }
}
