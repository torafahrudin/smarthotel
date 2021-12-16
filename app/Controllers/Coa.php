<?php
namespace App\Controllers;

use App\Models\CoaModel;

class Coa extends BaseController
{
    public function __construct()
    {
		session_start();
        $this->CoaModel = new CoaModel();
    }

	public function index()
	{

        $data['coa'] = $this->CoaModel->getAll();

        print_r($data['coa']);
        echo "<br>";
        echo "perubahan pertama";
	}
}