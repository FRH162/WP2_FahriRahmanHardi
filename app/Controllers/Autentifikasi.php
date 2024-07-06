<?php

namespace App\Controllers;

class Autentifikasi extends BaseController
{
    public function index()
    {
        if (session()->has('email')) {
            redirect('user');
        }
        if (empty($this->request->getPost())) {
            $data['judul'] = 'Login';
            $data['user'] = '';
            $data['validation'] = $this->validator;
            return view('pustaka/login', $data);
        }
        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi!!',
                    'valid_email' => 'Email tidak benar!!',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi!!'
                ]
            ],
        ])) {
            return redirect()->to('autentifikasi')->withInput();
        } else {
            return $this->_login();
        }
    }

    public function registrasi()
    {
        if (session()->get('email')) {
            return redirect()->to('user');
        }

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Belum diisi!!',
                ],
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email Belum diisi!!',
                    'valid_email' => 'Email Tidak Benar!!',
                    'is_unique' => 'Email Sudah Terdaftar!',
                ],

            ],
            'password1' => [
                'rules' => 'required|min_length[3]|matches[password2]',
                'errors' => [
                    'matches' => 'Password Tidak Sama!!',
                    'min_length' => 'Password Terlalu Pendek',
                ],
            ],
            'password2' => [
                'rules' => 'required|matches[[password1]',
            ],
        ])) {
            $data['judul'] = 'Registrasi Member';
            return view('pustaka/registrasi', $data);
        }

        $data = [
            'nama' => htmlspecialchars($this->request->getPost('nama', true)),
            'email' => htmlspecialchars($this->request->getPost('email', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->request->getPost('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 0,
            'tanggal_input' => time()
        ];
        $this->ModelUser->simpanData($data);
        redirect()->to('autentifikasi')->with('pesan', 'Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda');
    }

    public function blok()
    {
        return view('pustaka/blok');
    }

    public function gagal()
    {
        return view('pustaka/gagal');
    }

    private function _login()
    {
        $email = htmlspecialchars($this->request->getPost('email', true));
        $password = $this->request->getPost('password', true);
        $user = $this->ModelUser->getUser(['email' => $email])->getRowArray();

        // jika usernya ada
        if ($user) {
            // jika user sudah aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    session()->set([
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ]);
                    if ($user['role_id'] == 1) {
                        return redirect()->to('admin');
                    } else if ($user['image'] == 'default.jpg') {
                        return redirect()->to('user')
                            ->withInput()
                            ->with('pesan', 'Silahkan Ubah Profile Anda untuk melanjutkan');
                    }
                } else $pesan = 'Password salah!!';
            } else $pesan = 'User belum diaktifasi!!';
        } else $pesan = 'Email tidak terdaftar!!';
        return redirect()->to('autentifikasi')
            ->withInput()
            ->with('pesan', $pesan);
    }
}
