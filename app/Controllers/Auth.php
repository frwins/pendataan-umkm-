<?php

namespace App\Controllers;

use App\Models\Model_auth;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Model_auth = new Model_auth();
    }

    public function index()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] == '1')
            {
                return redirect()->to(base_url('/datadiri2/dashboard'));
            }
        }

        $data = [
            'tittle' => 'Login'

        ];

        return view('auth/login', $data);
    }

    public function register()
    {
        return view('auth/register');
    }
    public function save()
    {

        $validation = $this->validate([
            'username' => [
                'rules' => 'required|is_unique[users.username]|numeric',
                'errors' => [
                    'required' => 'No.KTP tidak boleh kosong',
                    'is_unique' => 'No.KTP sudah di daftarkan',
                    'numeric' => 'Harus diisi dengan angka'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Kata Sandi tidak boleh kosong',
                    'min_length' => 'Kata Sandi Minimal 5 Karakter',
                    'max_length' => 'Kata Sandi Maksimal 12 Karakter'
                ]
            ],
            'cpassword' => [
                'rules' => 'required|min_length[5]|max_length[12]|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi Kata Sandi tidak boleh kosong',
                    'min_length' => 'Ulangi Kata Sandi dengan benar',
                    'max_length' => 'Ulangi Kata Sandi dengan benar',
                    'matches' => 'Ulangi Kata Sandi dengan benar'
                ]
            ]
        ]);

        if (!$validation) {
            return view('auth/register', ['validation' => $this->validator]);
        } else {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $values = [
                'username' => $username,
                'password' => $password,

            ];

            $usersModel = new \App\Models\usersModel();
            $query = $usersModel->insert($values);
            if (!$query) {
                return redirect()->back()->with('fail', 'Register gagal');
            } else {
                return redirect()->to('auth/register')->with('success', 'Register sukses, silahkan login');
            }
        }
    }

    public function login()
    {
        if ($this->validate([
            'email' => [
                'label'  => 'E-mail',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi'
                ]
            ],
            'password' => [
                'label'  => 'password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi'
                ]
            ]
        ])) {
            //jika valid
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek = $this->Model_auth->loginEmail($email);
            $passwordDB = $this->Model_auth->getPassword($email);
            $verifyPassword = password_verify($password, $passwordDB->password);

            if ($cek && $verifyPassword) {
                //jika data cocok
                session()->set('log', true);
                session()->set('username', $cek['username']);
                session()->set('email', $cek['email']);
                session()->set('level', $cek['level']);
                session()->set('id', $cek['id']);
                return redirect()->to(base_url('datadiri/dashboard'));
            } else {
                session()->setFlashdata('pesan', 'Login gagal! Masukan data lagi dengan benar');
                return redirect()->to(base_url('auth/login'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/login'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->set('log', false);
        session()->remove('username');
        session()->remove('email');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Berhasil Logout');
        return redirect()->to(base_url('/auth/login'));
    }
}
