<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Landing Page | Pakar Jantung'
        ];
        echo view('landpage/index');
    }
}
