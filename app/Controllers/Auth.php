<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;
use App\Models\ModelUser;
use App\Models\ModelJabatan;

use App\Models\ModelResetPassword;

class Auth extends BaseController
{

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
        $this->ModelUser = new ModelUser();
        $this->ModelJabatan = new ModelJabatan();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
        ];
        return view('login/index', $data);
    }

    public function login()
    {
        if ($this->validate([
            'username' => [
                'label'  => 'Username',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ],
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ],
            ],
        ])) {
            // jika valid
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $cek = $this->ModelAuth->login($username, $password);
            if ($cek) {
                // jika datanya cocok
                session()->set('log', true);
                session()->set('username', $cek['username']);
                session()->set('id_user', $cek['id_user']);
                session()->set('email', $cek['email']);
                session()->set('level', $cek['level']);
                session()->set('nama_jabatan', $cek['nama_jabatan']);

                return redirect()->to(base_url('home'));
            } else {
                // jika tidak valid
                session()->setFlashdata('pesan', 'Login Gagal !!!, Username atau Password Salah !!!');
                return redirect()->to(base_url('auth/index'));
            }
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/index'));
        }
    }

    public function logout()
    {
        // session()->destroy();
        session()->remove('log');
        session()->remove('username');
        session()->remove('email');
        session()->remove('level');

        session()->setFlashdata('pesan', 'Anda Telah Logout !!!');
        return redirect()->to(base_url('auth'));
    }

    public function register()
    {
        $data = [
            'title' => 'Registrasi',
            'user' => $this->ModelUser->alldata(),
            'jabatan' =>  $this->ModelJabatan->alldata(),

        ];
        // $this->ModelJabatan->add($data);
        return view('registrasi/index', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'username' => [
                'label'  => 'Nama User',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ],
            ],
            'email' => [
                'label'  => 'E-Mail',
                'rules'  => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'is_unique' => '{field} Sudah Ada, Masukkan {field} Lain !!!'
                ],
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ],
            ],
            // 'level' => [
            //     'label'  => 'Level',
            //     'rules'  => 'required',
            //     'errors' => [
            //         'required' => '{field} Wajib Diisi !!!',
            //     ],
            // ],
            'nama_jabatan' => [
                'label'  => 'Jabatan',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ],
            ],

        ])) {
            // jika valid
            $data = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                // 'level' => $this->request->getPost('level'),
                'level' => 2,
                'nama_jabatan' => $this->request->getPost('nama_jabatan'),
            ];
            $data_jabatan = [
                'nama_jabatan' => $this->request->getPost('nama_jabatan'),
            ];
            $this->ModelUser->add($data);
            $this->ModelJabatan->add($data_jabatan);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to(base_url('auth'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/register'));
        }
    }

    public function reset()
    {
        $data = [
            'title' => 'Reset Passowrd',

        ];
        return view('reset/index', $data);
    }

    public function processReset()
    {
        $username = $this->request->getPost('username');
        $newPassword = $this->request->getPost('password');

        // validasi username dan new password

        // cari pengguna berdasarkan username
        $model = new ModelResetPassword();
        $user = $model->getUserByUsername($username);

        if (!$user) {
            // jika username tidak ditemukan
            session()->setFlashdata('pesan', 'Username Tidak Ditemukan');
            return redirect()->to(base_url('auth/reset'));
        }

        // reset password pengguna
        $userId = $user['id_user'];
        if ($model->resetPassword($userId, $newPassword)) {

            session()->setFlashdata('pesan', 'Password Berhasil Diubah. Silahkan Login.');
            return redirect()->to(base_url('auth'));
            // return redirect()->to('auth')->with('success', 'Password Berhasil Diubah. Silahkan Login.');
        } else {
            session()->setFlashdata('errors', 'Password Gagal Diubah. Silahkan Coba Lagi.');
            return redirect()->to(base_url('auth/reset'));

            // return redirect()->to('auth/reset')->with('error', 'Password Gagal Diubah. Silahkan Coba Lagi.');
        }
    }
}
