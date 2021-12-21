<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Home'
        ];

        return view('pages/home', $data);
    }

    public function aksi()
    {
        return view('/datadiri/aksi');
    }

    public function dashboard()
    {
        $data = [
            'tittle' => 'Dashboard | Admin'
        ];

        return view('admin/dashboard', $data);
    }

    public function tambah()
    {
        return view('datadiri/tambah');
    }
}
