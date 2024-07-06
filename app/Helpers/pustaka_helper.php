<?php

function cek_login()
{
    if (!session()->get('email')) {
        redirect()->to('autentifikasi')->with('pesan', 'Akses ditolak. Anda belum login!!');
    } else {
        session()->get('role_id');
    }
}
