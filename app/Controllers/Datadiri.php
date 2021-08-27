<?php

namespace App\Controllers;

use \App\Models\DatadiriModel;
use \App\Models\DatadiriModel2;
use \App\Models\UsersModel;



class Datadiri extends BaseController
{
    protected $DatadiriModel;

    public function __construct()
    {
        helper('form');
        $this->DatadiriModel = new DatadiriModel();
        $this->DatadiriModel2 = new DatadiriModel2();
        $this->UsersModel = new UsersModel();
    }

    public function aksi()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '1')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }

        $datadiri = $this->DatadiriModel->findAll();
        $datadiri2 = $this->DatadiriModel2->findAll();


        $data = [
            'tittle' => 'Data diri',
            'datadiri' => $datadiri,
            'datadiri2' => $datadiri2,
            'validation' => \Config\Services::validation()
        ];


        return view('datadiri/aksi', $data);
    }

    public function tambah()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '1')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }

        $datadiri = $this->DatadiriModel->findAll();


        $data = [
            'tittle' => 'Tambah Data diri',
            'datadiri' => $datadiri,
            'validation' => \Config\Services::validation()
        ];


        return view('datadiri/tambah', $data);
    }


    public function create()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '1')
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
        return view('datadiri/create, $data');
    }

    public function dashboard()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '1')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }

        $datadiri = $this->DatadiriModel->findAll();
        $datadiri2 = $this->DatadiriModel2->findAll();
        $datadiri3 = $this->UsersModel->findAll();

        $data = [
            'tittle' => 'Data diri',
            'datadiri' => $datadiri,
            'datadiri2' => $datadiri2,
            'datadiri3' => $datadiri3,
            'validation' => \Config\Services::validation()
        ];

        return view('datadiri/dashboard', $data);
    }



    public function save()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '1')
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
                'rules' => 'required|is_unique[datadiri.KTP]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required|string',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'string' => '{field} harus diisi dengan huruf'
                ]
            ],

            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} / penjualan harus diisi'
                ]
            ],

            'pendapatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'telpon' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus diisi dengan angka'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('datadiri/tambah')->withInput()->with('validation', $validation);
        }

        $this->DatadiriModel->save([
            'id_user' => $id_user,
            'KTP' => $this->request->getVar('KTP'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'pendapatan' => $this->request->getVar('pendapatan'),
            'telpon' => $this->request->getVar('telpon')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('datadiri/aksi');
    }

    public function delete($id)
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '1')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }

        $this->DatadiriModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('datadiri/aksi');
    }

    public function edit($id)
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '1')
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
            'datadiri' => $this->DatadiriModel->getdatadiri($id),
            'datadiri2' => $this->DatadiriModel2->getdatadiri2($id),
        ];
        return view('datadiri/edit', $data);
    }



    public function update($id)
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '1')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }


        if (!$this->validate([
            'KTP' => [
                'rules' => 'required|is_unique[datadiri.KTP,id,' . $id . ']',
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
            return redirect()->to('datadiri/edit/' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
        }

        $this->DatadiriModel->save([
            'id' => $id,
            'KTP' => $this->request->getVar('KTP'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'pendapatan' => $this->request->getVar('pendapatan'),
            'telpon' => $this->request->getVar('telpon')
        ]);


        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('datadiri/aksi');
    }


    public function update2($id)
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '1')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }


        if (!$this->validate([
            'KTP' => [
                'rules' => 'required|is_unique[datadiri.KTP,id,' . $id . ']',
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
            return redirect()->to('datadiri/edit/' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
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

        return redirect()->to('datadiri/aksi');
    }

    public function delete2($id_user)
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '1')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }

        $this->DatadiriModel2->delete($id_user);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('datadiri/aksi');
    }

    public function excel()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin'])
        {
            if (BaseController::statusLogin()['levelLogin'] !== '1')
            {
                return redirect()->to(base_url('/'));
            }
        }else
        {
            return redirect()->to(base_url('/'));
        }

        $data = [
            'datadiri' => $this->DatadiriModel->getdatadiri(),
            'datadiri2' => $this->DatadiriModel2->getdatadiri2()
        ];

        echo  view('datadiri/excel', $data);
    }
}
