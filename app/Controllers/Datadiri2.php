<?php

namespace App\Controllers;

use \App\Models\datadirimodel2;
use \App\Models\UsersModel;
use \App\Models\Model_auth2;


class Datadiri2 extends BaseController
{
    protected $DatadiriModel2;


    public function __construct()
    {
        helper('form');
        $this->DatadiriModel2 = new datadirimodel2();
        $this->UsersModel = new UsersModel();
        $this->Model_auth2 = new Model_auth2();
    }

    public function aksi()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '2')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }


        $session = session();
        $id_user = $session->get('id');
        $datadiri2 = $this->DatadiriModel2->where(['id_user' => $id_user])->findAll();
        // $datadiri2 = $this->datadirimodel2->getData(9);

        $data = [
            'title' => 'Data diri',
            'datadiri2' => $datadiri2,
            'validation' => \Config\Services::validation()
        ];


        return view('datadiri2/aksi', $data);
    }

    public function tambah()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '2')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }

        
        $datadiri2 = $this->DatadiriModel2->findAll();


        $data = [
            'tittle' => 'Tambah Data diri',
            'datadiri2' => $datadiri2,
            'validation' => \Config\Services::validation()
        ];


        return view('datadiri2/tambah', $data);
    }


    public function create()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '2')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }
        
        $data = [
            'title' => 'Form Tambah Data'

        ];
        return view('datadiri2/create, $data');
    }

    public function dashboard()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '2')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }

        $datadiri2 = $this->DatadiriModel2->findAll();



        $data = [
            'tittle' => 'Data diri',
            'datadiri2' => $datadiri2,
            'validation' => \Config\Services::validation(),
            'levelLogin' => BaseController::statusLogin()['levelLogin']
        ];

        return view('datadiri2/dashboard', $data);
    }



    public function save()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '2')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }

        $session = session();
        $id_user = $session->get('id');
        // validasi input
        if (!$this->validate([
            'KTP' => [
                'rules' => 'required|is_unique[datadiri2.KTP]',
                'errors' => [
                    'required' => '{field} anda harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required|string',
                'errors' => [
                    'required' => '{field} anda harus diisi',
                    'string' => '{field} harus diisi dengan huruf'
                ]
            ],

            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} anda harus diisi'
                ]
            ],
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} / penjualan anda harus diisi'
                ]
            ],

            'pendapatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} anda harus diisi'
                ]
            ],

            'telpon' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} anda harus diisi',
                    'numeric' => '{field} harus diisi dengan angka'
                ]
            ],


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('datadiri2/tambah')->withInput()->with('validation', $validation);
        }

        $this->DatadiriModel2->save([
            'id_user' => $id_user,
            'KTP' => $this->request->getVar('KTP'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'pendapatan' => $this->request->getVar('pendapatan'),
            'telpon' => $this->request->getVar('telpon')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('datadiri2/aksi');
    }

    public function delete($id_user)
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '2')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }

        $this->DatadiriModel2->delete($id_user);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('datadiri2/aksi');
    }

    public function edit($id)
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '2')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }

        $data = [
            'title' => 'Form Ubah Data',
            'validation' => \Config\Services::validation(),
            'datadiri2' => $this->DatadiriModel2->getdatadiri2($id),
        ];
        return view('datadiri2/edit', $data);
    }

    public function update($id)
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '2')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }

        if (!$this->validate([
            'KTP' => [
                'rules' => 'required|is_unique[datadiri2.KTP,id,' . $id . ']',
                'errors' => [
                    'required' => '{field} anda harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required|string',
                'errors' => [
                    'required' => '{field} anda harus diisi',
                    'string' => '{field} harus diisi dengan huruf'
                ]
            ],

            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} anda harus diisi'
                ]
            ],
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} anda harus diisi'
                ]
            ],

            'pendapatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} anda harus diisi'
                ]
            ],

            'telpon' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} anda harus diisi',
                    'numeric' => '{field} harus diisi dengan angka'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('datadiri2/edit/' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
        }

        $this->DatadiriModel2->save([
            'id' => $id,
            'KTP' => $this->request->getVar('KTP'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'pendapatan' => $this->request->getVar('pendapatan'),
            'telpon' => $this->request->getVar('telpon')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('datadiri2/aksi');
    }

    public function akunPengguna()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '2')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }

        $dataAkun = $this->UsersModel->findAll();


        $data = [
            'title' => 'Daftar Akun Pengguna',
            'dataAkun' => $dataAkun,
            'validation' => \Config\Services::validation(),
        ];

        return view('datadiri/akun-pengguna', $data);
    }

    public function gantiPassword()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '2')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }

        $session = session();
        $id_user = $session->get('id');
        $dataAkun = $this->Model_auth2->getAkun($id_user);
        $password = $dataAkun['password'];
        // dd($password);

        if (!$this->validate([
            'password_lama' => [
                'rules' => 'required|in_list['. $password.']',
                'errors' => [
                    'required' => 'Password lama harus diisi',
                    'in_list' => 'Password salah'
                    
                ]
            ],
            'password_baru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password baru harus diisi',
                ]
            ],
            'password_konfirmasi' => [
                'rules' => 'required|matches[password_baru]',
                'errors' => [
                    'required' => 'Password konfirmasi harus diisi',
                    'matches' => 'Password konfirmasi tidak sesuai',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('datadiri2/akun-pengguna' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
        }

        
        
        $this->Model_auth2->save([
            'id' => $id_user,
            'password' => $this->request->getVar('password_baru'),
        ]);

        session()->setFlashdata('pesan', 'Password berhasil diubah');

        return redirect()->to('datadiri2/akun-pengguna');
    }
}
