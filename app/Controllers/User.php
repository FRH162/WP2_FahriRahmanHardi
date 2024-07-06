<?php

namespace App\Controllers;

class User extends BaseController
{
    public function __construct()
    {
        helper('pustaka');
        cek_login();
        $this->userProfile = model('ModelUser')->getUser(['email' => session()->get('email')])->getRowArray();
    }

    public function index()
    {
        $data = [
            'judul' => 'Profil Saya',
            'user' => $this->userProfile,
        ];
        return view('pustaka/user/index', $data);
    }

    public function anggota()
    {
        $data = [
            'judul' => 'Data Anggota',
            'user' => $this->userProfile,
            'anggota' => $this->ModelUser->getUser()->getResultArray(),
        ];
        return view('pustaka/user/anggota', $data);
    }

    public function ubahProfil()
    {
        if (empty($this->request->getPost())) {
            $data = [
                'judul' => 'Profil Saya',
                'user' => $this->userProfile,
                'validation' => $this->validator,
            ];
            return view('pustaka/user/ubah-profile', $data);
        }
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak Boleh kosong',
                ],
            ],
            'userfile' => [
                'rules' => 'mime_in[userfile,image/gif,image/jpg,image/png]|max_size[userfile,3000]|max_dims[userfile,1024,1000]',
            ]
        ])) {
            return redirect()->to('user/ubahprofil')->withInput();
        }

        $set['nama'] = $this->request->getPost('nama', true);
        $where['email'] = $this->request->getPost('email', true);
        $file = $this->request->getFile('userfile');
        $gambar_lama = $this->userProfile['image'];

        if ($file->getError() != 4) {
            $gambar_baru = 'pro' . time();
            $file->move('/assets/img/profile/', $gambar_baru);
            if ($gambar_lama != 'default.jpg') {
                unlink('/assets/img/profile/' . $gambar_lama);
            }
            $set['image'] = $gambar_baru;
        }

        $this->ModelUser->updateData($set, $where);

        return redirect()->to('user')->with('pesan', 'Profil Berhasil diubah');
    }
}
