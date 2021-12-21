<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel2 extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password'];
}
