<?php

namespace App\Controllers;

use App\Models\Asosiasirulemodel;
use Phpml\Association\Apriori;

class AsociationRule extends BaseController
{    public function __construct()
    {   session_start();
         $this->Asosiasirulemodel = new Asosiasirulemodel();
    }
    public function index()
    {    //$data['minSupport']=0.4;
        // $data['data_item']=$this->Asosiasirulemodel->data_penjualan();
        // $data['arr']=$this->Asosiasirulemodel->data_contoh();//$this->Asosiasirulemodel->jumlah_data($data['data_item']);
        // $data['jumlahtransaksi']=count($data['arr']);
        // $data['frekuensi_item']=$this->Asosiasirulemodel->frekuensiItem($data['arr']);
        // $data['dataEliminasi']=$this->Asosiasirulemodel->eliminasiItem($data['frekuensi_item'],$data['minSupport'], $data['jumlahtransaksi']);
        // $data['pasangan_item']=$this->Asosiasirulemodel->pasanganItem($data['dataEliminasi']);
        // $data['frekuensi_item1']=$this->Asosiasirulemodel->frekuensiPasanganItem($data['pasangan_item'],$data['arr']);
        // $data['dataEliminasi1']=$this->Asosiasirulemodel->eliminasiItem($data['frekuensi_item1'],$data['minSupport'],$data['jumlahtransaksi']);
        // $data['data_rule']=$this->Asosiasirulemodel->data_rule();
        // $data['produk']=[];
        // foreach ($data['data_rule'] as $value) {
        //     $ar=[];
        //     $ar['produkdipilih']=$value->produk_a;
        //     $ar['produkrekomendasi']=$value->produk_b;

        //     array_push($data['produk'], $ar);
        // }
        // echo view('Data_rule/Data_rule', $data);
        
        $samples = [['Bread', 'Milk'], 
                     ['Bread', 'Diaper', 'Beer', 'Eggs'],
                     ['Milk', 'Diaper', 'Beer', 'Coke'], 
                     ['Bread', 'Milk', 'Diaper', 'Beer'], 
                     ['Bread', 'Milk', 'Diaper', 'Coke']];
        // REKOMENDASI CONTOH DENGAN NAMA PRODUK
        $labels  = [];
        $samples2=$this->Asosiasirulemodel->data_penjualan_bynamaproduk();
        $data['jumlahdata']=$this->Asosiasirulemodel->jumlah_data($samples2);
        $associator = new Apriori($support = 0.4, $confidence = 0.6);
        $associator->train($samples, $labels);
        $data['Samples'] =  $samples;
        $data['Rules'] = $associator->getRules();
        $data['jumlahtrans']=count($samples);

        //REKOMENDASI DENGAN KODE PRODUK
        // $labels2  = [];
        //  $samples3=$this->Asosiasirulemodel->data_penjualan_bykodeproduk();
        //  $data['jumlahdata2']=$this->Asosiasirulemodel->jumlah_data($samples3);
        // $associator2 = new Apriori($support = 0.4, $confidence = 0.6);
        // $associator2->train($data['jumlahdata2'], $labels2);
        // $data['Samples2'] =  $data['jumlahdata2'];
        // $data['Rules2'] = $associator2->getRules();
        // $data['jumlahtrans2']=count($data['jumlahdata2']);

       
         return view('Mesinlearning/Asosiasicoba', $data);
    }
    
    public function cobaasosiasi()
    {
        
        $samples = [['Bread', 'Milk'], 
                    ['Bread', 'Diaper', 'Beer', 'Eggs'],
                    ['Milk', 'Diaper', 'Beer', 'Coke'], 
                    ['Bread', 'Milk', 'Diaper', 'Beer'], 
                    ['Bread', 'Milk', 'Diaper', 'Coke']];
        $labels  = [];

        $associator = new Apriori($support = 0.4, $confidence = 0.6);
        $associator->train($samples, $labels);
        $data['Samples'] = $samples;
        $data['Rules'] = $associator->getRules();

        echo "<pre>";
        print_r($data['Rules']);
        echo "</pre>";
    }
    
    public function deleterule(){
        $data['activmenu']='#609312';
        echo view('dashboard_cust_head');
        echo view('nav_header', $data);
        echo view('Menu_viewcust/Daftarmenu');
    }
    
    public function update(){
      $item=explode($_POST['Antecedent']);
       $recomen=explode($_POST['Consequent']);
      // print_r($data);
    $namaproduk=[];
    $recomenproduk=[];



      for ($i=0; $i < count($item) ; $i++) { 
       
           $hasil[$i]=$this->Asosiasirulemodel->name_produk($item[$i]);
             foreach($hasil[$i] as $row) {
               $namaproduk[$i]=$row->nama_produk;
           }
        }
      for ($i=0; $i < count($recomen) ; $i++) { 
       
           $hasil1[$i]=$this->Asosiasirulemodel->name_produk($recomen[$i]);
             foreach($hasil1[$i] as $row) {
               $produkrecomen[$i]=$row->nama_produk;
           }
        }
        $hasil = $this->Asosiasirulemodel->cek_rule();
        if($hasil==0){
        $assrule=$this->Asosiasirulemodel->update_rule($namaproduk,$produkrecomen);
        $assdetail = $this->Asosiasirulemodel->update_detail();
        }else{
            $deleterule=$this->Asosiasirulemodel->deleterule();
            $deleterule=$this->Asosiasirulemodel->deletedetail();
            $assrule=$this->Asosiasirulemodel->update_rule($namaproduk,$produkrecomen);
            $assdetail = $this->Asosiasirulemodel->update_detail();
        }

    }
     
}
