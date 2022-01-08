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

    public function getHeaderFasilitas($id_fasilitas)
    {
        $builder = $this->db->table('m_fasilitas');
        $builder->select('id_header_billing');
        $builder->where('id_fasilitas', $id_fasilitas);
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

    public function getSubFasilitas($id_fasilitas)
    {
        $builder = $this->db->table('m_fasilitas');
        $builder->select('id_sub_billing');
        $builder->where('id_fasilitas', $id_fasilitas);
        $query   = $builder->get()->getResultArray();
        foreach ($query as $data) {
            $id_sub_billing = $data['id_sub_billing'];
        }
        return $id_sub_billing;
    }

    public function getDataAll()
    {
        $builder = $this->db->table('order_kamar');
        $builder->select('order_kamar.*,order_kamar.status_order as sts,kamar.*, customer.nama_customer as nama_customer, detail_booking.tanggal_checkin as booking_checkin,a.keterangan as ket1, c.keterangan as ket2,b.keterangan as ket3, d.keterangan as ket4,tbl_qr.*, m_fasilitas.nama_fasilitas,m_fasilitas.harga,m_fasilitas.harga as harga_fasilitas');
        $builder->join('kamar', 'kamar.id_kamar = order_kamar.id_kamar', 'left');
        $builder->join('m_fasilitas', 'm_fasilitas.id_fasilitas = order_kamar.id_fasilitas', 'left');
        $builder->join('tbl_qr', 'tbl_qr.id_order = order_kamar.id_order', 'left');
        $builder->join('customer', 'customer.id_customer = order_kamar.id_customer');
        $builder->join('detail_booking', 'detail_booking.id_booking = order_kamar.id_booking');
        $builder->join('header_billing a', 'a.id_header_billing = kamar.id_header_billing', 'left');
        $builder->join('header_billing b', 'b.id_header_billing = m_fasilitas.id_header_billing', 'left');
        $builder->join('sub_billing c', 'c.id_sub_billing = kamar.id_sub_billing', 'left');
        $builder->join('sub_billing d', 'd.id_sub_billing = m_fasilitas.id_sub_billing', 'left');
        // $builder->orderBy('order_kamar.id_order');
        $builder->groupBy('order_kamar.id_order');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getDataBooking()
    {
        $builder = $this->db->table('order_kamar');
        $builder->select('order_kamar.*,order_kamar.status_order as sts,kamar.*, customer.nama_customer as nama_customer, detail_booking.tanggal_checkin as booking_checkin,header_billing.keterangan as ket1, sub_billing.keterangan as ket2,tbl_qr.*,m_fasilitas.nama_fasilitas,m_fasilitas.harga,m_fasilitas.harga as harga_fasilitas');
        $builder->join('kamar', 'kamar.id_kamar = order_kamar.id_kamar', 'left');
        $builder->join('customer', 'customer.id_customer = order_kamar.id_customer', 'left');
        $builder->join('detail_booking', 'detail_booking.id_booking = detail_booking.id_booking', 'left');
        $builder->join('header_billing', 'header_billing.id_header_billing = kamar.id_header_billing', 'left');
        $builder->join('sub_billing', 'sub_billing.id_sub_billing = kamar.id_sub_billing', 'left');
        $builder->join('tbl_qr', 'tbl_qr.id_order = order_kamar.id_order', 'left');
        $builder->join('m_fasilitas', 'm_fasilitas.id_fasilitas = order_kamar.id_fasilitas', 'left');
        $builder->where('order_kamar.status_order', 'Booking');
        $builder->groupBy('order_kamar.id_order');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getDataCheckin()
    {
        $builder = $this->db->table('order_kamar');
        $builder->select('order_kamar.*,order_kamar.status_order as sts,kamar.*, customer.nama_customer as nama_customer, detail_booking.tanggal_checkin as booking_checkin,header_billing.keterangan as ket1, sub_billing.keterangan as ket2,tbl_qr.*,m_fasilitas.nama_fasilitas,m_fasilitas.harga,m_fasilitas.harga as harga_fasilitas');
        $builder->join('kamar', 'kamar.id_kamar = order_kamar.id_kamar', 'left');
        $builder->join('customer', 'customer.id_customer = customer.id_customer', 'left');
        $builder->join('detail_booking', 'detail_booking.id_booking = detail_booking.id_booking', 'left');
        $builder->join('header_billing', 'header_billing.id_header_billing = kamar.id_header_billing', 'left');
        $builder->join('sub_billing', 'sub_billing.id_sub_billing = kamar.id_sub_billing', 'left');
        $builder->join('tbl_qr', 'tbl_qr.id_order = order_kamar.id_order', 'left');
        $builder->join('m_fasilitas', 'm_fasilitas.id_fasilitas = order_kamar.id_fasilitas', 'left');
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

    public function getDataDetail($id_order)
    {
        $builder = $this->db->table('order_kamar');
        $builder->select('order_kamar.*,order_kamar.status_order as sts,order_kamar.harga_kamar as hrg1, order_kamar.harga_fasilitas as hrg2,kamar.harga as harga_kamar,kamar.room_image as room_image, customer.nama_customer as nama_customer, detail_booking.tanggal_checkin as booking_checkin,a.keterangan as ket1, c.keterangan as ket2,b.keterangan as ket3, d.keterangan as ket4,tbl_qr.*,m_fasilitas.nama_fasilitas,m_fasilitas.harga as harga_fasilitas');
        $builder->join('kamar', 'kamar.id_kamar = order_kamar.id_kamar', 'left');
        $builder->join('m_fasilitas', 'm_fasilitas.id_fasilitas = order_kamar.id_fasilitas', 'left');
        $builder->join('tbl_qr', 'tbl_qr.id_order = order_kamar.id_order', 'left');
        $builder->join('customer', 'customer.id_customer = order_kamar.id_customer');
        $builder->join('detail_booking', 'detail_booking.id_booking = order_kamar.id_booking');
        $builder->join('header_billing a', 'a.id_header_billing = kamar.id_header_billing', 'left');
        $builder->join('header_billing b', 'b.id_header_billing = m_fasilitas.id_header_billing', 'left');
        $builder->join('sub_billing c', 'c.id_sub_billing = kamar.id_sub_billing', 'left');
        $builder->join('sub_billing d', 'd.id_sub_billing = m_fasilitas.id_sub_billing', 'left');
        $builder->where('order_kamar.id_order', $id_order);
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
        $code = substr($jml_data, 3, -7);
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

    public function updateOrderCheckinViaQrCode($data, $id)
    {
        $query = $this->db->table('order_kamar')->update($data, array('id_order' => $id));
        return $query;
    }
}
