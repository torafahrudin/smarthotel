<?php 
namespace App\Controllers;

use App\Models\ProdukModel;

class OurMenu extends BaseController
{    public function __construct()
    {   session_start();
         $this->ProdukModel = new ProdukModel();
    }

    public function index(){
        $data['produk']=$this->ProdukModel->getAll();
        echo view('dashboard_cust_head');
        echo view('nav_header');
        echo view('Menu_viewcust/Daftarmenu', $data);
       
    } 
}
 ?>
