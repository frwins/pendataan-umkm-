<?php

namespace App\Controllers;

use \App\Models\DatadiriModel;
use \App\Models\DatadiriModel2;
use \App\Models\UsersModel;
use \App\Models\NotifikasiModel;
use \App\Models\Model_auth;



class Datadiri extends BaseController
{
    protected $DatadiriModel;

    public function __construct()
    {
        helper('form');
        $this->DatadiriModel = new DatadiriModel();
        $this->DatadiriModel2 = new DatadiriModel2();
        $this->UsersModel = new UsersModel();
        $this->NotifikasiModel = new NotifikasiModel();
        $this->Model_auth = new Model_auth();
    }

    public function aksi()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin']) {
            if (BaseController::statusLogin()['levelLogin'] !== '1') {
                return redirect()->to(base_url('/'));
            }
        } else {
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
        if (BaseController::statusLogin()['statusLogin']) {
            if (BaseController::statusLogin()['levelLogin'] !== '1') {
                return redirect()->to(base_url('/'));
            }
        } else {
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
        if (BaseController::statusLogin()['statusLogin']) {
            if (BaseController::statusLogin()['levelLogin'] !== '1') {
                return redirect()->to(base_url('/'));
            }
        } else {
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
        if (BaseController::statusLogin()['statusLogin']) {
            if (BaseController::statusLogin()['levelLogin'] !== '1') {
                return redirect()->to(base_url('/'));
            }
        } else {
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
        if (BaseController::statusLogin()['statusLogin']) {
            if (BaseController::statusLogin()['levelLogin'] !== '1') {
                return redirect()->to(base_url('/'));
            }
        } else {
            return redirect()->to(base_url('/'));
        }

        $session = session();
        $id_user = $session->get('id');

        // validasi input
        if (!$this->validate([
            'KTP' => [
                'rules' => 'required|is_unique[datadiri.KTP]|is_unique[datadiri2.KTP]',
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
        if (BaseController::statusLogin()['statusLogin']) {
            if (BaseController::statusLogin()['levelLogin'] !== '1') {
                return redirect()->to(base_url('/'));
            }
        } else {
            return redirect()->to(base_url('/'));
        }

        $this->DatadiriModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('datadiri/aksi');
    }

    public function edit($id)
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin']) {
            if (BaseController::statusLogin()['levelLogin'] !== '1') {
                return redirect()->to(base_url('/'));
            }
        } else {
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
        if (BaseController::statusLogin()['statusLogin']) {
            if (BaseController::statusLogin()['levelLogin'] !== '1') {
                return redirect()->to(base_url('/'));
            }
        } else {
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
        if (BaseController::statusLogin()['statusLogin']) {
            if (BaseController::statusLogin()['levelLogin'] !== '1') {
                return redirect()->to(base_url('/'));
            }
        } else {
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
        if (BaseController::statusLogin()['statusLogin']) {
            if (BaseController::statusLogin()['levelLogin'] !== '1') {
                return redirect()->to(base_url('/'));
            }
        } else {
            return redirect()->to(base_url('/'));
        }

        $this->DatadiriModel2->delete($id_user);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('datadiri/aksi');
    }

    public function excel()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin']) {
            if (BaseController::statusLogin()['levelLogin'] !== '1') {
                return redirect()->to(base_url('/'));
            }
        } else {
            return redirect()->to(base_url('/'));
        }

        $data = [
            'datadiri' => $this->DatadiriModel->getdatadiri(),
            'datadiri2' => $this->DatadiriModel2->getdatadiri2()
        ];

        echo  view('datadiri/excel', $data);
    }

    public function notifikasi()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin']) {
            if (BaseController::statusLogin()['levelLogin'] !== '1') {
                return redirect()->to(base_url('/'));
            }
        } else {
            return redirect()->to(base_url('/'));
        }

        $notifikasi = $this->NotifikasiModel->findAll();


        $data = [
            'title' => 'Notifikasi',
            'notifikasi' => $notifikasi,
        ];

        return view('datadiri/notifikasi', $data);
    }

    public function konfirmasi($id)
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin']) {
            if (BaseController::statusLogin()['levelLogin'] !== '1') {
                return redirect()->to(base_url('/'));
            }
        } else {
            return redirect()->to(base_url('/'));
        }

        $dataNotifikasi = $this->NotifikasiModel->getNotifikasi($id);

        // dd($dataNotifikasi);

        $username = $dataNotifikasi['username'];
        $password = $dataNotifikasi['password'];

        $values = [
            'username' => $username,
            'password' => $password,

        ];

        $usersModel = new \App\Models\usersModel();
        $usersModel->insert($values);

        $this->NotifikasiModel->delete($id);
        session()->setFlashdata('pesan', 'Akun berhasil dikonfirmasi');
        return redirect()->to('datadiri/notifikasi');
    }

    public function hapusNotifikasi($id)
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin']) {
            if (BaseController::statusLogin()['levelLogin'] !== '1') {
                return redirect()->to(base_url('/'));
            }
        } else {
            return redirect()->to(base_url('/'));
        }



        $this->NotifikasiModel->delete($id);
        session()->setFlashdata('pesan', 'Notifikasi berhasil dihapus');
        return redirect()->to('datadiri/notifikasi');
    }

    public function akunPengguna()
    {
        // proteksi login pengguna
        if (BaseController::statusLogin()['statusLogin']) {
            if (BaseController::statusLogin()['levelLogin'] !== '1') {
                return redirect()->to(base_url('/'));
            }
        } else {
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
        if (BaseController::statusLogin()['statusLogin']) {
            if (BaseController::statusLogin()['levelLogin'] !== '1') {
                return redirect()->to(base_url('/'));
            }
        } else {
            return redirect()->to(base_url('/'));
        }

        $session = session();
        $id_user = $session->get('id');
        $dataAkun = $this->Model_auth->getAkun($id_user);
        $password = $dataAkun['password'];


        // dd($password);

        if (!$this->validate([
            'password_lama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password lama harus diisi'
                    

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
            return redirect()->to('datadiri/akun-pengguna' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
        }

        // verifikasi password
        if (password_verify($this->request->getVar('password_lama'), $password))
        {
            $this->Model_auth->save([
                'id' => $id_user,
                'password' => password_hash($this->request->getVar('password_baru'), PASSWORD_DEFAULT),
            ]);
    
            session()->setFlashdata('pesan', 'Password berhasil diubah');
    
            return redirect()->to('datadiri/akun-pengguna');
        }else
        {
            session()->setFlashdata('pesan-error', 'Password lama salah');
    
            return redirect()->to('datadiri/akun-pengguna');
        }



        
    }

    public function dataPendapatan()
    {
        $datadiri = $this->DatadiriModel->findAll();
        $datadiri2 = $this->DatadiriModel2->findAll();
        $gabungan = (object) array_merge((array) $datadiri, (array)$datadiri2);
        $arrayGabungan = (array) $gabungan;
        // dd($gabungan);
        // $jPendapatan2 = $this->DatadiriModel2->getDataByPendapatan('Rp2.000.000-Rp2.500.000');

        $data1 = [];

        $data2 = [];
        foreach ($gabungan as $data) {
            $data1[] = $data['pendapatan'];
        }

        sort($data1);
        $data1 = array_unique($data1);
        $data1 = array_values($data1);


        foreach ($data1 as $data) {
            // $data2[] = count($this->DatadiriModel2->getDataByPendapatan($data));

        }

        // dd($data1[0]);
        // dd($arrayGabungan[0]['pendapatan']);
        for ($i = 0; $i < count($data1); $i++) {
            $tampung = 0;
            for ($j = 0; $j < count($arrayGabungan); $j++) {
                // dd($arrayGabungan[$j]['pendapatan'] == $data1[$j]);
                if ($arrayGabungan[$j]['pendapatan'] == $data1[$i]) {
                    // echo $arrayGabungan[$j]['pendapatan'] ."<br>";
                    $tampung++;
                }
            }
            $data2[] = $tampung;
        }
        $dataJSON = [
            $data1,
            $data2
        ];

        // for ($i =0; $i < count($data1); $i++)
        // {

        //     // $dataJSON[] = array_combine([$data1[$i]], [$data2[$i]]);
        //     $dataJSON[] = array_combine([$data1[$i]], [$data2[$i]]);

        // }



        echo json_encode($dataJSON);
        // echo json_encode(array_combine($data1, $data2));
        // echo($data1);
        // dd($jPendapatan2);

    }



    public function dataPekerjaan()
    {
        $datadiri = $this->DatadiriModel->findAll();
        $datadiri2 = $this->DatadiriModel2->findAll();
        $gabungan = (object) array_merge((array) $datadiri, (array)$datadiri2);
        $arrayGabungan = (array) $gabungan;
        // dd($gabungan);
        // $jPendapatan2 = $this->DatadiriModel2->getDataByPendapatan('Rp2.000.000-Rp2.500.000');

        $data1 = [];

        $data2 = [];
        foreach ($gabungan as $data) {
            $data1[] = $data['pekerjaan'];
        }

        sort($data1);
        $data1 = array_unique($data1);
        $data1 = array_values($data1);


        foreach ($data1 as $data) {
            // $data2[] = count($this->DatadiriModel2->getDataByPendapatan($data));

        }

        // dd($data1[0]);
        // dd($arrayGabungan[0]['pendapatan']);
        for ($i = 0; $i < count($data1); $i++) {
            $tampung = 0;
            for ($j = 0; $j < count($arrayGabungan); $j++) {
                // dd($arrayGabungan[$j]['pendapatan'] == $data1[$j]);
                if ($arrayGabungan[$j]['pekerjaan'] == $data1[$i]) {
                    // echo $arrayGabungan[$j]['pendapatan'] ."<br>";
                    $tampung++;
                }
            }
            $data2[] = $tampung;
        }
        $dataJSON = [
            $data1,
            $data2
        ];

        // for ($i =0; $i < count($data1); $i++)
        // {

        //     // $dataJSON[] = array_combine([$data1[$i]], [$data2[$i]]);
        //     $dataJSON[] = array_combine([$data1[$i]], [$data2[$i]]);

        // }



        echo json_encode($dataJSON);
        // echo json_encode(array_combine($data1, $data2));
        // echo($data1);
        // dd($jPendapatan2);

    }



    public function dataAlamat()
    {
        $datadiri = $this->DatadiriModel->findAll();
        $datadiri2 = $this->DatadiriModel2->findAll();
        $gabungan = (object) array_merge((array) $datadiri, (array)$datadiri2);
        $arrayGabungan = (array) $gabungan;
        // dd($gabungan);
        // $jPendapatan2 = $this->DatadiriModel2->getDataByPendapatan('Rp2.000.000-Rp2.500.000');

        $data1 = [];

        $data2 = [];
        foreach ($gabungan as $data) {
            $data1[] = $data['alamat'];
        }

        sort($data1);
        $data1 = array_unique($data1);
        $data1 = array_values($data1);


        foreach ($data1 as $data) {
            // $data2[] = count($this->DatadiriModel2->getDataByPendapatan($data));

        }

        // dd($data1[0]);
        // dd($arrayGabungan[0]['pendapatan']);
        for ($i = 0; $i < count($data1); $i++) {
            $tampung = 0;
            for ($j = 0; $j < count($arrayGabungan); $j++) {
                // dd($arrayGabungan[$j]['pendapatan'] == $data1[$j]);
                if ($arrayGabungan[$j]['alamat'] == $data1[$i]) {
                    // echo $arrayGabungan[$j]['pendapatan'] ."<br>";
                    $tampung++;
                }
            }
            $data2[] = $tampung;
        }
        $dataJSON = [
            $data1,
            $data2
        ];

        // for ($i =0; $i < count($data1); $i++)
        // {

        //     // $dataJSON[] = array_combine([$data1[$i]], [$data2[$i]]);
        //     $dataJSON[] = array_combine([$data1[$i]], [$data2[$i]]);

        // }



        echo json_encode($dataJSON);
        // echo json_encode(array_combine($data1, $data2));
        // echo($data1);
        // dd($jPendapatan2);

    }
}
