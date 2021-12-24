<?php

namespace App\Models;

use CodeIgniter\Model;

class RtbModel extends Model
{
	public function getAll()
	{
		$dbResult = $this->db->query("SELECT * FROM order_kamar ");
		return $dbResult->getResult();
	}

	function Price($harga, $id_order)
	{
		$query = $this->db->query(
			"SELECT a.harga 
			FROM kamar a  
			JOIN order_kamar b 
			ON(a.id_kamar=b.id_kamar) 
			WHERE id_order='$id_order'",
			$harga,
			$id_order
		);
		return $query->getResult();

		// $query = $this->db->select('harga')
		// 	->from('real_time_billing')
		// 	->where('id_order', $harga)
		// 	->get();
		// return $query->row_array();
	}
	public function getOrder() // ini function yang muncul di real time billing gabungan beberapa tabel
	{
		$query = $this->db->query("SELECT a.id_order, c.nama_customer, a.id_kamar, b.harga, a.status_order, b.status, a.checkin, a.checkout
		FROM order_kamar a
		JOIN kamar b
		ON(a.id_kamar=b.id_kamar)
		JOIN customer c
		ON(a.id_customer=c.id_customer)
		HAVING a.status_order != 'checkout'
		ORDER BY a.id_order");
		return $query->getResult();
	}
	public function GetDetail($id_order) //ini function untuk tombol detail 
	{
		$query = $this->db->query("SELECT a.id_order, c.nama_customer, a.id_kamar,a.id_booking ,b.harga, b.status, a.checkin, a.checkout
		FROM order_kamar a
		JOIN kamar b
		ON(a.id_kamar=b.id_kamar)
		JOIN customer c
		ON(a.id_customer=c.id_customer)
		WHERE a.id_order='$id_order'", array($id_order));
		return $query->getResult();
	}
	public function ubahstatus($id)
	{
		$query = $this->db->query("UPDATE order_kamar SET status_order='checkout' where id_order=?", array($id));
		return $query;
	}

	public function GetDetailByCust($id_customer) //ini function untuk tombol detail 
	{
		$query = $this->db->query("SELECT a.id_order, c.nama_customer, a.id_kamar,a.id_booking ,b.harga, b.status, a.checkin, a.checkout
		FROM order_kamar a
		JOIN kamar b
		ON(a.id_kamar=b.id_kamar)
		JOIN customer c
		ON(a.id_customer=c.id_customer)
		WHERE a.id_customer='$id_customer'", array($id_customer));
		return $query->getResult();
	}
}
