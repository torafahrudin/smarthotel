<?php

namespace App\Controllers\HouseKeeping;

use App\Controllers\BaseController;
use \App\Models\OrderRoomModel;
use \App\Models\RoomModel;

class OrderCheckout extends BaseController
{
    protected $orderRoomModel;
    protected $roomModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->orderRoomModel = new OrderRoomModel();
        $this->roomModel = new RoomModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Order Room',
            'list'                  => $this->orderRoomModel->getDataCheckout(),
        ];
        return view('housekeeping/view_data_checkout', $data);
    }

    public function check($id_order = '')
    {
        $data = [
            'title'                 => 'Data Order Room',
            'list'                  => $this->orderRoomModel->getDataCheckout(),
        ];
        return view('housekeeping/view_data_checkout', $data);
    }
}
