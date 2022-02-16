<?php

namespace App\Models;

use CodeIgniter\Model;
use Phpml\Clustering\KMeans;

class KmeansModel extends Model
{

    protected $DBGroup          = 'default';
    protected $table            = 'trx';
    protected $primaryKey       = 'kode';

    protected $allowedFields    = ['kode', 'periode', 'tanggal', 'keterangan', 'type', 'total'];



    public function get_ref_cluster()
    {
        $sql = $this->db->table('ref_center')->get()->getResultArray();

        return $sql;
    }
    public function get_sales()
    {
        $sql = $this->db->table('penjualan_d')->select('kode_produk as product_id, sum(qty) as qty,sum(qty*harga_unit) as subtotal')->groupBy('kode_produk')->get()->getResultArray();

        return $sql;
    }
    public function get_sales_by_produk($kode_produk)
    {
        $sql = $this->db->table('penjualan_d')->select('kode_produk, sum(qty) as Dx,sum(qty*harga_unit) as Dy')
            ->where('kode_produk', $kode_produk)
            ->groupBy('kode_produk')
            ->get()
            ->getRowArray();
        return $sql;
    }


    public function clustering_data()
    {
        $samples = [];
        $dataset_fix = [];
        $dataset = $this->get_sales();

        foreach ($dataset as $key => $val) {
            $samples[] = [
                $key,
                $val['qty'], //x
                $val['subtotal'] //y
            ];
        }


        $kmeans = new KMeans(3); //library //cluster 3

        $clusters = $kmeans->cluster($samples);

        $lines = [];


        foreach ($clusters as $key => $cluster) {
            foreach ($cluster as $key2 => $sample) {
                $lines[] = [
                    'idx_data' => $sample[0],
                    'cluster' => $key,   //0,1,2,....
                    'x' => $sample[1],
                    'y' => $sample[2],
                ];
            }
        }
        $results = [];
        foreach ($lines as $key3 => $line) {
            $results[] = [
                'cluster' => 'CLUSTER ' . ($line['cluster'] + 1),
                'product_id' => $dataset[$line['idx_data']]['product_id'],
                'dx' => $line['x'],
                'dy' => $line['y'],
            ];
        }

        $data['data'] = $dataset;
        $data['cluster'] = $clusters;
        $data['lines'] = $lines;
        $data['results'] = $results;
        return $data;
    }

    public function get_reco()
    {
        $dataset = $this->clustering_data();

        $data = $dataset['results'];

        foreach ($data as $row) {
            if ($row['cluster'] == 'CLUSTER 1') {
                $sql[] = $this->db->table('produk')->where('kode', $row['product_id'])->get()->getRowArray();
            }
        }

        // $results[] = [
        //     'status'  => true,
        //     'message' => 'OK',
        //     'values'  => $sql
        // ];


        return $sql;
    }
}
