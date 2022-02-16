<?php

namespace App\Models;

use CodeIgniter\Model;

class CoaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'coa_items';
    protected $primaryKey       = 'kode';
    protected $returnType       = 'array';

    protected $allowedFields    = ['kode', 'nama', 'dc', 'posted', 'sub_id', 'lock'];

    public function trans_id($sub_id)
    {
        $sql =  $this->db->table('coa_items')
            ->select('RIGHT(kode,4) as kode', false)
            ->where('sub_id', $sub_id)
            ->orderBy('kode', 'DESC')
            ->limit(1)
            ->get();

        if ($sql->getNumRows() <> 0) {
            $data = $sql->getRow();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $prefix = $sub_id;
        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kode_final = $prefix . '' . $batas;

        return $kode_final;
    }

    public function get_data()
    {
        $sql = $this->db->table('coa_items as a')
            ->select('a.kode,a.nama,a.dc,a.posted,a.lock,concat(a.sub_id," - ",b.nama) as kategori')
            ->join('coa_subheads as b', 'a.sub_id=b.kode')
            ->get()
            ->getResultArray();

        return $sql;
    }
}
