<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelResetPassword extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $allowedFields = ['password'];

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    public function resetPassword($userId, $newPassword)
    {
        $data = [
            // 'password' => password_hash($newPassword, PASSWORD_BCRYPT),
            'password' => $newPassword
        ];
        return $this->update($userId, $data);
    }
}
