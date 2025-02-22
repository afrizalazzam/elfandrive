<?php

namespace App\Controllers;

use App\Models\ModelKategori;
use App\Controllers\BaseController;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->ModelKategori = new ModelKategori();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Kategori',
            'kategori' => $this->ModelKategori->alldata(),
            'isi' => 'kategori/index',
        ];
        return view('template/continer', $data);
    }

    public function add()
    {
        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'id_user' => session()->get('id_user'),
        ];
        $this->ModelKategori->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('kategori'));
    }

    public function edit($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ];
        $this->ModelKategori->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate');
        return redirect()->to(base_url('kategori'));
    }

    public function hapus($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori,
        ];
        $this->ModelKategori->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('kategori'));
    }
}
