<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJabatan extends Model
{
    public function alldata()
    {
        return $this->db->table('jabatan')
            ->orderBy('id_jabatan', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('jabatan')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('jabatan')
            ->where('id_jabatan', $data['id_jabatan'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('jabatan')
            ->where('id_jabatan', $data['id_jabatan'])
            ->delete($data);
    }
}
