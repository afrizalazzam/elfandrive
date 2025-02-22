<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHome extends Model
{
    public function total_arsip()
    {
        return $this->db->table('arsip')->countAll();
    }

    public function total_user()
    {
        return $this->db->table('user')->countAll();
    }

    public function total_kategori()
    {
        return $this->db->table('kategori')->countAll();
    }

    public function total_jabatan()
    {
        return $this->db->table('jabatan')->countAll();
    }
}
