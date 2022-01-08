<?php

namespace App\Controllers;

use App\Models\RtbModel;
use App\Models\CustomerModel;
use App\Models\PaymentModel;

class Payment extends BaseController
{
    public function __construct()
    {
        $this->RtbModel = new RtbModel();
        $this->CustomerModel = new CustomerModel();
        $this->PaymentModel = new PaymentModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Customer',
            'customer' => $this->CustomerModel->getCustomer(),
        ];
        $ar = array();
        $i = 0;
        foreach ($data['customer'] as $row) :
            array_push($ar, array($row['id_customer'], 0, 0));
            $i++;
        endforeach;

        for ($i = 0; $i < count($ar); $i++) {
            $ar[$i][1] = $this->RtbModel->GetInfoCustomer($ar[$i][0], 'Belum Lunas');
            $ar[$i][1] = $this->RtbModel->GetInfoCustomer($ar[$i][0], 'Lunas');
        }
        $data['infoCustomer'] = $ar;

        echo view('Payment/DaftarCustomer', $data);
    }

    public function ListProduk($id_customer, $nama_customer)
    {
        $hasil = $this->PaymentModel->GetInfoPaymentPerProduct($id_customer);
        $data = [
            'title' => 'Data Pesanan',
            'produk' => $hasil,
            'id_customer' => $id_customer,
            'nama_customer' => $nama_customer,
        ];
        echo view('Payment/ListProduk', $data);
    }

    public function ListPayment($id_customer)
    {
        $data = [
            'title' => 'Data Pembayaran',
            'id_pay' => $this->PaymentModel->Code_Pay_ID(),
            'pay'   => $this->PaymentModel->GetHistoryByProduk($id_customer),
            'order'     => $this->PaymentModel->GetInfoPaymentPerProduct($id_customer), //ini untuk manggil di view 
            'no_kuitansi' => $this->PaymentModel->GetNoKuitansi($id_customer),
        ];
        echo view('Payment/ListPayment', $data);
    }

    // public function inputPayment($id_customer)
    // {
    //     $data = [
    //         'title' => 'Pembayaran Pesanan',
    //         'pay'   => $this->PaymentModel->GetHistoryByProduk($id_customer),
    //         'order'     => $this->PaymentModel->GetInfoPaymentPerProduct($id_customer), //ini untuk manggil di view 
    //         'no_kuitansi' => $this->PaymentModel->GetNoKuitansi($id_customer),
    //     ];

    //     echo view('Payment/inputPayment', $data);
    // }
    public function prosespayment()
    {
        if (isset($_POST['total_bayar'])) {
            $validation = \config\Services::validation();
            if (!$this->validate(
                [
                    'total_bayar' => 'required'
                ],
                //errors
                [
                    'total_bayar' => [
                        'required' => 'Total pembayaran tidak boleh kosong'
                    ]
                ]
            )) {
                echo view('Payment/inputPayment', [
                    'validation' => $this->validator,
                ]);
            } else {
                $hasil = $this->PaymentModel->inputDataPayment($_POST['id_order']);
                if ($hasil->connID->affected_rows > 0) {
?>
                    <script type="text/javascript">
                        alert("Sukses ditambahkan");
                    </script>
                <?php
                }

                echo view('Payment/ListPayment');
            }
        } else {
            echo view('Payment/inputPayment');
        }
    }
    public function inputPaymentGateway($id_order, $no_kuitansi, $nama_customer)
    {
        $data = [
            'title' => 'Pembayaran Pesanan',
            'pay'   => $this->PaymentModel->Bayar($id_order),
            'nama_customer' => $nama_customer,
        ];
        $hasil = $this->PaymentModel->GetProdukByOrder($id_order);
        foreach ($hasil as $row) :
            $id_kamar = $row->id_kamar;
            $tgl = $row->tanggal_sekarang;
        endforeach;
        $data['tgl'] = $tgl;
        $data['pay'] = $this->PaymentModel->GetHistoryByProduk($id_kamar);

        $total = 0;
        foreach ($data['pay'] as $row) :
            $id_customer = $row->id_customer;
            $nama_customer = $row->nama_customer;
            $id_order = $row->id_order;
            $id_kamar = $row->id_kamar;
            $harga = $row->harga;
            $id_order = $row->id_order;
            $id_fasilitas = $row->id_fasilitas;
            $harga = $row->harga;
            $total += $row->harga;
        endforeach;
        $data['id_customer']      = $id_customer;
        $data['nama_customer']    = $nama_customer;
        $data['id_order']         = $id_order;
        $data['id_kamar']         = $id_kamar;
        $data['harga']            = $harga;
        $data['id_order']         = $id_order;
        $data['id_fasilitas']     = $id_fasilitas;
        $data['harga']            = $harga;
        $data['total']            = $total;
        $data['no_kuitansi']      = $no_kuitansi;
        echo view('Payment/inputPayment', $data);
    }
    public function prosespaymentgateway()
    {
        $data['nama_customer'] = $_POST['nama_customer'];

        $hasil = $this->PaymentModel->GetProdukByOrder($_POST['id_order']);
        foreach ($hasil as $row) :
            $id_kamar = $row->id_kamar;
            $tgl = $row->tanggal_sekarang;
        endforeach;
        $data['tgl'] = $tgl;
        $data['pay'] = $this->PaymentModel->GetHistoryByProduk($id_kamar);

        $total = 0;
        foreach ($data['pay'] as $row) :
            $id_customer = $row->id_customer;
            $nama_customer = $row->nama_customer;
            $id_order = $row->id_order;
            $id_kamar = $row->id_kamar;
            $harga = $row->harga;
            $id_order = $row->id_order;
            $id_fasilitas = $row->id_fasilitas;
            $harga = $row->harga;
            $total += $row->harga;
        endforeach;
        $data['nama_customer']    = $nama_customer;
        $data['id_order']         = $id_order;
        $data['id_kamar']         = $id_kamar;
        $data['harga']            = $harga;
        $data['id_order']         = $id_order;
        $data['id_fasilitas']     = $id_fasilitas;
        $data['harga']            = $harga;
        $data['total']            = $total;
        $data['no_kuitansi']      = $_POST['no_kuitansi'];

        if (isset($_POST['total_bayar'])) {
            $validation = \config\Services::validation();
            if (!$this->validate(
                [
                    'total_bayar' => 'required'
                ],
                //errors
                [
                    'total_bayar' => [
                        'required' => 'Total pembayaran tidak boleh kosong'
                    ]
                ]
            )) {
                echo view('Payment/inputPayment', [
                    'validation' => $this->validator,
                    'nama_customer' => $data['nama_customer'],
                    'tanggal' => $data['tanggal'],
                    'id_order' => $data['id_order'],
                    'harga' => $data['harga'],
                    'total' => $data['total'],
                    'no_kuitansi' => $data['no_kuitansi'],
                ]);
            } else {
                $hasil = $this->PaymentModel->inputDataPayment($_POST['id_order'], $this->PaymentModel->GetNoKuitansi($id_customer));
                if ($hasil->connID->affected_rows > 0) {
                ?>
                    <script type="text/javascript">
                        alert("Sukses ditambahkan");
                    </script>
<?php
                }
                $data['pay'] = $this->PaymentModel->GetHistoryByProduk($id_kamar);

                $total = 0;
                foreach ($data['pay'] as $row) :
                    $id_customer = $row->id_customer;
                    $nama_customer = $row->nama_customer;
                    $id_order = $row->id_order;
                    $id_kamar = $row->id_kamar;
                    $harga = $row->harga;
                    $id_order = $row->id_order;
                    $id_fasilitas = $row->id_fasilitas;
                    $harga = $row->harga;
                    $total += $row->harga;
                endforeach;

                $data['nama_customer']    = $nama_customer;
                $data['id_order']         = $id_order;
                $data['id_kamar']         = $id_kamar;
                $data['harga']            = $harga;
                $data['id_order']         = $id_order;
                $data['id_fasilitas']     = $id_fasilitas;
                $data['harga']            = $harga;
                $data['total']            = $total;
                $data['no_kuitansi']      = $_POST['no_kuitansi'];

                echo view('Payment/ListPayment', $data);
            }
        } else {
            echo view('Payment/inputPayment', $data);
        }
    }
    public function finishingPaymentGateway()
    {
        $result = json_decode($_POST['result_data'], true); // array asosiatif
        //var_dump($result);
        //echo $_POST['id_pemesanan'];
        //echo $_POST['id_kos'];


        //besar bayar dibuat 0 sampai ybs melakukan pembayaran
        $hasil = $this->MidtransModel->inputDataPaymentGateway($_POST['id_order'], $this->MidtransModel->getNoKuitansi($_POST['id_customer']), 0);
        $idbayar = $this->MidtransModel->getIdPayTerakhir($_POST['id_order']);
        $data = array(
            'id_pembayaran' => $idbayar,
            'order_id' => $result['order_id'],
            'gross_amount' => $result['gross_amount'],
            'payment_type' => $result['payment_type'],
            'transaction_time' => $result['transaction_time'],
            'transaction_id' => $result['transaction_id'],
            'bill_key' => "",
            'biller_code' => "",
            'pdf_url' => $result['pdf_url'],
            'status_code' => $result['status_code']
        );
        $simpan = $this->PembayaranModel->inputPembayaranPaymentGateway($data);
        if ($simpan) {
            echo 'sukses';
        } else {
            echo 'gagal';
        }
        return redirect()->to(base_url('Midtrans'));
    }
    // buat token
    public function buatToken($id_order, $total_bayar)
    {
        \Midtrans\Config::$serverKey = '<<SERVER_KEY_ANDA>>';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        // Required
        $total_bayar = preg_replace('/[^0-9 ]/i', '', $total_bayar);
        $transaction_details = array(
            'order_id' => 'BYR-' . rand(),
            'gross_amount' => $total_bayar, // no decimal allowed for creditcard
        );
        // Optional
        $hasil = $this->RtbModel->getCustByOrder($id_order);
        foreach ($hasil as $row) :
            $nama_customer = $row->nama_customer;
            $no_telp  = $row->no_telp;
            $email = $row->email;
        endforeach;

        // Optional
        $customer_details = array(
            'first_name'    => $nama_customer,
            'last_name'     => "",
            'email'         => $email,
            'phone'         => $no_telp
        );
        // Fill transaction details
        $transaction = array(
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
        );
        $snapToken = \Midtrans\Snap::getSnapToken($transaction);
        echo $snapToken;
    }

    // autorefresh pembayaran
    public function autoRefreshPembayaranPG()
    {
        //query data transaksi yang masih pending	
        $hasil = $this->MidtransModel->getDataPembayaranUntukAutoRefresh();
        $id = array();
        foreach ($hasil as $ks) {
            array_push($id, $ks->order_id);
        }
        for ($i = 0; $i < count($id); $i++) {
            $ch = curl_init();
            $login = '<<SERVER_KEY_ANDA>>';
            $password = '';
            $orderid = $id[$i];
            $URL =  'https://api.sandbox.midtrans.com/v2/' . $orderid . '/status';
            curl_setopt($ch, CURLOPT_URL, $URL);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
            $output = curl_exec($ch);
            curl_close($ch);
            $outputjson = json_decode($output, true);
            if ($outputjson['status_code'] == 200) {
                $data = array(
                    'status_code' => $outputjson['status_code'],
                    'settlement_time' => $outputjson['settlement_time']
                );
            } else {
                $data = array(
                    'status_code' => $outputjson['status_code']
                );
            }
            $hasil = $this->PembayaranModel->updateDataPembayaranAutoRefresh($data, $orderid);

        }
        echo view('Pembayaran/Autorefresh');
    }
    public function DataPayment()
    {
        $data = [
            'title' => 'Data Pembyaran Online',
            'payment' => $this->PaymentModel->GetDataPayment(),
        ];
    }
}