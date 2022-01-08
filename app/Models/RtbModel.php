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

	public function GetInfoCustomer($id_customer, $status_bayar)
	{
		if ($status_bayar == 'Belum Lunas') {
			$sql = "SELECT COUNT(*) AS jml
			FROM order_kamar
			WHERE id_customer = '$id_customer' AND `status_bayar` = '$status_bayar'";
			$dbResult = $this->db->query($sql, array($id_customer, $status_bayar));
		} else {
			$sql = "SELECT COUNT(*) AS jml
			FROM order_kamar
			WHERE id_customer = '$id_customer'";
			$dbResult = $this->db->query($sql, array($id_customer, $status_bayar));
		}
		$hasil = $dbResult->getResult();
		foreach ($hasil as $row) {
			$jml = $row->jml;
		}
		return $jml;
	}

	public function GetCustByOrder($id_order)
	{
		$query = $this->db->query("SELECT a.* FROM customer a 
		JOIN order_kamar b ON(a.id_customer=b.id_customer)
		WHERE b.id_order='$id_order'", array($id_order));
		return $query->getResult();
	}


	public function getCustBill()
	{
		$query = $this->db->query("SELECT b.id_customer, a.nama_customer, SUM(ifnull(b.harga_kamar,'0')+ifnull(b.harga_fasilitas,'0')) AS total_tagihan, b.status_order
		FROM customer a 
		JOIN order_kamar b
		ON (a.id_customer=b.id_customer)
		GROUP BY b.id_customer
        HAVING b.status_order != 'checkout'");
		return $query->getResult();
	}


	public function getOrder() // ini function yang muncul di real time billing gabungan beberapa tabel
	{
		$query = $this->db->query("SELECT a.id_order, c.nama_customer, a.id_kamar, b.harga, a.status_order, a.checkin, a.checkout
		FROM order_kamar a
		JOIN kamar b
		ON(a.id_kamar=b.id_kamar)
		JOIN customer c
		ON(a.id_customer=c.id_customer)
		HAVING a.status_order != 'checkout'
		ORDER BY a.id_order");
		return $query->getResult();
	}
	public function GetDetail($id_order) //ini function untuk pop up di tombol detail 
	{
		$query = $this->db->query("SELECT a.id_order, c.nama_customer, a.id_kamar,a.id_booking ,b.harga, a.checkin, a.checkout
		FROM order_kamar a
		JOIN kamar b
		ON(a.id_kamar=b.id_kamar)
		JOIN customer c
		ON(a.id_customer=c.id_customer)
		WHERE a.id_order='$id_order'", array($id_order));
		return $query->getResult();
	}
	public function ubahstatus($id_customer) //function untuk ubah status otomatis dari database
	{
		$query = $this->db->query("UPDATE order_kamar SET status_order='checkout' where id_customer=?", array($id_customer));
		return $query;
	}

	public function GetDetailByCust($id_customer)
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
