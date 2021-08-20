<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'])
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }

        $data = [
            'tittle' => 'dashboard'
        ];

        return view('dashboard', $data);
    }
}
