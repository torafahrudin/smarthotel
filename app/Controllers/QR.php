<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Libraries\Ciqrcode;
use App\Models\QR_model;
use Kenjis\CI3Compatible\Core\CI_Input;

use function bin2hex;
use function file_exists;
use function mkdir;

/**
 * @property QR_model $qr_model
 * @property Ciqrcode $ciqrcode
 * @property CI_Input $input
 */
class QR extends MY_Controller
{
    /*
    |-------------------------------------------------------------------
    | Construct
    |-------------------------------------------------------------------
    |
    */
    function __construct()
    {
        parent::__construct();
        $this->load->model('qr_model');
    }

    /*
    |-------------------------------------------------------------------
    | Index
    |-------------------------------------------------------------------
    |
    */
    function index(): void
    {
        $data['title']   = 'Tes QR Code';
        $data['qr_list'] = $this->qr_model->fetch_datas();

        $this->load->view('qr/view_data_qr', $data);
    }

    /*
    |-------------------------------------------------------------------
    | Generate QR Code
    |-------------------------------------------------------------------
    |
    | @param $data   QR Content
    |
    */
    function generate_qrcode($data, $id_order)
    {
        /* Load QR Code Library */
        $this->load->library('ciqrcode');

        /* Data */
        $hex_data   = bin2hex($data);
        $save_name  = $hex_data . '.png';

        /* QR Code File Directory Initialize */
        $dir = 'assets/media/qrcode/';
        if (!file_exists($dir)) {
            mkdir($dir, 0775, true);
        }

        /* QR Configuration  */
        $config['cacheable']    = true;
        $config['imagedir']     = $dir;
        $config['quality']      = true;
        $config['size']         = '1024';
        $config['black']        = [255, 255, 255];
        $config['white']        = [255, 255, 255];
        $this->ciqrcode->initialize($config);

        /* QR Data  */
        $params['data']     = $data;
        $params['level']    = 'L';
        $params['size']     = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $save_name;

        $this->ciqrcode->generate($params);

        /* Return Data */
        return [
            'id_order' => $id_order,
            'content' => $data,
            'file'    => $dir . $save_name,
        ];
    }

    /*
    |-------------------------------------------------------------------
    | Add Data
    |-------------------------------------------------------------------
    |
    */
    function add_data($id_order, $urlCheckin)
    {
        /* Generate QR Code */
        $data = $urlCheckin;
        $qr   = $this->generate_qrcode($data, $id_order);

        /* Add Data */
        if ($this->qr_model->insert_data($qr)) {
            $this->modal_feedback('success', 'Success', 'Add Data Success', 'OK');
        } else {
            $this->modal_feedback('error', 'Error', 'Add Data Failed', 'Try again');
        }

        return redirect()->to(site_url('/home'));
    }

    /*
    |-------------------------------------------------------------------
    | Edit Data
    |-------------------------------------------------------------------
    |
    | @param $id    ID Data
    |
    */
    function edit_data($id, $id_order)
    {
        /* Old QR Data */
        $old_data = $this->qr_model->fetch_data($id);
        $old_file = FCPATH . $old_data['file'];

        /* Generate New QR Code */
        $data = $this->input->post('content');
        $qr   = $this->generate_qrcode($data, $id_order);

        /* Edit Data */
        if ($this->qr_model->update_data($id, $old_file, $qr)) {
            $this->modal_feedback('success', 'Success', 'Edit Data Success', 'OK');
        } else {
            $this->modal_feedback('error', 'Error', 'Edit Data Failed', 'Try again');
        }

        return redirect()->to(site_url('/'));
    }

    /*
    |-------------------------------------------------------------------
    | Remove Data
    |-------------------------------------------------------------------
    |
    | @param $id    ID Data
    |
    */
    function remove_data($id)
    {
        /* Current QR Data */
        $qr_data = $this->qr_model->fetch_data($id);
        $qr_file = $qr_data['file'];

        /* Delete Data */
        if ($this->qr_model->delete_data($id, $qr_file)) {
            $this->modal_feedback('success', 'Success', 'Delete Data Success', 'OK');
        } else {
            $this->modal_feedback('error', 'Error', 'Delete Data Failed', 'Try again');
        }

        return redirect()->to(site_url('/'));
    }
}
