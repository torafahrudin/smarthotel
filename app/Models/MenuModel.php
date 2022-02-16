<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'menu';
    protected $primaryKey       = 'kode';
    protected $returnType       = 'array';
    protected $allowedFields    = ['tcode', 'nama', 'icon', 'url', 'level', 'parent', 'nu'];
    public function get_menu()
    {
        $menu = $this->db->table('menu')
            ->where('parent', '-')
            ->orderBy('nu', 'ASC')
            ->get()
            ->getResultArray();
        foreach ($menu as $rowData) {
            $child = $this->db->table('menu')
                ->where('parent', $rowData['tcode'])
                ->orderBy('nu', 'ASC')
                ->get()
                ->getResultArray();
            $data[] = [
                'tcode'       => $rowData['tcode'],
                'nama'        => $rowData['nama'],
                'icon'        => $rowData['icon'],
                'url'         => $rowData['url'],
                'nu'          => $rowData['nu'],
                'detail'      => $child
            ];
        }


        return $data;
    }
}
