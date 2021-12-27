<?php

namespace App\Controllers;

use \App\Models\RoomTipeModel;

class RoomTipe extends BaseController
{
    protected $rtModel;

    public function __construct()
    {
        $this->rtModel = new RoomTipeModel();
    }

    public function index()
    {
        $data = [
            'title'             => 'Data Tipe Kamar',
            'room_tipe'         => $this->rtModel->getRoomTipe(),
        ];
        return view('kamar/view_data_tipe_kamar', $data);
    }
}
