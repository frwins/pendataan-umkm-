<?php

namespace App\Controllers;

use App\Models\Model_auth2;

class Auth2 extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Model_auth2 = new Model_auth2();
    }

    public function index()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin']) {
            if (BaseController::statusLogin()['levelLogin'] == '2') {
                return redirect()->to(base_url('/datadiri2/dashboard'));
            }
        }

        $data = [
            'tittle' => 'Login'

        ];

        return view('auth2/login', $data);
    }

    public function register()
    {
        return view('auth2/register');
    }
    public function save()
    {

        $validation = $this->validate([
            'username' => [
                'rules' => 'required|is_unique[tbl_pengguna.username]|numeric',
                'errors' => [
                    'required' => 'No.KTP tidak boleh kosong',
                    'is_unique' => 'No.KTP sudah di daftarkan',
                    'numeric' => 'Harus diisi dengan angka'
                ]
            ],

            'gambar' => [
                'rules' => 'uploaded[gambar]|is_image[gambar]',
                'errors' => [
                    'uploaded' => 'Foto KTP tidak boleh kosong',
                    'is_image' => 'Harus diisi dengan format gambar'
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
            return view('auth2/register', ['validation' => $this->validator]);
        } else {
            $username = $this->request->getPost('username');
            $gambar = $this->request->getFile('gambar');
            $password = password_hash( $this->request->getPost('password'), PASSWORD_DEFAULT);
            $namagambar = $gambar->getName();
            $gambar->move('img');

            $values = [
                'username' => $username,
                'gambar' => $namagambar,
                'password' => $password

            ];






            // $usersModel = new \App\Models\usersModel();
            // $query = $usersModel->insert($values);

            $NotifikasiModel = new \App\Models\NotifikasiModel();
            $query = $NotifikasiModel->insert($values);
            if (!$query) {
                return redirect()->back()->with('fail', 'Register gagal');
            } else {
                return redirect()->to('auth2/register')->with('success', 'Anda telah berhasil registrasi, akun Anda bisa digunakan setelah disetujui oleh Admin. Mohon tunggu.');
            }
        }
    }

    public function login()
    {
        if ($this->validate([
            'username' => [
                'label'  => 'username',
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
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->Model_auth2->loginEmail($username);
            $passwordDB = $this->Model_auth2->getPassword($username);
            // var_dump($passwordDB);die;
            $verifyPassword = password_verify($password, $passwordDB->password);

            if ($cek && $verifyPassword) {
                //jika data cocok
                session()->set('log', true);
                session()->set('username', $cek['username']);
                session()->set('id', $cek['id']);
                session()->set('level', $cek['level']);

                return redirect()->to(base_url('datadiri2/dashboard'));
            } else {
                session()->setFlashdata('pesan', 'Login gagal! Masukan data lagi dengan benar');
                return redirect()->to(base_url('auth2/login'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth2/login'));
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
        return redirect()->to(base_url('/auth2/login'));
    }
}
