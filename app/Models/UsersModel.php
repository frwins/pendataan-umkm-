<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'tbl_pengguna';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password'];
}
