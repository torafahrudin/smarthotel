<?php

namespace App\Controllers;

use App\Models\Asosiasirulemodel;
use Phpml\Association\Apriori;

class AsociationRule extends BaseController
{   
    public function index()
    {     $samples = [['Bread', 'Milk'], 
                    ['Bread', 'Diaper', 'Beer', 'Eggs'],
                    ['Milk', 'Diaper', 'Beer', 'Coke'], 
                    ['Bread', 'Milk', 'Diaper', 'Beer'], 
                    ['Bread', 'Milk', 'Diaper', 'Coke']];
        $labels  = [];

        $associator = new Apriori($support = 0.4, $confidence = 0.6);
        $associator->train($samples, $labels);
        $data['Samples'] = $samples;
        $data['Rules'] = $associator->getRules();
        $data['jumlahtrans'] = count($samples);

        // echo "<pre>";
        // print_r($data['Rules']);
        // echo "</pre>";
        echo view('Mesinlearning/Asosiasi', $data);
    }
    
    public function cobaasosiasi()
    {
        
       
    }

   
}
