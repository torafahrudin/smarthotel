<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'penjualan_m';
    protected $primaryKey       = 'kode';

    protected $allowedFields    = ['kode_penjualan', 'no_bill', 'user_id', 'tanggal', 'periode', 'keterangan', 'total', 'status'];

    public function trans_id()
    {
        $sql =  $this->db->table('transaksi')
            ->select('RIGHT(kode,5) as kode', false)
            ->orderBy('kode', 'DESC')
            ->limit(1)
            ->get();

        if ($sql->getNumRows() <> 0) {
            $data = $sql->getRow();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $prefix = "HTL-TRX.";
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kode_final = $prefix . '' . $batas;

        return $kode_final;
    }
}
