<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function login($username, $password)
    {
        return $this->db->table('user')->where([
            // 'email' adalah nama di db, $email adalah nama parameter
            'username' => $username,
            'password' => $password,
        ])
            ->get()->getRowArray();
    }

    public function registrasi($data)
    {
        $this->db->table('user')->insert($data);
        $this->db->table('jabatan')->insert($data_jabatan);
    }
}
