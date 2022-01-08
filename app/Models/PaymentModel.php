<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'paymenttunai';

    public function getOrder()
    {
        return $this->findAll();
    }

    public function code_Pay_ID()
    {
        $builder = $this->db->table('paymenttunai');
        $builder->selectMax('id_pay', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_pay = 'BYR-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_pay = $id_pay . $nomor;
        return $id_pay;
    }

    public function GetInfoPaymentPerProduct($id_customer)
    {
        $sql = "SELECT a.id_customer, a.nama_customer, b.id_order, b.id_kamar AS id_produk, b.checkin, b.checkout, b.status_order, b.harga_kamar AS harga
        FROM customer a
        JOIN order_kamar b
        ON(a.id_customer=b.id_customer)
        WHERE a.id_customer='$id_customer'
        UNION
        SELECT a.id_customer, a.nama_customer, b.id_order, b.id_fasilitas AS id_produk, b.checkin, b.checkout, b.status_order, b.harga_fasilitas AS harga
        FROM customer a
        JOIN order_kamar b
        ON(a.id_customer=b.id_customer)
        WHERE a.id_customer='$id_customer'";
        $dbResult = $this->db->query($sql, array($id_customer));
        return $dbResult->getResult();
    }

    public function GetHistory()
    {
        $sql = "SELECT b.id_order, b.id_kamar AS id_produk, b.harga_kamar AS harga, b.id_customer, a.id_pay, a.no_kuitansi, a.waktu_bayar, a.total_bayar
        FROM paymenttunai a
        JOIN order_kamar b
        ON(a.id_order=b.id_order)
        UNION
        SELECT b.id_order, b.id_fasilitas AS id_produk, b.harga_fasilitas AS harga, b.id_customer, a.id_pay, a.no_kuitansi, a.waktu_bayar, a.total_bayar
        FROM paymenttunai a
        JOIN order_kamar b
        ON(a.id_order=b.id_order)";
        $dbResult = $this->db->query($sql);
        return $dbResult->getResult();
    }

    public function GetHistoryByProduk($id_customer)
    {
        $sql = "SELECT b.id_order, b.id_kamar AS id_produk, b.harga_kamar AS harga, b.id_customer, a.id_pay, a.no_kuitansi, a.waktu_bayar, a.total_bayar
        FROM paymenttunai a
        JOIN order_kamar b
        ON(a.id_order=b.id_order)
        WHERE b.id_customer='$id_customer'
        UNION
        SELECT b.id_order, b.id_fasilitas AS id_produk, b.harga_fasilitas AS harga, b.id_customer, a.id_pay, a.no_kuitansi, a.waktu_bayar, a.total_bayar
        FROM paymenttunai a
        JOIN order_kamar b
        ON(a.id_order=b.id_order)
        WHERE b.id_customer='$id_customer'";
        $dbResult = $this->db->query($sql, array($id_customer));
        return $dbResult->getResult();
    }

    public function GetProdukByOrder($id_order)
    {
        $sql = "SELECT a.id_kamar AS id_produk,a.harga,a.status, CURRENT_DATE as tanggal_sekarang
        FROM kamar a
        JOIN 
        (SELECT * FROM order_kamar WHERE status_order = 'checkin') b 
        ON (a.id_kamar=b.id_kamar)
        WHERE b.id_order = '$id_order'
        UNION
        SELECT c.id_fasilitas AS id_produk,c.harga,c.status, CURRENT_DATE as tanggal_sekarang
        FROM m_fasilitas c
        JOIN 
        (SELECT * FROM order_kamar WHERE status_order = 'checkin') b 
        ON (c.id_fasilitas=b.id_fasilitas)
        WHERE b.id_order = '$id_order'";
        $dbResult = $this->db->query($sql, array($id_order));
        return $dbResult->getResult();
    }

    //dapatkan nomor kuitansi
    public function getNoKuitansi($id_customer)
    {
        //generate nomer kuitansi dengan format KWI-20190520-3-001
        //KWI-THN_BLN_TGL-IDKOSAN-NOMOR_URUT
        $sql = "SELECT substring(IFNULL(MAX(no_kuitansi),0),16)+0 as urutan, DATE_FORMAT(CURRENT_DATE,'%Y%m%d') as skrg FROM paymenttunai 
                WHERE SUBSTRING_INDEX(SUBSTRING_INDEX(no_kuitansi, '-', -2),'-',1) = '$id_customer' 
                AND SUBSTRING(SUBSTRING_INDEX(no_kuitansi, '-', 2),5) = DATE_FORMAT(CURRENT_DATE,'%Y%m%d')";
        $dbResult = $this->db->query($sql);
        $hasil = $dbResult->getResult();
        foreach ($hasil as $row) {
            $urutan = $row->urutan;
            $tgl = $row->skrg;
        }

        //format nomor kuitansi
        $no_kuitansi = "KWI-" . $tgl . "-" . $id_customer . "-" . str_pad(($urutan + 1), 3, "0", STR_PAD_LEFT); //-001;

        return $no_kuitansi;
    }

    //untuk input data pembayaran
    public function inputDataPembayaran()
    {

        // //dapatkan id transaksi untuk pembayaran
        // $dbResult = $this->db->query("SELECT IFNULL(MAX(id_transaksi),0) as id_transaksi from view_transaksi");

        // $hasil = $dbResult->getResult();
        // //cacah hasilnya
        // foreach ($hasil as $row) {
        //     $id_transaksi = $row->id_transaksi;
        // }
        // $id_transaksi = $id_transaksi + 1; //naikkan 1 untuk id baru modal yang dimasukkan
        $id_pay = $_POST['id_pay'];
        $id_order = $_POST['id_order'];
        $no_kuitansi = $_POST['no_kuitansi'];
        $total_bayar = preg_replace('/[^0-9 ]/i', '', $_POST['total_bayar']);
        $sql = "INSERT INTO paymenttunai SET id_pay = ?, id_order = ?, no_kuitansi = ?, waktu_bayar = CURRENT_DATE, total_bayar = ?";
        $dbHasil = $this->db->query($sql, array($id_pay, $id_order, $no_kuitansi, $total_bayar));

        // //pencatatan jurnal pada saat pembayaran (kas pada piutang)
        // $sql = "    INSERT INTO jurnal(`id_transaksi`, `kode_akun`, `tgl_jurnal`, `posisi_d_c`, `nominal`, `kelompok`, `transaksi`)
        //             SELECT a.id_pay as id_transaksi, b.kode_akun,a.waktu_bayar,b.posisi,a.total_bayar,b.kelompok,b.transaksi
        //             FROM pay a
        //             CROSS JOIN transaksi_coa b
        //             WHERE a.id_pay = '$id_pay' AND b.transaksi = 'paymenttunai' AND b.kelompok = 1
        //     ";
        // $hasil = $this->db->query($sql, array($id_transaksi));

        //cek apakah sudah lunas atau belum, jika sudah lunas, maka statusnya diganti menjadi lunas pada tabel pemesana
        $sql = "    SELECT SUM(a.total_bayar) as total_bayar,
                        (SELECT harga FROM order_kamar WHERE id_order = a.id_order) as harga
                    FROM paymenttunai a
                    WHERE a.id_order = '$id_order'
                ";
        $dbResult = $this->db->query($sql, array($id_order));
        $hasil = $dbResult->getResult();
        foreach ($hasil as $row) {
            $total_bayar = $row->total_bayar;
            $harga = $row->harga;
        }

        if (($harga - $total_bayar) <= 0) {
            $sql = "UPDATE order_kamar SET status_bayar = 'Lunas' WHERE id_order =?";
            $dbResult = $this->db->query($sql, array($id_order));
        }


        return $dbHasil;
    }
    // insert ke payment gateway
    public function inputPaymentGateway($data)
    {
        $hasil = $this->db->table('pembayaran_payment_gateway')->insert($data);
        return $hasil;
    }

    // dapatkan idbayar terakhir dari suatu id order_kamar
    public function getIdPayTerakhir($id_order)
    {
        $sql = "SELECT MAX(id_pay) as mak_id FROM paymenttunai
                WHERE id_order = ? 
                ";
        $dbResult = $this->db->query($sql, array($id_order));
        foreach ($dbResult->getResult() as $row) :
            $mak_id = $row->mak_id;
        endforeach;
        return $mak_id;
    }

    // insert untuk pembayaran ditabel pembayaran
    public function inputDataPaymentGateway($id_pay, $id_order, $no_kuitansi, $total_bayar)
    {

        //dapatkan id transaksi untuk pembayaran
        // $dbResult = $this->db->query("SELECT IFNULL(MAX(id_pay),0) as id_transaksi from view_transaksi");

        // $hasil = $dbResult->getResult();
        // //cacah hasilnya
        // foreach ($hasil as $row) {
        //     $id_transaksi = $row->id_transaksi;
        // }
        // $id_transaksi = $id_transaksi + 1; //naikkan 1 untuk id baru modal yang dimasukkan

        $total_bayar = preg_replace('/[^0-9 ]/i', '', $total_bayar);
        $sql = "INSERT INTO paymenttunai SET id_pay = '$id_pay', id_order = '$id_order', no_kuitansi = '$no_kuitansi', waktu_bayar = CURRENT_DATE, total_bayar = '$total_bayar'";
        $dbHasil = $this->db->query($sql, array($id_pay, $id_order, $no_kuitansi, $total_bayar));

        // //pencatatan jurnal pada saat pembayaran (kas pada piutang)
        // $sql = "    INSERT INTO jurnal(`id_transaksi`, `kode_akun`, `tgl_jurnal`, `posisi_d_c`, `nominal`, `kelompok`, `transaksi`)
        //             SELECT a.id_pembayaran as id_transaksi, b.kode_akun,a.tgl_bayar,b.posisi,a.total_bayar,b.kelompok,b.transaksi
        //             FROM pembayaran a
        //             CROSS JOIN transaksi_coa b
        //             WHERE a.id_pembayaran = ? AND b.transaksi = 'pembayaran' AND b.kelompok = 1
        //     ";
        // $hasil = $this->db->query($sql, array($id_transaksi));

        //cek apakah sudah lunas atau belum, jika sudah lunas, maka statusnya diganti menjadi lunas pada tabel pemesana
        $sql = "    SELECT SUM(a.total_bayar) as total_bayar,
                    (SELECT b.harga FROM kamar b JOIN order_kamar c  ON(b.id_kamar=c.id_kamar) WHERE id_order = a.id_order) as harga
                    FROM paymenttunai a
                    WHERE a.id_order = '$id_order'
                ";
        $dbResult = $this->db->query($sql, array($id_order));
        $hasil = $dbResult->getResult();
        foreach ($hasil as $row) {
            $total_bayar = $row->total_bayar;
            $harga = $row->harga;
        }

        if (($harga - $total_bayar) <= 0) {
            $sql = "UPDATE order_kamar SET status_bayar = 'Lunas' WHERE id_order ='$id_order'";
            $dbResult = $this->db->query($sql, array($id_order));
        }


        return $dbHasil;
    }

    //dapatkan seluruh data transaksi untuk proses autorefresh
    public function getDataPembayaranUntukAutoRefresh()
    {
        // query seluruh data pembayaran yang masih pending
        $sql = "    SELECT *
                    FROM pembayaran_payment_gateway
                    WHERE status_code = '201'
                ";
        $dbResult = $this->db->query($sql, array());
        $hasil = $dbResult->getResult();
        return $hasil;
    }

    // update data pembayaran melalui autorefresh
    public function updateDataPembayaranAutoRefresh($data, $id)
    {
        // update pembayaran payment gateway
        $hasil = $this->db->table('pembayaran_payment_gateway')->where('order_id', $id)->update($data);

        // query besar bayar
        $sql = "SELECT gross_amount,id_pembayaran FROM pembayaran_payment_gateway WHERE order_id = '$id'";
        $dbResult = $this->db->query($sql, array($id));
        $hasil = $dbResult->getResult();
        foreach ($hasil as $row) :
            $gross_amount = $row->gross_amount;
            $id_pembayaran = $row->id_pembayaran;
        endforeach;


        // jika berhasil status 201 maka update juga besar pembayaran di tabel pembayaran
        if ($data['status_code'] == 200) {
            $data = array(
                'total_bayar' => $gross_amount
            );
            $hasil = $this->db->table('pembayaran')->where('id_pembayaran', $id_pembayaran)->update($data);

            // update juga dijurnal
            $data = array(
                'nominal' => $gross_amount
            );
            $hasil = $this->db->table('jurnal')->where('id_transaksi', $id_pembayaran)->update($data);
        }
        return $hasil;
    }
}
