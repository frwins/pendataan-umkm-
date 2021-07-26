<?php

namespace App\Controllers;

use \App\Models\DatadiriModel;


class Datadiri extends BaseController
{
    protected $DatadiriModel;

    public function __construct()
    {
        $this->DatadiriModel = new DatadiriModel();
    }

    public function aksi()
    {

        $datadiri = $this->DatadiriModel->findAll();


        $data = [
            'tittle' => 'Data diri',
            'datadiri' => $datadiri,
            'validation' => \Config\Services::validation()
        ];


        return view('datadiri/aksi', $data);
    }

    public function tambah()
    {

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
        $data = [
            'title' => 'Form Tambah Data'

        ];
        return view('datadiri/create, $data');
    }

    public function dashboard()
    {
        $datadiri = $this->DatadiriModel->findAll();

        $data = [
            'tittle' => 'Data diri',
            'datadiri' => $datadiri,
            'validation' => \Config\Services::validation()
        ];

        return view('datadiri/dashboard', $data);
    }



    public function save()
    {
        // validasi input
        if (!$this->validate([
            'KTP' => [
                'rules' => 'required|numeric|is_unique[datadiri.KTP]',
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
            return redirect()->to('datadiri/tambah')->withInput()->with('validation', $validation);
        }

        $this->DatadiriModel->save([

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
        $this->DatadiriModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('datadiri/aksi');
    }

    public function edit($id)
    {


        $data = [
            'title' => 'Form Ubah Data',
            'validation' => \Config\Services::validation(),
            'datadiri' => $this->DatadiriModel->getdatadiri($id)
        ];
        return view('datadiri/edit', $data);
    }

    public function update($id)
    {


        if (!$this->validate([
            'KTP' => [
                'rules' => 'required|numeric|is_unique[datadiri.KTP,id,' . $id . ']',
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

    public function excel()
    {
        $data = [
            'datadiri' => $this->DatadiriModel->getdatadiri()
        ];
        echo view('datadiri/excel', $data);
    }
}