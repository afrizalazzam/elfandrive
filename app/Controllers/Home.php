<?php

namespace App\Controllers;

use App\Models\ModelHome;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelHome = new ModelHome();
    }

    public function index()
    {


        $data = [
            'title' => 'Home',
            'total_kategori' => $this->ModelHome->total_kategori(),
            'total_jabatan' => $this->ModelHome->total_jabatan(),
            'total_arsip' => $this->ModelHome->total_arsip(),
            'total_user' => $this->ModelHome->total_user(),
            'isi' => 'layout/home',
        ];
        // return view('layout/wrapper', $data);

        return view('template/continer', $data);
    }
}
