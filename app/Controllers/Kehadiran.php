<?php

namespace App\Controllers;

use \App\Models\KehadiranModel;
use \App\Models\PegawaiModel;


class Kehadiran extends BaseController
{
    protected $kehadiranModel;
    //protected $pegawaiModel;

    public function __construct()
    {
        $this->kehadiranModel = new KehadiranModel();
        //$this->pegawaiModel = new PegawaiModel();
    }

    public function index()
    {
        $data = [
            'title'             => 'Data Kehadiran',
            'kehadiran'         => $this->kehadiranModel->getAll(),
            //'list_pegawai'      => $this->pegawaiModel->getListPegawai()
        ];
        // dd($data);
        return view('kehadiran/view_detail_kehadiran', $data);
    }

    public function addKehadiran()
    {
        $waktu = date("Y-m-d", strtotime($this->request->getPost('bulan')));;
        $data = array(
            'id_pegawai' => $this->request->getPost('id_pegawai'),
            'bulan' => $waktu,
            'jumlah_kehadiran' => $this->request->getPost('demo0'),
        );
        // dd($waktu);
        $this->kehadiranModel->createKehadiran($data);
        session()->setFlashdata('success', 'Data Kehadiran Berhasil Ditambahkan');

        return redirect()->to('/kehadiran');
    }

    public function editKehadiran()
    {
        $id = $this->request->getPost('id');
        $data = array(
            'id_pegawai' => $this->request->getPost('id_pegawai'),
            'bulan' => $this->request->getPost('bulan'),
            'jumlah_kehadiran' => $this->request->getPost('demo0'),
        );
        $this->kehadiranModel->updateKehadiran($data, $id);
        session()->setFlashdata('success', 'Data Kehadiran Berhasil Diubah');

        return redirect()->to('/kehadiran');
    }

    public function deleteKehadiran()
    {
        $id = $this->request->getPost('id');
        $this->kehadiranModel->deleteKehadiran($id);
        session()->setFlashdata('success', 'Data Kehadiran Berhasil Dihapus');

        return redirect()->to('/kehadiran');
    }

    public function simpanExcel()
		{
			$file_excel = $this->request->getFile('fileexcel');
			$ext = $file_excel->getClientExtension();
			if($ext == 'xls') {
				$render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			} else {
				$render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			$spreadsheet = $render->load($file_excel);
	
			$data = $spreadsheet->getActiveSheet()->toArray();
			foreach($data as $x => $row) {
				if ($x == 0) {
					continue;
				}
				
				$id = $row[0];
				$nama = $row[1];
				$tgl = $row[2];
                $jmmasuk = $row[3];
				$jmpulang = $row[4];
				$scmasuk = $row[5];
                $scpulang = $row[6];
				$telat = $row[7];
				$plgcepat = $row[8];
                $absent = $row[9];
	
				$db = \Config\Database::connect();

				$cekid = $db->table('trans_detail_kehadiran')->getWhere(['no_id'=>$id])->getResult();

				if(count($cekid) > 0) {
					session()->setFlashdata('message','<b style="color:red">Data Gagal diimport</b>');
				} else {
	
				$simpandata = [
					'no_id' => $id, 
                    'nama' => $nama, 
                    'tgl'=> $tgl,
                    'jam_masuk' => $jmmasuk, 
                    'jam_pulang' => $jmpulang, 
                    'scan_masuk'=> $scmasuk,
                    'scan_pulang' => $scpulang, 
                    'terlambat' => $telat, 
                    'pulang_cepat'=> $plgcepat,
                    'absent'=> $absent
				];
                    
				$db->table('trans_detail_kehadiran')->insert($simpandata);
                
                
				session()->setFlashdata('message','Berhasil import excel'); 
			}
		}
			
			return redirect()->to('/kehadiran/inputhadir');
		}

        public function inputhadir()
        {   
            
            $db = \Config\Database::connect();
            $nama = 'sasa';
            $tgl = 'desember';
            $jml_hadir = '2';

                $data = array(
                    
                    'id_pegawai' => $this->request->getPost('id_pegawai'),
                    'bulan' => $tgl,
                    'jumlah_kehadiran' => $jml_hadir
                );
                $db->table('kehadiran')->insert($data);

                return redirect()->to('/kehadiran');
        }
}

