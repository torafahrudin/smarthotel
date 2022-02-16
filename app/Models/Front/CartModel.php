<?php

namespace App\Models\Front;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'carts';
    protected $allowedFields    = ['kode', 'tanggal', 'kode_produk', 'nama_produk', 'qty', 'harga_unit', 'total', 'user_id'];

    public function set_periode($tanggal)
    {
        $periode = date('Y', strtotime($tanggal)) . '' . date('m', strtotime($tanggal));

        return $periode;
    }
    public function set_number($number)
    {
        $num = intval(preg_replace("/[^0-9]/", "", $number));

        return $num;
    }

    public function trans_id()
    {
        $sql =  $this->db->table('carts')
            ->select('RIGHT(kode,6) as kode', false)
            ->orderBy('kode', 'DESC')
            ->limit(1)
            ->get();

        if ($sql->getNumRows() <> 0) {
            $data = $sql->getRow();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $prefix = "HTL-CRT.";
        $batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
        $kode_final = $prefix . '' . $batas;

        return $kode_final;
    }

    public function payment_id()
    {
        $sql =  $this->db->table('online_payment_history')
            ->select('RIGHT(order_id,8) as kode', false)
            ->orderBy('kode', 'DESC')
            ->limit(1)
            ->get();

        if ($sql->getNumRows() <> 0) {
            $data = $sql->getRow();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $prefix = "HTL-BILL.";
        $batas = str_pad($kode, 8, "0", STR_PAD_LEFT);
        $kode_final = $prefix . '' . $batas;

        return $kode_final;
    }

    public function sales_id()
    {
        $sql =  $this->db->table('penjualan_m')
            ->select('RIGHT(kode_penjualan,8) as kode', false)
            ->orderBy('kode', 'DESC')
            ->limit(1)
            ->get();

        if ($sql->getNumRows() <> 0) {
            $data = $sql->getRow();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $prefix = "HTL-SALES.";
        $batas = str_pad($kode, 8, "0", STR_PAD_LEFT);
        $kode_final = $prefix . '' . $batas;

        return $kode_final;
    }

    public function get_count()
    {
        $user_id = 'HTL-USR.00001'; //dont include to production mode
        $sql = $this->db->table('carts')->select("sum(qty) as total_cart")->where('user_id', $user_id)->groupBy('user_id')->get()->getResultArray();

        if (count($sql) > 0) {
            $total = $sql[0]['total_cart'];
        } else {
            $total = 0;
        }

        $res = [
            'status' => true,
            'total' => $total
        ];

        return $res;
    }

    public function get()
    {
        $user_id = 'HTL-USR.00001'; //dont include to production mode
        $cart = $this->db->table('carts')->where('user_id', $user_id)->where('status', 'waiting')->get()->getResultArray();

        if (count($cart) > 0) {
            $total = 0;
            foreach ($cart as $row) {
                $total = $total + $row['total'];
            }
            if ($total > 0) {
                $ppn = $total * 0.1;
            } else {
                $ppn = 0;
            }
            $res = [
                'status' => true,
                'message' => 'success',
                'data' => $cart,
                'total' => $total,
                'ppn' => $ppn
            ];
        } else {
            $res = [
                'status' => false,
                'message' => 'kosong',
                'data' => [],
                'total' => 0,
                'ppn' => 0
            ];
        }
        return $res;
    }



    public function store($data)
    {
        $user_id = 'HTL-USR.00001'; //dont include to production mode
        $produk = $this->db->table('produk')->where('kode', $data['kode_produk'])->get()->getRow();
        $cart = $this->db->table('carts')->where('kode_produk', $data['kode_produk'])->where('user_id', $user_id)->get()->getResultArray();

        $insert = [
            'kode' => $data['kode'],
            'tanggal' => date('Y-m-d'),
            'kode_produk' => $produk->kode,
            'nama_produk' => $produk->nama,
            'qty' => 1,
            'harga_unit' => $produk->harga_satuan,
            'total' => 1 * $produk->harga_satuan,
            'user_id' => $user_id,
            'status' => 'waiting'
        ];

        $this->db->transStart();
        if (count($cart) > 0) {
            $update = [
                'tanggal' => date('Y-m-d'),
                'qty' => 1 + $cart[0]['qty'],
                'total' => (1 + $cart[0]['qty']) * $produk->harga_satuan,
            ];
            $this->db->table('carts')->where('kode_produk', $data['kode_produk'])->where('user_id', $user_id)->update($update);
            $this->db->transComplete();
        } else {
            $this->db->table('carts')->insert($insert);
        }
        $this->db->transComplete();


        if ($this->db->transStatus() === true) {
            $res = [
                'success' => true,
                'message' => 'success',
                'data' => $produk
            ];
        } else {
            $res = [
                'success' => false,
                'message' => 'unsuccess',
                'data' => []
            ];
        }

        return $res;
    }

    public function destroy($kode)
    {
        $sql = $this->db->table('carts')->where('kode', $kode)->delete();

        $res = [
            'status' => true,
            'message' => 'Berhasil dihapus!',

        ];

        return $res;
    }

    public function insert_payment($data, $params)
    {
        $user_id = 'HTL-USR.00001'; //dont include to production mode
        $data = [
            'order_id'              => $data['order_id'],
            'merchant_id'           => $data['merchant_id'],
            'transaction_id'        => $data['transaction_id'],
            'gross_amount'          => $data['gross_amount'],
            'currency'              => $data['currency'],
            'payment_type'          => $data['payment_type'],
            'transaction_time'      => $data['transaction_time'],
            'transaction_status'    => $data['transaction_status'],
            'virtual_account'       => '-',
            'qr_code'               => $data['actions'][0]['url'],
            'deeplink_redirect'     => $data['actions'][1]['url'],
            'status_url'            => $data['actions'][2]['url'],
            'cancel_url'            => $data['actions'][3]['url'],
            'user_id'               => $user_id
        ];
        $insert_sales_m = [
            'kode_penjualan'        => $this->sales_id(),
            'no_bill'               => $data['order_id'],
            'tanggal'               => date('Y-m-d'),
            'periode'               => $this->set_periode(date('Y-m-d')),
            'keterangan'            => 'Sales - Online Payment',
            'total'                 => $data['gross_amount'],
            'status'                => $data['transaction_status'],
            'user_id'               => $user_id
        ];
        $cart = $this->get();
        foreach ($cart['data'] as $row) {
            $item_details[] = array(
                'kode_penjualan'        => $this->sales_id(),
                'kode_produk'           => $row['kode_produk'],
                'nama_produk'           => $row['nama_produk'],
                'harga_unit'            => $row['harga_unit'],
                'qty'                   => $row['qty'],
                'total'                 => $row['harga_unit'] * $row['qty']
            );
        }
        $this->db->transStart();
        $res = $this->db->table('online_payment_history')->insert($data);
        $this->db->table('penjualan_m')->insert($insert_sales_m);
        $this->db->table('penjualan_d')->insertBatch($item_details);
        $this->db->table('carts')->where('user_id', $user_id)->delete();
        $this->db->transComplete();
        if ($this->db->transStatus() === true) {
            $res = [
                'success' => true,
                'message' => 'success',
                'data' => $res
            ];
        } else {
            $res = [
                'success' => false,
                'message' => 'unsuccess',
                'data' => []
            ];
        }

        return $res;
    }

    public function get_payment_hostory()
    {
        $user_id = 'HTL-USR.00001'; //dont include to production mode
        $res = $this->db->table('online_payment_history')->where('transaction_status', 'pending')->where('user_id', $user_id)->get()->getResultArray();
        return $res;
    }

    public function check_payment_status($data)
    {
        $trans_status = $data['transaction_status'];

        $update_history = [
            'transaction_status'  => $data['transaction_status']
        ];
        $update_penjualan = [
            'status'  =>  $data['transaction_status']
        ];

        $gl = [
            [
                'tanggal'               => date('Y-m-d'),
                'periode'               => $this->set_periode(date('Y-m-d')),
                'no_bukti'                   => $data['order_id'],
                'kode_akun'             => '1-1000001',
                'keterangan'            => 'Sales-Online Payment',
                'dc'                    => 'd',
                'nilai'                 => $data['gross_amount'],
                'nu'                    => 1
            ],
            [
                'tanggal'               => date('Y-m-d'),
                'periode'               => $this->set_periode(date('Y-m-d')),
                'no_bukti'                   => $data['order_id'],
                'kode_akun'             => '4-1000001',
                'keterangan'            => 'Sales-Online Payment',
                'dc'                    => 'c',
                'nilai'                 => $data['gross_amount'],
                'nu'                    => 2
            ]
        ];

        $this->db->transStart();

        switch ($trans_status) {
            case 'pending':
                $this->db->table('online_payment_history')->where('order_id', $data['order_id'])->where('transaction_id', $data['transaction_id'])->update($update_history);
                $this->db->table('penjualan_m')->where('no_bill', $data['order_id'])->update($update_penjualan);
                break;
            case 'settlement':
                $this->db->table('online_payment_history')->where('order_id', $data['order_id'])->where('transaction_id', $data['transaction_id'])->update($update_history);
                $this->db->table('penjualan_m')->where('no_bill', $data['order_id'])->update($update_penjualan);
                $this->db->table('jurnal_umum')->insertBatch($gl);
                break;
            case 'expire':
                $this->db->table('online_payment_history')->where('order_id', $data['order_id'])->where('transaction_id', $data['transaction_id'])->update($update_history);
                $this->db->table('penjualan_m')->where('no_bill', $data['order_id'])->update($update_penjualan);
                break;
            case 'deny':
                $this->db->table('online_payment_history')->where('order_id', $data['order_id'])->where('transaction_id', $data['transaction_id'])->update($update_history);
                $this->db->table('penjualan_m')->where('no_bill', $data['order_id'])->update($update_penjualan);
                break;
        }

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            $res = [
                'status' => false,
                'message' => 'Error',
            ];
        } else {
            $res = [
                'status' => true,
                'message' => 'Success',
                'data'    => $data
            ];
        }
        return $res;
    }
}
