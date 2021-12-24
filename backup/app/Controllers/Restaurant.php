<?php

namespace App\Controllers;

// use App\Models\AsosiasiruleModel;

class Restaurant extends BaseController
{    public function __construct()
    {   session_start();
         // $this->AsosiasiruleModel = new AsosiasiruleModel();
    }
    public function index()
    {   
        // echo view('Home/index');
        echo view('dashboard_cust_head');
        echo view('nav_header');
         echo view('dashboard_cust');
         echo view('footer_cust');
    }
    public function daftarmenu(){
        // $data['activmenu']='#609312';
        echo view('dashboard_cust_head');
        echo view('nav_header');
        echo view('Menu_viewcust/Daftarmenu');
       
    }
    
    public function Asosiasirule(){
        // $data['minSupport']=4;
        // $data['data_item']=$this->Asosiasirulemodel->data_penjualan();
        // $data['arr']=$this->Asosiasirulemodel->jumlah_data($data['data_item']);
        // $data['frekuensi_item']=$this->Asosiasirulemodel->frekuensiItem($data['arr']);
        // $data['dataEliminasi']=$this->Asosiasirulemodel->eliminasiItem($data['frekuensi_item'],$data['minSupport']);
        // $data['pasangan_item']=$this->Asosiasirulemodel->pasanganItem($data['dataEliminasi']);
        // $data['frekuensi_item1']=$this->Asosiasirulemodel->frekuensiPasanganItem($data['pasangan_item'],$data['arr']);
        // echo view('asosiasi2', $data);
    }
}
