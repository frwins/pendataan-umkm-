<?php

namespace App\Controllers;

use \App\Models\datadirimodel2;
use \App\Models\UsersModel;


class Datadiri2 extends BaseController
{
    protected $datadirimodel2;
    

    public function __construct()
    {
        $this->datadirimodel2 = new datadirimodel2();
        $this->UsersModel = new UsersModel();
    }

    public function aksi()
    {
        $session = session();
        $id_user = $session->get('id');
        $datadiri2 = $this->datadirimodel2->where(['id_user' => $id_user])->first();
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

        $datadiri2 = $this->datadirimodel2->findAll();


        $data = [
            'tittle' => 'Tambah Data diri',
            'datadiri2' => $datadiri2,
            'validation' => \Config\Services::validation()
        ];


        return view('datadiri2/tambah', $data);
    }

    public function kirim()
    {
        
            $session = session();
            $id_user = $session->get('id_user');
       


        $this->datadirimodel2->update([
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

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data'

        ];
        return view('datadiri2/create, $data');
    }

    public function dashboard()
    {
        $datadiri2 = $this->datadirimodel2->findAll();



        $data = [
            'tittle' => 'Data diri',
            'datadiri2' => $datadiri2,
            'validation' => \Config\Services::validation()
        ];

        return view('datadiri2/dashboard', $data);
    }



    public function save()
    {
        $session = session();
        $id_user = $session->get('id');
        // validasi input
        if (!$this->validate([
            'KTP' => [
                'rules' => 'required|numeric|is_unique[datadiri2.KTP]',
                'errors' => [
                    'required' => '{field} anda harus diisi',
                    'numeric' => '{field} harus diisi dengan angka',
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
            return redirect()->to('datadiri2/tambah')->withInput()->with('validation', $validation);
        }

        $this->datadirimodel2->save([
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
        $this->datadirimodel2->delete($id_user);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('datadiri2/aksi');
    }

    public function edit($id)
    {


        $data = [
            'title' => 'Form Ubah Data',
            'validation' => \Config\Services::validation(),
            'datadiri2' => $this->datadirimodel2->getdatadiri2($id)
        ];
        return view('datadiri2/edit', $data);
    }

    public function update($id)
    {


        if (!$this->validate([
            'KTP' => [
                'rules' => 'required|numeric|is_unique[datadiri2.KTP,id,' . $id . ']',
                'errors' => [
                    'required' => '{field} anda harus diisi',
                    'numeric' => '{field} harus diisi dengan angka',
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

        $this->datadirimodel2->save([
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

    public function excel()
    {
        $data = [
            'datadiri2' => $this->datadirimodel2->getdatadiri2()
        ];
        echo view('datadiri2/excel', $data);
    }
}
