<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'jurnal_umum';
    protected $primaryKey       = 'jurnal_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $allowedFields    = ['akun', 'no_bukti', 'tanggal', 'periode', 'keterangan', 'dc', 'nilai'];

    // REPORT JURNAL
    function get_jurnal()
    {
        $sql = $this->db->table('jurnal_umum as a')
            ->select("a.no_bukti,a.periode,a.tanggal,a.keterangan,a.kode_akun as kode_akun,b.nama as nama_akun,a.dc,
        IF(a.dc = 'd',a.nilai,0) as debet,
        IF(a.dc = 'c',a.nilai,0) as kredit")
            ->join('coa_items as b', 'a.kode_akun=b.kode')
            ->get()
            ->getResultArray();

        return $sql;
    }

    function get_jurnal_periode($periode)
    {
        $sql = $this->db->table('jurnal_umum as a')
            ->select("a.no_bukti,a.periode,a.tanggal,a.keterangan,a.kode_akun as kode_akun,b.nama as nama_akun,a.dc,
        IF(a.dc = 'd',a.nilai,0) as debet,
        IF(a.dc = 'c',a.nilai,0) as kredit")
            ->join('coa_items as b', 'a.kode_akun=b.kode')
            ->where('a.periode', $periode)
            ->get()
            ->getResultArray();

        return $sql;
    }
    // EMD REPORT JURNAL

    // BEGIN REPORT BB
    public function get_BB($periode, $akun)
    {
        $sql1 = $this->db->table('jurnal_umum as a')
            ->select("a.no_bukti,a.periode,a.keterangan,a.tanggal,a.kode_akun as kode_akun,b.nama as nama_akun,
        IF(a.dc = 'D',a.nilai,0) as debet,
        IF(a.dc = 'C',a.nilai,0) as kredit, b.dc as saldo_normal,a.dc")
            ->join('coa_items as b', 'a.kode_akun=b.kode')
            ->where('a.periode', $periode)
            ->where('a.kode_akun', $akun)
            ->get()
            ->getResultArray();

        $sql2 = $this->db->table('coa_items')->where('kode', $akun)->get()->getRowArray();

        $saldo = 0;
        $kredit = 0;
        $debet = 0;

        if (count($sql1) > 0) {
            foreach ($sql1 as $key => $row) {
                $debet = $row['debet'];
                $kredit = $row['kredit'];
                if ($row['saldo_normal'] == 'D') {
                    $saldo = ($saldo + $debet) - $kredit;
                } else {
                    $saldo = ($saldo + $kredit) - $debet;
                }

                $data[] = [
                    'tanggal'           => shortdate_indo($row['tanggal']),
                    'akun'              => $row['nama_akun'],
                    'keterangan'        => $row['keterangan'],
                    'no_bukti'          => $row['no_bukti'],
                    'saldo_normal'      => $row['saldo_normal'],
                    'debet'             => nominal1($debet),
                    'kredit'            => nominal1($kredit),
                    'saldo'             => nominal1($saldo)
                ];
            }
        } else {
            $data = [];
        }


        $res  = [
            'akun'         => $sql2,
            'ledger'       => $data
        ];

        return $res;
    }
    //END REPORT JURNAL


    // REPORT PENJUALAN
    public function get_sales_report_all()
    {
        $sql1 = $this->db->table('penjualan_m')->get()->getResultArray();
        if (count($sql1) > 0) {
            foreach ($sql1 as $row) {
                $sql2 = $this->db->table('penjualan_d')->where('kode_penjualan', $row['kode_penjualan'])->get()->getResultArray();

                $data[] = [
                    'kode_penjualan' => $row['kode_penjualan'],
                    'tanggal'        => shortdate_indo($row['tanggal']),
                    'periode'        => $row['periode'],
                    'keterangan'     => $row['keterangan'],
                    'detail'         => $sql2
                ];
            }
        } else {
            $data = [];
        }

        return $data;
    }

    public function get_sales_report_period($periode)
    {
        $sql1 = $this->db->table('penjualan_m')->where('periode', $periode)->get()->getResultArray();
        if (count($sql1) > 0) {
            foreach ($sql1 as $row) {
                $sql2 = $this->db->table('penjualan_d')->where('kode_penjualan', $row['kode_penjualan'])->get()->getResultArray();

                $data[] = [
                    'kode_penjualan' => $row['kode_penjualan'],
                    'tanggal'        => shortdate_indo($row['tanggal']),
                    'periode'        => $row['periode'],
                    'keterangan'     => $row['keterangan'],
                    'detail'         => $sql2
                ];
            }
        } else {
            $data = [];
        }

        return $data;
    }
    // END REPORT PENJUAlAN
}
