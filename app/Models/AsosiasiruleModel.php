<?php

namespace App\Models;

use CodeIgniter\Model;

class AsosiasiruleModel extends Model
{
    protected $table = 'data_penjualan';

    //untuk mendapatkan data seluruh tabel akun
    public function getAll(){
        return $this->findAll();
    }

    public function data_penjualan_bynamaproduk(){
        $sql="SELECT a.id_penjualan, GROUP_CONCAT(DISTINCT b.nama_produk ORDER BY b.nama_produk) as nama_produk
                    FROM detail_jual as a
                    join produk as b
                    on (a.item=b.kode_produk)
                    GROUP BY  id_penjualan
                    ORDER BY 1 ASC";
        $query = $this->db->query($sql)->getResult();
        $arr=[];
        foreach ($query as $row) {
            $ar=[];
           
            $ar['item']=$row->nama_produk;
            array_push($arr, $ar);
        }
        return $arr;
    }
    public function data_penjualan_bykodeproduk(){
        $sql="SELECT a.id_penjualan, GROUP_CONCAT(DISTINCT a.item ORDER BY a.item) as kode_produk
                    FROM detail_jual as a
                    join produk as b
                    on (a.item=b.kode_produk)
                    GROUP BY  id_penjualan
                    ORDER BY 1 ASC";
        $query = $this->db->query($sql)->getResult();
        $arr=[];
        foreach ($query as $row) {
            $ar=[];
           
            $ar['item']=$row->kode_produk;
            array_push($arr, $ar);
        }
        return $arr;
    }
    public function data_contoh(){
        $data= [['Bread','Milk'], ['Bread','Diaper','Beer','Eggs'], ['Milk','Diaper','Beer','Coke'], ['Bread','Milk','Diaper','Beer'], [' Bread','Milk','Diaper','Coke']];
        return $data;
    }

    public function jumlah_data($data_item){
        $arr = [];
        for ($i = 0; $i < count($data_item); $i++) {
            $ar = [];
            $val = explode(",", $data_item[$i]["item"]);
            for ($j = 0; $j < count($val); $j++) {
                $ar[] = $val[$j];
            }
            array_push($arr, $ar);
        }

        return $arr;
    }


    public function name_produk($kodeproduk){
        $sql="SELECT nama_produk, kode_produk from produk where kode_produk=?";
        return $query = $this->db->query($sql, array($kodeproduk))->getResult();
    }
    public function get_minrule_all(){
         $sql="SELECT * from master_min_rule";
         return $query=$this->db->query($sql)->getResult();
    }
    public function get_minrule(){
        $sql="SELECT * from master_min_rule where status='active'";
        return $query=$this->db->query($sql)->getResult();
    }
    public function tambahminrule(){
        $id=$_POST['id'];
        $minsup=$_POST['min_sup']/100;
        $mincon=$_POST['min_con']/100;
        $sql = "INSERT INTO master_min_rule Set id=?, min_sup=?, min_con=?, status='non active'";
        return $query=$this->db->query($sql, array($id,$minsup, $mincon));
    }
    public function delete_min_rule($id){
        $sql="DELETE from master_min_rule where id=?";
        return $query=$this->db->query($sql, array($id));
    }
    public function edit_min_rule($id){
        $minsup=$_POST['min_sup']/100;
        $mincon=$_POST['min_con']/100;
        $sql="UPDATE master_min_rule set min_sup=?, min_con =? where id=?";
        return $query = $this->db->query($sql, array($minsup, $mincon, $id));
        }
    public function update_rule(){
        $antesenden=$_POST['Anteseden2'];
        $consequent=$_POST['Consequent2'];
        $support=$_POST['Support2'];
        $Confidance=$_POST['Confident2'];
        $sql="INSERT INTO asociation_rule set id_rule=?, rule=?,Support=?, Confidance=? , keterangan='Baru'";
    for ($i=0; $i < count($antesenden) ; $i++) { 
            $sql1="SELECT ifnull(max(id_rule),0) as id_rule from asociation_rule";
            $query = $this->db->query($sql1)->getResult();
            foreach ($query as $value) {
                $idrule=$value->id_rule+1;
            }
            $rule[$i]='Jika membeli '.$antesenden[$i].' maka membeli '.$consequent[$i];
            echo $rule[$i];
            $query = $this->db->query($sql, array($idrule,$rule[$i],$support[$i],$Confidance[$i]));
         }  
    }
    public function id_min_rule(){
        $sql1="SELECT ifnull(max(id),0) as id_min_rule from master_min_rule ";
        $query = $this->db->query($sql1)->getResult();
        foreach ($query as $value) {
                $idminrule=$value->id_min_rule+1;
        }
        return $idminrule;
    }

