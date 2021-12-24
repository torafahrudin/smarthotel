<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;

class MainController extends BaseController
{
    public function index()
    {
        $data = [
            'title'       => 'Dashboard',
            'page_title'  => 'Dashboard',
            'menu'        => $this->menu->get_menu()
        ];
        return view('front/main', $data);
    }

    public function load_view()
    {
        $view = $this->request->getGet('page');

        return view('front/' . $view);
    }
}
