<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_auth extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'username', 'password'];

    public function loginEmail($email)
    {
        return $this->db->table('tbl_user')->where([
            'email' => $email,
            // 'password' => $password,
        ])->get()->getRowArray();
    }
    public function getPassword($email)
    {
        // return $this->db->table('tbl_user')->select('email')->where([
        //     'email' => $email,
        //     // 'password' => $password,
        // ])->get()->getRow();
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_user');
        $builder->select('password');
        $builder->where('email', $email);
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