    public function data_rule(){
        $sql="SELECT * from asociation_rule";

        return $query=$this->db->query($sql)->getResult();
    }
    public function update_detail(){
       

            $Support=$_POST['Support'];
            $Confidance=$_POST['Confident'];
          $abterjual=$_POST['ABterjual'];
           $aterjual=$_POST['Aterjual'];
        $sql="INSERT INTO detail_rule set id_rule=?, id_produk=?, produk_rekomendasi=?,Support=?, Confidance=?, abterjual=?, aterjual=?";
         for ($i=0; $i < count($_POST['Anteseden']) ; $i++) { 
            $Anteseden=explode(",",$_POST['Anteseden'][$i]);
            $consequent=explode(",",$_POST['Consequent'][$i]);
            if (count($Anteseden)>1){
                  $sql1="SELECT ifnull(max(id_rule),0) as id_rule from detail_rule";
                    $query = $this->db->query($sql1)->getResult();
                    foreach ($query as $value) {
                        $idrule=$value->id_rule+1;
                    }
               for ($j=0; $j<count($Anteseden) ; $j++) { 
                    echo $idrule;
                  $query = $this->db->query($sql, array($idrule, $Anteseden[$j], $_POST['Consequent'][$i],$Support[$i], $Confidance[$i],$abterjual[$i], $aterjual[$i])); 
               }
            }else if(count($Anteseden)<2){
                  $sql1="SELECT ifnull(max(id_rule),0) as id_rule from detail_rule";
                    $query = $this->db->query($sql1)->getResult();
                    foreach ($query as $value) {
                        $idrule=$value->id_rule+1;
                    }

                for ($k=0; $k < count($consequent) ; $k++) { 
                    // echo $consequent[$k];
                    //  echo $_POST['Anteseden'][$i];
                    // echo $idrule."-".$_POST['Anteseden'][$i].;
                    $query = $this->db->query($sql, array($idrule, $_POST['Anteseden'][$i], $consequent[$k], $Support[$i], $Confidance[$i],$abterjual[$i], $aterjual[$i]));
                }
            }else if(count($Anteseden)==1&&count($consequent==1)){
                  $sql1="SELECT ifnull(max(id_rule),0) as id_rule from detail_rule";
                    $query = $this->db->query($sql1)->getResult();
                    foreach ($query as $value) {
                        $idrule=$value->id_rule+1;
                    }
                 $query = $this->db->query($sql, array($idrule, $_POST['Anteseden'][$i], $_POST['Consequent'][$i],$Support[$i], $Confidance[$i],$abterjual[$i], $aterjual[$i]));
            }
        }
    }

    public function cek_rule(){

    $sql="SELECT count(*) as jumlahdata from asociation_rule";
    $query = $this->db->query($sql)->getResult();
    foreach ($query as $row){
        $jumlahdata=$row->jumlahdata;
        }
    return $jumlahdata;
    }
    public function deactivaterule(){
        $sql="UPDATE master_min_rule set status='non active' where status='active'";
        return $query=$this->db->query($sql);

    }
    public function activaterule($id){
        $sql="UPDATE master_min_rule set status='active' where id=?";
        return $query=$this->db->query($sql, array($id));

    }
    public function deleterule(){
        $sql="DELETE from asociation_rule";
        return $query=$this->db->query($sql);
    }
    public function deletedetail(){
        $sql="DELETE from detail_rule";
        return $query=$this->db->query($sql);
    }

   
     public function data_detailrule(){
       $sql="SELECT a.*, b.nama_produk as produk_pilihan, c.nama_produk as produk_rekomen from detail_rule as a join produk as b on (a.id_produk=b.kode_produk) join produk as c on (a.produk_rekomendasi=c.kode_produk)";

        return $query=$this->db->query($sql)->getResult();
    }
      
}