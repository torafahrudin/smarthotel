<?php

namespace App\Controllers;

use \App\Models\RtbModel;
use \App\Models\PaymentModel;

class Rtb extends BaseController
{
    function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->RtbModel = new RtbModel();
        $this->PaymentModel = new PaymentModel();
    }
    public function index()
    {
        $data = [
            'title'     => 'Data Real Time Billing', //judul
            'cust'     => $this->RtbModel->getCustBill(), //ini untuk manggil di view 
        ];
        echo view('Rtb/ListRtb', $data); // bakal nge load ke list rtb
    }
    public function billing($id_customer)
    {
        $data = [
            'title'     => 'Detail Real Time Billing Customer', //judul
            'order'     => $this->PaymentModel->GetInfoPaymentPerProduct($id_customer), //ini untuk manggil di view 
        ];
        echo view('Rtb/ListDetailRtb', $data); // bakal nge load ke list rtb
    }
    public function ubahstatus($id_customer)
    {
        $edit = $this->RtbModel->ubahstatus($id_customer);
        return redirect()->to('Rtb');
    }
}
