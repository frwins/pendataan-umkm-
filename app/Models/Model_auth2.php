<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_auth2 extends Model
{
    protected $table = 'tbl_pengguna';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'username', 'password'];

    public function login($username, $password)
    {
        return $this->db->table('tbl_pengguna')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function getAkun($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
