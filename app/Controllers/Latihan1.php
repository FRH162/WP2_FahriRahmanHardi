<?php

namespace App\Controllers;

class Latihan1 extends BaseController
{
    // Contoh 1
    public function index()
    {
        echo ' <h1>Contoh 1</h1> Selamat datang di indomaret, selamat berbelanja';
        // return view('view-latihan1');
    }

    public function penjumlahan($n1,$n2)
    {
        // contoh 2
        $model = model('Model_latihan1');
        $hasil = $model->jumlah($n1,$n2);
        echo ' <h1>Contoh 2</h1> Hasil Penjumlahan dari '.$n1.' + '.$n2.' = '.$hasil;

        // contoh 3
        $data['nilai1'] = $n1;
        $data['nilai2'] = $n2;
        $data['model'] = 'Hasil Penjumlahan dari '.$n1.' + '.$n2.' = '.$hasil;
        return view('view-latihan1',$data);
    }
}
