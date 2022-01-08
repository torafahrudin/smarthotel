<?php

namespace App\Models\Laporan;

use CodeIgniter\Model;

class BukuBesarModel extends Model
{
    protected $table      = 'jurnal';
    protected $primaryKey = 'id_jurnal';
    protected $allowedFields = ['id_jurnal', 'tanggal', 'id_akun', 'nominal', 'posisi', 'debet', 'kredit', 'reff', 'transaksi', 'id_transaksi'];

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getBukuBesar($akun = '', $month = '', $year = '')
    {
        $builder = $this->db->table('jurnal as a');
        $builder->select('a.id_transaksi,a.id_akun,a.tanggal,a.nominal,a.posisi,b.nama_akun,a.transaksi');
        $builder->join('akun as b', 'a.id_akun=b.id_akun');
        $builder->where('month(a.tanggal)', $month);
        $builder->where('year(a.tanggal)', $year);
        $builder->where('a.id_akun', $akun);
        $builder->orderBy('a.id_jurnal', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getPosisiSaldoAwal($akun)
    {
        if ($akun != null) {

            $sql = "SELECT sa FROM akun WHERE id_akun = " . $this->db->escape($akun);
            $query = $this->db->query($sql);
            $list = $query->getResultArray();
            $posisi_sa = 0;
            foreach ($list as $data) :
                $posisi_sa = $data['sa'];
            endforeach;
            return $posisi_sa;
        }
    }

    public function getPosisiSaldoNormal($akun)
    {
        if ($akun != null) {

            $sql = "SELECT saldo_normal FROM akun WHERE id_akun = " . $this->db->escape($akun);

            $query = $this->db->query($sql);
            $list = $query->getResultArray();
            $posisi_saldo_normal = '';
            foreach ($list as $data) :
                $posisi_saldo_normal = $data['saldo_normal'];
            endforeach;
            return $posisi_saldo_normal;
        }
    }

    public function getSaldoAwalBukuBesar($y, $m, $akun)
    {
        $posisi_saldo_normal = $this->getPosisiSaldoNormal($akun);
        $sa = $this->getPosisiSaldoAwal($akun);
        $m = str_pad($m, 2, "0", STR_PAD_LEFT);
        $waktu = $y . "-" . $m;
        $sql = "
						SELECT tbl1.posisi,ifnull(tbl2.total,0) as nominal FROM
						(
							SELECT 'k' posisi
							UNION
							SELECT 'd' posisi
						) tbl1
						LEFT OUTER JOIN
						(
							Select a.posisi,sum(a.nominal) as total
							FROM jurnal a
							JOIN akun b ON (a.id_akun=b.id_akun)
							WHERE a.id_akun = " . $akun . " 
							AND date_format(a.tanggal,'%Y-%m') < '" . $waktu . "'
							GROUP BY  a.posisi
							ORDER BY id_transaksi
						) tbl2
						ON (tbl1.posisi = tbl2.posisi)
			
			";
        $query = $this->db->query($sql);
        $list = $query->getResultArray();
        $saldo_debet = 0;
        $saldo_kredit = 0;
        foreach ($list as $data) :
            if (strcmp($data['posisi'], 'd') == 0) {
                $saldo_debet = $saldo_debet + $data['nominal'];
            } else {
                $saldo_kredit = $saldo_kredit + $data['nominal'];
            }
        endforeach;

        if (strcmp($posisi_saldo_normal, 'd') == 0) {
            $saldo = $saldo_debet - $saldo_kredit;
        } else {
            $saldo =  $saldo_kredit - $saldo_debet;
        }
        $saldo_total = $saldo + $sa;

        return $saldo_total;
    }
}
