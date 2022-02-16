<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KmeansModel;

class KmeansController extends BaseController
{

    public function __construct()
    {
        $this->kmeans = new KmeansModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Clustering Data (KMeans)',
            'menu' => $this->menu->get_menu()
        ];

        return view('kmeans/kmeans', $data);
    }

    public function load_data()
    {
        $data = $this->kmeans->clustering_data();

        echo  json_encode($data);
    }

    public function get_reco()
    {
        $data = $this->kmeans->get_reco();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die;
        echo  json_encode($data);
    }
}

