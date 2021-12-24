<?php

namespace App\Controllers;

use \App\Models\RtbModel;

class Rtb extends BaseController
{
    function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->RtbModel = new RtbModel();
    }
    public function index()
    {
        $data = [
            'title'     => 'Data Real Time Billing',
            'order'     => $this->RtbModel->GetOrder(),
            'rtb'       => $this->RtbModel->GetAll(),
        ];
        echo view('Rtb/ListRtb', $data);
    }
    function priceGet()
    {
        $id = $this->input->post('id');
        $data = $this->RtbModel->Price($id);
        echo json_encode($data);
    }
    public function ubahstatus($id)
    {
        $edit = $this->RtbModel->ubahstatus($id);
        return redirect()->to('Rtb');
    }
}
