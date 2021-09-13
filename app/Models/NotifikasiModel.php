<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifikasiModel extends Model
{
    protected $table = 'notifikasi';
    protected $primaryKey = 'id_notifikasi';
    protected $allowedFields = ['username', 'password'];

    public function getNotifikasi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_notifikasi' => $id])->first();
    }
}
