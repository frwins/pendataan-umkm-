<?php

namespace App\Controllers;

use \App\Models\datadirimodel2;


class datadiri2 extends BaseController
{
    protected $datadirimodel2;

    public function __construct()
    {
        $this->datadirimodel2 = new datadirimodel2();
    }

    public function aksi()
    {

        $datadiri2 = $this->datadirimodel2->findAll();


        $data = [
            'tittle' => 'Data diri',
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

    public function kirim($id)
    {
        $d = $this->datadirimodel2->findAll();
        $data = [
            'datadiri2' => $d,
            'validation' => \Config\Services::validation()
        ];
        $d = $this->datadirimodel2->save(['id' => $id]);
        session()->setFlashdata('pesan', 'Data berhasil dikirim');
        return redirect()->to('datadiri/aksi');
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

    public function delete($id)
    {
        $this->datadirimodel2->delete($id);
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