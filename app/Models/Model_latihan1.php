<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_latihanl extends Model
{
    public function jumlah($n1 = null, $n2 = null)
    {
        $this->nilai1 = $n1;
        $this->nilai2 = $n2;
        return $this->nilai1 + $this->nilai2;
    }
}
