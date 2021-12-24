<?php

namespace App\Controllers\HouseKeeping;

use App\Controllers\BaseController;
use \App\Models\OrderRoomModel;
use \App\Models\RoomModel;

class OrderCheckin extends BaseController
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
            'list'                  => $this->orderRoomModel->getDataCheckin(),
        ];
        return view('housekeeping/view_data_checkin', $data);
    }
}
