<?php

namespace App\Models\Laporan;

use CodeIgniter\Model;

class JurnalModel extends Model
{
    protected $table      = 'jurnal';
    protected $primaryKey = 'id_jurnal';
    protected $allowedFields = ['id_jurnal', 'tanggal', 'id_akun', 'nominal', 'posisi', 'debet', 'kredit', 'reff', 'transaksi', 'id_transaksi'];

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getJurnal($month = '', $year = '')
    {
        $builder = $this->db->table('jurnal');
        $builder->select('*');
        $builder->join('akun', 'akun.id_akun=jurnal.id_akun');
        $builder->where('month(tanggal)', $month);
        $builder->where('year(tanggal)', $year);
        $builder->orderBy('id_jurnal', 'ASC');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getJurnalExport($month = '', $year = '')
    {
        $builder = $this->db->table('jurnal');
        $builder->select('*');
        $builder->join('akun', 'akun.id_akun=jurnal.id_akun');
        $builder->where('month(tanggal)', $month);
        $builder->where('year(tanggal)', $year);
        $builder->orderBy('id_jurnal', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function code_jurnal_IDD()
    {
        $builder = $this->db->table('jurnal');
        $builder->selectMax('id_jurnal', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_jurnal = 'JR-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_jurnal = $id_jurnal . $nomor;
        return $id_jurnal;
    }

    public function code_jurnal_IDK()
    {
        $builder = $this->db->table('jurnal');
        $builder->selectMax('id_jurnal', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_jurnal = 'JR-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 2), 3, "0", STR_PAD_LEFT);
        $id_jurnal = $id_jurnal . $nomor;
        return $id_jurnal;
    }

    public function createOrderJurnal($data)
    {
        $query = $this->db->table('jurnal')->insertBatch($data);
        return $query;
    }
}
