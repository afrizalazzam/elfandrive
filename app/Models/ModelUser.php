<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    public function alldata()
    {
        return $this->db->table('user')
            ->join('jabatan', 'jabatan.nama_jabatan = user.nama_jabatan', 'left')
            ->orderBy('id_user', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function detail_data($id_user)
    {
        return $this->db->table('user')
            ->join('jabatan', 'jabatan.nama_jabatan = user.nama_jabatan', 'left')
            ->where('id_user', $id_user)
            ->orderBy('id_user', 'DESC')
            ->get()
            ->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('user')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('user')
            ->where('id_user', $data['id_user'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('user')
            ->where('id_user', $data['id_user'])
            ->delete($data);
    }
}
