<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderRoomModel extends Model
{
    protected $table      = 'order_kamar';
    protected $primaryKey = 'id_order';
    protected $allowedFields = ['id_order', 'id_tipe_kamar', 'id_header_billing', 'id_sub_billing', 'id_fasilitas', 'jumlah', 'harga', 'room_image', 'status'];

    public function getOrder()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getHeader($id_kamar)
    {
        $builder = $this->db->table('kamar');
        $builder->select('id_header_billing');
        $builder->where('id_kamar', $id_kamar);
        $query   = $builder->get()->getResultArray();
        foreach ($query as $data) {
            $id_header_billing = $data['id_header_billing'];
        }
        return $id_header_billing;
    }

    public function getSub($id_kamar)
    {
        $builder = $this->db->table('kamar');
        $builder->select('id_sub_billing');
        $builder->where('id_kamar', $id_kamar);
        $query   = $builder->get()->getResultArray();
        foreach ($query as $data) {
            $id_sub_billing = $data['id_sub_billing'];
        }
        return $id_sub_billing;
    }

    public function getDataAll()
    {
        $builder = $this->db->table('order_kamar');
        $builder->select('order_kamar.*,order_kamar.status_order as sts,kamar.*, customer.nama_customer as nama_customer, detail_booking.tanggal_checkin as booking_checkin,header_billing.keterangan as ket1, sub_billing.keterangan as ket2');
        $builder->join('kamar', 'kamar.id_kamar = order_kamar.id_kamar');
        $builder->join('customer', 'customer.id_customer = customer.id_customer');
        $builder->join('detail_booking', 'detail_booking.id_booking = detail_booking.id_booking');
        $builder->join('header_billing', 'header_billing.id_header_billing = kamar.id_header_billing');
        $builder->join('sub_billing', 'sub_billing.id_sub_billing = kamar.id_sub_billing');
        $builder->groupBy('order_kamar.id_order');
        $builder->groupBy('order_kamar.id_kamar');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getDataBooking()
    {
        $builder = $this->db->table('order_kamar');
        $builder->select('order_kamar.*,order_kamar.status_order as sts,kamar.*, customer.nama_customer as nama_customer, detail_booking.tanggal_checkin as booking_checkin,header_billing.keterangan as ket1, sub_billing.keterangan as ket2');
        $builder->join('kamar', 'kamar.id_kamar = order_kamar.id_kamar', 'left');
        $builder->join('customer', 'customer.id_customer = customer.id_customer', 'left');
        $builder->join('detail_booking', 'detail_booking.id_booking = detail_booking.id_booking', 'left');
        $builder->join('header_billing', 'header_billing.id_header_billing = kamar.id_header_billing', 'left');
        $builder->join('sub_billing', 'sub_billing.id_sub_billing = kamar.id_sub_billing', 'left');
        $builder->where('order_kamar.status_order', 'Booking');
        $builder->groupBy('order_kamar.id_order');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getDataCheckin()
    {
        $builder = $this->db->table('order_kamar');
        $builder->select('order_kamar.*,order_kamar.status_order as sts,kamar.*, customer.nama_customer as nama_customer, detail_booking.tanggal_checkin as booking_checkin,header_billing.keterangan as ket1, sub_billing.keterangan as ket2');
        $builder->join('kamar', 'kamar.id_kamar = order_kamar.id_kamar', 'left');
        $builder->join('customer', 'customer.id_customer = customer.id_customer', 'left');
        $builder->join('detail_booking', 'detail_booking.id_booking = detail_booking.id_booking', 'left');
        $builder->join('header_billing', 'header_billing.id_header_billing = kamar.id_header_billing', 'left');
        $builder->join('sub_billing', 'sub_billing.id_sub_billing = kamar.id_sub_billing', 'left');
        $builder->where('order_kamar.status_order', 'Checkin');
        $builder->groupBy('order_kamar.id_order');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getDataCheckout()
    {
        $builder = $this->db->table('order_kamar');
        $builder->select('order_kamar.*,order_kamar.status_order as sts,kamar.*, customer.nama_customer as nama_customer, detail_booking.tanggal_checkin as booking_checkin,header_billing.keterangan as ket1, sub_billing.keterangan as ket2');
        $builder->join('kamar', 'kamar.id_kamar = kamar.id_kamar', 'left');
        $builder->join('customer', 'customer.id_customer = customer.id_customer', 'left');
        $builder->join('detail_booking', 'detail_booking.id_booking = detail_booking.id_booking', 'left');
        $builder->join('header_billing', 'header_billing.id_header_billing = kamar.id_header_billing', 'left');
        $builder->join('sub_billing', 'sub_billing.id_sub_billing = kamar.id_sub_billing', 'left');
        $builder->where('order_kamar.status_order', 'Checkout');
        $builder->groupBy('order_kamar.id_order');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function code_order_ID()
    {
        $builder = $this->db->table('order_kamar');
        $builder->selectMax('id_order', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_order = 'ORDER-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_order = $id_order . $nomor;
        return $id_order;
    }

    public function code_booking_ID()
    {
        $builder = $this->db->table('detail_booking');
        $builder->selectMax('id_booking', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_booking = 'BK-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_booking = $id_booking . $nomor;
        return $id_booking;
    }

    public function createOrder($data)
    {
        $query = $this->db->table('order_kamar')->insert($data);
        return $query;
    }

    public function createOrderBooking($data)
    {
        $query = $this->db->table('detail_booking')->insert($data);
        return $query;
    }

    public function updateOrderCheckin($data, $id)
    {
        $query = $this->db->table('order_kamar')->update($data, array('id_order' => $id));
        return $query;
    }
}
