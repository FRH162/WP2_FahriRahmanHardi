<?php

namespace App\Controllers;

class Sepatu extends BaseController
{
    public function __construct()
    {
        $this->shoes = new \App\Models\DbSepatuIsh();
    }

    public function index()
    {
        $data['sepatu'] = $this->shoes->getSepatu();
        $data['size'] = $this->shoes->getSize();
        $data['validation'] = $this->validation;
        return view('sepatu/input-sepatu', $data);
    }

    public function cetak()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama Matakuliah Harus diisi',
                    'min_length' => 'Nama terlalu pendek'
                ]
            ],
            'nohp' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Nomor Telepon Harus diisi',
                    'min_length' => 'Nomor Telepon terlalu pendek'
                ]
            ],
            'id_sepatu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Merk Sepatu Anda'
                ]
            ],
            'ukuran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Ukuran Sepatu Anda'
                ]
            ],
        ])) {
            return redirect()->to('Sepatu')->withInput();
        } else {
            $id = $this->request->getPost('id_sepatu');
            $sepatu = $this->shoes->getSepatu();
            $data = [
                'nama' => $this->request->getPost('nama'),
                'nohp' => $this->request->getPost('nohp'),
                'sepatu' => $sepatu[$id],
                'ukuran' => $this->request->getPost('ukuran')
            ];
            return view('sepatu/output-sepatu', $data);
        }
    }
}
