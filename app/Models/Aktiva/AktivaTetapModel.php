<?php

namespace App\Models\Aktiva;

use CodeIgniter\Model;

class AktivaTetapModel extends Model
{
    protected $table      = 'master_aktiva_tetap';
    protected $primaryKey = 'id_aktiva';
    protected $allowedFields = ['id_aktiva', 'tanggal', 'nama_aktiva', 'no_akun', 'keterangan', 'status', 'harga_perolehan', 'masa_manfaat', 'penyusutan_pertahun', 'penyusutan_perbulan', 'id_trans_perolehan'];

    public function getAktivaTetap()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id_aktiva' => $id])->first();
    }

    public function getListAktivaTetap()
    {
        $builder = $this->db->table('master_aktiva_tetap');
        $builder->where('master_aktiva_tetap.penyusutan', 0);
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getAktivaHarga($id_aktiva)
    {
        $builder = $this->db->table('master_aktiva_tetap');
        $builder->select('harga_perolehan');
        $builder->where('id_aktiva', $id_aktiva);
        $query   = $builder->get()->getResultArray();
        foreach ($query as $data) {
            $harga_perolehan = $data['harga_perolehan'];
        }
        return $harga_perolehan;
    }

    public function getAktivaTanggal($id_aktiva)
    {
        $builder = $this->db->table('master_aktiva_tetap');
        $builder->select('tanggal');
        $builder->where('id_aktiva', $id_aktiva);
        $query   = $builder->get()->getResultArray();
        foreach ($query as $data) {
            $tanggal = $data['tanggal'];
        }
        return $tanggal;
    }

    public function getAktivaAktif($month, $year)
    {
        $builder = $this->db->table('master_aktiva_tetap');
        $builder->where('status', 'Aktif Beroperasi');
        // $builder->where('month(tanggal)', $month);
        // $builder->where('year(tanggal)', $year);
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getTotalBiaya()
    {
        $builder = $this->db->table('master_aktiva_tetap');
        $builder->selectSum('penyusutan');
        $builder->where('status', 'Aktif Beroperasi');
        $query   = $builder->get()->getResultArray();
        foreach ($query as $data) {
            $penyusutan = $data['penyusutan'];
        }
        return $penyusutan;
    }

    public function code_aktiva_ID()
    {
        $builder = $this->db->table('master_aktiva_tetap');
        $builder->selectMax('id_aktiva', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_aktiva = 'AKT-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 4, "0", STR_PAD_LEFT);
        $id_aktiva = $id_aktiva . $nomor;
        return $id_aktiva;
    }

    public function code_num_aktiva_ID()
    {
        $jml_data = '0001';
        $builder = $this->db->table('master_aktiva_tetap');
        $builder->select('RIGHT(master_aktiva_tetap.id_aktiva,4) as id_aktiva', FALSE);
        $builder->orderBy('id_aktiva', 'DESC');
        $builder->limit(1);
        $query = $builder->get()->getResult();
        if ($query == 0) {
            $jml_data = 1;
        } else {
            foreach ($query as $data) :
                $jml_data = ($data->id_aktiva) + 1;
            endforeach;
        }
        return $jml_data;
    }

    public function code_num_aktiva_lancar_ID()
    {
        $jml_data = '0001';
        $builder = $this->db->table('master_aktiva_lancar');
        $builder->select('RIGHT(master_aktiva_lancar.id_aktiva,4) as id_aktiva', FALSE);
        $builder->orderBy('id_aktiva', 'DESC');
        $builder->limit(1);
        $query = $builder->get()->getResult();
        if ($query == 0) {
            $jml_data = 1;
        } else {
            foreach ($query as $data) :
                $jml_data = ($data->id_aktiva) + 1;
            endforeach;
        }
        return $jml_data;
    }


    public function code_aktiva_tetap_ID()
    {
        $builder = $this->db->table('master_aktiva_tetap');
        $builder->selectMax('id_aktiva', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_aktiva = 'AKT-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_aktiva = $id_aktiva . $nomor;
        return $id_aktiva;
    }

    public function createAktivaTetap($data)
    {
        $query = $this->db->table('master_aktiva_tetap')->insertBatch($data);
        return $query;
    }

    public function createAktivaLancar($data)
    {
        $query = $this->db->table('master_aktiva_lancar')->insertBatch($data);
        return $query;
    }

    public function updateAktivaTetap($data, $id)
    {
        $query = $this->db->table('master_aktiva_tetap')->update($data, array('id_aktiva' => $id));
        return $query;
    }

    public function updateStatusAktiva($aktiva_aktif)
    {
        foreach ($aktiva_aktif as $data) :
            $data =
                array(
                    'id_aktiva'             => $data['id_aktiva'],
                    'status'            => 'Aktif Beroperasi (disusutkan)',
                );
            $update[] = $data;
        endforeach;

        $query = $this->db->table('master_aktiva_tetap')->updateBatch($update, 'id_aktiva');
        return $query;
    }

    public function deleteAktivaTetap($id)
    {
        $query = $this->db->table('master_aktiva_tetap')->delete(array('id_aktiva' => $id));
        return $query;
    }
}
