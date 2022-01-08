<?php

namespace App\Controllers;

use \App\Models\RoomModel;
use \App\Models\HeaderBillingModel;
use \App\Models\SubBillingModel;

class Room extends BaseController
{
    protected $validation;
    protected $roomModel;
    protected $hdModel;
    protected $sbModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->roomModel = new RoomModel();
        $this->hdModel = new HeaderBillingModel();
        $this->sbModel = new SubBillingModel();
    }

    public function index()
    {
        $data = [
            'title'      => 'Data Kamar',
            'room'       => $this->roomModel->getListRoom(),
        ];
        return view('kamar/view_data_kamar', $data);
    }

    public function add()
    {
        $data = [
            'title'                 => 'Tambah Data Kamar',
            'id_kamar'              => $this->roomModel->code_kamar_ID(),
            'header'                => $this->hdModel->getHeaderBilling(),
            'sub'                   => $this->sbModel->getSubBilling(),
            'validation'            => $this->validation->setRules($this->roomModel->rules())
        ];
        return view('kamar/add_data_kamar', $data);
    }

    public function create()
    {
        $data = [
            'title'                 => 'Tambah Data Kamar',
            'id_kamar'              => $this->roomModel->code_kamar_ID(),
            'header'                => $this->hdModel->getHeaderBilling(),
            'sub'                   => $this->sbModel->getSubBilling(),
        ];
        $this->validation->setRules($this->roomModel->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        $fileRoom = $this->request->getFile('room_image');
        $fileRoom->move('assets/images/room');
        $RoomName = $fileRoom->getName();

        if ($isDataValid) {

            $data = array(
                'id_kamar' => $this->roomModel->code_kamar_ID(),
                'id_header_billing' => $this->request->getPost('id_header_billing'),
                'id_sub_billing' => $this->request->getPost('id_sub_billing'),
                'kapasitas' => $this->request->getPost('kapasitas'),
                'jumlah' => $this->request->getPost('jumlah'),
                'harga' => $this->request->getPost('harga'),
                'keterangan' => $this->request->getPost('keterangan'),
                'room_image' => $RoomName,
            );
            $this->roomModel->createRoom($data);
            session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
            return redirect()->to('/room');
        } else {
            $data['validation'] = $this->validation;
            return view('kamar/add_data_kamar', $data);
        }
    }

    public function edit($id_kamar)
    {
        $data = [
            'title'                 => 'Edit Data Kamar',
            'room'                  => $this->roomModel->where('id_kamar', $id_kamar)->first(),
            'header'                => $this->hdModel->getHeaderBilling(),
            'sub'                   => $this->sbModel->getSubBilling(),
            'validation'            => $this->validation->setRules($this->roomModel->rules())
        ];
        return view('kamar/edit_data_kamar', $data);
    }

    public function update()
    {
        $id_kamar = $this->request->getPost('id_kamar');
        $data = [
            'title'                 => 'Edit Data Kamar',
            'room'                  => $this->roomModel->where('id_kamar', $id_kamar)->first(),
            'header'                => $this->hdModel->getHeaderBilling(),
            'sub'                   => $this->sbModel->getSubBilling(),
        ];
        $this->validation->setRules($this->roomModel->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        $fileRoom = $this->request->getFile('room_image');
        $fileRoom->move('assets/images/room');
        $RoomName = $fileRoom->getName();

        if ($isDataValid) {
            $data = array(
                'id_header_billing' => $this->request->getPost('id_header_billing'),
                'id_sub_billing' => $this->request->getPost('id_sub_billing'),
                'kapasitas' => $this->request->getPost('kapasitas'),
                'jumlah' => $this->request->getPost('jumlah'),
                'harga' => $this->request->getPost('harga'),
                'keterangan' => $this->request->getPost('keterangan'),
                'room_image' => $RoomName,
            );
            $this->roomModel->updateRoom($data, $id_kamar);
            session()->setFlashdata('success', 'Data Kamar Berhasil Diubah');

            return redirect()->to('/room');
        } else {
            $data['validation'] = $this->validation;
            return view('kamar/edit_data_kamar', $data);
        }
    }

    public function detail($id_kamar = '')
    {
        $data = [
            'title'     => 'Data Kamar',
            'room'       => $this->roomModel->getDetailRoom($id_kamar),
        ];
        // dd($data);
        return view('kamar/detail_data_kamar', $data);
    }

    public function delete()
    {
        $id = $this->request->getPost('id_kamar');
        $kamar = $this->roomModel->find($id);
        unlink('assets/images/room/' . $kamar['room_image']);
        $this->roomModel->deleteRoom($id);
        session()->setFlashdata('success', 'Data Kamar Berhasil Dihapus');

        return redirect()->to('/room');
    }
}
