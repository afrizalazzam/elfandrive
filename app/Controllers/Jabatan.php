<?php

namespace App\Controllers;

use App\Models\ModelJabatan;
use App\Controllers\BaseController;

class Jabatan extends BaseController
{
    public function __construct()
    {
        $this->ModelJabatan = new ModelJabatan();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Jabatan',
            'jabatan' => $this->ModelJabatan->alldata(),
            'isi' => 'jabatan/index',
        ];
        return view('template/continer', $data);
    }

    public function add()
    {
        $data = [
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
        ];
        $this->ModelJabatan->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('jabatan'));
    }

    public function edit($id_jabatan)
    {
        $data = [
            'id_jabatan' => $id_jabatan,
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
        ];
        $this->ModelJabatan->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate');
        return redirect()->to(base_url('jabatan'));
    }

    public function hapus($id_jabatan)
    {
        $data = [
            'id_jabatan' => $id_jabatan,
        ];
        $this->ModelJabatan->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('jabatan'));
    }
}
