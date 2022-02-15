<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
 protected $table = 'Produk';

   	public function getAll(){
        return $this->findAll();
    }

    public function Produkbyid($id){
       $sql = "SELECT *  from produk where kode_produk=?";
       return $query = $this->db->query($sql, array($id))->getResult();
    }
    public function Rekomendasi($id){
       $sql ="SELECT DISTINCT a.id_produk, a.produk_rekomendasi, b.* from  detail_rule as a join produk as b on (a.produk_rekomendasi=b.kode_produk) HAVING a.id_produk=?";
       return $query = $this->db->query($sql, array($id))->getResult();
    }
    public function trans_id()
    {
        $sql =  $this->db->table('produk_resto')
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
        $prefix = "HTL-PDK.";
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kode_final = $prefix . '' . $batas;

        return $kode_final;
    }
}
?>