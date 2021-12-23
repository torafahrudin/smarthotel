<?php

namespace App\Controllers;

use Myth\Auth\Authorization\GroupModel;

// use \Myth\Auth\Entities\User;

class Frontend extends BaseController
{
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
        ];
        return view('frontend/index', $data);
    }
}
