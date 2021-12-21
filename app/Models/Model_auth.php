<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_auth extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'username', 'password'];

    public function login($email, $password)
    {
        return $this->db->table('tbl_user')->where([
            'email' => $email,
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
