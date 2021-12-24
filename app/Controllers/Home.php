<?php

namespace App\Controllers;

use \App\Models\PegawaiModel;
// use \Myth\Auth\Entities\User;

class Home extends BaseController
{
    public function __construct()
    {
    }

//    function user()
//    {
//        $authenticate = service('authentication');
//        $authenticate->check();
//        return $authenticate->user();
//    }

    public function index()
    {
 //       $id = $this->user()->id;
        $data = [
            'title'         => 'Dashboard',
        ];
        // dd($data);
        return view('home/index', $data);
    }
}
