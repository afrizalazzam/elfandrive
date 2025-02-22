<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    // public function alldata()
    // {

    //     $id_user = session()->get('id_user');

    //     return $this->db->table('kategori')
    //         ->join('user', 'user.id_user = kategori.id_user', 'left')
    //         ->orderBy('id_kategori', 'DESC')
    //         ->where('kategori.id_user', $id_user)
    //         ->get()
    //         ->getResultArray();
    //     // ->session->get('username')

    // }

    public function alldata()
    {
        $id_user = session()->get('id_user');
        $db      = \Config\Database::connect();

        if ($id_user != 1) {
            $hasil =  $db->table('kategori')
                ->join('user', 'user.id_user = kategori.id_user', 'left')
                ->where('kategori.id_user', $id_user)
                ->orderBy('id_kategori', 'DESC')
                ->get()
                ->getResultArray();
        } else {
            $hasil =  $db->table('kategori')
                ->join('user', 'user.id_user = kategori.id_user', 'left')
                ->orderBy('id_kategori', 'DESC')
                ->get()
                ->getResultArray();
        }

        return $hasil;
    }

    public function add($data)
    {
        $this->db->table('kategori')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('kategori')
            ->where('id_kategori', $data['id_kategori'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('kategori')
            ->where('id_kategori', $data['id_kategori'])
            ->delete($data);
    }
}
