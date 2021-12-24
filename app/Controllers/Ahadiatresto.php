<?php

namespace App\Controllers;

// use App\Models\AsosiasiruleModel;

class Ahadiatresto extends BaseController
{    public function __construct()
    {   session_start();
         // $this->AsosiasiruleModel = new AsosiasiruleModel();
    }
    public function index()
    {   
        // echo view('Home/index');
        echo view('front/main');
        echo view('front/cart');
         echo view('front/checkout');
         echo view('front/home');
    }
}