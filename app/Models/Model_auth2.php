<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_auth2 extends Model
{
    public function login($username, $password)
    {
        return $this->db->table('tbl_pengguna')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }
}
