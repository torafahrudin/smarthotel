<?php

namespace App\Controllers\Aktiva;

use App\Controllers\BaseController;
use \App\Models\Aktiva\AktivaTetapModel;

class AktivaTetap extends BaseController
{
    protected $validation;
    protected $aktivaTetapModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->aktivaTetapModel = new aktivaTetapModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Aktiva Tetap',
            'aktiva_tetap'              => $this->aktivaTetapModel->getAktivaTetap(),
        ];
        return view('aktiva/aktiva_tetap/view_data_aktiva_tetap', $data);
    }
}
