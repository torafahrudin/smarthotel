<?php

namespace App\Controllers;

use App\Models\RtbModel;
use App\Models\CustomerModel;
use App\Models\PaymentModel;

class Kuitansi extends BaseController
{
    public function __construct()
    {
        $this->RtbModel = new RtbModel();
        $this->CustomerModel = new CustomerModel();
        $this->PaymentModel = new PaymentModel();
    }
    public function payment_table()
    {
        $data = [
            'title' => 'Tabel Riwayat Pembayaran',
            'history' => $this->PaymentModel->GetHistory(),
        ];
        echo view('Laporan/PaymentHistory', $data);
    }
    public function cetak($id_customer)
    {
        $data['kuitansi'] = $this->PaymentModel->GetInfoPaymentPerProduct($id_customer);
        //echo view('Laporan/Cetakkuitansi', $data);
        //echo view('Laporan/Cetakkuitansi2', $data);
        //echo view('Laporan/Cetakkuitansidompdf', $data);

        //tambahan agar gambar tampil
        //https://www.youtube.com/watch?v=bM3y5TY-7_k

        //panggil dom untuk cetak pdf
        //$dompdf = new \Dompdf\Dompdf($options);

        $dompdf = new \Dompdf\Dompdf();
        $html = view('Laporan/Cetakkuitansidompdf', $data);
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A6', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
