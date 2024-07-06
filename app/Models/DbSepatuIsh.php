<?php

namespace App\Models;

use CodeIgniter\Model;

class DbSepatuIsh extends Model
{
    public function getSepatu()
    {
        return [
            [
                'merk' => 'Nike',
                'harga' => 375000
            ],
            [
                'merk' => 'Adidas',
                'harga' => 300000
            ],
            [
                'merk' => 'Kickers',
                'harga' => 250000
            ],
            [
                'merk' => 'Eiger',
                'harga' => 275000
            ],
            [
                'merk' => 'Bucherri',
                'harga' => 400000
            ]
        ];
    }
    public function getSize()
    {
        return [
            'min' => 32,
            'max' => 44
        ];
    }
}
