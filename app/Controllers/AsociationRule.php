<?php

namespace App\Controllers;

use App\Models\AsosiasiruleModel;
use Phpml\Association\Apriori;

class AsociationRule extends BaseController
{   
    public function __construct()
    {   session_start();
         $this->Asosiasirulemodel = new AsosiasiruleModel();
    }
    public function index()
    {    
        $minrule=$this->Asosiasirulemodel->get_minrule();
        foreach ($minrule as $value){
            $minsup=$value->min_sup;
            $mincon=$value->min_con;
        }
        $data['data_rule']=$this->Asosiasirulemodel->data_rule();
        $data['detail_rule']=$this->Asosiasirulemodel->data_detailrule();
        $samples = [['Bread', 'Milk'], 
                     ['Bread', 'Diaper', 'Beer', 'Eggs'],
                     ['Milk', 'Diaper', 'Beer', 'Coke'], 
                     ['Bread', 'Milk', 'Diaper', 'Beer'], 
                     ['Bread', 'Milk', 'Diaper', 'Coke']];
        // REKOMENDASI CONTOH DENGAN NAMA PRODUK
        $labels  = [];
        $data['minrule']=$this->Asosiasirulemodel->get_minrule_all();
        $samples2=$this->Asosiasirulemodel->data_penjualan_bynamaproduk();
        $data['jumlahdata']=$this->Asosiasirulemodel->jumlah_data($samples2);
        $associator = new Apriori($minsup, $mincon);
        $associator->train($data['jumlahdata'], $labels);
        $data['Samples'] =  $data['jumlahdata'];
        $data['Rules'] = $associator->getRules();
        $data['jumlahtrans']=count($data['jumlahdata']);

        //REKOMENDASI DENGAN KODE PRODUK
        $labels2  = [];
         $samples3=$this->Asosiasirulemodel->data_penjualan_bykodeproduk();
         $data['jumlahdata2']=$this->Asosiasirulemodel->jumlah_data($samples3);
        $associator2 = new Apriori($support = 0.4, $confidence = 0.6);
        $associator2->train($data['jumlahdata2'], $labels2);
        $data['Samples2'] =  $data['jumlahdata2'];
        $data['Rules2'] = $associator2->getRules();
        $data['jumlahtrans2']=count($data['jumlahdata2']);

       
         return view('Mesinlearning/Asosiasi', $data);
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
    public function tambahminrule(){
         $data['idminrule']=$this->Asosiasirulemodel->id_min_rule();
        if( !isset($_POST['id']) and !isset($_POST['min_sup']) and !isset($_POST['min_con'])){
            //kondisi awal ketika di akses, jadi tidak perlu memanggil validas
        
            echo view('Mesinlearning/inputminrule', $data);
        }
        else{
            $validation =  \Config\Services::validation();
            //di cek dulu apakah data isian memenuhi rules validasi yang dibuat
            if (! $this->validate(
                        [
                            'min_sup' => 'required|is_natural',
                            'min_con' => 'required|is_natural',
                        ],
                                [   // Errors
                                    'min_sup' => [
                                        'required' => 'Minimal support tidak boleh kosong',
                                        'is_natural' => 'Minimal support tidak boleh minus'
                                    ],
                                    'min_con' => [
                                        'required' => 'Minimal Confidance boleh kosong',
                                        'is_natural' => 'Minimal support tidak boleh minus'
                                    ], 
                                   
                                ]
                    )
            ){
                $data['validation']=$this->validator;
              echo view('Mesinlearning/inputminrule', $data);

            }else{
                //blok ini adalah blok jika sukses, yaitu panggil method                                         'is_natural' => 'Minimal support tidak boleh minus'insertData()
                //panggil metod dari kosan model untuk diinputkan datanya
                $hasil = $this->Asosiasirulemodel->tambahminrule();
           
                return redirect()->to(base_url('AsociationRule/data_min_rule')); 
            }
        }
    }

    public function activateminrule($id){
        $deactivate=$this->Asosiasirulemodel->deactivaterule();
        $activate=$this->Asosiasirulemodel->activaterule($id);
        return redirect()->to(base_url('AsociationRule'));
       
    }
    public function data_min_rule(){
        $data['minrule']=$this->Asosiasirulemodel->get_minrule_all();
        $data['idminrule']=$this->Asosiasirulemodel->id_min_rule();
        echo view('Mesinlearning/data_min_rule', $data);
    }
    
    public function update(){
        $string="percobaan";
        
      // $antesenden=explode(",",$_POST['Anteseden2']);
      //  $consequent=explode(",",$_POST['Consequent2']);
      // print_r($data);
        $hasil = $this->Asosiasirulemodel->cek_rule();
        if($hasil==0){
        $assrule=$this->Asosiasirulemodel->update_rule();
        $assdetail = $this->Asosiasirulemodel->update_detail();
            // print_r($_POST['Consequent']);

        }else{
            $deleterule=$this->Asosiasirulemodel->deleterule();
            $deleterule=$this->Asosiasirulemodel->deletedetail();
            $assrule=$this->Asosiasirulemodel->update_rule();
            $assdetail = $this->Asosiasirulemodel->update_detail();
        }
         return redirect()->to(base_url('AsociationRule'));

    }

   
}
