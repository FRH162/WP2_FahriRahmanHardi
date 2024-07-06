<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function __construct()
    {
        helper('pustaka');
        cek_login();
    }

    public function index()
    {
        $data = [
            'judul' => 'Dasboard',
            'user' => $this->ModelUser
                ->getUser(['email' => session()->get('email')])
                ->getRowArray(),
            'anggota' => $this->ModelUser
                ->getUserLimit()
                ->getResultArray(),
            'buku' => $this->ModelBuku->getBuku()->getResultArray(),
            'modelUser' => $this->ModelUser,
            'modelBuku' => $this->ModelBuku
        ];

        return view('pustaka/admin/index', $data);
    }
}
