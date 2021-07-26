<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'dashboard'
        ];

        return view('dashboard', $data);
    }
}
