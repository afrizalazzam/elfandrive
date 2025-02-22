<?php

namespace App\Controllers;

use App\Models\ModelArsip;
use App\Models\ModelKategori;

use App\Controllers\BaseController;

class Arsip extends BaseController
{
    public function __construct()
    {
        // load dari Model
        $this->ModelArsip = new ModelArsip();
        $this->ModelKategori = new ModelKategori();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Arsip',
            'arsip' => $this->ModelArsip->alldata(),
            'isi' => 'arsip/index',
        ];
        // return view('layout/wrapper', $data);``

        return view('template/continer', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Arsip',
            'kategori' => $this->ModelKategori->alldata(),
            'isi' => 'arsip/add',
        ];
        return view('template/continer', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'id_kategori' => [
                'label'  => 'Kategori',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ],
            ],
            'nama_file' => [
                'label'  => 'Nama File',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ],
            ],
            'deskripsi' => [
                'label'  => 'Deskripsi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ],
            ],
            'file_arsip' => [
                'label' => 'File Arsip',
                'rules' => 'uploaded[file_arsip]|max_size[file_arsip,5000000]|ext_in[file_arsip,pdf,rar,zip,doc,docx,xls,xlsx,pptx,ppt,ppsx,odp,txt,jpg,png,gif,exe]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi !!!',
                    'max_size' => 'Ukuran {field} Max 5 GB !!!',
                ]
            ],


        ])) {
            // jika valid
            $file_arsip = $this->request->getFile('file_arsip');
            $nama_file = $file_arsip->getRandomName();

            // mengambil ukuran file
            $ukuran_file = $file_arsip->getSize('kb');

            $data = [
                'id_kategori' => $this->request->getPost('id_kategori'),
                'no_arsip' => $this->request->getPost('no_arsip'),
                'nama_file' => $this->request->getPost('nama_file'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'tgl_upload' => date('Y-m-d'),
                'tgl_update' => date('Y-m-d'),
                'id_jabatan' => session()->get('id_jabatan'),
                'id_user' => session()->get('id_user'),
                'file_arsip' => $nama_file,
                'ukuran_file' => $ukuran_file,
            ];

            $file_arsip->move('public/file_arsip', $nama_file); //ke directory upload file bernama file_arsip di public
            $this->ModelArsip->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to(base_url('arsip'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('arsip/add'));
        }
    }

    public function edit($id_arsip)
    {
        $data = [
            'title' => 'Tambah Arsip',
            'kategori' => $this->ModelKategori->alldata(),
            'arsip' => $this->ModelArsip->detail_data($id_arsip),
            'isi' => 'arsip/edit',
        ];
        return view('template/continer', $data);
        // print_r($this->ModelArsip->detail_data($id_arsip));
    }

    public function update($id_arsip)
    {
        if ($this->validate([
            'id_kategori' => [
                'label'  => 'Kategori',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ],
            ],
            'nama_file' => [
                'label'  => 'Nama File',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ],
            ],
            'deskripsi' => [
                'label'  => 'Deskripsi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ],
            ],
            'file_arsip' => [
                'label' => 'File Arsip',
                'rules' => 'max_size[file_arsip,5000000]|ext_in[file_arsip,pdf,rar,zip,doc,docx,xls,xlsx,pptx,ppt,ppsx,odp,txt,jpg,png,gif,exe]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 5 GB !!!',
                ]
            ],

        ])) {
            // mengambil file arsip yg akan diupload
            $file_arsip = $this->request->getFile('file_arsip');
            if ($file_arsip->getError() == 4) {
                // jika file tidak diganti
                $data = [
                    'id_arsip' => $id_arsip,
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'no_arsip' => $this->request->getPost('no_arsip'),
                    'nama_file' => $this->request->getPost('nama_file'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'tgl_update' => date('Y-m-d'),
                    'id_jabatan' => session()->get('id_jabatan'),
                    'id_user' => session()->get('id_user'),
                ];
                $this->ModelArsip->edit($data);
            } else {
                // jika file diganti
                $arsip = $this->ModelArsip->detail_data($id_arsip);
                if ($arsip['file_arsip'] != "") {
                    unlink('public/file_arsip/' . $arsip['file_arsip']);
                }
                $nama_file = $file_arsip->getRandomName();

                // mengambil ukuran file
                $ukuran_file = $file_arsip->getSize('kb');

                $data = [
                    'id_arsip' => $id_arsip,
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'no_arsip' => $this->request->getPost('no_arsip'),
                    'nama_file' => $this->request->getPost('nama_file'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'tgl_update' => date('Y-m-d'),
                    'id_jabatan' => session()->get('id_jabatan'),
                    'id_user' => session()->get('id_user'),
                    'file_arsip' => $nama_file,
                    'ukuran_file' => $ukuran_file,
                ];

                $file_arsip->move('public/file_arsip', $nama_file); //ke directory upload file bernama file_arsip di public
                $this->ModelArsip->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to(base_url('arsip'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('arsip/edit' . $id_arsip));
        }
    }

    public function hapus($id_arsip)
    {
        $arsip = $this->ModelArsip->detail_data($id_arsip);
        if ($arsip['file_arsip'] != "") {
            unlink('public/file_arsip/' . $arsip['file_arsip']);
        }

        $data = [
            'id_arsip' => $id_arsip,
        ];
        $this->ModelArsip->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('arsip'));
    }

    public function viewfile($id_arsip)
    {
        $data = [
            'title' => 'View File',
            'arsip' => $this->ModelArsip->detail_data($id_arsip),
            'isi' => 'arsip/viewfile',
        ];
        // return view('layout/wrapper', $data);``

        return view('template/continer', $data);
    }
}
