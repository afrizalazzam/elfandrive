<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;
use App\Models\ModelJabatan;

class User extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelJabatan = new ModelJabatan();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'User',
            'user' => $this->ModelUser->alldata(),
            'isi' => 'user/index',
        ];
        // return view('layout/wrapper', $data);

        return view('template/continer', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah User',
            'jabatan' => $this->ModelJabatan->alldata(),
            'isi' => 'user/add',
        ];
        return view('template/continer', $data);
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
            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ],
            ],
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
                'level' => $this->request->getPost('level'),
                'nama_jabatan' => $this->request->getPost('nama_jabatan'),
            ];
            $this->ModelUser->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to(base_url('user'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/add'));
        }
    }

    public function edit($id_user)
    {
        $data = [
            'title' => 'Edit User',
            'jabatan' => $this->ModelJabatan->alldata(),
            'user' => $this->ModelUser->detail_data($id_user),
            'isi' => 'user/edit',
        ];
        return view('template/continer', $data);
    }

    public function update($id_user)
    {
        if ($this->validate([
            'username' => [
                'label'  => 'Nama User',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ],
            ],
            // 'email' => [
            //     'label'  => 'E-Mail',
            //     'rules'  => 'required|is_unique[user.email]',
            //     'errors' => [
            //         'required' => '{field} Wajib Diisi !!!',
            //         'is_unique' => '{field} Sudah Ada, Masukkan {field} Lain !!!'
            //     ],
            // ],

            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ],
            ],
            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ],
            ],
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
                'id_user' => $id_user,
                'username' => $this->request->getPost('username'),
                // 'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'level' => $this->request->getPost('level'),
                'nama_jabatan' => $this->request->getPost('nama_jabatan'),
            ];

            $this->ModelUser->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diupdate');
            return redirect()->to(base_url('user'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/edit/' . $id_user));
        }
    }

    public function hapus($id_user)
    {
        $data = [
            'id_user' => $id_user,
        ];
        $this->ModelUser->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('user'));
    }
}
