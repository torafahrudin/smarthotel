<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Front\CartModel;

class CartController extends BaseController
{

    public function __construct()
    {
        $this->cart = new CartModel();
    }

    public function index()
    {
        $data = $this->cart->get();
        echo json_encode($data);
    }

    public function get_total()
    {
        $data = $this->cart->get_count();
        echo json_encode($data);
    }

    public function store()
    {
        $kode = $this->cart->trans_id();
        $data = [
            'kode'  => $kode,
            'kode_produk' => $this->request->getPost('kode_produk')
        ];

        $res = $this->cart->store($data);

        echo json_encode($res);
    }
    public function destroy()
    {
        $kode = $this->request->getGet('kode');
        $req = $this->cart->destroy($kode);

        echo json_encode($req);
    }
}
