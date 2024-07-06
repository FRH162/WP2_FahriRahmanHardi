<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Web extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Halaman Depan';
        $data['title'] = 'Web Prog II | Merancang Template Sederhana dengan CodeIgniter';
        // 1 view use return, many views use echo
        return view('web/v-header', $data) . view('web/v-index', $data) . view('web/v-footer', $data);
    }
}
