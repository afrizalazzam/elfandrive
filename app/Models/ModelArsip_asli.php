<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelArsip extends Model
{
    public function alldata()
    {
        $id_user = session()->get('id_user');

        return $this->db->table('arsip')
        
            ->join('jabatan', 'jabatan.id_jabatan = arsip.id_jabatan', 'left')
            ->join('user', 'user.id_user = arsip.id_user', 'left')
            ->join('kategori', 'kategori.id_kategori = arsip.id_kategori', 'left')
            ->where('arsip.id_user',$id_user)
            ->orderBy('id_arsip', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function detail_data($id_arsip)
    {
        return $this->db->table('arsip')
            ->join('jabatan', 'jabatan.id_jabatan = arsip.id_jabatan', 'left')
            ->join('user', 'user.id_user = arsip.id_user', 'left')
            ->join('kategori', 'kategori.id_kategori = arsip.id_kategori', 'left')
            ->where('id_arsip', $id_arsip)
            ->orderBy('id_arsip', 'DESC')
            ->get()
            ->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('arsip')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('arsip')
            ->where('id_arsip', $data['id_arsip'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('arsip')
            ->where('id_arsip', $data['id_arsip'])
            ->delete($data);
    }
}
