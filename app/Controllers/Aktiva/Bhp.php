<?php

namespace App\Controllers\Aktiva;

use App\Controllers\BaseController;
use \App\Models\Aktiva\BhpModel;

class Bhp extends BaseController
{
    protected $validation;
    protected $bhpModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->bhpModel = new BhpModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data BHP',
            'bhp'                   => $this->bhpModel->getBhp(),
        ];
        return view('aktiva/bhp/view_data_bhp', $data);
    }
}
