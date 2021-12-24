<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_auth2 extends Model
{
    protected $table = 'tbl_pengguna';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'username',  'password'];

    public function loginEmail($username)
    {
        return $this->db->table('tbl_pengguna')->where([
            'username' => $username,
            // 'password' => $password,
        ])->get()->getRowArray();
    }
    public function getPassword($username)
    {
        // return $this->db->table('tbl_user')->select('username')->where([
        //     'username' => $username,
        //     // 'password' => $password,
        // ])->get()->getRow();
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_pengguna');
        $builder->select('password');
        $builder->where('username', $username);
        $query = $builder->get();

        return $query->getRow();
    }

    public function getAkun($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
