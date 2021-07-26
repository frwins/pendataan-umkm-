<?php

namespace App\Models;

use CodeIgniter\Model;

class usersModel extends Model
{
    protected $table = 'tbl_pengguna';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password'];
}
