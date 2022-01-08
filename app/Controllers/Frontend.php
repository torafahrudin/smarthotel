<?php

namespace App\Controllers;

use Myth\Auth\Authorization\GroupModel;
use \App\Models\RoomModel;
use \App\Models\HeaderBillingModel;
use \App\Models\SubBillingModel;
use \App\Models\RtbModel;

// use \Myth\Auth\Entities\User;

class Frontend extends BaseController
{
    protected $roomModel;
    protected $hdModel;
    protected $sbModel;
    protected $RtbModel;

    public function __construct()
    {
        $this->roomModel = new RoomModel();
        $this->hdModel = new HeaderBillingModel();
        $this->sbModel = new SubBillingModel();
        $this->RtbModel = new RtbModel();
    }

    function user()
    {
        $authenticate = service('authentication');
        $authenticate->check();
        return $authenticate->user();
    }

    public function index()
    {
        $data = [
            'title'         => 'Hotel Ahadiat',
            'room'          => $this->roomModel->getListRoom(),
            'bill'      => $this->RtbModel->getOrder(),
        ];
        return view('frontend/index', $data);
    }
}
