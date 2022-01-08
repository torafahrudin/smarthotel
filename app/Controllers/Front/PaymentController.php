<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Front\CartModel;

class PaymentController extends BaseController
{

    public function __construct()
    {
        $this->cart = new CartModel();
    }

    public function index()
    {
        $cart = $this->cart->get();
        // Required
        $total = 0;
foreach ($bill as $row) :
    $item_details[] = array(
        'id' => $row->id_kamar,
        'price' => $row->harga,
        'quantity' => 1,
        'name' => $row->id_kamar
    );
    $total = $total + $row->harga;
        }

        $transaction_details = array(
            // 'order_id' => $this->cart->payment_id(),
            'order_id' => 'HTL-BILL.' . rand(),
            'gross_amount' => $total, // no decimal allowed for creditcard
        );
        $payment_type = 'gopay';
        $gopay_config = [
            'enable_callback' => true,
            'callback_url' => 'someapps://callback'
        ];

        $params = [
            'transaction_details'   => $transaction_details,
            'item_details'          => $item_details,
            'payment_type'          => $payment_type,
            'gopay'                 => $gopay_config
        ];

        $response =  \Midtrans\CoreApi::charge($params);

        $json_response = json_encode($response);

        $response_decode = json_decode($json_response, true);

        $sales = $params;

        $this->cart->insert_payment($response_decode, $params);

        $res = [
            'status' => true,
            'message' => 'Please Complete the payment',
            'data'    => $response_decode
        ];
        echo json_encode($res);
    }

    public function get_payment_history()
    {
        $data = $this->cart->get_payment_hostory();

        if (count($data) > 0) {
            $res = [
                'status' => true,
                'message' => 'success',
                'data' => $data
            ];
        } else {
            $res = [
                'status' => false,
                'message' => 'kosong',
                'data' => []
            ];
        }

        echo json_encode($res);
    }

    public function check_payment_status()
    {
        $order_id = $this->request->getGet('order_id');
        $transaction_id = $this->request->getGet('transaction_id');

        $response =  \Midtrans\Transaction::status($transaction_id);
        $json_response = json_encode($response);


        $response_decode = json_decode($json_response, true);

        $res = $this->cart->check_payment_status($response_decode);

        echo json_encode($res);
    }
}
