<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title'       => 'Dashboard',
            'page_title'  => 'Dashboard',
            'menu'        => $this->menu->get_menu()
        ];
        return view('dashboard', $data);
    }
}
